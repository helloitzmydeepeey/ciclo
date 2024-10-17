<?php
namespace Customer\Barangay\Model;

use \Magento\Framework\Model\AbstractModel;

class Barangay extends AbstractModel
{
    const BARANGAY_ID = 'customer_barangay_id'; // We define the id fieldname

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'customer'; // parent value is 'core_abstract'

    /**
     * Name of the event object
     *
     * @var string
     */
    protected $_eventObject = 'barangay'; // parent value is 'object'

    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = self::BARANGAY_ID; // parent value is 'id'

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Customer\Barangay\Model\ResourceModel\Barangay');
    }

}
