<?php
namespace Apply\Loans\Model;
use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
class Loan extends AbstractModel implements IdentityInterface

{

    const ENTITY_ID = 'entity_id'; // We define the id fieldname
    /**
     * Prefix of model events names
     *
     * @var string
    */
    protected $_eventPrefix = 'apply_loans_loan';

    /**
     * Name of the event object
     *
     * @var string
     */

     protected $_eventObject = 'loan'; // parent value is 'object'

     /**
      * Name of object id field
      *
      * @var string
      */

      protected $_idFieldName = self::ENTITY_ID; // parent value is 'id'

      /**
       * Initialize resource model
       *
       * @return void
       */

    //FRONTEND
    const NOROUTE_ENTITY_ID = 'no-route';
    const CACHE_TAG = 'apply_loans_loan';
    protected $_cacheTag = 'apply_loans_loan';


    public function _construct()
    {
        $this->_init(\Apply\Loans\Model\ResourceModel\Loan::class);
        $this->_init('\Apply\Loans\Model\ResourceModel\Loan');
    }

    public function load($id, $field = null)
    {
        if ($id === null) {
            return $this->noRoute();
        }
        return parent::load($id, $field);
    }

    public function noRoute()
    {
        return $this->load(self::NOROUTE_ENTITY_ID, $this->getIdFieldName());
    }
    public function getIdentities()
    {
        return [self::CACHE_TAG.'_'.$this->getId()];
    }
    public function getId()
    {
        return parent::getData(self::ENTITY_ID);
    }
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }

    public function getApprovedStatus() {
        return 'Approved';
    }

    public function getPendingStatus() {
        return 'Pending';
    }

    public function getRejectedStatus() {
        return 'Rejected';
    }

    public function getProcessingStatus() {
        return 'Processing';
    }

    public function getCanceledStatus() {
        return 'Canceled';
    }
    public function getAvailableStatuses() {
        return [$this->getPendingStatus() => __('Pending'), $this->getApprovedStatus() => __('Approved'),
        $this->getRejectedStatus() => __('Rejected'),$this->getProcessingStatus() => __('Processing'),$this->getCanceledStatus() => __('Canceled')];
    }
}
