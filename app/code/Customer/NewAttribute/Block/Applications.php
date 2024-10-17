<?php

namespace Customer\NewAttribute\Block;

use Magento\Framework\View\Element\Template;
use Customer\NewAttribute\Model\ApplicationsFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\UrlInterface;

class Applications extends Template
{
    protected $applicationsFactory;
    protected $customerSession;
    protected $urlBuilder;

    public function __construct(
        Template\Context $context,
        ApplicationsFactory $applicationsFactory,
        Session $customerSession,
        UrlInterface $urlBuilder,
        array $data = []
    ) {
        $this->applicationsFactory = $applicationsFactory;
        $this->customerSession = $customerSession;
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $data);
    }

    public function getApplications()
    {
        $customerId = $this->customerSession->getCustomerId();
        $applicationsModel = $this->applicationsFactory->create();
        $applicationsCollection = $applicationsModel->getCollection();
        $applicationsCollection->addFieldToFilter('customer_entity_id', $customerId);
        return $applicationsCollection;
    }

    public function getCancelUrl($applicationId)
        {
            return $this->getUrl('client/applications/cancel', ['id' => $applicationId]);
        }
}
