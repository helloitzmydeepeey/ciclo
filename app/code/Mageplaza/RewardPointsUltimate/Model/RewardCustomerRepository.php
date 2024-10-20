<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_RewardPointsUltimate
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\RewardPointsUltimate\Model;

use Exception;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Mageplaza\RewardPointsUltimate\Api\Data\RewardCustomerInterface;
use Mageplaza\RewardPointsUltimate\Api\Data\RewardCustomerSearchResultInterfaceFactory as SearchResultFactory;
use Mageplaza\RewardPointsUltimate\Api\RewardCustomerRepositoryInterface;
use Mageplaza\RewardPointsUltimate\Helper\Data;

/**
 * Class RewardCustomerRepository
 * @package Mageplaza\RewardPointsUltimate\Model
 */
class RewardCustomerRepository implements RewardCustomerRepositoryInterface
{
    /**
     * @var RewardCustomerFactory
     */
    protected $rewardCustomerFactory;

    /**
     * @var CustomerFactory
     */
    protected $customerFactory;

    /**
     * @var SearchResultFactory
     */
    protected $searchResultFactory;

    /**
     * @var Data
     */
    protected $helperData;

    /**
     * RewardCustomerRepository constructor.
     *
     * @param Data $helperData
     * @param RewardCustomerFactory $rewardCustomerFactory
     * @param CustomerFactory $customerFactory
     * @param SearchResultFactory $searchResultFactory
     */
    public function __construct(
        Data $helperData,
        RewardCustomerFactory $rewardCustomerFactory,
        CustomerFactory $customerFactory,
        SearchResultFactory $searchResultFactory
    ) {
        $this->rewardCustomerFactory = $rewardCustomerFactory;
        $this->customerFactory       = $customerFactory;
        $this->searchResultFactory   = $searchResultFactory;
        $this->helperData            = $helperData;
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        $searchResult = $this->searchResultFactory->create();

        return $this->helperData->processGetList($searchCriteria, $searchResult);
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function getAccountByCustomerId($customerId)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        return $this->rewardCustomerFactory->create()->loadByCustomerId($customerId);
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function subscribe($customerId, $isUpdate, $isExpire)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        $rewardAccount = $this->getAccountByCustomerId($customerId);
        if (!$rewardAccount->getId()) {
            throw new NoSuchEntityException(__('Reward account doesn\'t exist'));
        }

        try {
            $rewardAccount->setNotificationUpdate($isUpdate)
                ->setNotificationExpire($isExpire)
                ->save();
        } catch (Exception $e) {
            throw new LocalizedException(__($e->getMessage()));
        }

        return true;
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function getAccountById($id)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        if (!$id) {
            throw new InputException(__('Reward account id required'));
        }

        $rewardCustomer = $this->rewardCustomerFactory->create()->load($id);

        if (!$rewardCustomer->getId()) {
            throw new NoSuchEntityException(__('Reward account doesn\'t exist'));
        }

        return $rewardCustomer;
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function count()
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        return $this->searchResultFactory->create()->getTotalCount();
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function deleteAccountById($id)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        $rewardCustomer = $this->getAccountById($id);
        try {
            $rewardCustomer->delete();
        } catch (Exception $e) {
            throw new LocalizedException(__($e->getMessage()));
        }

        return true;
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function getAccountByEmail($email)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        $searchResult = $this->searchResultFactory->create();
        $searchResult->getSelect()->join(
            ['customer' => $searchResult->getTable('customer_entity')],
            'main_table.customer_id = customer.entity_id',
            ['email']
        )->where('customer.email = ?', $email);
        $rewardCustomer = $searchResult->getFirstItem();
        if (!$rewardCustomer->getRewardId()) {
            throw new NoSuchEntityException(__('Reward account email doesn\'t exist'));
        }

        return $rewardCustomer;
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function save(RewardCustomerInterface $data)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        if (!$data->getCustomerId()) {
            throw new InputException(__('Customer id required'));
        }

        $customer = $this->customerFactory->create()->load($data->getCustomerId());
        if (!$customer->getId()) {
            throw new NoSuchEntityException(__('Customer doesn\'t exist'));
        }

        $rewardCustomer = $this->rewardCustomerFactory->create()->loadByCustomerId($customer->getId());
        if ($rewardCustomer->getId()) {
            throw new CouldNotSaveException(__('There is already a reward account with this customer'));
        }

        try {
            $rewardCustomer->create(
                $customer->getStoreId(),
                [
                    'customer_id'   => $customer->getId(),
                    'point_balance' => $data->getPointBalance()
                ]
            );
        } catch (Exception $e) {
            throw new LocalizedException(__($e->getMessage()));
        }

        return true;
    }
}
