<?php
namespace Customer\NewAttribute\Controller\Comakeradd;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Customer\Model\Session;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Magento\Framework\Stdlib\Cookie\CookieMetadataFactory;
use Magento\Framework\Stdlib\Cookie\CookieMetadataInterface;
class Save extends Action
{
    protected $resultRedirectFactory;
    protected $customerSession;
    protected $customerFactory;
    protected $messageManager;
    protected $cookieManager;
    protected $cookieMetadataFactory;
    public function __construct(
        Context $context,
        ResultFactory $resultFactory,
        Session $customerSession,
        CustomerFactory $customerFactory,
        ManagerInterface $messageManager,
        CookieManagerInterface $cookieManager,
        CookieMetadataFactory $cookieMetadataFactory
    ) {
        $this->resultRedirectFactory = $resultFactory;
        $this->customerSession = $customerSession;
        $this->customerFactory = $customerFactory;
        $this->messageManager = $messageManager;
        $this->cookieManager = $cookieManager;
        $this->cookieMetadataFactory = $cookieMetadataFactory;
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

                 // Set success message in cookie
                 $cookieMetadata = $this->cookieMetadataFactory
                 ->createPublicCookieMetadata()
                 ->setDuration(5) // Set the cookie duration as per your requirement
                 ->setPath('/')
                 ->setHttpOnly(false);

                 $this->cookieManager->setPublicCookie(
                 'success_message',
                 'Data saved successfully.',
                 $cookieMetadata
                 );

                // Redirect to a success page
                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath('client/comakeradd/index');
                return $resultRedirect;
            } catch (\Exception $e) {
                   // Set Error message in cookie
              $cookieMetadata = $this->cookieMetadataFactory
              ->createPublicCookieMetadata()
              ->setDuration(5) // Set the cookie duration as per your requirement
              ->setPath('/')
              ->setHttpOnly(false);

              $this->cookieManager->setPublicCookie(
                  'error_message',
                  'Error saving your data.',
                  $cookieMetadata
              );;
            }
        }
    }
}
