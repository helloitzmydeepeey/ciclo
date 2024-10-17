<?php
namespace Customer\NewAttribute\Controller\Loanattach;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Customer\Model\Session;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Message\ManagerInterface;
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
        ManagerInterface $messageManager,
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
                $mc_loan_attachment_full_name = $postData['mc_loan_attachment_full_name'];
                $lead_source = $postData['lead_source'];
                $availment_purpose = $postData['availment_purpose'];
                $mc_loan_attachment_image_photo_client_base64 = $postData['mc_loan_attachment_image_photo_client_base64'];
                $mc_loan_attachment_image_identification_base64 = $postData['mc_loan_attachment_image_identification_base64'];
                $mc_loan_attachment_image_proof_of_income_base64 = $postData['mc_loan_attachment_image_proof_of_income_base64'];
                $mc_loan_attachment_issued_date = $postData['mc_loan_attachment_issued_date'];
                $mc_loan_attachment_expiration_date = $postData['mc_loan_attachment_expiration_date'];
                $mc_loan_attachment_image_photo_client_remarks = $postData['mc_loan_attachment_image_photo_client_remarks'];
                $mc_loan_attachment_image_identification_remarks = $postData['mc_loan_attachment_image_identification_remarks'];
                $mc_loan_attachment_image_proof_of_income_remarks = $postData['mc_loan_attachment_image_proof_of_income_remarks'];



                $customer->setData('mc_loan_attachment_full_name', $mc_loan_attachment_full_name);
                $customer->setData('lead_source', $lead_source);
                $customer->setData('availment_purpose', $availment_purpose);
                $customer->setData('mc_loan_attachment_image_photo_client', $mc_loan_attachment_image_photo_client_base64);
                $customer->setData('mc_loan_attachment_image_identification', $mc_loan_attachment_image_identification_base64);
                $customer->setData('mc_loan_attachment_image_proof_of_income', $mc_loan_attachment_image_proof_of_income_base64);
                $customer->setData('mc_loan_attachment_issued_date', $mc_loan_attachment_issued_date);
                $customer->setData('mc_loan_attachment_expiration_date', $mc_loan_attachment_expiration_date);
                $customer->setData('mc_loan_attachment_image_photo_client_remarks', $mc_loan_attachment_image_photo_client_remarks);
                $customer->setData('mc_loan_attachment_image_identification_remarks', $mc_loan_attachment_image_identification_remarks);
                $customer->setData('mc_loan_attachment_image_proof_of_income_remarks', $mc_loan_attachment_image_proof_of_income_remarks);




                $dateNow=date('Ymdhis');
                $directory = "pub\media\mc_loan_attachment_image_photo_client";
                $directory2 = "pub\media\mc_loan_attachment_image_proof_of_income";
                $directory3 = "pub\media\mc_loan_attachment_image_identification";

                if (!is_dir($directory)) {
                    mkdir($directory, 0777, true);
                }
                if (!is_dir($directory2)) {
                    mkdir($directory2, 0777, true);
                }
                if (!is_dir($directory3)) {
                    mkdir($directory3, 0777, true);
                }

                if (isset($_FILES['mc_loan_attachment_image_photo_client'])) {
                    //PHOTO CLIENT
                    $file_name = $_FILES['mc_loan_attachment_image_photo_client']['name'];
                    $file_tmp = $_FILES['mc_loan_attachment_image_photo_client']['tmp_name'];
                    $destination_dir = 'pub/media/mc_loan_attachment_image_photo_client/' . $dateNow . '-' . $file_name;
                    move_uploaded_file($file_tmp, $destination_dir);
                }


                if (isset($_FILES['mc_loan_attachment_image_proof_of_income'])) {
                    //Proof Of Income
                    $file_name2 = $_FILES['mc_loan_attachment_image_proof_of_income']['name'];
                    $file_tmp2 = $_FILES['mc_loan_attachment_image_proof_of_income']['tmp_name'];
                    $destination_dir2 = 'pub/media/mc_loan_attachment_image_proof_of_income/' . $dateNow . '-' . $file_name2;
                    move_uploaded_file($file_tmp2, $destination_dir2);
                }



                if (isset($_FILES['mc_loan_attachment_image_identification'])) {
                    //Proof Of Income
                    $file_name3 = $_FILES['mc_loan_attachment_image_identification']['name'];
                    $file_tmp3 = $_FILES['mc_loan_attachment_image_identification']['tmp_name'];
                    $destination_dir3 = 'pub/media/mc_loan_attachment_image_identification/' . $dateNow . '-' . $file_name3;
                    move_uploaded_file($file_tmp3, $destination_dir3);
                }

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
                $resultRedirect->setPath('client/loanattach/index');
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
