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
 * @package     Mageplaza_RewardPoints
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\RewardPoints\Model\Api;

use Magento\Checkout\Api\Data\TotalsInformationInterface;
use Magento\Checkout\Model\Session;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Quote\Api\CartTotalRepositoryInterface;
use Magento\Quote\Api\Data\CartInterface;
use Magento\Quote\Model\Quote;
use Mageplaza\RewardPoints\Api\SpendingManagementInterface;
use Mageplaza\RewardPoints\Helper\Data as HelperData;

/**
 * Class SpendingManagement
 * @package Mageplaza\RewardPoints\Model\Api
 */
class SpendingManagement implements SpendingManagementInterface
{
    /**
     * @var HelperData
     */
    protected $helperData;

    /**
     * @var CartRepositoryInterface
     */
    protected $cartRepository;

    /**
     * Cart total repository.
     *
     * @var CartTotalRepositoryInterface
     */
    protected $cartTotalRepository;

    /**
     * @var Session
     */
    protected $checkoutSession;

    /**
     * SpendingManagement constructor.
     *
     * @param HelperData $helperData
     * @param CartRepositoryInterface $cartRepository
     * @param CartTotalRepositoryInterface $cartTotalRepository
     * @param Session $checkoutSession
     */
    public function __construct(
        HelperData $helperData,
        CartRepositoryInterface $cartRepository,
        CartTotalRepositoryInterface $cartTotalRepository,
        Session $checkoutSession
    ) {
        $this->helperData          = $helperData;
        $this->cartRepository      = $cartRepository;
        $this->cartTotalRepository = $cartTotalRepository;
        $this->checkoutSession     = $checkoutSession;
    }

    /**
     * {@inheritdoc}
     */
    public function calculate($cartId, TotalsInformationInterface $addressInformation, $points, $ruleId)
    {
        /** @var Quote $quote */
        $quote = $this->getQuote($cartId);

        $this->helperData->getCalculationHelper()->setQuote($quote);
        if ($ruleId == 'no_apply') {
            $points = 0;
        }

        $quote->setMpRewardSpent($points)->setMpRewardApplied($ruleId);

        $this->validateQuote($quote);
        if ($addressInformation->getAddress()) {
            if ($quote->getIsVirtual()) {
                $quote->setBillingAddress($addressInformation->getAddress());
            } else {
                $quote->setShippingAddress($addressInformation->getAddress());
                if ($addressInformation->getShippingCarrierCode() && $addressInformation->getShippingMethodCode()) {
                    $quote->getShippingAddress()->setCollectShippingRates(true)->setShippingMethod(
                        $addressInformation->getShippingCarrierCode() . '_' . $addressInformation->getShippingMethodCode()
                    );
                }
            }
        }

        $quote->collectTotals();
        $this->cartRepository->save($quote);

        return $this->cartTotalRepository->get($quote->getId());
    }

    /**
     * @param string $cartId
     *
     * @return CartInterface
     * @throws NoSuchEntityException
     */
    public function getQuote($cartId)
    {
        return $this->cartRepository->get($cartId);
    }

    /**
     * @param Quote $quote
     *
     * @return void
     * @throws LocalizedException
     */
    protected function validateQuote(Quote $quote)
    {
        if ($quote->getItemsCount() === 0) {
            throw new LocalizedException(
                __('Totals calculation is not applicable to empty cart.')
            );
        }
    }
}
