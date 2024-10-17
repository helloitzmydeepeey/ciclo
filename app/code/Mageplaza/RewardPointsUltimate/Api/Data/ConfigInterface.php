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

namespace Mageplaza\RewardPointsUltimate\Api\Data;

/**
 * Interface ConfigInterface
 * @package Mageplaza\RewardPointsUltimate\Api\Data
 */
interface ConfigInterface
{
    /**
     * @return string
     */
    public function getPointLabel();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPointLabel($value);

    /**
     * @return string
     */
    public function getPluralPointLabel();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPluralPointLabel($value);

    /**
     * @return int|bool
     */
    public function getDisplayPointLabel();

    /**
     * @param string|int|bool $value
     *
     * @return $this
     */
    public function setDisplayPointLabel($value);

    /**
     * @return string
     */
    public function getZeroAmountLabel();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setZeroAmountLabel($value);

    /**
     * @return int
     */
    public function getMaximumPoint();

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setMaximumPoint($value);

    /**
     * @return int
     */
    public function getPointExpired();

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setPointExpired($value);

    /**
     * @return bool
     */
    public function getIsDisplayTopPage();

    /**
     * @param int|bool $value
     *
     * @return $this
     */
    public function setIsDisplayTopPage($value);

    /**
     * @return bool
     */
    public function getIsDisplayMiniCart();

    /**
     * @param int|bool $value
     *
     * @return $this
     */
    public function setIsDisplayMiniCart($value);
}
