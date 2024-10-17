<?php
namespace Apply\Loans\Block;

use Magento\Customer\Model\Session;
use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Dropdown extends Template
{
    private $customerSession;
    private $attributeRepository;

    public function __construct(
        Context $context,
        Session $customerSession,
        AttributeRepositoryInterface $attributeRepository,
        array $data = []
    ) {
        $this->customerSession = $customerSession;
        $this->attributeRepository = $attributeRepository;
        parent::__construct($context, $data);
    }

    public function getClientCharacterReferenceRelationshipOptions()
    {
        $attributeCode = 'client_character_reference_relationship';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getClientCharacterReferenceRelationshipValue()
    {
        $attributeCode = 'client_character_reference_relationship';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientSecondCharacterReferenceRelationshipOptions()
    {
        $attributeCode = 'client_second_character_reference_relationship';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getClientSecondCharacterReferenceRelationshipValue()
    {
        $attributeCode = 'client_second_character_reference_relationship';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientThirdCharacterReferenceRelationshipOptions()
    {
        $attributeCode = 'client_third_character_reference_relationship';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getClientThirdCharacterReferenceRelationshipValue()
    {
        $attributeCode = 'client_third_character_reference_relationship';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }



    public function getClientCharacterReferenceName()
    {
        $attributeCode = 'client_character_reference_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }
    public function getClientSecondCharacterReferenceName()
    {
        $attributeCode = 'client_second_character_reference_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientThirdCharacterReferenceName()
    {
        $attributeCode = 'client_third_character_reference_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientCharacterReferenceContact(){
        $attributeCode = 'client_character_reference_contact';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getSecondClientCharacterReferenceContact(){
        $attributeCode = 'client_second_character_reference_contact';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getThirdClientCharacterReferenceContact(){
        $attributeCode = 'client_third_character_reference_contact';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientFamilyExpenditureFood(){
        $attributeCode = 'client_family_expenditure_food';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientFamilyExpenditureEducationAllowance(){
        $attributeCode = 'client_family_expenditure_education_allowance';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientFamilyExpenditureEducationTuitionFeePublic(){
        $attributeCode = 'client_family_expenditure_education_tuition_fee_public';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientFamilyExpenditureEducationTuitionFeePrivate(){
        $attributeCode = 'client_family_expenditure_education_tuition_fee_private';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientFamilyExpenditureElectricity(){
        $attributeCode = 'client_family_expenditure_electricity';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientFamilyExpenditureWater(){
        $attributeCode = 'client_family_expenditure_water';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientFamilyExpenditureElectronicLoad(){
        $attributeCode = 'client_family_expenditure_electronic_load';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientFamilyExpenditureCableTelevision(){
        $attributeCode = 'client_family_expenditure_cable_television';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientFamilyExpenditureInternet(){
        $attributeCode = 'client_family_expenditure_internet';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientFamilyExpenditureTransporation(){
        $attributeCode = 'client_family_expenditure_transportation';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientFamilyExpenditureMedical(){
        $attributeCode = 'client_family_expenditure_medical';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientFamilyExpenditureExistingObligation(){
        $attributeCode = 'client_family_expenditure_existing_obligation';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientFamilyExpenditureMiscellaneous(){
        $attributeCode = 'client_family_expenditure_miscellaneous';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientFamilyExpenditureHouseRent(){
        $attributeCode = 'client_family_expenditure_house_rent';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientFamilyExpenditureUtilities(){
        $attributeCode = 'client_family_expenditure_utilities';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientFamilyExpenditureOthers(){
        $attributeCode = 'client_family_expenditure_others';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientIdentificationTypeOptions()
    {
        $attributeCode = 'client_identification_type';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getClientIdentificationTypeValue()
    {
        $attributeCode = 'client_identification_type';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientIdentificationNumber(){
        $attributeCode = 'client_identification_number';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientPersonalInformationBeneficiary(){
        $attributeCode = 'client_personal_information_beneficiary';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientPersonalInformationBirthPlace(){
        $attributeCode = 'client_personal_information_birth_place';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientPersonalInformationNationality(){
        $attributeCode = 'client_personal_information_nationality';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }



    public function getClientPersonalInformationCivilStatusOptions()
    {
        $attributeCode = 'client_personal_information_civil_status';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getClientPersonalInformationCivilStatusValue()
    {
        $attributeCode = 'client_personal_information_civil_status';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getClientPersonalInformationEducationalAttainmentOptions()
    {
        $attributeCode = 'client_personal_information_educational_attainment';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getClientPersonalInformationEducationalAttainmentValue()
    {
        $attributeCode = 'client_personal_information_educational_attainment';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
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

    public function getSourceOfIncomePrivateEmployeeOccupationOptions()
    {
        $attributeCode = 'source_of_income_private_employee_occupation';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getSourceOfIncomePrivateEmployeeOccupationValue()
    {
        $attributeCode = 'source_of_income_private_employee_occupation';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getSourceOfIncomePrivateEmployeeNatureOfWorkOptions()
    {
        $attributeCode = 'source_of_income_private_employee_nature_of_work';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getSourceOfIncomePrivateEmployeeNatureOfWorkValue()
    {
        $attributeCode = 'source_of_income_private_employee_nature_of_work';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }



    public function getSourceOfIncomePrivateEmployeePositionOptions()
    {
        $attributeCode = 'source_of_income_private_employee_position';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getSourceOfIncomePrivateEmployeePositionValue()
    {
        $attributeCode = 'source_of_income_private_employee_position';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getSourceOfIncomePrivateEmployeeTenureOptions()
    {
        $attributeCode = 'source_of_income_private_employee_tenure';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getSourceOfIncomePrivateEmployeeTenureValue()
    {
        $attributeCode = 'source_of_income_private_employee_tenure';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getSourceOfIncomePrivateEmployeeNetIncome()
    {
        $attributeCode = 'source_of_income_private_employee_net_income';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getSourceOfIncomePrivateEmployeeContactPerson()
    {
        $attributeCode = 'source_of_income_private_employee_contact_person';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getSourceOfIncomePrivateEmployeeContactNumber()
    {
        $attributeCode = 'source_of_income_private_employee_contact_number';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }



    public function getSourceOfIncomePrivateEmployeeCompanyName()
    {
        $attributeCode = 'source_of_income_private_employee_company_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getSourceOfIncomePrivateEmployeeBuildingNumber()
    {
        $attributeCode = 'source_of_income_private_employee_building_number';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }





    public function getSourceOfIncomePrivateEmployeeStreet()
    {
        $attributeCode = 'source_of_income_private_employee_street';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getSourceOfIncomePrivateEmployeeProvince()
    {
        $attributeCode = 'source_of_income_private_employee_province';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getSourceOfIncomePrivateEmployeeCity()
    {
        $attributeCode = 'source_of_income_private_employee_city';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getSourceOfIncomePrivateEmployeeBarangay()
    {
        $attributeCode = 'source_of_income_private_employee_barangay';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }
    public function getSourceOfIncomePrivateEmployeeDateHired()
    {
        $attributeCode = 'source_of_income_private_employee_date_hired';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }



    public function getSourceOfIncomePrivateEmployeeEmploymentStatusOptions()
    {
        $attributeCode = 'source_of_income_private_employee_employment_status';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }


    public function getSourceOfIncomePrivateEmployeeEmploymentStatusValue()
    {
        $attributeCode = 'source_of_income_private_employee_employment_status';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getSourceOfIncomePrivateEmployeeOtherOccupation()
    {
        $attributeCode = 'source_of_income_private_employee_other_occupation';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getComakerAddressCurrentBarangay()
    {
        $attributeCode = 'comaker_address_current_barangay';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }



    public function getComakerPersonalInfoFirstName()
    {
        $attributeCode = 'comaker_personal_info_first_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }



    public function getComakerPersonalInfoLastName()
    {
        $attributeCode = 'comaker_personal_info_last_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getComakerPersonalInfoMiddleName()
    {
        $attributeCode = 'comaker_personal_info_middle_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getComakerPersonalInfoMobileNumber()
    {
        $attributeCode = 'comaker_personal_info_mobile_number';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getComakerPersonalInfoOccupation()
    {
        $attributeCode = 'comaker_personal_info_occupation';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getComakerPersonalInfoSuffixName()
    {
        $attributeCode = 'comaker_personal_info_suffix_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getComakerAddressCurrentBlockNumber()
    {
        $attributeCode = 'comaker_address_current_block_number';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getComakerAddressCurrentStreet()
    {
        $attributeCode = 'comaker_address_current_street';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getComakerAddressCurrentProvince()
    {
        $attributeCode = 'comaker_address_current_province';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getComakerAddressCurrentCity()
    {
        $attributeCode = 'comaker_address_current_city';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }



    public function getComakerAddressCurrentDurationOptions()
    {
        $attributeCode = 'comaker_address_current_duration';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }


    public function getComakerAddressCurrentDurationValue()
    {
        $attributeCode = 'comaker_address_current_duration';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getComakerAddressCurrentTypeOptions()
    {
        $attributeCode = 'comaker_address_current_type';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }


    public function getComakerAddressCurrentTypeValue()
    {
        $attributeCode = 'comaker_address_current_type';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getMotorcycleLoanAttachmentFullName()
    {
        $attributeCode = 'mc_loan_attachment_full_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getMotorcycleLoanAttachmentIssuedDate()
    {
        $attributeCode = 'mc_loan_attachment_issued_date';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getMotorcycleLoanAttachmentPhotoClient()
    {
        $attributeCode = 'mc_loan_attachment_image_photo_client';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getMotorcycleLoanAttachmentPhotoClientRemarks()
    {
        $attributeCode = 'mc_loan_attachment_image_photo_client_remarks';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getMotorcycleLoanAttachmentIdentification()
    {
        $attributeCode = 'mc_loan_attachment_image_identification';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getMotorcycleLoanAttachmentIdentificationRemarks()
    {
        $attributeCode = 'mc_loan_attachment_image_identification_remarks';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getMotorcycleLoanAttachmentExpirationDate()
    {
        $attributeCode = 'mc_loan_attachment_expiration_date';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getMotorcycleLoanAttachmentProofOfIncome()
    {
        $attributeCode = 'mc_loan_attachment_image_proof_of_income';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getMotorcycleLoanAttachmentProofOfIncomeRemarks()
    {
        $attributeCode = 'mc_loan_attachment_image_proof_of_income_remarks';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getMotorcycleLoanAttachmentDocumentTypeOptions()
    {
        $attributeCode = 'mc_loan_attachment_image_document_type';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }


    public function getMotorcycleLoanAttachmentDocumentTypeValue()
    {
        $attributeCode = 'mc_loan_attachment_image_document_type';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getLeadSourceOptions()
    {
        $attributeCode = 'lead_source';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }


    public function getLeadSourceValue()
    {
        $attributeCode = 'lead_source';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getAvailmentPurposeOptions()
    {
        $attributeCode = 'availment_purpose';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }


    public function getAvailmentPurposeValue()
    {
        $attributeCode = 'availment_purpose';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }
    public function getIdentificationIssuedDate()
    {
        $attributeCode = 'mc_loan_attachment_issued_date';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getIdentificationExpiredDate()
    {
        $attributeCode = 'mc_loan_attachment_expiration_date';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }













}
