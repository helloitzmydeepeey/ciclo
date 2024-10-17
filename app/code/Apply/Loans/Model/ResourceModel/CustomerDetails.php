<?php
namespace Apply\Loans\Model\ResourceModel;

class CustomerDetails extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('customer_entity', 'entity_id');
    }
}
