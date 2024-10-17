<?php
namespace Downpayment\Terms\Model\Source\Term;

class Status implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Downpayment\Terms\Model\Term
     */
    protected $_term;

    /**
     * Constructor
     *
     * @param \Downpayment\Terms\Model\Term $term
     */
    public function __construct(\Downpayment\Terms\Model\Term $term)
    {
        $this->_term = $term;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->_term->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
