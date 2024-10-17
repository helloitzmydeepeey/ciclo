<?php
namespace Customer\NewAttribute\Controller\Comakerinfo;

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
                $comaker_personal_info_first_name = $postData['comaker_personal_info_first_name'];
                $comaker_personal_info_last_name = $postData['comaker_personal_info_last_name'];
                $comaker_personal_info_middle_name = $postData['comaker_personal_info_middle_name'];
                $comaker_personal_info_mobile_number = $postData['comaker_personal_info_mobile_number'];
                $comaker_personal_info_occupation = $postData['comaker_personal_info_occupation'];
                $comaker_personal_info_suffix_name = $postData['comaker_personal_info_suffix_name'];


                $customer->setData('comaker_personal_info_first_name', $comaker_personal_info_first_name);
                $customer->setData('comaker_personal_info_last_name', $comaker_personal_info_last_name);
                $customer->setData('comaker_personal_info_middle_name', $comaker_personal_info_middle_name);
                $customer->setData('comaker_personal_info_mobile_number', $comaker_personal_info_mobile_number);
                $customer->setData('comaker_personal_info_occupation', $comaker_personal_info_occupation);
                $customer->setData('comaker_personal_info_suffix_name', $comaker_personal_info_suffix_name);






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
                $resultRedirect->setPath('client/comakerinfo/index');
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
              );
            }
        }
    }
}
