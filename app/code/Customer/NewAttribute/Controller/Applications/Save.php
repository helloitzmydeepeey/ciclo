<?php
namespace Customer\NewAttribute\Controller\Applications;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Customer\Model\Session;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Message\ManagerInterface;

class Save extends Action
{
    protected $resultRedirectFactory;
    protected $customerSession;
    protected $customerFactory;
    protected $messageManager;

    public function __construct(
        Context $context,
        ResultFactory $resultFactory,
        Session $customerSession,
        CustomerFactory $customerFactory,
        ManagerInterface $messageManager
    ) {
        $this->resultRedirectFactory = $resultFactory;
        $this->customerSession = $customerSession;
        $this->customerFactory = $customerFactory;
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }

    public function execute()
    {
        $postData = $this->getRequest()->getPostValue();

        if (!empty($postData)) {
            try {
                $customerId = $this->customerSession->getCustomerId();
                $customer = $this->customerFactory->create()->load($customerId);

                // Process and save the form data
                $comaker_address_current_block_number = $postData['comaker_address_current_block_number'];
                $comaker_address_current_street = $postData['comaker_address_current_street'];
                $comaker_address_current_province = $postData['comaker_address_current_province'];
                $comaker_address_current_city = $postData['comaker_address_current_city'];
                $comaker_address_current_barangay = $postData['comaker_address_current_barangay'];
                $comaker_address_current_duration = $postData['comaker_address_current_duration'];
                $comaker_address_current_type = $postData['comaker_address_current_type'];




                $customer->setData('comaker_address_current_block_number', $comaker_address_current_block_number);
                $customer->setData('comaker_address_current_street', $comaker_address_current_street);
                $customer->setData('comaker_address_current_province', $comaker_address_current_province);
                $customer->setData('comaker_address_current_city', $comaker_address_current_city);
                $customer->setData('comaker_address_current_barangay', $comaker_address_current_barangay);
                $customer->setData('comaker_address_current_duration', $comaker_address_current_duration);
                $customer->setData('comaker_address_current_type', $comaker_address_current_type);

                $customer->save();

                // Set success message
                $this->messageManager->addSuccessMessage(__('Data saved successfully.'));
                // Redirect to a success page
                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath('customer/account');


                return $resultRedirect;
            } catch (\Exception $e) {
                $this->messageManager->addError(__('An error occurred while saving the data.'));
            }
        }
    }
}
