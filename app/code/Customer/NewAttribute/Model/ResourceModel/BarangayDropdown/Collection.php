<?php

namespace Customer\NewAttribute\Model\ResourceModel\BarangayDropdown;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Customer\NewAttribute\Model\BarangayDropdown;
use Customer\NewAttribute\Model\ResourceModel\BarangayDropdown as BarangayDropdownResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'customer_barangay_id';
    protected $_eventPrefix = 'customer_dropdown_barangay_collection';
    protected $_eventObject = 'barangay_collection';

    protected function _construct()
    {
        $this->_init(BarangayDropdown::class, BarangayDropdownResourceModel::class);
    }
}
