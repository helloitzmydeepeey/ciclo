<?php
namespace Customer\Progress\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Progress extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('customer_entity', 'entity_id');
    }
}
