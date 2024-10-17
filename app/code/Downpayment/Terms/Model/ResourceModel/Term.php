<?php
namespace Downpayment\Terms\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Term post mysql resource
 */
class Term extends AbstractDb
{

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        // Table Name and Primary Key column
        $this->_init('downpayment_terms', 'entity_id');
    }

}
