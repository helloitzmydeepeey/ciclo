<?php
namespace Customer\NewAttribute\Controller\Identification;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Customer\Model\Session;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Message\ManagerInterface as MessageManagerInterface;
use Magento\Framework\File\UploaderFactory;
use Magento\Framework\Filesystem\DirectoryList;
use Magento\Framework\Filesystem\Io\File;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Filesystem;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Magento\Framework\Stdlib\Cookie\CookieMetadataFactory;
use Magento\Framework\Stdlib\Cookie\CookieMetadataInterface;


class Save extends Action
{
    protected $resultRedirectFactory;
    protected $customerSession;
    protected $customerFactory;
    protected $messageManager;
    protected $fileUploaderFactory;
    protected $directoryList;
    protected $file;
    protected $filesystem;
    protected $cookieManager;
    protected $cookieMetadataFactory;

    public function __construct(
        Filesystem $filesystem,
        File $file,
        Context $context,
        ResultFactory $resultFactory,
        Session $customerSession,
        CustomerFactory $customerFactory,
        MessageManagerInterface $messageManager,
        UploaderFactory $fileUploaderFactory,
        DirectoryList $directoryList,
        CookieManagerInterface $cookieManager,
        CookieMetadataFactory $cookieMetadataFactory

    ) {
        $this->filesystem = $filesystem;
        $this->file = $file;
        $this->resultRedirectFactory = $resultFactory;
        $this->customerSession = $customerSession;
        $this->customerFactory = $customerFactory;
        $this->messageManager = $messageManager;
        $this->fileUploaderFactory = $fileUploaderFactory;
        $this->directoryList = $directoryList;
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
                $client_identification_type = $postData['client_identification_type'];
                $client_identification_number = $postData['client_identification_number'];

                $customer->setData('client_identification_type', $client_identification_type);
                $customer->setData('client_identification_number', $client_identification_number);

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
                $resultRedirect->setPath('client/identification/index');
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




