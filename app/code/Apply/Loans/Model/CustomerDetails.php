<?php
namespace Apply\Loans\Model;

use \Magento\Framework\Model\AbstractModel;

class CustomerDetails extends AbstractModel
{
    const CUSTOMER_ID = 'customer_id'; // We define the id fieldname

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'apply_loans_loan'; // parent value is 'core_abstract'

    /**
     * Name of the event object
     *
     * @var string
     */
    protected $_eventObject = 'customers'; // parent value is 'object'

    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = self::CUSTOMER_ID; // parent value is 'id'

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Apply\Loans\Model\ResourceModel\CustomerDetails');
    }

}