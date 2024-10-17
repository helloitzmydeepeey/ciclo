<?php
namespace Apply\Loans\Controller\Manage;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Filesystem\Io\File;
use Magento\Framework\Filesystem;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;


class Save extends Action
{
    protected $file;
    protected $filesystem;
    protected $curl;
    protected $loanFactory;
    protected $resultPageFactory;
    protected $customerSession;
    protected $customerMetadata;
    protected $addressRepository;
    protected $productFactory;
    protected $productRepository;
    protected $attributeRepository;
    protected $scopeConfig;
    protected $cookieManager;

    public function __construct(
        Filesystem $filesystem,
        File $file,
        Context $context,
        PageFactory $resultPageFactory,
        \Apply\Loans\Model\LoanFactory $loanFactory,
        Curl $curl,
        CustomerSession $customerSession,
        CustomerMetadataInterface $customerMetadata,
        AddressRepositoryInterface $addressRepository,
        ProductFactory $productFactory,
        ProductRepositoryInterface $productRepository,
        AttributeRepositoryInterface $attributeRepository,
        CookieManagerInterface $cookieManager,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->file = $file;
        $this->filesystem = $filesystem;
        $this->loanFactory = $loanFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->curl = $curl;
        $this->customerSession = $customerSession;
        $this->customerMetadata = $customerMetadata;
        $this->addressRepository = $addressRepository;
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
        $this->cookieManager = $cookieManager;
        $this->scopeConfig = $scopeConfig;
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
            if (in_array($attributeCode, ['prefix','suffix','website_id','store_id','created_in','group_id','password_hash','rp_token','rp_token_created_at','dob',
            'taxvat','confirmation','disable_auto_group_change','failures_num','first_failure','lock_expires','client_family_expenditure_food','client_family_expenditure_education_allowance',
            'client_family_expenditure_education_tuition_fee_public','client_family_expenditure_education_tuition_fee_private','client_family_expenditure_electricity','client_family_expenditure_water',
            'client_family_expenditure_electronic_load','client_family_expenditure_cable_television','client_family_expenditure_internet','client_family_expenditure_transportation',
            'client_family_expenditure_medical','client_family_expenditure_existing_obligation','client_family_expenditure_miscellaneous','client_family_expenditure_house_rent',
            'client_family_expenditure_utilities','client_family_expenditure_others','source_of_income_private_employee_occupation','source_of_income_private_employee_nature_of_work',
            'source_of_income_private_employee_position','source_of_income_private_employee_tenure','source_of_income_private_employee_net_income','source_of_income_private_employee_contact_person',
            'source_of_income_private_employee_contact_number','source_of_income_private_employee_company_name','source_of_income_private_employee_building_number','source_of_income_private_employee_street',
            'source_of_income_private_employee_barangay','source_of_income_private_employee_city','source_of_income_private_employee_province','source_of_income_private_employee_employment_status',
            'source_of_income_private_employee_other_occupation','source_of_income_private_employee_date_hired','client_personal_information_civil_status_first_name','client_personal_information_civil_status_middle_name',
            'client_personal_information_civil_status_last_name','client_personal_information_civil_status_name_suffix','client_personal_information_civil_status_birth_place',
            'client_personal_information_civil_status_birth_date','client_personal_information_civil_status_mobile_number','client_personal_information_civil_status_email',
            'source_of_income_private_employee_occupation_other','source_of_income_private_employee_subdivision','source_of_income_government_employee_occupation','source_of_income_government_employee_occupation_other',
            'source_of_income_government_employee_nature_of_work','source_of_income_government_employee_position','source_of_income_government_employee_tenure','source_of_income_government_employee_net_income',
            'source_of_income_government_employee_contact_person','source_of_income_government_employee_contact_number','source_of_income_government_employee_company_name','source_of_income_government_employee_building_number',
            'source_of_income_government_employee_subdivision','source_of_income_government_employee_street','source_of_income_government_employee_barangay','source_of_income_government_employee_city',
            'source_of_income_government_employee_province','source_of_income_government_employee_employment_status','source_of_income_pension','source_of_income_pension_amount','source_of_income_remittance_sender',
            'source_of_income_remittance_relationship','source_of_income_remittance_country','source_of_income_remittance_amount','source_of_income_self_employed_occupation','source_of_income_self_employed_type',
            'source_of_income_self_employed_years_of_operation','source_of_income_self_employed_net_income','source_of_income_self_employed_contact_person','source_of_income_self_employed_contact_number',
            'source_of_income_self_employed_name','source_of_income_self_employed_building_number','source_of_income_self_employed_subdivision','source_of_income_self_employed_street','source_of_income_self_employed_barangay',
            'source_of_income_self_employed_city','source_of_income_self_employed_province','source_of_income_business_occupation','source_of_income_business_type','source_of_income_business_years_of_operation',
            'source_of_income_business_net_income','source_of_income_business_contact_person','source_of_income_business_contact_number','source_of_income_business_name','source_of_income_business_building_number',
            'source_of_income_business_subdivision','source_of_income_business_street','source_of_income_business_barangay','source_of_income_business_city','source_of_income_business_province',
            'source_of_income_private_employee_second_nature_of_work','source_of_income_private_employee_second_position','source_of_income_private_employee_second_tenure','source_of_income_private_employee_second_net_income',
            'source_of_income_private_employee_second_net_income','source_of_income_private_employee_second_contact_person','source_of_income_private_employee_second_contact_number','source_of_income_private_employee_second_company_name',
            'source_of_income_private_employee_second_building_number','source_of_income_private_employee_second_street','source_of_income_private_employee_second_subdivision','source_of_income_private_employee_second_barangay',
            'source_of_income_private_employee_second_city','source_of_income_private_employee_second_province','source_of_income_private_employee_employment_second_status','source_of_income_private_employee_second_occupation_other',
            'source_of_income_private_employee_second_date_hired','source_of_income_government_employee_second_occupation','source_of_income_government_employee_second_nature_of_work','source_of_income_government_employee_second_position',
            'source_of_income_government_employee_second_tenure','source_of_income_government_employee_second_tenure','source_of_income_government_employee_second_net_income','source_of_income_government_employee_second_contact_number',
            'source_of_income_government_employee_second_company_name','source_of_income_government_employee_second_building_number','source_of_income_government_employee_second_subdivision','source_of_income_government_employee_second_street',
            'source_of_income_government_employee_second_barangay','source_of_income_government_employee_second_city','source_of_income_government_employee_second_province','source_of_income_government_employee_second_status',
            'source_of_income_government_employee_second_date_hired','source_of_income_government_employee_date_hired','source_of_income_second_pension','source_of_income_second_pension_amount','source_of_income_second_remittance_sender',
            'source_of_income_second_remittance_relationship','source_of_income_second_remittance_country','source_of_income_second_remittance_amount','source_of_income_second_self_employed_occupation',
            'source_of_income_second_self_employed_type','source_of_income_second_self_employed_years_of_operation','source_of_income_second_self_employed_net_income','source_of_income_second_self_employed_contact_person',
            'source_of_income_second_self_employed_name','source_of_income_second_self_employed_building_number','source_of_income_second_self_employed_subdivision','source_of_income_second_self_employed_street',
            'source_of_income_second_self_employed_barangay','source_of_income_second_self_employed_city','source_of_income_second_self_employed_province','source_of_income_second_business_occupation',
            'source_of_income_second_business_type','source_of_income_second_business_years_of_operation','source_of_income_second_business_subdivision','source_of_income_second_business_street',
            'source_of_income_second_business_barangay','source_of_income_second_business_city','source_of_income_second_business_province','source_of_income_second_category','source_of_income_private_employee_second_occupation',
            'source_of_income_private_employee_second_other_occupation','comaker_address_current_barangay','comaker_address_current_block_number','comaker_address_current_city','comaker_address_current_duration',
            'comaker_address_current_province','comaker_address_current_street','comaker_address_current_type','comaker_personal_info_first_name','comaker_personal_info_last_name','comaker_personal_info_middle_name',
            'comaker_personal_info_mobile_number','comaker_personal_info_occupation','comaker_personal_info_suffix_name','confirmation','repeat_borrower','source_of_income_second_business_building_number','source_of_income_second_business_name','source_of_income_second_business_contact_number',
            'source_of_income_second_business_contact_person','source_of_income_second_business_net_income','source_of_income_second_self_employed_contact_number','source_of_income_government_employee_second_contact_person',
            'source_of_income_government_employee_second_occupation_other'])) {
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

    public function getToken()
    {


        // Set up the cURL request
        $tokenEndpoint = $this->scopeConfig->getValue('loan_extensions/loan_api_token_settings/token_url', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $username = $this->scopeConfig->getValue('loan_extensions/loan_api_token_settings/token_api_username', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $password = $this->scopeConfig->getValue('loan_extensions/loan_api_token_settings/token_api_password', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $body = json_encode(array('username' => $username, 'password' => $password));
        $headers = array('Content-Type: application/json');
        $curl = curl_init($tokenEndpoint);
		$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/token.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('Generated response: ' .$tokenEndpoint);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        // Send the request and get the response
        $response = curl_exec($curl);
			
        // Check for errors
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            // Handle cURL error here
        }
        curl_close($curl);

        // Get the token from the response
        $responseData = json_decode($response, true);
	
        $token = $responseData['data']['token'];
    // Log the token and response code
    $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/token.log');
    $logger = new \Zend\Log\Logger();
    $logger->addWriter($writer);
    $logger->info('Generated response: ' . $token);
        return $token;
    }

    private function getSelectedRepeatBorrowerAcronym()
{
    $customerInfo =$this->customerSession->getCustomer();
    $selectedValue =  $customerInfo->getRepeatBorrower();

    // Example mapping of labels to acronyms
    $acronymMap = [
        '0' => false,
        '1' => true,
    ];

    // Convert label to acronym
    $selectedLabel = isset($acronymMap[$selectedValue]) ? $acronymMap[$selectedValue] : '';

    return $selectedLabel;
}



    private function getSelectedAvailmentPurpose(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getAvailmentPurpose();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('availment_purpose')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function getSelectedClientCharacterReferenceRelationship(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getClientCharacterReferenceRelationship();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('client_character_reference_relationship')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function getSelectedClientIdentificationType()
    {
        $customerInfo = $this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getClientIdentificationType();

        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('client_identification_type')->getSource()->getAllOptions();
        $selectedLabel = '';

        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }

        $selectedAcronym = $this->convertToAcronym($selectedLabel);

        return $selectedAcronym;
    }


    private function convertToAcronym($label)
    {
        // Example mapping of labels to acronyms
        $acronymMap = [
            'Police Clearance Certificate' => 'PCC',
            'Social Security System ID' =>  'SOCIAL.SEC.SYS',
            'Voter ID' => 'VOTER.ID',
            'PhilHealth ID' => 'PHIL.HEAL',
            'Company ID' => 'COMP.ID' ,
            'Postal ID' => 'POST.ID',
            'Student ID' => 'STUD.ID',
            'Barangay Certification/Clearance' => 'BARANGAY.CC' ,
            'Unified Multi-Purpose ID' => 'UMID' ,
            'Driver\'s License' => 'DRIVING.LICENSE',
            'Professional Regulation Commission (PRC) ID' => 'PRF.REG.COM.ID',
            'Department of Trade and Industry (DTI) Certificate of Registration' => 'DTI.CERT.REG',
            'Passport' => 'PASSPORT',
            'Tax Identification Number (TIN)' => 'TAX.ID.NO',
            'Government Service Insurance System (GSIS) ID' => 'GOVT.SERV.INS',

        ];

        // Convert label to acronym
        $selectedAcronym = isset($acronymMap[$label]) ? $acronymMap[$label] : '';

        return $selectedAcronym;
    }

    private function getSelectedClientPersonalInformationCivilStatus(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getClientPersonalInformationCivilStatus();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('client_personal_information_civil_status')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }


    private function getSelectedClientPersonalInformationEducationalAttainment(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getClientPersonalInformationEducationalAttainment();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('client_personal_information_educational_attainment')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }


    public function getSourceOfIncomeCategoryEmployeeOptions()
    {
        $attributeCode = 'source_of_income_category';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getSourceOfIncomeCategoryEmployeeValue()
    {
        $attributeCode = 'source_of_income_category';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    private function getSelectedSourceOfIncomeCategoryEmployeeValue(){
        $selectedValue = $this->getSourceOfIncomeCategoryEmployeeValue();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $this->getSourceOfIncomeCategoryEmployeeOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    public function getSourceOfIncomeTypeOptions()
    {
        $attributeCode = 'source_of_income_type';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getSourceOfIncomeTypeValue()
    {
        $attributeCode = 'source_of_income_type';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }
    private function getSelectedClientSourceOfIncomeType(){
        $selectedValue = $this->getSourceOfIncomeTypeValue();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $this->getSourceOfIncomeTypeOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function getSelectedSourceOfIncomePrivateEmployeeOccupation(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getSourceOfIncomePrivateEmployeeOccupation();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('source_of_income_private_employee_occupation')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function getSelectedSourceOfIncomePrivateEmployeeNatureOfWork(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getSourceOfIncomePrivateEmployeeNatureOfWork();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('source_of_income_private_employee_nature_of_work')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function getSelectedSourceOfIncomePrivateEmployeePosition(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getSourceOfIncomePrivateEmployeePosition();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('source_of_income_private_employee_position')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function getSelectedSourceOfIncomePrivateEmployeeTenure(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getSourceOfIncomePrivateEmployeeTenure();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('source_of_income_private_employee_tenure')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function getSelectedSourceOfIncomePrivateEmployeeEmploymentStatus(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getSourceOfIncomePrivateEmployeeEmploymentStatus();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('source_of_income_private_employee_employment_status')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function getSelectedComakerAddressCurrentDuration(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getComakerAddressCurrentDuration();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('comaker_address_current_duration')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function getSelectedComakerAddressCurrentType(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getComakerAddressCurrentType();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('comaker_address_current_type')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function convertImageToBase64($fileFullPath)
    {
        $fileData = file_get_contents($fileFullPath);
        $base64Image = base64_encode($fileData);

        return $base64Image;
    }

    public function getMotorcycleLoanAttachmentPhotoClient()
    {
        $attributeCode = 'mc_loan_attachment_image_photo_client';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getMotorcycleLoanAttachmentProofOfIncome()
    {
        $attributeCode = 'mc_loan_attachment_image_proof_of_income';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }
    public function getMotorcycleLoanAttachmentIdentification()
    {
        $attributeCode = 'mc_loan_attachment_image_identification';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    private function getGender(){
        $customerInfo = $this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getGender();

        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('gender')->getSource()->getAllOptions();
        $selectedLabel = '';

        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }

        return $selectedLabel;
    }



    private function getProductBrand()
    {
        $productId = $this->cookieManager->getCookie('product_id');

        // Load the product by ID using the repository
        $product = $this->productRepository->getById($productId);
        $selectedValue = $product->getData('brands');

        // Get the attribute options and find the label for the selected value
        $attribute = $product->getResource()->getAttribute('brands');
        $attributeOptions = $attribute->getSource()->getAllOptions();
        $selectedLabel = '';

        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }

        return $selectedLabel;
    }

    private function getProductColor()
    {
        $productId = $this->cookieManager->getCookie('product_id');

        // Load the product by ID using the repository
        $product = $this->productRepository->getById($productId);
        $selectedValue = $product->getData('color_swatch');

        // Retrieve the attribute options for the "color" attribute
        $attribute = $product->getResource()->getAttribute('color_swatch');
        $attributeOptions = $attribute->getSource()->getAllOptions();

        // Find the option with the selected value and return its label
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                return $option['label'];
            }
        }

        return null; // Return null if the label is not found
    }



    private function getAddressDurationLabel()
    {
        $customerAddress = $this->customerSession->getCustomer()->getDefaultShippingAddress();
        $customerAddressId = $customerAddress->getId();

        try {
            $address = $this->addressRepository->getById($customerAddressId);
            $selectedValue = $address->getCustomAttribute('address_duration')->getValue();

            // Get the attribute options and find the label for the selected value
            $attribute = $this->attributeRepository->get('customer_address', 'address_duration');
            $attributeOptions = $attribute->getSource()->getAllOptions();
            $selectedLabel = '';

            foreach ($attributeOptions as $option) {
                if ($option['value'] == $selectedValue) {
                    $selectedLabel = $option['label'];
                    break;
                }
            }

            return $selectedLabel;
        } catch (\Exception $e) {
            // Handle the exception if the address or attribute cannot be retrieved
            return '';
        }
    }

    private function getAddressTypeLabel()
    {
        $customerAddress = $this->customerSession->getCustomer()->getDefaultShippingAddress();
        $customerAddressId = $customerAddress->getId();

        try {
            $address = $this->addressRepository->getById($customerAddressId);
            $selectedValue = $address->getCustomAttribute('address_type')->getValue();

            // Get the attribute options and find the label for the selected value
            $attribute = $this->attributeRepository->get('customer_address', 'address_type');
            $attributeOptions = $attribute->getSource()->getAllOptions();
            $selectedLabel = '';

            foreach ($attributeOptions as $option) {
                if ($option['value'] == $selectedValue) {
                    $selectedLabel = $option['label'];
                    break;
                }
            }

            return $selectedLabel;
        } catch (\Exception $e) {
            // Handle the exception if the address or attribute cannot be retrieved
            return '';
        }
    }


    public function getMotorcycleLoanAttachmentFullName(){
        $attributeCode = 'mc_loan_attachment_full_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getMotorcycleLoanAttachmentIdentificationRemarks()
    {
        $attributeCode = 'mc_loan_attachment_image_identification_remarks';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: 'Valid ID';
    }
    public function getMotorcycleLoanAttachmentProofOfIncomeRemarks()
    {
        $attributeCode = 'mc_loan_attachment_image_proof_of_income_remarks';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: 'PAYSLIP';
    }

    public function getMotorcycleLoanAttachmentPhotoClientRemarks()
    {
        $attributeCode = 'mc_loan_attachment_image_photo_client_remarks';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: 'PHOTO';
    }



    // GOVERNMENT

    private function getSelectedSourceOfIncomeGovernmentEmployeeOccupation(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getSourceOfIncomeGovernmentEmployeeOccupation();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('source_of_income_government_employee_occupation')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function getSelectedSourceOfIncomeGovernmentEmployeeNatureOfWork(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getSourceOfIncomeGovernmentEmployeeNatureOfWork();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('source_of_income_government_employee_nature_of_work')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function getSelectedSourceOfIncomeGovernmentEmployeePosition(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getSourceOfIncomeGovernmentEmployeePosition();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('source_of_income_government_employee_position')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function getSelectedSourceOfIncomeGovernmentEmployeeTenure(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getSourceOfIncomeGovernmentEmployeeTenure();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('source_of_income_government_employee_tenure')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    private function getSelectedSourceOfIncomeGovernmentEmployeeEmploymentStatus(){
        $customerInfo =$this->customerSession->getCustomer();
        $selectedValue = $customerInfo->getSourceOfIncomeGovernmentEmployeeEmploymentStatus();
        // Get the attribute options and find the label for the selected value
        $attributeOptions = $customerInfo->getResource()->getAttribute('source_of_income_government_employee_employment_status')->getSource()->getAllOptions();
        $selectedLabel = '';
        foreach ($attributeOptions as $option) {
            if ($option['value'] == $selectedValue) {
                $selectedLabel = $option['label'];
                break;
            }
        }
        return $selectedLabel;
    }

    public function sendAPI(){


        $customerAddress = $this->customerSession->getCustomer()->getDefaultShippingAddress();
        $customerInfo =$this->customerSession->getCustomer();
        $customerAddressId = $customerAddress->getId();

        $productId = $this->cookieManager->getCookie('product_id');
        // Get the selected values from localStorage
        $downpayment = $this->cookieManager->getCookie('myDownpayment');
        $terms = $this->cookieManager->getCookie('myTerms');
        $branchCode=$this->cookieManager->getCookie('myBranchCode');
        $branchCompany=$this->cookieManager->getCookie('myBranchCompany');
        $branchKey=$this->cookieManager->getCookie('myBranchKey');
        $totalComputed =$this->cookieManager->getCookie('totalComputed');
        $totalRebate =$this->cookieManager->getCookie('totalRebate');

        // Load the product by ID using the resource model
        $product = $this->productRepository->getById($productId);

        // Access the product data
        $productName = $product->getName();
        $productPrice = $product->getFinalPrice();

        $items=[];

        $items['financingBranch']='NULL';
        $items['crsc']='NULL';
        $items['numberOfUnit'] = 1;
        $items['classification'] = 'BRAND NEW';
        $items['term'] = $terms;
        $items['monthlyAmort'] = $totalComputed;
        $items['rebate'] = $totalRebate;
        $items['loanType']='INDIVIDUAL';
        $items['purpose'] = $this->getSelectedAvailmentPurpose();
        $items['isRepeatBorrower']=$this->getSelectedRepeatBorrowerAcronym();
        $items['channel'] = 'MOBILE';



        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $addressRepository = $objectManager->create("Magento\Customer\Api\AddressRepositoryInterface");
        $address = $addressRepository->getById($customerAddressId);

        $street = $address->getStreet();
        $barangay = $address->getCustomAttribute('barangay_id')->getValue();
        $city = $address->getCustomAttribute('sub_city_id')->getValue();
        $province = $address->getCustomAttribute('sub_region_id')->getValue();
        $type = $this->getAddressTypeLabel();
        $duration = $this->getAddressDurationLabel();
    
        // Assign values to client_address_current
        $items['client_address_current'] = [
            'blkNumber' => $street,
            'street' => $street,
            'barangay' => $barangay,
            'city' => $city,
            'province' => $province,
            'type' => $type,
            'duration' => $duration,
        ];
    
        // Assign values to client_address_permanent
        $items['client_address_permanent'] = [
            'blkNumber' => $street,
            'street' => $street,
            'barangay' => $barangay,
            'city' => $city,
            'province' => $province,
            'type' => $type,
            'duration' => $duration,
        ];




        $items['Source_of_Lead'] = $customerInfo->getLeadSource();
        $items['applicationDate']=date('m/d/Y');
        $items['brand'] = $this->getProductBrand();


        $items['client_character_reference'] = [
            [
                'fullName' => $customerInfo->getClientCharacterReferenceName(),
                'relationship' => $this->getSelectedClientCharacterReferenceRelationship(),
                'contactNumber' => $customerInfo->getClientCharacterReferenceContact()
            ]
        ];
        $items['client_family_expenditure'] = [
            'food' => $customerInfo->getClientFamilyExpenditureFood(),
            'educAllowance' => $customerInfo->getClientFamilyExpenditureEducationAllowance(),
            'educTuitionFeePublic' => $customerInfo->getClientFamilyExpenditureEducationTuitionFeePublic(),
            'educTuitionFeePrivate' => $customerInfo->getClientFamilyExpenditureEducationTuitionFeePrivate(),
            'electricity' => $customerInfo->getClientFamilyExpenditureElectricity(),
            'water' => $customerInfo->getClientFamilyExpenditureWater(),
            'eLoad' => $customerInfo->getClientFamilyExpenditureElectronicLoad(),
            'cableTV' => $customerInfo->getClientFamilyExpenditureCableTelevision(),
            'internet' => $customerInfo->getClientFamilyExpenditureInternet(),
            'transportation' => $customerInfo->getClientFamilyExpenditureTransportation(),
            'medical' => $customerInfo->getClientFamilyExpenditureMedical(),
            'existingObligation' => $customerInfo->getClientFamilyExpenditureExistingObligation(),
            'miscellaneous' => $customerInfo->getClientFamilyExpenditureMiscellaneous(),
            'houseRent' => $customerInfo->getClientFamilyExpenditureHouseRent()
        ];
        //Removed
        //'utilities' => $customerInfo->getClientFamilyExpenditureUtilities(),
        //     'others' => $customerInfo->getClientFamilyExpenditureOthers(),

        $items['client_household_details'] = [];

        $items['client_identification'] = [
            [
                'type' => $this->getSelectedClientIdentificationType(),
                'idNumber' => $customerInfo->getClientIdentificationNumber()
            ]
        ];

        $birthDate = $customerInfo->getDob();
        $currentDate = date("Y-m-d");

        $birthDateObj = date_create($birthDate);
        $currentDateObj = date_create($currentDate);

        $ageInterval = date_diff($birthDateObj, $currentDateObj);
        $age = $ageInterval->format('%y');


        $items['client_personal_info']['firstName'] =$customerInfo->getData('firstname');
        $items['client_personal_info']['middleName'] = $customerInfo->getData('middlename');
        $items['client_personal_info']['lastName'] = $customerInfo->getData('lastname');
        $items['client_personal_info']['suffixName'] = $customerInfo->getData('suffix');
        $items['client_personal_info']['dob'] = $customerInfo->getDob();
        $items['client_personal_info']['birthPlace'] = $customerInfo->getClientPersonalInformationBirthPlace();
        $items['client_personal_info']['nationality'] = $customerInfo->getClientPersonalInformationNationality();
        $items['client_personal_info']['age'] = $age;
        $items['client_personal_info']['civilStatus'] =$this->getSelectedClientPersonalInformationCivilStatus();
        $items['client_personal_info']['gender'] = $this->getGender();
        $items['client_personal_info']['mobileNumber'] = $customerAddress->getTelephone();
        $items['client_personal_info']['phoneNumber'] = $customerAddress->getTelephone();
        $items['client_personal_info']['email'] = $customerInfo->getEmail();
        $items['client_personal_info']['educationalAttainment'] = $this->getSelectedClientPersonalInformationEducationalAttainment();
        $items['client_personal_info']['beneficiary'] = $customerInfo->getClientPersonalInformationBeneficiary();


        $items['client_indv_images']=[];

        if($this->getSelectedSourceOfIncomeCategoryEmployeeValue()== 'PRIVATE EMPLOYEE' ){
        $items['client_indv_source_of_income'] = [
             [


                'category' => $this->getSelectedSourceOfIncomeCategoryEmployeeValue(),
                'type' =>$this->getSelectedClientSourceOfIncomeType(),
                'client_indv_soi_private_employee' => [
                    'occupation' => $this->getSelectedSourceOfIncomePrivateEmployeeOccupation(),
                    'natureOfWork' => $this->getSelectedSourceOfIncomePrivateEmployeeNatureOfWork(),
                    'position' => $this->getSelectedSourceOfIncomePrivateEmployeePosition(),
                    'tenure' => $this->getSelectedSourceOfIncomePrivateEmployeeTenure(),
                    'netIncome' => $customerInfo->getSourceOfIncomePrivateEmployeeNetIncome(),
                    'contactPerson' => $customerInfo->getSourceOfIncomePrivateEmployeeContactPerson(),
                    'contactNumber' => $customerInfo->getSourceOfIncomePrivateEmployeeContactNumber(),
                    'companyName' => $customerInfo->getSourceOfIncomePrivateEmployeeCompanyName(),
                    'bldgNumber' => $customerInfo->getSourceOfIncomePrivateEmployeeBuildingNumber(),
                    'street' => $customerInfo->getSourceOfIncomePrivateEmployeeStreet(),
                    'subdivision' =>$customerInfo->getSourceOfIncomePrivateEmployeeSubdivision(),
                    'barangay' => $customerInfo->getSourceOfIncomePrivateEmployeeBarangay(),
                    'city' => $customerInfo->getSourceOfIncomePrivateEmployeeCity(),
                    'employmentStatus' => $customerInfo->getSourceOfIncomePrivateEmployeeEmploymentStatus(),
                    'province' => $customerInfo->getSourceOfIncomePrivateEmployeeProvince(),
                    //'dateHired' => $customerInfo->getSourceOfIncomePrivateEmployeeDateHired(),
                    //'other_Occupation' => $customerInfo->getSourceOfIncomePrivateEmployeeOtherOccupation(),

                ],
            ]
        ];
    }else if($this->getSelectedSourceOfIncomeCategoryEmployeeValue()== 'GOVERNMENT EMPLOYEE' ){
        $items['client_indv_source_of_income'] = [
                  [
        'category' => $this->getSelectedSourceOfIncomeCategoryEmployeeValue(),
        'type' =>$this->getSelectedClientSourceOfIncomeType(),
        'client_indv_soi_goverment_employee' => [
            'occupation' => $this->getSelectedSourceOfIncomeGovernmentEmployeeOccupation(),
            'natureOfWork' => $this->getSelectedSourceOfIncomeGovernmentEmployeeNatureOfWork(),
            'position' => $this->getSelectedSourceOfIncomeGovernmentEmployeePosition(),
            'tenure' => $this->getSelectedSourceOfIncomeGovernmentEmployeeTenure(),
            'netIncome' => $customerInfo->getSourceOfIncomeGovernmentEmployeeNetIncome(),
            'contactPerson' => $customerInfo->getSourceOfIncomeGovernmentEmployeeContactPerson(),
            'contactNumber' => $customerInfo->getSourceOfIncomeGovernmentEmployeeContactNumber(),
            'companyName' => $customerInfo->getSourceOfIncomeGovernmentEmployeeCompanyName(),
            'bldgNumber' => $customerInfo->getSourceOfIncomeGovernmentEmployeeBuildingNumber(),
            'street' => $customerInfo->getSourceOfIncomeGovernmentEmployeeStreet(),
            'subdivision' =>$customerInfo->getSourceOfIncomeGovernmentEmployeeSubdivision(),
            'barangay' => $customerInfo->getSourceOfIncomeGovernmentEmployeeBarangay(),
            'city' => $customerInfo->getSourceOfIncomeGovernmentEmployeeCity(),
            'province' => $customerInfo->getSourceOfIncomeGovernmentEmployeeProvince(),
            'employmentStatus' => $customerInfo->getSourceOfIncomeGovernmentEmployeeEmploymentStatus(),
            //'other_Occupation' => $customerInfo->getSourceOfIncomeGovernmentOccupationOther(),
            //'dateHired' => $customerInfo->getSourceOfIncomeGovernmentEmployeeDateHired(),


        ],

        ]
    ];
    }else if($this->getSelectedSourceOfIncomeCategoryEmployeeValue()== 'PENSION' ){
        $items['client_indv_source_of_income'] = [
            [
            'category' => $this->getSelectedSourceOfIncomeCategoryEmployeeValue(),
            'type' =>$this->getSelectedClientSourceOfIncomeType(),
        'client_indv_soi_pension' => [
            'source' => $customerInfo->getSourceOfIncomePension() ,
            'amount' => $customerInfo->getSourceOfIncomePensionAmount()

        ],

        ]
    ];
    }else if($this->getSelectedSourceOfIncomeCategoryEmployeeValue()== 'REMITTANCE' ){
        $items['client_indv_source_of_income'] = [
            [
            'category' => $this->getSelectedSourceOfIncomeCategoryEmployeeValue(),
            'type' =>$this->getSelectedClientSourceOfIncomeType(),
        'client_indv_soi_remittance' => [
            'sender' => $customerInfo->getSourceOfIncomeRemittanceSender(),
            'country' => $customerInfo->getSourceOfIncomeRemittanceCountry(),
            'relationship' =>$customerInfo->getSourceOfIncomeRemittanceRelationship(),
            'amount' => $customerInfo->getSourceOfIncomeRemittanceAmount()

        ],

        ]
    ];

    }else if($this->getSelectedSourceOfIncomeCategoryEmployeeValue()== 'SELF-EMPLOYED' ){
        $items['client_indv_source_of_income'] = [
            [
            'category' => $this->getSelectedSourceOfIncomeCategoryEmployeeValue(),
            'type' =>$this->getSelectedClientSourceOfIncomeType(),
        'client_indv_soi_selfemployed' => [
            'occupation' => $customerInfo->getSourceOfIncomeSelfEmployedOccupation(),
            'type' => $customerInfo->getSourceOfIncomeSelfEmployedType(),
            'nature' => $customerInfo->getSourceOfIncomeSelfEmployedType(),
            'yearsOfOperation' => $customerInfo->getSourceOfIncomeSelfEmployedYearsOfOperation(),
            'netIncome' => $customerInfo->getSourceOfIncomeSelfEmployedNetIncome(),
            'contactPerson' => $customerInfo->getSourceOfIncomeSelfEmployedContactPerson(),
            'contactNumber' => $customerInfo->getSourceOfIncomeSelfEmployedContactNumber(),
            'name' => $customerInfo->getSourceOfIncomeSelfEmployedName(),
            'bldgNumber' => $customerInfo->getSourceOfIncomeSelfEmployedBuildingNumber(),
            'street' => $customerInfo->getSourceOfIncomeSelfEmployedStreet(),
            'barangay' => $customerInfo->getSourceOfIncomeSelfEmployedBarangay(),
            'city' => $customerInfo->getSourceOfIncomeSelfEmployedCity(),
            'province' => $customerInfo->getSourceOfIncomeSelfEmployedProvince()


        ],

        ]
    ];

    }else if($this->getSelectedSourceOfIncomeCategoryEmployeeValue()== 'BUSINESS' ){
        $items['client_indv_source_of_income'] = [
            [
            'category' => $this->getSelectedSourceOfIncomeCategoryEmployeeValue(),
            'type' =>$this->getSelectedClientSourceOfIncomeType(),
        'client_indv_soi_business' => [
            'occupation' => $customerInfo->getSourceOfIncomeBusinessOccupation(),
            'type' => $customerInfo->getSourceOfIncomeBusinessType(),
            'nature' => $customerInfo->getSourceOfIncomeBusinessType(),
            'yearsOfOperation' => $customerInfo->getSourceOfIncomeBusinessYearsOfOperation(),
            'netIncome' => $customerInfo->getSourceOfIncomeBusinessNetIncome(),
            'contactPerson' => $customerInfo->getSourceOfIncomeBusinessContactPerson(),
            'contactNumber' => $customerInfo->getSourceOfIncomeBusinessContactNumber(),
            'name' => $customerInfo->getSourceOfIncomeBusinessName(),
            'bldgNumber' => $customerInfo->getSourceOfIncomeBusinessBuildingNumber(),
            'street' => $customerInfo->getSourceOfIncomeBusinessStreet(),
            'barangay' => $customerInfo->getSourceOfIncomeBusinessBarangay(),
            'city' => $customerInfo->getSourceOfIncomeBusinessCity(),
            'province' => $customerInfo->getSourceOfIncomeBusinessProvince()


        ],

        ]
    ];

    }

        $items['client_indv_spouse']=[];





        $items['color']=$this->getProductColor();


    /*    $items['comaker_address_current']['barangay']= $customerInfo->getComakerAddressCurrentBarangay() ? $customerInfo->getComakerAddressCurrentBarangay() : 'N/A';
        $items['comaker_address_current']['blkNumber']=$customerInfo->getComakerAddressCurrentBlockNumber() ? $customerInfo->getComakerAddressCurrentBlockNumber() : 'N/A';
        $items['comaker_address_current']['city']=$customerInfo->getComakerAddressCurrentCity() ? $customerInfo->getComakerAddressCurrentCity() : 'N/A';
        $items['comaker_address_current']['duration']=$this->getSelectedComakerAddressCurrentDuration() ? $this->getSelectedComakerAddressCurrentDuration() : 'N/A';
        $items['comaker_address_current']['province']=$customerInfo->getComakerAddressCurrentProvince() ? $customerInfo->getComakerAddressCurrentProvince() : 'N/A';
        $items['comaker_address_current']['street']=$customerInfo->getComakerAddressCurrentStreet() ? $customerInfo->getComakerAddressCurrentStreet() : 'N/A' ;
        $items['comaker_address_current']['type']=$this->getSelectedComakerAddressCurrentType() ? $this->getSelectedComakerAddressCurrentType() : 'N/A';


        $items['comaker_personal_info']['firstName']=$customerInfo->getComakerPersonalInfoFirstName() ? $customerInfo->getComakerPersonalInfoFirstName() : 'N/A';
        $items['comaker_personal_info']['lastName']=$customerInfo->getComakerPersonalInfoLastName() ? $customerInfo->getComakerPersonalInfoLastName() : 'N/A';
        $items['comaker_personal_info']['middleName']=$customerInfo->getComakerPersonalInfoMiddleName() ? $customerInfo->getComakerPersonalInfoMiddleName(): 'N/A';
        $items['comaker_personal_info']['mobileNumber']=$customerInfo->getComakerPersonalInfoMobileNumber() ? $customerInfo->getComakerPersonalInfoMobileNumber(): 'N/A';
        $items['comaker_personal_info']['occupation']=$customerInfo->getComakerPersonalInfoOccupation() ? $customerInfo->getComakerPersonalInfoOccupation(): 'N/A';
        $items['comaker_personal_info']['suffixName']=$customerInfo->getComakerPersonalInfoSuffixName() ? $customerInfo->getComakerPersonalInfoSuffixName(): 'N/A' ; */






        $items['dateTimeOnBoardStarted']=date("Y-m-d\TH:i:sP");
        $items['dealerBranchCode']=$branchCode;
        $items['dealerCompany']=$branchCompany;
        $items['dealerKey']=$branchKey;
        $items['downPayment']= $downpayment;



        $attachments = [];

        // Photo attachment
        $photoAttachment = [
            "docType" => "PHOTO - CLIENT" ,
            "imageBase64" => $this->getMotorcycleLoanAttachmentPhotoClient(),
            "remarks" => $this->getMotorcycleLoanAttachmentPhotoClientRemarks()
        ];
        $attachments[] = $photoAttachment;

        // ID attachment
        $idAttachment = [
            "docType" => "ID",
            "imageBase64" => $this->getMotorcycleLoanAttachmentIdentification(),
            "remarks" => $this->getMotorcycleLoanAttachmentIdentificationRemarks(),
            "nameOnId" => $this->getMotorcycleLoanAttachmentFullName(),
            "idNumber" => $customerInfo->getClientIdentificationNumber(),
            "typeOfId" => $this->getSelectedClientIdentificationType(),
            "issueDate" => date('m/d/Y',$customerInfo->getMotorcycleLoanAttachmentIssuedDate()),
            "expirationDate" => date('m/d/Y',$customerInfo->getMotorcycleLoanAttachmentExpirationDate())
        ];
        $attachments[] = $idAttachment;

        // Proof of Income attachment
        $proofOfIncomeAttachment = [
            "docType" => "PROOF OF INCOME",
            "imageBase64" => $this->getMotorcycleLoanAttachmentProofOfIncome(),
            "remarks" => $this->getMotorcycleLoanAttachmentProofOfIncomeRemarks()
        ];
        $attachments[] = $proofOfIncomeAttachment;

        $items['mc_loan_attachment'] = $attachments;


        $items['model'] = $productName;




        $items['sellingPrice'] = $productPrice;
        $items['status'] = 'NEW';


        $token = $this->getToken();

        $apiUrl = $this->scopeConfig->getValue('loan_extensions/loan_send_api_request/loan_request_url', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        // Set the request headers
        $tokens= $token;
        $headers2 = [
            'Content-Type: application/json',
            'Authorization: Bearer ' .$tokens
        ];

             // Set the request body (replace with your actual JSON body)
             $requestBody = json_encode($items,JSON_UNESCAPED_SLASHES);


        // Log the token and response code
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/api.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('Generated response: ' . $requestBody);



         $curl = curl_init($apiUrl);
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
         curl_setopt($curl, CURLOPT_POSTFIELDS, $requestBody);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers2);
         $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

         // Send the request and get the response
         $response = curl_exec($curl);

         // Check for errors
         if (curl_errno($curl)) {
             $error_msg = curl_error($curl);
             // Handle cURL error here
         }
         curl_close($curl);


         // Get the token from the response
         $responseData = json_decode($response, true);

         $RESPONSE = $responseData;
         // Get the HTTP response code

        // Log the token and response code
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/response.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('Generated response', [
            'token' => $response,
        ]);


    }

    public function SaveData(){
        $model = $this->loanFactory->create();
        $customerInfo =$this->customerSession->getCustomer();
        $customerId= $customerInfo->getId();

        $downpayment = $this->cookieManager->getCookie('myDownpayment');
        $terms = $this->cookieManager->getCookie('myTerms');
        $branchCode=$this->cookieManager->getCookie('myBranchCode');
        $branchCompany=$this->cookieManager->getCookie('myBranchCompany');
        $branchKey=$this->cookieManager->getCookie('myBranchKey');
        $branchTitle=$this->cookieManager->getCookie('myBranchTitle');
        $totalComputed =$this->cookieManager->getCookie('totalComputed');

        $productId = $this->cookieManager->getCookie('product_id');
        // Load the product by ID using the resource model
        // Access the product data
        $product = $this->productRepository->getById($productId);
        $productName = $product->getName();
        $productPrice = $product->getFinalPrice();


        $model->setData('customer_entity_id',$customerId);
        $model->setData('loan_dealer_branch_title',$branchTitle);
        $model->setData('loan_dealer_branch_code',$branchCode);
        $model->setData('loan_dealer_branch_company',$branchCompany);
        $model->setData('loan_dealer_branch_key',$branchKey);
        $model->setData('loan_downpayment',$downpayment);
        $model->setData('loan_term',$terms);
        $model->setData('loan_amortization',$totalComputed);
        $model->setData('motorcycle_brand',$this->getProductBrand());
        $model->setData('motorcycle_model',$productName);
        $model->setData('motorcycle_price',$productPrice);
        $model->setData('loan_status', 'Pending');

       $model->save();




    }






    public function execute()
    {


            $this->saveData();
            $this->sendAPI();
            $this->_redirect('loan/manage/success');



    }






}
