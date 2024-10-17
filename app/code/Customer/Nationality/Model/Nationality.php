<?php
namespace Customer\Nationality\Model;

use \Magento\Framework\Model\AbstractModel;
use Customer\Nationality\Model\ResourceModel\Nationality\CollectionFactory;
class Nationality extends AbstractModel
{
    protected $nationalityDropdownCollectionFactory;

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CollectionFactory $nationalityDropdownCollectionFactory,
        array $data = []
    ) {
        $this->nationalityDropdownCollectionFactory = $nationalityDropdownCollectionFactory;
        parent::__construct($context, $registry, null, null, $data);
    }


    const NATIONALITY_ID = 'customer_nationality_id'; // We define the id fieldname

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
    protected $_eventObject = 'nationality'; // parent value is 'object'

    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = self::NATIONALITY_ID; // parent value is 'id'

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Customer\Nationality\Model\ResourceModel\Nationality');
    }


    public function getNationalityPersonalOptions()
        {
            $options = [['label' => '', 'value' => '']];

            $nationalityDropdownCollection = $this->nationalityDropdownCollectionFactory->create()->load();

            foreach ($nationalityDropdownCollection as $nationalityDropdown) {
                $options[] = [
                    'label' => $nationalityDropdown->getCustomerNationalityTitle(),
                    'value' => $nationalityDropdown->getCustomerNationalityValue(),
                ];
            }

            return $options;
        }


}
