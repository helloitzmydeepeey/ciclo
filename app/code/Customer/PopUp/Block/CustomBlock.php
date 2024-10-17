<?php
namespace Customer\PopUp\Block;

use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;

class CustomBlock extends Template
{
    protected $customerSession;

    public function __construct(
        Session $customerSession,
        Template\Context $context,
        array $data = []
    ) {
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    public function isLoggedIn()
    {
        return $this->customerSession->isLoggedIn();
    }

    public function getCustomerName()
    {
        return $this->customerSession->getCustomer()->getName();
    }
}
