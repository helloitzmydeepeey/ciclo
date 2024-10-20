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
 * @package     Mageplaza_RewardPoints
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\RewardPoints\Model;

use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;
use Mageplaza\RewardPoints\Helper\Data;

/**
 * Class Rate
 * @package Mageplaza\RewardPoints\Model
 */
class Rate extends AbstractModel implements IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'mageplaza_rewardpoints_rate';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'mageplaza_rewardpoints_rate';

    /**
     * @var Data
     */
    protected $helper;

    /**
     * Rate constructor.
     *
     * @param Context $context
     * @param Registry $registry
     * @param Data $helper
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        Data $helper,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->helper = $helper;

        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Constructor
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Mageplaza\RewardPoints\Model\ResourceModel\Rate');
    }

    /**
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->getId() && $this->getMoney() && $this->getPoints();
    }

    /**
     * @param $points
     *
     * @return float|int
     */
    public function getDiscountByPoint($points)
    {
        return $points * $this->getMoney() / $this->getPoints();
    }

    /**
     * @return float
     */
    public function getMoney()
    {
        return $this->helper->round($this->getData('money'));
    }

    /**
     * @return float
     */
    public function getPoints()
    {
        return $this->helper->getPointHelper()->round($this->getData('points'));
    }

    /**
     * @inheritdoc
     */
    public function validateBeforeSave()
    {
        parent::validateBeforeSave();

        $money  = $this->getMoney();
        $points = $this->getPoints();
        if ($money <= 0 || $points <= 0) {
            throw new LocalizedException(__('Invalid points or money rate.'));
        }

        $this->setData('points', $points)
            ->setData('money', $money);

        return $this;
    }
}
