<?php
namespace Apply\Branches\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Branch post mysql resource
 */
class Branch extends AbstractDb
{

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        // Table Name and Primary Key column
        $this->_init('apply_branch', 'branch_system_id');
    }

}
