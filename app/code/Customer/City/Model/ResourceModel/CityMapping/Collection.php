<?php
namespace Customer\City\Model\ResourceModel\CityMapping;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = \Customer\City\Model\CityMapping::PROVINCE_MAPPING_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Customer\City\Model\CityMapping', 'Customer\City\Model\ResourceModel\CityMapping');
    }

    protected function _initSelect(){
        parent::_initSelect();

        $this->getSelect()->joinLeft(
            ['table2' => $this->getTable('customer_city')], //2nd table name by which you want to join mail table
            'main_table.`customer_province_id` = table2.`customer_parent_city_id`', // common column which available in both table
            [''] // '*' define that you want all column of 2nd table. if you want some particular column then you can define as ['column1','column2']
        )->group('main_table.customer_province_id');

        }

}
