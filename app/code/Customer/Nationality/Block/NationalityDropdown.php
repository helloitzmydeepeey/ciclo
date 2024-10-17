<?php
namespace Customer\Nationality\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Request\Http;
use Customer\Nationality\Model\Nationality as Nationality;

class NationalityDropdown extends Template
{
    protected $nationalityModel;

    public function __construct(
        Template\Context $context,
        Nationality $nationalityModel,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->nationalityModel = $nationalityModel;
    }

    public function getNationalityPersonalOptions()
    {
        return $this->nationalityModel->getNationalityPersonalOptions();
    }


}
