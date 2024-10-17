<?php
namespace Customer\Barangay\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Barangay post mysql resource
 */
class BarangayMapping extends AbstractDb
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
