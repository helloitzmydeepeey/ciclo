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
 * @package     Mageplaza_RewardPointsUltimate
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\RewardPointsUltimate\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface RewardRateRepositoryInterface
 * @package Mageplaza\RewardPointsUltimate\Api
 */
interface RewardRateRepositoryInterface
{
    /**
     * Lists Reward rate that match specified search criteria.
     *
     * This call returns an array of objects, but detailed information about each object’s attributes might not be
     * included.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria The search criteria.
     *
     * @return \Mageplaza\RewardPointsUltimate\Api\Data\RewardRateSearchResultInterface Reward rate search
     *     result interface.
     */

    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * @param \Mageplaza\RewardPointsUltimate\Api\Data\RewardRateInterface $rewardRate
     *
     * @return \Mageplaza\RewardPointsUltimate\Api\Data\RewardRateInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Mageplaza\RewardPointsUltimate\Api\Data\RewardRateInterface $rewardRate);

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete($id);

    /**
     * @param int $id
     *
     * @return \Mageplaza\RewardPointsUltimate\Api\Data\RewardRateInterface
     */
    public function getRateById($id);

    /**
     * @param int $customerGroupId
     * @param int $websiteId
     * @param int $direction
     * @return \Mageplaza\RewardPointsUltimate\Api\Data\RewardRateInterface
     */
    public function getRateByCustomer($customerGroupId, $websiteId, $direction);
}
