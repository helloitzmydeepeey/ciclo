<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_RewardPointsPro
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\RewardPointsPro\Helper;

use DateTime;
use Exception;
use Magento\Customer\Model\GroupFactory as CustomerGroupFactory;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\ObjectManagerInterface;
use Magento\Store\Api\Data\StoreInterface;
use Magento\Store\Model\StoreManagerInterface;
use Mageplaza\Core\Helper\AbstractData;

/**
 * Class Validate
 * @package Mageplaza\RewardPointsPro\Helper
 */
class Validate extends AbstractData
{
    /**
     * @var CustomerGroupFactory
     */
    protected $customerGroupFactory;

    /**
     * Validate constructor.
     *
     * @param Context $context
     * @param ObjectManagerInterface $objectManager
     * @param StoreManagerInterface $storeManager
     * @param CustomerGroupFactory $customerGroupFactory
     */
    public function __construct(
        Context $context,
        ObjectManagerInterface $objectManager,
        StoreManagerInterface $storeManager,
        CustomerGroupFactory $customerGroupFactory
    ) {
        $this->customerGroupFactory = $customerGroupFactory;
        parent::__construct($context, $objectManager, $storeManager);
    }

    /**
     * @param array $data
     * @param string $field
     *
     * @throws LocalizedException
     */
    public function validateGreaterThanZero($data, $field)
    {
        if (isset($data[$field]) && $data[$field] <= 0) {
            throw new LocalizedException(__('%1 must be greater than zero.', $field));
        }
    }

    /**
     * @param array $data
     * @param String $field
     *
     * @throws InputException
     */
    public function validateZeroOrGreater($data, $field)
    {
        if (isset($data[$field]) && $data[$field] < 0) {
            throw new InputException(__('%1 must be greater or equal zero.', $field));
        }
    }

    /**
     * @param array $data
     *
     * @return bool
     * @throws LocalizedException
     */
    public function validateWebsiteIds($data)
    {
        if (isset($data['website_ids'])) {
            $ids = $data['website_ids'];
            if (!is_array($ids)) {
                $ids = explode(',', $ids);
            }

            foreach ($ids as $id) {
                if ($id === 0) {
                    throw new NoSuchEntityException(
                        __(sprintf("The website with code %s that was requested wasn't found.", $id))
                    );
                }
                // throw exception if the website id not exits
                $this->storeManager->getWebsite($id);
            }
        }

        return true;
    }

    /**
     * @param array $data
     * @param string $field
     *
     * @return bool
     * @throws LocalizedException
     */
    public function validateCustomerGroupIds($data, $field = 'customer_group_ids')
    {
        if (isset($data[$field])) {
            $ids = $data[$field];
            if (!is_array($ids)) {
                $ids = explode(',', $ids);
            }

            foreach ($ids as $id) {
                if ($id === 0 && isset($data['isUseGuest'])) {
                    continue;
                }

                $group = $this->customerGroupFactory->create()->load($id);
                if (!$group->getId()) {
                    $message = __('No such group %1. Details: %2 field', $id, $field);
                    throw new LocalizedException(__($message));
                }
            }
        }

        return true;
    }

    /**
     * @param array $data
     * @param array $fields
     *
     * @throws LocalizedException
     */
    public function validateRequired($data, $fields)
    {
        foreach ($fields as $field) {
            if (!isset($data[$field])) {
                throw new LocalizedException(__('%1 is required', $field));
            }
        }
    }

    /**
     * @param array $options
     * @param array $data
     * @param string $field
     *
     * @throws LocalizedException
     */
    public function validateOptions($options, $data, $field)
    {
        if (isset($data[$field])) {
            if (!isset($options[$data[$field]])) {
                throw new LocalizedException(__('%1 invalid.', $field));
            }
        }
    }

    /**
     * @param array $data
     *
     * @throws InputException
     * @throws LocalizedException
     */
    public function validateFromAndToDate($data)
    {
        try {
            $fromDate = new DateTime($data['from_date']);
            $toDate   = new DateTime($data['to_date']);
        } catch (Exception $e) {
            throw new LocalizedException(__($e->getMessage()));
        }

        if ($fromDate > $toDate) {
            throw new InputException(__(__('End Date must follow Start Date.')));
        }
    }

    /**
     * @param string $date
     *
     * @return DateTime|false
     * @throws LocalizedException
     */
    public function isValidDate($date)
    {
        try {
            $isValid = date_create($date);
        } catch (Exception $e) {
            $isValid = false;
        }

        if (!$isValid) {
            throw  new LocalizedException(__('Invalid date'));
        }

        return true;
    }

    /**
     * @param int $storeId
     *
     * @return StoreInterface
     * @throws NoSuchEntityException
     */
    public function getStoreById($storeId)
    {
        return $this->storeManager->getStore($storeId);
    }

    /**
     * @param array $data
     *
     * @throws InputException
     * @throws LocalizedException
     */
    public function validateGeneral($data)
    {
        if (isset($data['sort_order'])) {
            $this->validateZeroOrGreater($data, 'sort_order');
        }

        if (isset($data['from_date'])) {
            $this->isValidDate($data['from_date']);
        }

        if (isset($data['to_date'])) {
            $this->isValidDate($data['to_date']);
        }

        if (isset($data['from_date'], $data['to_date'])) {
            $this->validateFromAndToDate($data);
        }

        $this->validateWebsiteIds($data);
        $this->validateCustomerGroupIds($data);
        $this->validateGreaterThanZero($data, 'point_amount');
    }
}
