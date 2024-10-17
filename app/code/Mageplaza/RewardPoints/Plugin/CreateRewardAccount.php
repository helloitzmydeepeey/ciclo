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

namespace Mageplaza\RewardPoints\Plugin;

use Exception;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Model\AccountManagement;
use Mageplaza\RewardPoints\Model\Account;
use Psr\Log\LoggerInterface;

/**
 * Class CreateRewardAccount
 * @package Mageplaza\RewardPoints\Plugin
 */
class CreateRewardAccount
{
    /**
     * @var Account
     */
    protected $account;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * CreateRewardAccount constructor.
     *
     * @param Account $helperAccount
     * @param LoggerInterface $logger
     */
    public function __construct(
        Account $account,
        LoggerInterface $logger
    ) {
        $this->account = $account;
        $this->logger  = $logger;
    }

    /**
     * @param AccountManagement $subject
     * @param CustomerInterface $customer
     *
     * @return CustomerInterface
     */
    public function afterCreateAccountWithPasswordHash(
        AccountManagement $subject,
        CustomerInterface $customer
    ) {
        try {
            $this->account->create($customer->getStoreId(), ['customer_id' => $customer->getId()]);
        } catch (Exception $e) {
            /**
             * Allow to register customer and log reward exception
             */
            $this->logger->critical($e);
        }

        return $customer;
    }
}
