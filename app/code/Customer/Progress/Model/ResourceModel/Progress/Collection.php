<?php

namespace Customer\Progress\Model\ResourceModel\Progress;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Customer\Progress\Model\Progress::class,
            \Customer\Progress\Model\ResourceModel\Progress::class
        );
    }
}
