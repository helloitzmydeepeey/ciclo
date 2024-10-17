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

namespace Mageplaza\RewardPointsUltimate\Model\ResourceModel\RewardRate;

use Magento\Sales\Model\ResourceModel\Collection\AbstractCollection;
use Mageplaza\RewardPointsUltimate\Api\Data\RewardRateSearchResultInterface;

/**
 * Class Collection
 * @package Mageplaza\RewardPointsUltimate\Model\ResourceModel\RewardCustomer
 */
class Collection extends AbstractCollection implements RewardRateSearchResultInterface
{
    /**
     * @type string
     */
    protected $_idFieldName = 'rate_id';

    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->_init(
            'Mageplaza\RewardPointsUltimate\Model\RewardRate',
            'Mageplaza\RewardPoints\Model\ResourceModel\Rate'
        );
    }
}
