<?php

namespace Customer\Progress\Block;

use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;
use Customer\Progress\Model\ProgressFactory;

class ProgressBar extends Template
{
    protected $customerSession;
    protected $progressFactory;

    public function __construct(
        Template\Context $context,
        Session $customerSession,
        ProgressFactory $progressFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customerSession = $customerSession;
        $this->progressFactory = $progressFactory;
    }

    public function getProgressPercentage()
    {
        $customer = $this->customerSession->getCustomer();
        $progressModel = $this->progressFactory->create()->loadByCustomerId($customer->getId());

        // Calculate the progress percentage based on your logic using the data from the $progressModel
        // For example, you can count the number of completed fields out of the total number of fields

        $completedFields = $progressModel->getCompletedFieldsCount($customer); // Assuming you have a field called 'completed_fields' in the progress model
        $totalFields = $progressModel->getTotalFieldsCount(); // Assuming you have a field called 'total_fields' in the progress model

        return ($totalFields > 0) ? round(($completedFields / $totalFields) * 100) : 0;
    }

    public function getCustomerData()
    {
        $customer = $this->customerSession->getCustomer();
        return $customer->getData();
    }

    public function isProgressComplete()
    {
        $progressPercentage = $this->getProgressPercentage();

        // Check if the progress percentage is equal to or greater than 100%
        if ($progressPercentage >= 100) {
            return true;
        } else {
            return false;
        }
    }
}
