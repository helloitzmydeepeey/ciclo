<?php

namespace Customer\Dropdown\Model\ResourceModel\CityDropdown;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Customer\Dropdown\Model\CityDropdown;
use Customer\Dropdown\Model\ResourceModel\CityDropdown as CityDropdownResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'customer_city_id';
    protected $_eventPrefix = 'customer_dropdown_city_collection';
    protected $_eventObject = 'city_collection';

    protected function _construct()
    {
        $this->_init(CityDropdown::class, CityDropdownResourceModel::class);
    }
}
