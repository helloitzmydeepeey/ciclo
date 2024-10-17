<?php
namespace Apply\Loans\Model\Source\Loans;

class Status implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Apply\Loans\Model\Loan
     */
    protected $_loans;

    /**
     * Constructor
     *
     * @param \Apply\Loans\Model\Loan $loans
     */
    public function __construct(\Apply\Loans\Model\Loan $loans)
    {
        $this->_loans = $loans;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->_loans->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
