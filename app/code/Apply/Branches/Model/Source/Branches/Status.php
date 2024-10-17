<?php
namespace Apply\Branches\Model\Source\Branches;

class Status implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Apply\Branches\Model\Branch
     */
    protected $_branches;

    /**
     * Constructor
     *
     * @param \Apply\Branches\Model\Branch $branches
     */
    public function __construct(\Apply\Branches\Model\Branch $branches)
    {
        $this->_branches = $branches;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->_branches->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
