<?php
namespace Apply\Loans\Controller\Manage;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Customer\Model\Session;
use Customer\Progress\Model\ProgressFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Customer\Api\AddressRepositoryInterface;

class Add extends Action
{
    protected $customerSession;
    protected $progressFactory;
    protected $resultPageFactory;
    protected $customerMetadata;
    protected $addressRepository;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Session $customerSession,
        ProgressFactory $progressFactory,
        CustomerMetadataInterface $customerMetadata,
        AddressRepositoryInterface $addressRepository
    ) {
        $this->customerSession = $customerSession;
        $this->progressFactory = $progressFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->customerMetadata = $customerMetadata;
        $this->addressRepository = $addressRepository;
        parent::__construct($context);
    }


    public function getProgressPercentage()
    {
        $customer = $this->customerSession->getCustomer();
        $completedFields = 0;
        $totalFields = 0;
        $attributecompletedFields = 0;
        $attributetotalFields = 0;
        // Get the customer attributes
        $attributes = $this->customerMetadata->getAllAttributesMetadata();
        // Loop through the attributes and check if they have a value
        foreach ($attributes as $attribute) {
            $attributeCode = $attribute->getAttributeCode();

            // Exclude specific attribute codes from progress calculation
            if (in_array($attributeCode, ['created_at','website_id','store_id','created_in','group_id','disable_auto_group_change','prefix',
            'firstname','middlename','lastname','suffix','email','password_hash','default_billing','default_shipping','updated_at','dob',
            'taxvat','failures_num','confirmation','gender','first_failure','rp_token','rp_token_created_at','lock_expires',
            'repeat_borrower'])) {
                continue;
            }

            $attributeValue = $customer->getData($attributeCode);

            // Increment the completedFields count if the attribute has a value
            if ($attributeValue !== null && $attributeValue !== '') {
                $completedFields++;
            }

            $totalFields++;
        }

        // Get the customer custom EAV attributes
    $customAttributes = $customer->getCustomAttributes();

         // Ensure $customAttributes is an array
        if (is_array($customAttributes)) {
        // Loop through the custom attributes and check if they have a value
        foreach ($customAttributes as $customAttribute) {
            $attributeValue = $customAttribute->getValue();

            // Increment the attributecompletedFields count if the attribute has a value
            if ($attributeValue !== null && $attributeValue !== '') {
                $attributecompletedFields++;
            }

            $attributetotalFields++;
        }
    }
    $newCompletedFields = $completedFields + $attributecompletedFields;
    $totalCompleteFields = $totalFields + $attributetotalFields;

    return ($totalFields > 0) ? round(($newCompletedFields / $totalCompleteFields) * 100) : 0;
    }

    public function isProgressComplete()
    {
        $progressPercentage = $this->getProgressPercentage();

        // Check if the progress percentage is equal to or greater than 100%
        return $progressPercentage >= 99;
    }

    public function execute()
    {
        if (!$this->isProgressComplete()) {
            $this->messageManager->addError(__('You cannot access this page until the progress is 100%.'));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setPath('customer/account/index'); // Redirect to the desired page or URL
            return $resultRedirect;
        } else {
            $resultPage = $this->resultPageFactory->create();
            $resultPage->getConfig()->getTitle()->set(__('APPLY FOR A LOAN'));

            return $resultPage;
        }
    }
}


