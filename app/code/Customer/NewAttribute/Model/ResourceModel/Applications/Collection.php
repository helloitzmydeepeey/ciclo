<?php

namespace Customer\NewAttribute\Model\ResourceModel\Applications;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Customer\NewAttribute\Model\Applications;
use Customer\NewAttribute\Model\ResourceModel\Applications as ApplicationsResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'apply_loan_id';
    protected $_eventPrefix = 'customer_apply_loan_collection';
    protected $_eventObject = 'loan_collection';

    protected function _construct()
    {
        $this->_init(Applications::class, ApplicationsResourceModel::class);
    }
}
