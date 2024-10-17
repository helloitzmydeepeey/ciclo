<?php

namespace Customer\Checkmail\Controller\CheckEmail;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Store\Model\StoreManagerInterface;

class Validate extends Action
{
    protected $customerFactory;
    protected $resultJsonFactory;
    protected $storeManager;

    public function __construct(
        Context $context,
        CustomerFactory $customerFactory,
        ResultFactory $resultJsonFactory,
        StoreManagerInterface $storeManager
    ) {
        parent::__construct($context);
        $this->customerFactory = $customerFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->storeManager = $storeManager;
    }
    public function execute()
    {
        $resultJson = $this->resultJsonFactory->create(ResultFactory::TYPE_JSON);

        //$email = $this->getRequest()->getPost('email');

        $email = $this->getRequest()->getParam('email_check');

        // Check if the email already exists
        $existingCustomer = $this->customerFactory->create();
        $existingCustomer->setWebsiteId($this->storeManager->getStore()->getWebsiteId());
        $existingCustomer->loadByEmail($email);

        $response = ['error' => false, 'message' => '','success'=>false,'success_message'];

        if ($existingCustomer->getId()) {
            $response['error'] = true;
            $response['message'] = 'Email already exists!';
        }else{
            $response['success'] = true;
            $response['sucess_message'] = 'Email already exists!';
        }

        return $resultJson->setData($response);
    }


}
