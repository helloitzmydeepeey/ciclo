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

use Exception;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Mageplaza\RewardPoints\Model\Source\Status;
use Mageplaza\RewardPointsUltimate\Api\Data\TransactionInterface;
use Mageplaza\RewardPointsUltimate\Api\Data\TransactionSearchResultInterfaceFactory as SearchResultFactory;
use Mageplaza\RewardPointsUltimate\Api\TransactionRepositoryInterface;
use Mageplaza\RewardPointsUltimate\Helper\Data;
use Mageplaza\RewardPointsUltimate\Model\TransactionFactory;

/**
 * Class TransactionRepository
 * @package Mageplaza\RewardPointsUltimate\Model
 */
class TransactionRepository implements TransactionRepositoryInterface
{
    /**
     * @var TransactionFactory
     */
    protected $transactionFactory;

    /**
     * @var CustomerFactory
     */
    protected $customerFactory;

    /**
     * @var SearchResultFactory
     */
    protected $searchResultFactory = null;

    /**
     * @var Data
     */
    protected $helperData;

    /**
     * TransactionRepository constructor.
     *
     * @param Data $helperData
     * @param TransactionFactory $transactionFactory
     * @param CustomerFactory $customerFactory
     * @param SearchResultFactory $searchResultFactory
     */
    public function __construct(
        Data $helperData,
        TransactionFactory $transactionFactory,
        CustomerFactory $customerFactory,
        SearchResultFactory $searchResultFactory
    ) {
        $this->transactionFactory  = $transactionFactory;
        $this->customerFactory     = $customerFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->helperData          = $helperData;
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        $searchResult = $this->searchResultFactory->create();

        return $this->helperData->processGetList($searchCriteria, $searchResult);
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function getTransactionByCustomerId($customerId)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        return $this->searchResultFactory->create()->addFieldToFilter('customer_id', $customerId);
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function getListByCustomerId(SearchCriteriaInterface $searchCriteria, $customerId)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        $searchResult = $this->searchResultFactory->create()->addFieldToFilter('customer_id', $customerId);

        return $this->helperData->processGetList($searchCriteria, $searchResult);
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function getTransactionByAccountId($id)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        return $this->searchResultFactory->create()->addFieldToFilter('reward_id', $id);
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function getTransactionByOrderId($id)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        return $this->searchResultFactory->create()->addFieldToFilter('order_id', $id);
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function count()
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        return $this->searchResultFactory->create()->getTotalCount();
    }

    /**
     * {@inheritDoc}
     * @throws LocalizedException
     */
    public function expire($id)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        try {
            $transaction = $this->getTransactionById($id);
            if ((int) $transaction->getStatus() === Status::EXPIRED) {
                throw new InputException(__('Transaction has been expired.'));
            }

            $transaction->expire();
        } catch (Exception $e) {
            throw new CouldNotSaveException(
                (__('Something went wrong while processing the transaction. Details : %1', $e->getMessage()))
            );
        }

        if ((int) $transaction->getStatus() !== Status::EXPIRED) {
            throw new CouldNotSaveException((__('Could not expire the transaction ')));
        }

        return true;
    }

    /**
     * {@inheritDoc}
     * @throws CouldNotSaveException
     * @throws LocalizedException
     */
    public function cancel($id)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        try {
            $transaction = $this->getTransactionById($id);
            if ((int) $transaction->getStatus() === Status::CANCELED) {
                throw new InputException(__('Transaction has been canceled.'));
            }

            if ($this->isActionImport($transaction)) {
                throw new InputException(__('Can\'t cancel transaction import'));
            }
            $transaction->cancel();
        } catch (Exception $e) {
            throw new CouldNotSaveException(__('Could not cancel the transaction. Details: %1', $e->getMessage()));
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function save(TransactionInterface $data)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }

        if (!$data->getCustomerId()) {
            throw new InputException(__('Customer id required'));
        }

        if (!$data->getPointAmount()) {
            throw new InputException(__('Point amount required'));
        }

        if ((int) $data->getPointAmount() <= 0) {
            throw new InputException(__('Point amount must be greater than zero'));
        }

        $customer = $this->customerFactory->create()->load($data->getCustomerId());
        if (!$customer->getId()) {
            throw new NoSuchEntityException(__('Customer doesn\'t exist'));
        }

        try {
            $transaction = $this->transactionFactory->create();
            $transaction->createTransaction(
                Data::ACTION_ADMIN,
                $customer,
                new DataObject([
                    'point_amount' => $data->getPointAmount(),
                    'comment'      => $data->getComment(),
                    'expire_after' => $data->getExpireAfter()
                ])
            );
        } catch (Exception $e) {
            throw new LocalizedException(__($e->getMessage()));
        }

        return true;
    }

    /**
     * @param $id
     *
     * @return mixed
     * @throws InputException
     * @throws NoSuchEntityException
     */
    public function getTransactionById($id)
    {
        if (!$id) {
            throw new InputException(__('Transaction id required'));
        }

        $transaction = $this->transactionFactory->create()->load($id);
        if (!$transaction->getId()) {
            throw new NoSuchEntityException(__('Transaction id doesn\'t exist'));
        }

        return $transaction;
    }

    /**
     * @param $transaction
     *
     * @return bool
     */
    public function isActionImport($transaction)
    {
        return $transaction->getActionCode() === Data::ACTION_IMPORT_TRANSACTION;
    }
}
