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

use Magento\Framework\DataObject;
use Mageplaza\RewardPointsUltimate\Api\Data\ConfigInterface;

/**
 * Class Config
 * @package Mageplaza\RewardPointsUltimate\Model
 */
class Config extends DataObject implements ConfigInterface
{
    const POINT_LABEL          = 'point_label';
    const PLURAL_POINT_LABEL   = 'plural_point_label';
    const DISPLAY_POINT_LABEL  = 'display_point_label';
    const ZERO_AMOUNT_LABEL    = 'zero_amount_label';
    const MAXIMUM_POINT        = 'maximum_point';
    const POINT_EXPIRED        = 'point_expired_after';
    const IS_DISPLAY_TOP_PAGE  = 'is_display_top_page';
    const IS_DISPLAY_MINI_CART = 'is_display_mini_cart';

    /**
     * {@inheritdoc}
     */
    public function getPointLabel()
    {
        return $this->getData(self::POINT_LABEL);
    }

    /**
     * {@inheritdoc}
     */
    public function setPointLabel($value)
    {
        return $this->setData(self::POINT_LABEL, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getPluralPointLabel()
    {
        return $this->getData(self::PLURAL_POINT_LABEL);
    }

    /**
     * {@inheritdoc}
     */
    public function setPluralPointLabel($value)
    {
        return $this->setData(self::PLURAL_POINT_LABEL, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getDisplayPointLabel()
    {
        return $this->getData(self::DISPLAY_POINT_LABEL);
    }

    /**
     * {@inheritdoc}
     */
    public function setDisplayPointLabel($value)
    {
        return $this->setData(self::DISPLAY_POINT_LABEL, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getZeroAmountLabel()
    {
        return $this->getData(self::ZERO_AMOUNT_LABEL);
    }

    /**
     * {@inheritdoc}
     */
    public function setZeroAmountLabel($value)
    {
        return $this->setData(self::ZERO_AMOUNT_LABEL, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMaximumPoint()
    {
        return $this->getData(self::MAXIMUM_POINT);
    }

    /**
     * {@inheritdoc}
     */
    public function setMaximumPoint($value)
    {
        return $this->setData(self::MAXIMUM_POINT, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getPointExpired()
    {
        return $this->getData(self::POINT_EXPIRED);
    }

    /**
     * {@inheritdoc}
     */
    public function setPointExpired($value)
    {
        return $this->setData(self::POINT_EXPIRED, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getIsDisplayTopPage()
    {
        return $this->getData(self::IS_DISPLAY_TOP_PAGE);
    }

    /**
     * {@inheritdoc}
     */
    public function setIsDisplayTopPage($value)
    {
        return $this->setData(self::IS_DISPLAY_TOP_PAGE, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getIsDisplayMiniCart()
    {
        return $this->getData(self::IS_DISPLAY_MINI_CART);
    }

    /**
     * {@inheritdoc}
     */
    public function setIsDisplayMiniCart($value)
    {
        return $this->setData(self::IS_DISPLAY_MINI_CART, $value);
    }
}
