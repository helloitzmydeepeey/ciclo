<?php
namespace Customer\Province\Model\ResourceModel\Province;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = \Customer\Province\Model\Province::PROVINCE_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Customer\Province\Model\Province', 'Customer\Province\Model\ResourceModel\Province');
    }

}
