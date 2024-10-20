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
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Mageplaza\RewardPoints\Model\Source\Direction;
use Mageplaza\RewardPointsPro\Helper\Validate;
use Mageplaza\RewardPointsUltimate\Api\Data\RewardRateInterface;
use Mageplaza\RewardPointsUltimate\Api\Data\RewardRateSearchResultInterfaceFactory as SearchResultFactory;
use Mageplaza\RewardPointsUltimate\Api\RewardRateRepositoryInterface;
use Mageplaza\RewardPointsUltimate\Helper\Data;

/**
 * Class RewardCustomerRepository
 * @package Mageplaza\RewardPointsUltimate\Model
 */
class RewardRateRepository implements RewardRateRepositoryInterface
{
    /**
     * @var Data
     */
    protected $helperData;

    /**
     * @var SearchResultFactory
     */
    protected $searchResultFactory;

    /**
     * @var RewardRateFactory
     */
    protected $rewardRateFactory;

    /**
     * @var Validate
     */
    protected $validate;

    /**
     * RewardRateRepository constructor.
     *
     * @param Data $helperData
     * @param SearchResultFactory $searchResultFactory
     * @param RewardRateFactory $rewardRateFactory
     * @param Validate $validate
     */
    public function __construct(
        Data $helperData,
        SearchResultFactory $searchResultFactory,
        RewardRateFactory $rewardRateFactory,
        Validate $validate
    ) {
        $this->searchResultFactory = $searchResultFactory;
        $this->helperData          = $helperData;
        $this->rewardRateFactory   = $rewardRateFactory;
        $this->validate            = $validate;
    }

    /**
     * @inheritDoc
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        $searchResult = $this->searchResultFactory->create();

        return $this->helperData->processGetList($searchCriteria, $searchResult);
    }

    /**
     * @inheritDoc
     * @throws LocalizedException
     */
    public function getRateById($id)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        $rewardRate = $this->rewardRateFactory->create();
        $rewardRate->load($id);
        if (!$rewardRate->getId()) {
            throw new NoSuchEntityException(__('No such entity id!'));
        }

        return $rewardRate;
    }

    /**
     * {@inheritDoc}
     */
    public function delete($id)
    {
        try {
            $rewardRate = $this->getRateById($id);
            $rewardRate->delete();
        } catch (Exception $e) {
            throw new LocalizedException(__($e->getMessage()));
        }

        return true;
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function getRateByCustomer($customerGroupId, $websiteId, $direction)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        $options = Direction::getOptionArray();
        if (!isset($options[$direction])) {
            throw new NoSuchEntityException(__('Direction invalid.'));
        }

        return $this->helperData->getCalculationHelper()->getRate($direction, $websiteId, $customerGroupId);
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function save(RewardRateInterface $rewardRate)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        $data       = $rewardRate->getData();
        $rewardRate = $this->rewardRateFactory->create();
        $rateId     = isset($data['rate_id']) ? $data['rate_id'] : '';
        if ($rateId) {
            $rewardRate->load($rateId);
            if (!$rewardRate->getId()) {
                throw new NoSuchEntityException(__('No such entity id!'));
            }
        } else {
            $fields = ['direction', 'points', 'money', 'website_ids', 'customer_group_ids', 'priority'];
            $this->validate->validateRequired($data, $fields);
        }

        $this->validate->validateGreaterThanZero($data, 'points');
        $this->validate->validateGreaterThanZero($data, 'money');
        $this->validate->validateWebsiteIds($data);
        $this->validate->validateCustomerGroupIds($data);
        $this->validate->validateOptions(Direction::getOptionArray(), $data, 'direction');

        $rewardRate->addData($data)->save();

        return $rewardRate;
    }
}
