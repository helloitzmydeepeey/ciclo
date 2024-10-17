<?php
namespace Customer\NewAttribute\Block;

use Magento\Customer\Model\Session;
use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Apply\Loans\Model\ResourceModel\Loan\CollectionFactory as LoanCollectionFactory;

class Notifications extends Template
{
    protected $searchCriteriaBuilder;
    protected $addressRepository;
    private $customerSession;
    private $attributeRepository;

    protected $loanCollectionFactor;

    public function __construct(
        Context $context,
        Session $customerSession,
        AttributeRepositoryInterface $attributeRepository,
        AddressRepositoryInterface $addressRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        LoanCollectionFactory $loanCollectionFactory,
        array $data = []
    ) {
        $this->customerSession = $customerSession;
        $this->attributeRepository = $attributeRepository;
        $this->addressRepository = $addressRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->loanCollectionFactory = $loanCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getClientInformationNotification()
    {
        $attributes = [
            'client_personal_information_beneficiary',
            'client_personal_information_birth_place',
            'client_personal_information_nationality',
            'client_personal_information_civil_status',
            'client_personal_information_educational_attainment',
            'source_of_income_category',
            'source_of_income_type',

        ];

        $specialAttributes =['source_of_income_private_employee_net_income'];



        $customer = $this->customerSession->getCustomer();
        $count = 0;
        $countSpecial= 0;
        foreach ($specialAttributes as $specialAttributeCode){
            $value = $customer->getData($specialAttributeCode);
            if($value ==="0" || $value===null){
                $countSpecial=0;
            }
        }

        foreach ($attributes as $attributeCode) {
            $value = $customer->getData($attributeCode);
            if (empty($value) || $value === null ) {
                $count++;
            }
        }

        return $count + $countSpecial;
    }



    public function getClientIdentificationNotification()
    {
        $identificationAttributes = [
            'client_identification_type',
            'client_identification_number',
        ];

        $customer = $this->customerSession->getCustomer();
        $count = 0;

        foreach ($identificationAttributes as $attributeCode) {
            $value = $customer->getData($attributeCode);
            if (empty($value) || $value === '0') {
                $count++;
            }
        }

        return $count;
    }

    public function getClientReferenceNotification()
    {
        $referenceAttributes = [
            'client_character_reference_name',
            'client_character_reference_relationship',
            'client_character_reference_contact',
            'client_second_character_reference_name',
            'client_second_character_reference_relationship',
            'client_second_character_reference_contact',
            'client_third_character_reference_name',
            'client_third_character_reference_relationship',
            'client_third_character_reference_contact',
        ];

        $customer = $this->customerSession->getCustomer();
        $count = 0;

        foreach ($referenceAttributes as $attributeCode) {
            $value = $customer->getData($attributeCode);
            if (empty($value) || $value === '0') {
                $count++;
            }
        }

        return $count;
    }


     public function getClientExpenditureNotification()
    {
        $identificationAttributes = [
            'client_family_expenditure_food',
            'client_family_expenditure_education_allowance',
            'client_family_expenditure_education_tuition_fee_public',
            'client_family_expenditure_education_tuition_fee_private',
            'client_family_expenditure_electricity',
            'client_family_expenditure_water',
            'client_family_expenditure_electronic_load',
            'client_family_expenditure_cable_television',
            'client_family_expenditure_internet',
            'client_family_expenditure_transportation',
            'client_family_expenditure_medical',
            'client_family_expenditure_existing_obligation',
            'client_family_expenditure_miscellaneous',
            'client_family_expenditure_house_rent',

        ];

        $customer = $this->customerSession->getCustomer();
        $count = 0;

        foreach ($identificationAttributes as $attributeCode) {
            $value = $customer->getData($attributeCode);
            if( empty($value) && $value === null ) {
                $count++;
            }
        }

        return $count;
    }

    public function getClientAttachmentNotification()
    {
        $attachmentsAttributes = [
            'mc_loan_attachment_full_name',
            'lead_source',
            'availment_purpose',
            'mc_loan_attachment_image_photo_client',
            'mc_loan_attachment_image_proof_of_income',
            'mc_loan_attachment_image_identification',
            'mc_loan_attachment_image_photo_client_remarks',
            'mc_loan_attachment_image_identification_remarks',
            'mc_loan_attachment_image_proof_of_income_remarks',
        ];

        $customer = $this->customerSession->getCustomer();
        $count = 0;

        foreach ($attachmentsAttributes as $attributeCode) {
            $value = $customer->getData($attributeCode);
            if (empty($value) || $value === '0') {
                $count++;
            }
        }

        return $count;
    }



    public function getCustomAddressAttributeNotification()
    {
        // Get the current customer from the session
        $customer = $this->customerSession->getCustomer();
    
        // Ensure that the customer exists
        if (!$customer || !$customer->getId()) {
            return;
        }
    
        // Get the default shipping address
        $customerAddress = $customer->getDefaultShippingAddress();
    
        // Ensure that the default shipping address exists
        if (!$customerAddress || !$customerAddress->getId()) {
            return;
        }
    
        // Get the ID of the default shipping address
        $customerAddressId = $customerAddress->getId();
    
        // Get the address repository
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $addressRepository = $objectManager->create("Magento\Customer\Api\AddressRepositoryInterface");
    
        // Retrieve the address by its ID
        $address = $addressRepository->getById($customerAddressId);
    
        // Initialize countInt
        $countInt = 0;
    
        // Check if address is null or empty and increment countInt if it is
        if (!$address || !$address->getId()) {
            $countInt++;
        }
    
        return $countInt;
    }
    



        public function getClientApplicationNotification()
    {
        $customer = $this->customerSession->getCustomer();
        $customerId = $customer->getId();

        $loanCollection = $this->loanCollectionFactory->create()
            ->addFieldToFilter('customer_entity_id', $customerId)
            ->addFieldToFilter('loan_status', 'Pending')
            ->setPageSize(1);

        $hasPendingLoan = $loanCollection->getSize() > 0;


        return $hasPendingLoan ? 'Pending' : '';
    }

}
