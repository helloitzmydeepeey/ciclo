<?php
namespace Apply\Branches\Model\ResourceModel\Branch;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = \Apply\Branches\Model\Branch::BRANCH_SYSTEM_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Apply\Branches\Model\Branch', 'Apply\Branches\Model\ResourceModel\Branch');
    }

}
