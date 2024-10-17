<?php
namespace Customer\Dropdown\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Request\Http;
use Customer\Dropdown\Model\BarangayDropdown as Barangay;

class BarangayDropdown extends Template
{
    protected $barangayModel;

    public function __construct(
        Template\Context $context,
        Barangay $barangayModel,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->barangayModel = $barangayModel;
    }

    public function getBarangayPersonalOptions($barangayCont)
    {
        return $this->barangayModel->getBarangayPersonalOptions($barangayCont);
    }


}
