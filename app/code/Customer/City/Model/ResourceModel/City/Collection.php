<?php
namespace Customer\City\Model\ResourceModel\City;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = \Customer\City\Model\City::CITY_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Customer\City\Model\City', 'Customer\City\Model\ResourceModel\City');
    }

}
