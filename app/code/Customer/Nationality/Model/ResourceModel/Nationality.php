<?php
namespace Customer\Nationality\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Nationality post mysql resource
 */
class Nationality extends AbstractDb
{

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        // Table Name and Primary Key column
        $this->_init('customer_nationality', 'customer_nationality_id');
    }

}
