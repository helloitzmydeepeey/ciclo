<?php
namespace Apply\Loans\Model\ResourceModel\CustomerDetails;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = \Apply\Loans\Model\CustomerDetails::CUSTOMER_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Apply\Loans\Model\CustomerDetails',
            'Apply\Loans\Model\ResourceModel\CustomerDetails'
        );
    }
}
