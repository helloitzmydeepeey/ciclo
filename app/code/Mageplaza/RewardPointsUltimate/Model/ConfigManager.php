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

use Magento\Store\Model\StoreManagerInterface;
use Mageplaza\RewardPointsUltimate\Api\ConfigManagerInterface;
use Mageplaza\RewardPointsUltimate\Helper\Data;

/**
 * Class Config
 * @package Mageplaza\RewardPointsUltimate\Model
 */
class ConfigManager implements ConfigManagerInterface
{
    /**
     * @var Data
     */
    protected $helperData;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * ConfigManager constructor.
     *
     * @param Data $helperData
     * @param Config $config
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Data $helperData,
        Config $config,
        StoreManagerInterface $storeManager
    ) {
        $this->helperData   = $helperData;
        $this->config       = $config;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigs()
    {
        // Revert current store on by rest API
        $storeId = $this->storeManager->getStore()->getId();
        $this->config->setPointLabel($this->helperData->getConfigGeneral(Config::POINT_LABEL, $storeId))
            ->setPluralPointLabel($this->helperData->getConfigGeneral(Config::PLURAL_POINT_LABEL, $storeId))
            ->setDisplayPointLabel($this->helperData->getConfigGeneral(Config::DISPLAY_POINT_LABEL, $storeId))
            ->setZeroAmountLabel($this->helperData->getConfigGeneral('zero_amount', $storeId))
            ->setMaximumPoint($this->helperData->getConfigGeneral(Config::MAXIMUM_POINT, $storeId))
            ->setPointExpired($this->helperData->getSalesPointExpiredAfter($storeId))
            ->setIsDisplayTopPage($this->helperData->getConfigDisplay('top_page', $storeId))
            ->setIsDisplayMiniCart($this->helperData->getConfigDisplay('mini_cart', $storeId));

        return $this->config;
    }
}
