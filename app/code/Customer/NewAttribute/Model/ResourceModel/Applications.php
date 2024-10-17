<?php
namespace Customer\NewAttribute\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * City post mysql resource
 */
class Applications extends AbstractDb
{

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        // Table Name and Primary Key column
        $this->_init('apply_loan', 'entity_id');
    }

}
