<?php
namespace Customer\Barangay\Model\ResourceModel\Barangay;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = \Customer\Barangay\Model\Barangay::BARANGAY_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Customer\Barangay\Model\Barangay', 'Customer\Barangay\Model\ResourceModel\Barangay');
    }

}
