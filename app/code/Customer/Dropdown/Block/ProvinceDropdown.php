<?php
namespace Customer\Dropdown\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Request\Http;
use Customer\Dropdown\Model\ProvinceDropdown as Province;

class ProvinceDropdown extends Template
{
    protected $provinceModel;

    public function __construct(
        Template\Context $context,
        Province $provinceModel,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->provinceModel = $provinceModel;
    }

    public function getProvinceOptions()
    {
        return $this->provinceModel->getProvinceOptions();
    }


}
