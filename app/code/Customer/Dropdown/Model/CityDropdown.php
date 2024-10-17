<?php
namespace Customer\Dropdown\Model;

use Magento\Framework\Model\AbstractModel;
use Customer\Dropdown\Model\ResourceModel\CityDropdown\CollectionFactory;
class CityDropdown extends AbstractModel
{
    protected $cityDropdownCollectionFactory;


    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CollectionFactory $cityDropdownCollectionFactory,
        array $data = []
    ) {
        $this->cityDropdownCollectionFactory = $cityDropdownCollectionFactory;
        parent::__construct($context, $registry, null, null, $data);
    }

 
    public function getCityOptions($provinceId)
    {
        $options = [];

        $cityDropdownCollection = $this->cityDropdownCollectionFactory->create()
        ->addFieldToFilter('customer_parent_city_id', ['eq' =>$provinceId])
        ->load();
        foreach ($cityDropdownCollection as $cityDropdown) {
            $options[] = [
                'label' => $cityDropdown->getCustomerCityTitle(),
                'value' => $cityDropdown->getCustomerCityId(),
                'citymappingid'=> $cityDropdown->getCustomerParentCityId(),
            ];
        }
        return $options;
    }
    public function getCityPersonalOptions($cityCont)
    {
        // Initialize the options array with a default value
        $options = [['label' => '', 'value' => '']];
    
        // Create the city dropdown collection
        $cityDropdownCollection = $this->cityDropdownCollectionFactory->create()
            ->addFieldToFilter('customer_parent_city_id', ['eq' => $cityCont])
            ->load();
    
        // Check if the collection is valid and not empty
        if ($cityDropdownCollection && $cityDropdownCollection->getSize() > 0) {
            // Iterate through the collection and add options
            foreach ($cityDropdownCollection as $cityDropdown) {
                $options[] = [
                    'label' => $cityDropdown->getCustomerCityTitle(),
                    'value' => $cityDropdown->getCustomerCityId(),
                    'citymappingid'=> $cityDropdown->getCustomerParentCityId(),
                ];
            }
        }
        return $options;
    }
}
