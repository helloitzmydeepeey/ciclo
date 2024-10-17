<?php
namespace Customer\Dropdown\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Customer\Model\Session;

class ProvinceDropdown extends AbstractModel
{
    protected $provinceDropdownCollection;
    protected $customerSession;

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Customer\Dropdown\Model\ResourceModel\ProvinceDropdown\Collection $provinceDropdownCollection,
        Session $customerSession,
        array $data = []
    ) {
        $this->provinceDropdownCollection = $provinceDropdownCollection;
        $this->customerSession = $customerSession;
        parent::__construct($context, $registry, null, null, $data);
    }

    public function getProvinceOptions()
    {
        $options[] = ['label' => '', 'value' => ''];
        foreach ($this->provinceDropdownCollection as $provinceDropdown) {
            $options[] = [
                'label' => $provinceDropdown->getCustomerProvinceTitle(),
                'value' => $provinceDropdown->getCustomerProvinceId(),
            ];
        }
        return $options;
    }

    
}
