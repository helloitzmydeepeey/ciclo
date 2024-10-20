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

namespace Mageplaza\RewardPointsPro\Model\ResourceModel\CatalogRule;

use Mageplaza\RewardPointsPro\Api\Data\CatalogRuleSearchResultInterface;
use Mageplaza\RewardPointsPro\Model\ResourceModel\AbstractCollection;

/**
 * Class Collection
 * @package Mageplaza\RewardPointsPro\Model\ResourceModel\CatalogRule\Collection
 */
class Collection extends AbstractCollection implements CatalogRuleSearchResultInterface
{
    /**
     * @var string
     */
    protected $associatedEntityMapVirtual = 'Mageplaza\RewardPointsPro\Model\ResourceModel\CatalogRule\AssociatedEntityMap';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(
            'Mageplaza\RewardPointsPro\Model\CatalogRule',
            'Mageplaza\RewardPointsPro\Model\ResourceModel\CatalogRule'
        );
    }
}
