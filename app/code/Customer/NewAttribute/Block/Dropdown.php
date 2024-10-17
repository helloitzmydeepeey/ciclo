<?php
namespace Customer\NewAttribute\Block;

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
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }


    public function getClientFamilyExpenditureEducationAllowance(){
        $attributeCode = 'client_family_expenditure_education_allowance';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }


    public function getClientFamilyExpenditureEducationTuitionFeePublic(){
        $attributeCode = 'client_family_expenditure_education_tuition_fee_public';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }

    public function getClientFamilyExpenditureEducationTuitionFeePrivate(){
        $attributeCode = 'client_family_expenditure_education_tuition_fee_private';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }


    public function getClientFamilyExpenditureElectricity(){
        $attributeCode = 'client_family_expenditure_electricity';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }


    public function getClientFamilyExpenditureWater(){
        $attributeCode = 'client_family_expenditure_water';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }

    public function getClientFamilyExpenditureElectronicLoad(){
        $attributeCode = 'client_family_expenditure_electronic_load';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }


    public function getClientFamilyExpenditureCableTelevision(){
        $attributeCode = 'client_family_expenditure_cable_television';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }


    public function getClientFamilyExpenditureInternet(){
        $attributeCode = 'client_family_expenditure_internet';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }


    public function getClientFamilyExpenditureTransporation(){
        $attributeCode = 'client_family_expenditure_transportation';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }


    public function getClientFamilyExpenditureMedical(){
        $attributeCode = 'client_family_expenditure_medical';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }

    public function getClientFamilyExpenditureExistingObligation(){
        $attributeCode = 'client_family_expenditure_existing_obligation';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }

    public function getClientFamilyExpenditureMiscellaneous(){
        $attributeCode = 'client_family_expenditure_miscellaneous';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }

    public function getClientFamilyExpenditureHouseRent(){
        $attributeCode = 'client_family_expenditure_house_rent';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }

    public function getClientFamilyExpenditureUtilities(){
        $attributeCode = 'client_family_expenditure_utilities';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
    }

    public function getClientFamilyExpenditureOthers(){
        $attributeCode = 'client_family_expenditure_others';
        $customer = $this->customerSession->getCustomer();
        if($customer->getData($attributeCode)==="0"){
            return 0;
        }elseif($customer->getData($attributeCode )==NULL){
            return "";
        }else{
            return $customer->getData($attributeCode) ?: '';
        }
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
		        $firstname= $customer->getFirstname();
				$middlename= $customer->getMiddlename();
				$lastname= $customer->getLastname();
        return $customer->getData($attributeCode) ?: $firstname. ' ' .$middlename .' '.$lastname;

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
        $defaultValue = '4913';
        $customer = $this->customerSession->getCustomer();
        $attributeValue = $customer->getData($attributeCode);


        if (empty($attributeValue)) {
        $customer->setData($attributeCode, $defaultValue);
        $attributeValue = $defaultValue;
        }

        return 4913;
        //return $customer->getData($attributeCode) ?: '';
    }

    //Private
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

    public function getSourceOfIncomePrivateEmployeeOccupationOther()
    {
        $attributeCode = 'source_of_income_private_employee_occupation_other';
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
        if($customer->getData($attributeCode)==0){
            return 0;
        }else{
            return $customer->getData($attributeCode) ?: '';
        }




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

    public function getSourceOfIncomePrivateEmployeeSubdivision()
    {
        $attributeCode = 'source_of_income_private_employee_subdivision';
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



    //SECOND OCCUPATION
   public function getSourceOfIncomeSecondCategoryEmployeeOptions()
   {
       $attributeCode = 'source_of_income_second_category';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function getSourceOfIncomeSecondCategoryEmployeeValue()
   {
       $attributeCode = 'source_of_income_second_category';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }



   public function getSourceOfIncomePrivateEmployeeSecondOccupationOptions()
    {
        $attributeCode = 'source_of_income_private_employee_second_occupation';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getSourceOfIncomePrivateEmployeeSecondOccupationValue()
    {
        $attributeCode = 'source_of_income_private_employee_second_occupation';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getSourceOfIncomePrivateEmployeSecondOccupationOther()
    {
        $attributeCode = 'source_of_income_private_employee_second_occupation_other';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getSourceOfIncomePrivateEmployeeSecondNatureOfWorkOptions()
    {
        $attributeCode = 'source_of_income_private_employee_second_nature_of_work';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getSourceOfIncomePrivateEmployeeSecondNatureOfWorkValue()
    {
        $attributeCode = 'source_of_income_private_employee_second_nature_of_work';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getSourceOfIncomePrivateEmployeeSecondPositionOptions()
    {
        $attributeCode = 'source_of_income_private_employee_second_position';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getSourceOfIncomePrivateEmployeeSecondPositionValue()
    {
        $attributeCode = 'source_of_income_private_employee_second_position';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function clientSourceOfIncomePrivateEmployeeSecondNetIncome()
    {
        $attributeCode = 'source_of_income_private_employee_second_net_income';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function clientSourceOfIncomePrivateEmployeeSecondContactPerson()
    {
        $attributeCode = 'source_of_income_private_employee_second_contact_person';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function clientSourceOfIncomePrivateEmployeeSecondContactNumber()
    {
        $attributeCode = 'source_of_income_private_employee_second_contact_number';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function clientSourceOfIncomePrivateEmployeeSecondCompanyName()
    {
        $attributeCode = 'source_of_income_private_employee_second_company_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function clientSourceOfIncomePrivateEmployeeSecondBuildingNumber()
    {
        $attributeCode = 'source_of_income_private_employee_second_building_number';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getSourceOfIncomePrivateEmployeeSecondSubdivision()
    {
        $attributeCode = 'source_of_income_private_employee_second_subdivision';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function clientSourceOfIncomePrivateEmployeeSecondStreet()
    {
        $attributeCode = 'source_of_income_private_employee_second_street';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function clientSourceOfIncomePrivateEmployeeSecondProvince()
    {
        $attributeCode = 'source_of_income_private_employee_second_province';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function clientSourceOfIncomePrivateEmployeeSecondCity()
    {
        $attributeCode = 'source_of_income_private_employee_second_city';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function clientSourceOfIncomePrivateEmployeeSecondBarangay()
    {
        $attributeCode = 'source_of_income_private_employee_second_barangay';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function clientSourceOfIncomePrivateEmployeeSecondDateHired()
    {
        $attributeCode = 'source_of_income_private_employee_second_date_hired';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }



    public function getSourceOfIncomePrivateEmployeeSecondTenureOptions()
    {
        $attributeCode = 'source_of_income_private_employee_second_tenure';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getSourceOfIncomePrivateEmployeeSecondTenureValue()
    {
        $attributeCode = 'source_of_income_private_employee_second_tenure';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }


    public function getSourceOfIncomePrivateEmployeeSecondEmploymentStatusOptions()
    {
        $attributeCode = 'source_of_income_private_employee_employment_second_status';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
        return $attribute->getSource()->getAllOptions();
    }

    public function getSourceOfIncomePrivateEmployeeSecondEmploymentStatusValue()
    {
        $attributeCode = 'source_of_income_private_employee_employment_second_status';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }



   //Government

   public function getSourceOfIncomeGovernmentEmployeeOccupationOptions()
   {
       $attributeCode = 'source_of_income_government_employee_occupation';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }

   public function getSourceOfIncomeGovernmentEmployeeOccupationValue()
   {
       $attributeCode = 'source_of_income_government_employee_occupation';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeNatureOfWorkOptions()
   {
       $attributeCode = 'source_of_income_government_employee_nature_of_work';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }

   public function getSourceOfIncomeGovernmentEmployeeNatureOfWorkValue()
   {
       $attributeCode = 'source_of_income_government_employee_nature_of_work';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }



   public function getSourceOfIncomeGovernmentEmployeePositionOptions()
   {
       $attributeCode = 'source_of_income_government_employee_position';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }

   public function getSourceOfIncomeGovernmentEmployeePositionValue()
   {
       $attributeCode = 'source_of_income_government_employee_position';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeTenureOptions()
   {
       $attributeCode = 'source_of_income_government_employee_tenure';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }

   public function getSourceOfIncomeGovernmentEmployeeTenureValue()
   {
       $attributeCode = 'source_of_income_government_employee_tenure';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeNetIncome()
   {
       $attributeCode = 'source_of_income_government_employee_net_income';
       $customer = $this->customerSession->getCustomer();
       if($customer->getData($attributeCode)==0){
           return 0;
       }else{
           return $customer->getData($attributeCode) ?: '';
       }


   }

   public function getSourceOfIncomeGovernmentEmployeeContactPerson()
   {
       $attributeCode = 'source_of_income_government_employee_contact_person';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeContactNumber()
   {
       $attributeCode = 'source_of_income_government_employee_contact_number';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }



   public function getSourceOfIncomeGovernmentEmployeeCompanyName()
   {
       $attributeCode = 'source_of_income_government_employee_company_name';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeBuildingNumber()
   {
       $attributeCode = 'source_of_income_government_employee_building_number';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }



   public function getSourceOfIncomeGovernmentEmployeeStreet()
   {
       $attributeCode = 'source_of_income_government_employee_street';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeGovernmentEmployeeSubdivision()
   {
       $attributeCode = 'source_of_income_government_employee_subdivision';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeGovernmentEmployeeProvince()
   {
       $attributeCode = 'source_of_income_government_employee_province';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeCity()
   {
       $attributeCode = 'source_of_income_government_employee_city';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeBarangay()
   {
       $attributeCode = 'source_of_income_government_employee_barangay';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }
   public function getSourceOfIncomeGovernmentEmployeeDateHired()
   {
       $attributeCode = 'source_of_income_government_employee_date_hired';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }



   public function getSourceOfIncomeGovernmentEmployeeEmploymentStatusOptions()
   {
       $attributeCode = 'source_of_income_government_employee_employment_status';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function getSourceOfIncomeGovernmentEmployeeEmploymentStatusValue()
   {
       $attributeCode = 'source_of_income_government_employee_employment_status';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeGovernmentEmployeeOtherOccupation()
   {
       $attributeCode = 'source_of_income_government_employee_other_occupation';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   //Second Goverment Employee

   public function getSourceOfIncomeGovernmentEmployeeSecondOccupationOptions()
   {
       $attributeCode = 'source_of_income_government_employee_second_occupation';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }

   public function getSourceOfIncomeGovernmentEmployeeSecondOccupationValue()
   {
       $attributeCode = 'source_of_income_government_employee_second_occupation';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeSecondNatureOfWorkOptions()
   {
       $attributeCode = 'source_of_income_government_employee_second_nature_of_work';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }

   public function getSourceOfIncomeGovernmentEmployeeSecondNatureOfWorkValue()
   {
       $attributeCode = 'source_of_income_government_employee_second_nature_of_work';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }



   public function getSourceOfIncomeGovernmentEmployeeSecondPositionOptions()
   {
       $attributeCode = 'source_of_income_government_employee_second_position';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }

   public function getSourceOfIncomeGovernmentEmployeeSecondPositionValue()
   {
       $attributeCode = 'source_of_income_government_employee_second_position';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeSecondTenureOptions()
   {
       $attributeCode = 'source_of_income_government_employee_second_tenure';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }

   public function getSourceOfIncomeGovernmentEmployeeSecondTenureValue()
   {
       $attributeCode = 'source_of_income_government_employee_second_tenure';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeSecondNetIncome()
   {
       $attributeCode = 'source_of_income_government_employee_second_net_income';
       $customer = $this->customerSession->getCustomer();
       if($customer->getData($attributeCode)==0){
           return 0;
       }else{
           return $customer->getData($attributeCode) ?: '';
       }


   }

   public function getSourceOfIncomeGovernmentEmployeeSecondContactPerson()
   {
       $attributeCode = 'source_of_income_government_employee_second_contact_person';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeSecondContactNumber()
   {
       $attributeCode = 'source_of_income_government_employee_second_contact_number';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }



   public function getSourceOfIncomeGovernmentEmployeeSecondCompanyName()
   {
       $attributeCode = 'source_of_income_government_employee_second_company_name';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeSecondBuildingNumber()
   {
       $attributeCode = 'source_of_income_government_employee_second_building_number';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }




   public function getSourceOfIncomeGovernmentEmployeeSecondStreet()
   {
       $attributeCode = 'source_of_income_government_employee_second_street';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeSecondSubdivision()
   {
       $attributeCode = 'source_of_income_government_employee_second_subdivision';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeSecondProvince()
   {
       $attributeCode = 'source_of_income_government_employee_second_province';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeSecondCity()
   {
       $attributeCode = 'source_of_income_government_employee_second_city';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeGovernmentEmployeeSecondBarangay()
   {
       $attributeCode = 'source_of_income_government_employee_second_barangay';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }
   public function getSourceOfIncomeGovernmentEmployeeSecondDateHired()
   {
       $attributeCode = 'source_of_income_government_employee_second_date_hired';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }



   public function getSourceOfIncomeGovernmentEmployeeSecondEmploymentStatusOptions()
   {
       $attributeCode = 'source_of_income_government_employee_second_status';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function getSourceOfIncomeGovernmentEmployeeSecondEmploymentStatusValue()
   {
       $attributeCode = 'source_of_income_government_employee_second_status';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }
   public function getSourceOfIncomeGovernmentEmployeeSecondOccupationOther()
   {
       $attributeCode = 'source_of_income_government_employee_second_occupation_other';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeGovernmentEmployeeOccupationOther()
   {
       $attributeCode = 'source_of_income_government_employee_occupation_other';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }
















//PENSION
   public function  getSourceOfIncomePensionOptions()
   {
       $attributeCode = 'source_of_income_pension';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomePensionValue()
   {
       $attributeCode = 'source_of_income_pension';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomePensionAmount()
   {
       $attributeCode = 'source_of_income_pension_amount';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }



   //Second Pension

   public function  getSourceOfIncomePensionSecondOptions()
   {
       $attributeCode = 'source_of_income_second_pension';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomePensionSecondValue()
   {
       $attributeCode = 'source_of_income_second_pension';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomePensionSecondAmount()
   {
       $attributeCode = 'source_of_income_second_pension_amount';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   //Remittance
   public function getSourceOfIncomeRemittanceSender()
   {
       $attributeCode = 'source_of_income_remittance_sender';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function  getSourceOfIncomeRemittanceRelationshipOptions()
   {
       $attributeCode = 'source_of_income_remittance_relationship';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeRemittanceRelationshipValue()
   {
       $attributeCode = 'source_of_income_remittance_relationship';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function  getSourceOfIncomeRemittanceCountryOptions()
   {
       $attributeCode = 'source_of_income_remittance_country';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeRemittanceCountryValue()
   {
       $attributeCode = 'source_of_income_remittance_country';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeRemittanceAmount()
   {
       $attributeCode = 'source_of_income_remittance_amount';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }



   //Second Remmittance

   public function getSourceOfIncomeSecondRemittanceSender()
   {
       $attributeCode = 'source_of_income_second_remittance_sender';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function  getSourceOfIncomeSecondRemittanceRelationshipOptions()
   {
       $attributeCode = 'source_of_income_second_remittance_relationship';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeSecondRemittanceRelationshipValue()
   {
       $attributeCode = 'source_of_income_second_remittance_relationship';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function  getSourceOfIncomeSecondRemittanceCountryOptions()
   {
       $attributeCode = 'source_of_income_second_remittance_country';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeSecondRemittanceCountryValue()
   {
       $attributeCode = 'source_of_income_second_remittance_country';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondRemittanceAmount()
   {
       $attributeCode = 'source_of_income_second_remittance_amount';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }






//Self Employed

   public function  getSourceOfIncomeSelfEmployedOccupationOptions()
   {
       $attributeCode = 'source_of_income_self_employed_occupation';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeSelfEmployedOccupationValue()
   {
       $attributeCode = 'source_of_income_self_employed_occupation';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function  getSourceOfIncomeSelfEmployedTypeOptions()
   {
       $attributeCode = 'source_of_income_self_employed_type';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeSelfEmployedTypeValue()
   {
       $attributeCode = 'source_of_income_self_employed_type';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function  getSourceOfIncomeSelfEmployedYearsOfOperationOptions()
   {
       $attributeCode = 'source_of_income_self_employed_years_of_operation';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeSelfEmployedYearsOfOperationValue()
   {
       $attributeCode = 'source_of_income_self_employed_years_of_operation';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSelfEmployedNetIncome()
   {
       $attributeCode = 'source_of_income_self_employed_net_income';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSelfEmployedContactPerson()
   {
       $attributeCode = 'source_of_income_self_employed_contact_person';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeSelfEmployedContactNumber()
   {
       $attributeCode = 'source_of_income_self_employed_contact_number';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSelfEmployedName()
   {
       $attributeCode = 'source_of_income_self_employed_name';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeSelfEmployedBuildingNumber()
   {
       $attributeCode = 'source_of_income_self_employed_building_number';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeSelfEmployedSubdivision()
   {
       $attributeCode = 'source_of_income_self_employed_subdivision';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSelfEmployedStreet()
   {
       $attributeCode = 'source_of_income_self_employed_street';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSelfEmployedBarangay()
   {
       $attributeCode = 'source_of_income_self_employed_barangay';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSelfEmployedCity()
   {
       $attributeCode = 'source_of_income_self_employed_city';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSelfEmployedProvince()
   {
       $attributeCode = 'source_of_income_self_employed_province';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }




   //Second Self Employed
   public function  getSourceOfIncomeSecondSelfEmployedOccupationOptions()
   {
       $attributeCode = 'source_of_income_second_self_employed_occupation';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeSecondSelfEmployedOccupationValue()
   {
       $attributeCode = 'source_of_income_second_self_employed_occupation';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function  getSourceOfIncomeSecondSelfEmployedTypeOptions()
   {
       $attributeCode = 'source_of_income_second_self_employed_type';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeSecondSelfEmployedTypeValue()
   {
       $attributeCode = 'source_of_income_second_self_employed_type';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function  getSourceOfIncomeSecondSelfEmployedYearsOfOperationOptions()
   {
       $attributeCode = 'source_of_income_second_self_employed_years_of_operation';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeSecondSelfEmployedYearsOfOperationValue()
   {
       $attributeCode = 'source_of_income_second_self_employed_years_of_operation';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondSelfEmployedNetIncome()
   {
       $attributeCode = 'source_of_income_second_self_employed_net_income';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondSelfEmployedContactPerson()
   {
       $attributeCode = 'source_of_income_second_self_employed_contact_person';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeSecondSelfEmployedContactNumber()
   {
       $attributeCode = 'source_of_income_second_self_employed_contact_number';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondSelfEmployedName()
   {
       $attributeCode = 'source_of_income_second_self_employed_name';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeSecondSelfEmployedBuildingNumber()
   {
       $attributeCode = 'source_of_income_second_self_employed_building_number';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeSecondSelfEmployedSubdivision()
   {
       $attributeCode = 'source_of_income_second_self_employed_subdivision';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondSelfEmployedStreet()
   {
       $attributeCode = 'source_of_income_second_self_employed_street';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondSelfEmployedBarangay()
   {
       $attributeCode = 'source_of_income_second_self_employed_barangay';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondSelfEmployedCity()
   {
       $attributeCode = 'source_of_income_second_self_employed_city';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondSelfEmployedProvince()
   {
       $attributeCode = 'source_of_income_second_self_employed_province';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }





   public function getSourceOfIncomePrivateEmployeeSecondOtherOccupation()
   {
       $attributeCode = 'source_of_income_private_employee_second_other_occupation';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }




//Business


   public function  getSourceOfIncomeBusinessOccupationOptions()
   {
       $attributeCode = 'source_of_income_business_occupation';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeBusinessOccupationValue()
   {
       $attributeCode = 'source_of_income_business_occupation';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function  getSourceOfIncomeBusinessTypeOptions()
   {
       $attributeCode = 'source_of_income_business_type';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeBusinessTypeValue()
   {
       $attributeCode = 'source_of_income_business_type';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function  getSourceOfIncomeBusinessYearsOfOperationOptions()
   {
       $attributeCode = 'source_of_income_business_years_of_operation';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeBusinessYearsOfOperationValue()
   {
       $attributeCode = 'source_of_income_business_years_of_operation';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeBusinessNetIncome()
   {
       $attributeCode = 'source_of_income_business_net_income';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeBusinessContactPerson()
   {
       $attributeCode = 'source_of_income_business_contact_person';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeBusinessContactNumber()
   {
       $attributeCode = 'source_of_income_business_contact_number';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeBusinessName()
   {
       $attributeCode = 'source_of_income_business_name';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeBusinessBuildingNumber()
   {
       $attributeCode = 'source_of_income_business_building_number';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeBusinessSubdivision()
   {
       $attributeCode = 'source_of_income_business_subdivision';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeBusinessStreet()
   {
       $attributeCode = 'source_of_income_business_street';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeBusinessBarangay()
   {
       $attributeCode = 'source_of_income_business_barangay';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeBusinessCity()
   {
       $attributeCode = 'source_of_income_business_city';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeBusinessProvince()
   {
       $attributeCode = 'source_of_income_business_province';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }



//Second Business

public function  getSourceOfIncomeSecondBusinessOccupationOptions()
   {
       $attributeCode = 'source_of_income_second_business_occupation';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeSecondBusinessOccupationValue()
   {
       $attributeCode = 'source_of_income_second_business_occupation';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function  getSourceOfIncomeSecondBusinessTypeOptions()
   {
       $attributeCode = 'source_of_income_second_business_type';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeSecondBusinessTypeValue()
   {
       $attributeCode = 'source_of_income_second_business_type';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function  getSourceOfIncomeSecondBusinessYearsOfOperationOptions()
   {
       $attributeCode = 'source_of_income_second_business_years_of_operation';
       $attribute = $this->attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
       return $attribute->getSource()->getAllOptions();
   }


   public function  getSourceOfIncomeSecondBusinessYearsOfOperationValue()
   {
       $attributeCode = 'source_of_income_second_business_years_of_operation';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondBusinessNetIncome()
   {
       $attributeCode = 'source_of_income_second_business_net_income';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondBusinessContactPerson()
   {
       $attributeCode = 'source_of_income_second_business_contact_person';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeSecondBusinessContactNumber()
   {
       $attributeCode = 'source_of_income_second_business_contact_number';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondBusinessName()
   {
       $attributeCode = 'source_of_income_second_business_name';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeSecondBusinessBuildingNumber()
   {
       $attributeCode = 'source_of_income_second_business_building_number';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }


   public function getSourceOfIncomeSecondBusinessSubdivision()
   {
       $attributeCode = 'source_of_income_second_business_subdivision';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondBusinessStreet()
   {
       $attributeCode = 'source_of_income_second_business_street';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondBusinessBarangay()
   {
       $attributeCode = 'source_of_income_second_business_barangay';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondBusinessCity()
   {
       $attributeCode = 'source_of_income_second_business_city';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }

   public function getSourceOfIncomeSecondBusinessProvince()
   {
       $attributeCode = 'source_of_income_second_business_province';
       $customer = $this->customerSession->getCustomer();
       return $customer->getData($attributeCode) ?: '';
   }












  //Comaker
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
        $fullName = $customer->getData($attributeCode);

        if (!$fullName) {
            // If the attribute is empty or not set, use the derived full name
            $fullName = $customer->getFirstname() . ' ' . $customer->getMiddlename() . ' ' . $customer->getLastname();
        }

        return $fullName;
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
        return $customer->getData($attributeCode) ?: 'PHOTO';
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
        return $customer->getData($attributeCode) ?: 'Valid ID';
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
        return $customer->getData($attributeCode) ?: 'PAYSLIP';
    }

    public function getLeadSource()
    {
        $attributeCode = 'lead_source';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: 'ECOMMERCE';
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


    public function getSourceOfIncomeType2()
    {
        $attributeCode = 'source_of_income_type_2';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getSourceOfIncomeType3()
    {
        $attributeCode = 'source_of_income_type_3';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

     public function getClientPersonalInformationCivilStatusFirstName()
    {
        $attributeCode = 'client_personal_information_civil_status_first_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientPersonalInformationCivilStatusMiddleName()
    {
        $attributeCode = 'client_personal_information_civil_status_middle_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientPersonalInformationCivilStatusLastName()
    {
        $attributeCode = 'client_personal_information_civil_status_last_name';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientPersonalInformationCivilStatusNameSuffix()
    {
        $attributeCode = 'client_personal_information_civil_status_name_suffix';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientPersonalInformationCivilStatusBirthPlace()
    {
        $attributeCode = 'client_personal_information_civil_status_birth_place';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientPersonalInformationCivilStatusBirthDate()
    {
        $attributeCode = 'client_personal_information_civil_status_birth_date';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }
    public function getClientPersonalInformationCivilStatusMobileNumber()
    {
        $attributeCode = 'client_personal_information_civil_status_mobile_number';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }

    public function getClientPersonalInformationCivilStatusEmail()
    {
        $attributeCode = 'client_personal_information_civil_status_email';
        $customer = $this->customerSession->getCustomer();
        return $customer->getData($attributeCode) ?: '';
    }








}
