<?php
namespace Apply\Loans\Model\ResourceModel;
class Loan extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init("apply_loan", "entity_id");
    }
}
