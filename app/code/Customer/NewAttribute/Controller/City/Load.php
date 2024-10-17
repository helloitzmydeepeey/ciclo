<?php

namespace Customer\NewAttribute\Controller\City;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Customer\NewAttribute\Model\CityDropdown;

class Load extends Action
{
    protected $cityDropdown;

    public function __construct(
        Context $context,
        CityDropdown $cityDropdown
    ) {
        $this->cityDropdown = $cityDropdown;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $provinceId = $this->getRequest()->getParam('province_id');

        // Create an instance of the CityDropdown model
        $cityDropdownModel = $this->cityDropdown;

        // Fetch the Citys based on the city ID
        $cityOptions = $cityDropdownModel->getCityOptions($provinceId);

        $result->setData($cityOptions);

        return $result;


    }
}
