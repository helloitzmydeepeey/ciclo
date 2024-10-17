<?php

namespace Customer\Progress\Block;

use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Customer\Model\Customer;



class Progress extends Template
{
    protected $customerSession;
    protected $customerMetadata;
    protected $addressRepository;

    public function __construct(
        Template\Context $context,
        Session $customerSession,
        CustomerMetadataInterface $customerMetadata,
        AddressRepositoryInterface $addressRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customerSession = $customerSession;
        $this->customerMetadata = $customerMetadata;
        $this->addressRepository = $addressRepository;
    }

    public function getProgressPercentage()
{
    $customer = $this->customerSession->getCustomer();
    $completedFields = 0;
    $totalFields = 0;


    $attributes = $this->customerMetadata->getAllAttributesMetadata();

    foreach ($attributes as $attribute) {
        $attributeCode = $attribute->getAttributeCode();
        if (in_array($attributeCode, ['prefix','suffix','website_id','store_id','created_in','group_id','password_hash','rp_token','rp_token_created_at','dob',
        'taxvat','confirmation','disable_auto_group_change','failures_num','first_failure','lock_expires',
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


        if ($attributeValue !== null && $attributeValue !== '') {
            $completedFields++;
        }

        $totalFields++;
    }

    return ($totalFields > 0) ? round(($completedFields/$totalFields) * 100) : 0;

}

    public function isProgressComplete()
    {
        $progressPercentage = $this->getProgressPercentage();

        if ($progressPercentage >= 100) {
            return true;
        } else {
            return false;
        }
    }
}
