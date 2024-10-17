<?php
namespace Customer\City\Model\Source;

class CityMapping implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Customer\City\Model\CityMapping
     */
    protected $_cityMapping;

    /**
     * Constructor
     *
     * @param \Customer\City\Model\CityMapping $cityMapping
     */
    public function __construct(\Customer\City\Model\CityMapping $cityMapping)
    {
        $this->_cityMapping = $cityMapping;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $cityMappingCollection = $this->_cityMapping->getCollection()
        ->addFieldToSelect('customer_province_id')
        ->addFieldToSelect('customer_province_title');
        foreach ($cityMappingCollection  as $cityMapping) {
            $options[] = [
                'label' => $cityMapping->getCustomerProvinceTitle(),
                'value' => $cityMapping->getCustomerProvinceId(),
            ];
        }
        return $options;
    }


}
