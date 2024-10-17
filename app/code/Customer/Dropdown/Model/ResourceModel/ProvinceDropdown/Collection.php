<?php

namespace Customer\Dropdown\Model\ResourceModel\ProvinceDropdown;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Customer\Dropdown\Model\ProvinceDropdown', 'Customer\Dropdown\Model\ResourceModel\ProvinceDropdown');
    }

    
  
}
