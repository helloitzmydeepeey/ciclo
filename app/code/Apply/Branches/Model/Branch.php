<?php
namespace Apply\Branches\Model;

use \Magento\Framework\Model\AbstractModel;

class Branch extends AbstractModel
{
    const BRANCH_SYSTEM_ID = 'branch_system_id'; // We define the id fieldname

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'apply_loans_branch'; // parent value is 'core_abstract'

    /**
     * Name of the event object
     *
     * @var string
     */
    protected $_eventObject = 'branch'; // parent value is 'object'

    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = self::BRANCH_SYSTEM_ID; // parent value is 'id'

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Apply\Branches\Model\ResourceModel\Branch');
    }


    public function getApprovedStatus() {
        return 1;
    }

    public function getPendingStatus() {
        return 0;
    }
    public function getAvailableStatuses() {
        return [$this->getPendingStatus() => __('Disabled'), $this->getApprovedStatus() => __('Enabled')];
    }

    public function getBranchesById($id)
    {
        $this->getResource()->load($this, $id);
        return $this->getBranches();
    }

    public function getAllBranches()
    {
        $collection = $this->getCollection();
    $collection->addFieldToSelect('*');
    $collection->addFieldToFilter('branch_status', ['eq' => 1]);
    return $collection;
    }
}
