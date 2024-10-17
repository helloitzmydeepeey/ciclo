<?php

namespace Customer\NewAttribute\Model;

use Magento\Framework\Model\AbstractModel;
use Customer\NewAttribute\Model\ResourceModel\Applications as ApplicationsResourceModel;

class Applications extends AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ApplicationsResourceModel::class);
    }
}
