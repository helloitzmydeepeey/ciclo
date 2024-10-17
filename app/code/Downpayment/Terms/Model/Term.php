<?php
namespace Downpayment\Terms\Model;

use \Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Term extends AbstractModel
{
    const TERM_ID = 'entity_id'; // We define the id fieldname

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'terms'; // parent value is 'core_abstract'

    /**
     * Name of the event object
     *
     * @var string
     */
    protected $_eventObject = 'term'; // parent value is 'object'

    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = self::TERM_ID; // parent value is 'id'

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Downpayment\Terms\Model\ResourceModel\Term');
    }


    public function getEnableStatus() {
        return 1;
    }

    public function getDisableStatus() {
        return 0;
    }

    public function getAvailableStatuses() {
        return [$this->getDisableStatus() => __('Disabled'), $this->getEnableStatus() => __('Enabled')];
    }


    public function getTermById($id)
    {
        $this->getResource()->load($this, $id);
        return $this->getTerm();
    }

    public function getAllTerm()
    {
        $collection = $this->getCollection();
    $collection->addFieldToSelect('*');
    $collection->addFieldToFilter('term_status', ['eq' => 1]);
    return $collection;
    }
}
