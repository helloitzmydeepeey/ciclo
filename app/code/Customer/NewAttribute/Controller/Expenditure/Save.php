<?php
namespace Customer\NewAttribute\Controller\Expenditure;

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
                $client_family_expenditure_food = $postData['client_family_expenditure_food'];
                $client_family_expenditure_education_allowance = $postData['client_family_expenditure_education_allowance'];
                $client_family_expenditure_education_tuition_fee_public = $postData['client_family_expenditure_education_tuition_fee_public'];
                $client_family_expenditure_education_tuition_fee_private = $postData['client_family_expenditure_education_tuition_fee_private'];
                $client_family_expenditure_electricity = $postData['client_family_expenditure_electricity'];
                $client_family_expenditure_water= $postData['client_family_expenditure_water'];
                $client_family_expenditure_electronic_load= $postData['client_family_expenditure_electronic_load'];
                $client_family_expenditure_cable_television= $postData['client_family_expenditure_cable_television'];
                $client_family_expenditure_internet= $postData['client_family_expenditure_internet'];
                $client_family_expenditure_transportation= $postData['client_family_expenditure_transportation'];
                $client_family_expenditure_medical= $postData['client_family_expenditure_medical'];
                $client_family_expenditure_existing_obligation= $postData['client_family_expenditure_existing_obligation'];
                $client_family_expenditure_miscellaneous= $postData['client_family_expenditure_miscellaneous'];
                $client_family_expenditure_house_rent= $postData['client_family_expenditure_house_rent'];
                /*$client_family_expenditure_utilities= $postData['client_family_expenditure_utilities'];
                $client_family_expenditure_others= $postData['client_family_expenditure_others']; */








                $customer->setData('client_family_expenditure_food', $client_family_expenditure_food);
                $customer->setData('client_family_expenditure_education_allowance', $client_family_expenditure_education_allowance);
                $customer->setData('client_family_expenditure_education_tuition_fee_public', $client_family_expenditure_education_tuition_fee_public);
                $customer->setData('client_family_expenditure_education_tuition_fee_private', $client_family_expenditure_education_tuition_fee_private);
                $customer->setData('client_family_expenditure_electricity', $client_family_expenditure_electricity);
                $customer->setData('client_family_expenditure_water', $client_family_expenditure_water);
                $customer->setData('client_family_expenditure_electronic_load', $client_family_expenditure_electronic_load);
                $customer->setData('client_family_expenditure_cable_television', $client_family_expenditure_cable_television);
                $customer->setData('client_family_expenditure_internet', $client_family_expenditure_internet);
                $customer->setData('client_family_expenditure_transportation', $client_family_expenditure_transportation);
                $customer->setData('client_family_expenditure_medical', $client_family_expenditure_medical);
                $customer->setData('client_family_expenditure_existing_obligation', $client_family_expenditure_existing_obligation);
                $customer->setData('client_family_expenditure_miscellaneous', $client_family_expenditure_miscellaneous);
                $customer->setData('client_family_expenditure_house_rent', $client_family_expenditure_house_rent);
               /* $customer->setData('client_family_expenditure_utilities', $client_family_expenditure_utilities);
                $customer->setData('client_family_expenditure_others', $client_family_expenditure_others); */







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

                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath('client/expenditure/index');
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
