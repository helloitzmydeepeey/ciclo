<?php
namespace Customer\Dropdown\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Request\Http;
use Customer\Dropdown\Model\CityDropdown as CityModel;

class CityDropdown extends Template
{
    protected $cityModel;

    public function __construct(
        Template\Context $context,
        CityModel $cityModel,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->cityModel = $cityModel;
    }

    public function getCityOptions($cityCont)
    {
        return $this->cityModel->getCityOptions($cityCont);
    }

    /*public function getIdentity(){
        return $this->cityModel->getIdentity();
    }*/

}