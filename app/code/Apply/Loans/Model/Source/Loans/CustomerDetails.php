<?php
namespace Apply\Loans\Model\Source\Loans;

use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;

class CustomerDetails implements OptionSourceInterface
{
    /**
     * @var CollectionFactory
     */
    protected $customerCollectionFactory;

    /**
     * Constructor
     *
     * @param CollectionFactory $customerCollectionFactory
     */
    public function __construct(CollectionFactory $customerCollectionFactory)
    {
        $this->customerCollectionFactory = $customerCollectionFactory;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $customers = $this->customerCollectionFactory->create();
        foreach ($customers as $customer) {
            $customerId = $customer->getId();
            $customerName = $customer->getFirstname() . ' ' . $customer->getLastname();
            $options[] = [
                'label' => $customerName,
                'value' => $customerId,
            ];
        }
        return $options;
    }
}
