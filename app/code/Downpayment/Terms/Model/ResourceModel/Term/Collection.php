<?php
namespace Downpayment\Terms\Model\ResourceModel\Term;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = \Downpayment\Terms\Model\Term::TERM_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Downpayment\Terms\Model\Term', 'Downpayment\Terms\Model\ResourceModel\Term');
    }

}
