<?php
namespace Customer\Nationality\Model\ResourceModel\Nationality;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = \Customer\Nationality\Model\Nationality::NATIONALITY_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Customer\Nationality\Model\Nationality', 'Customer\Nationality\Model\ResourceModel\Nationality');
    }

}
