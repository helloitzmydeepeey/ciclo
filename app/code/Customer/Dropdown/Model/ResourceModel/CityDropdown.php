<?php
namespace Customer\Dropdown\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * City post mysql resource
 */
class CityDropdown extends AbstractDb
{

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        // Table Name and Primary Key column
        $this->_init('customer_city', 'customer_city_id');
    }

}
