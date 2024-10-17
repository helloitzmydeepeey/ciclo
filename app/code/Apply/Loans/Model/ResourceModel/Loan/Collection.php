<?php
namespace Apply\Loans\Model\ResourceModel\Loan;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName =  \Apply\Loans\Model\Loan::ENTITY_ID;

    public function _construct()
    {

        $this->_init('Apply\Loans\Model\Loan', 'Apply\Loans\Model\ResourceModel\Loan');
        $this->_map['fields']['entity_id'] = 'main_table.entity_id';
    }


    

}
