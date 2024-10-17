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

namespace Mageplaza\RewardPointsUltimate\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Mageplaza\RewardPointsUltimate\Api\Data\RewardRateExtensionInterface;
use Mageplaza\RewardPointsUltimate\Api\Data\RewardRateInterface;

/**
 * Class RewardRate
 * @package Mageplaza\RewardPointsUltimate\Model
 */
class RewardRate extends AbstractExtensibleModel implements RewardRateInterface
{
    /**
     * Constructor
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Mageplaza\RewardPoints\Model\ResourceModel\Rate');
    }

    /**
     * {@inheritdoc}
     */
    public function getRateId()
    {
        return $this->getData(self::RATE_ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setRateId($value)
    {
        return $this->setData(self::RATE_ID, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getPoints()
    {
        return $this->getData(self::POINTS);
    }

    /**
     * {@inheritdoc}
     */
    public function setPoints($value)
    {
        return $this->setData(self::POINTS, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getMoney()
    {
        return $this->getData(self::MONEY);
    }

    /**
     * {@inheritdoc}
     */
    public function setMoney($value)
    {
        return $this->setData(self::MONEY, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        return $this->getData(self::PRIORITY);
    }

    /**
     * {@inheritdoc}
     */
    public function setPriority($value)
    {
        return $this->setData(self::PRIORITY, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerGroupIds()
    {
        return $this->getData(self::CUSTOMER_GROUP_IDS);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerGroupIds($value)
    {
        return $this->setData(self::CUSTOMER_GROUP_IDS, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getWebsiteIds()
    {
        return $this->getData(self::WEBSITE_IDS);
    }

    /**
     * {@inheritdoc}
     */
    public function setWebsiteIds($value)
    {
        return $this->setData(self::WEBSITE_IDS, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getDirection()
    {
        return $this->getData(self::DIRECTION);
    }

    /**
     * {@inheritdoc}
     */
    public function setDirection($value)
    {
        return $this->setData(self::DIRECTION, $value);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return RewardRateExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     *
     * @param RewardRateExtensionInterface $extensionAttributes
     *
     * @return $this
     */
    public function setExtensionAttributes(
        RewardRateExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
