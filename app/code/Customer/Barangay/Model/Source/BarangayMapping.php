<?php
namespace Customer\Barangay\Model\Source;

class BarangayMapping implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Customer\Barangay\Model\BarangayMapping
     */
    protected $_barangayMapping;

    /**
     * Constructor
     *
     * @param \Customer\Barangay\Model\BarangayMapping $barangayMapping
     */
    public function __construct(\Customer\Barangay\Model\BarangayMapping $barangayMapping)
    {
        $this->_barangayMapping = $barangayMapping;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $barangayMappingCollection = $this->_barangayMapping->getCollection()
        ->addFieldToSelect('customer_city_id')
        ->addFieldToSelect('customer_city_title');
        foreach ($barangayMappingCollection  as $barangayMapping) {
            $options[] = [
                'label' => $barangayMapping->getCustomerCityTitle(),
                'value' => $barangayMapping->getCustomerCityId(),
            ];
        }
        return $options;
    }


}
