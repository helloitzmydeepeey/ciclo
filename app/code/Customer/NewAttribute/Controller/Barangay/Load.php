<?php

namespace Customer\NewAttribute\Controller\Barangay;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Customer\NewAttribute\Model\BarangayDropdown;

class Load extends Action
{
    protected $barangayDropdown;

    public function __construct(
        Context $context,
        BarangayDropdown $barangayDropdown
    ) {
        $this->barangayDropdown = $barangayDropdown;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $cityId = $this->getRequest()->getParam('city_id');

        // Create an instance of the BarangayDropdown model
        $barangayDropdownModel = $this->barangayDropdown;

        // Fetch the barangays based on the city ID
        $barangayOptions = $barangayDropdownModel->getBarangayOptions($cityId);

        $result->setData($barangayOptions);

        return $result;


    }
}
