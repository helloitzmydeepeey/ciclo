<?php

namespace Downpayment\Terms\Block;

use Magento\Framework\View\Element\Template;
use Downpayment\Terms\Model\Term;

class DownTerms extends Template
{
    protected $_myTerm;

    public function __construct(
        Template\Context $context,
        Term $myTerm,
        array $data = []
    ) {
        $this->_myTerm = $myTerm;
        parent::__construct($context, $data);
    }

    public function getTermById($id)
    {
        return $this->_myTerm->getTermById($id);
    }

    public function getAllTerm()
    {
        return $this->_myTerm->getAllTerm();
    }
}
