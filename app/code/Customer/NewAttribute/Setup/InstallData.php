<?php
namespace Customer\NewAttribute\Setup;
use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetup;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Eav\Model\Config;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
class InstallData implements InstallDataInterface
{
    private $customerSetupFactory;
    private $attributeSetFactory;
    private $eavConfig;
    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory,
        Config $eavConfig
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
        $this->eavConfig = $eavConfig;
    }
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
        $attributeSetId = $customerSetup->getDefaultAttributeSetId(Customer::ENTITY);
        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);
        $customerSetup->addAttribute(
        //Repeat Borrower
        Customer::ENTITY,
        'repeat_borrower',
        [
            'label' => 'Repeat Borrower',
            'type' => 'int',
            'input' => 'boolean',
            'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
            'group' => 'General',
                'default' => 0,
                'user_defined' => true,
                'visible' => true,
                'visible_on_front' => true,
                'option' => [
                    'values' => [
                        0 => 'No',
                        1 => 'Yes',
                    ]
                ],
                'frontend' => '',
                'backend' => '',
                'class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'formElement' => 'radios'
        ])->addAttribute(
        // Lead Source
        Customer::ENTITY,
        'lead_source',
        [
            'label' => 'Lead Source',
            'type' => 'varchar',
            'input' => 'text', // Change input type to text
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => 'ECOMMERCE', // Set the default value to "ECOMMERCE"
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input', // Change the form element to input (text)
        ])->addAttribute(
        //Availment Purpose
        Customer::ENTITY,
        'availment_purpose',
        [
            'label' => 'Availment Purpose',
            'type' => 'varchar',
            'input' => 'select',
            'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'option' => ['values' => ['BUSINESS-SELF-EMPLOYED', 'TODA-OPERATOR/DRIVER','SERVICE-COMMUTING EMPLOYEES','OTHERS']],
            'formElement' => 'select'
        ])->addAttribute(
        //Client Character Reference Name
        Customer::ENTITY,
        'client_character_reference_name',
        [
            'label' => 'Client Character Reference Name',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Character Reference Relationship
        Customer::ENTITY,
        'client_character_reference_relationship',
        [
            'label' => 'Client Character Reference Relationship',
            'type' => 'varchar',
            'input' => 'select',
            'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'option' => ['values' => ['FATHER','MOTHER','SON','DAUGHTER','SPOUSE','GRANDMOTHER','GRANDFATHER','UNCLE',
            'AUNTIE','NIECE','NEPHEW','BROTHER','SISTER','FATHER IN LAW','MOTHER IN LAW','BROTHER IN LAW',
            'SISTER IN LAW','COUSIN','HR','EMPLOYER','SUPERVISOR','MANAGER','HEAD','LANDLORD','HOUSEMATE','NEIGHBOR','OTHERS']],
            'formElement' => 'select'
        ])->addAttribute(
        //Client Character Reference Contact
        Customer::ENTITY,
        'client_character_reference_contact',
        [
            'label' => 'Client Character Reference Contact',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Character Reference Name
        Customer::ENTITY,
        'client_second_character_reference_name',
        [
            'label' => 'Client Second Character Reference Name',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Character Reference Relationship
        Customer::ENTITY,
        'client_second_character_reference_relationship',
        [
            'label' => 'Client Second Character Reference Relationship',
            'type' => 'varchar',
            'input' => 'select',
            'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'option' => ['values' => ['FATHER','MOTHER','SON','DAUGHTER','SPOUSE','GRANDMOTHER','GRANDFATHER','UNCLE',
            'AUNTIE','NIECE','NEPHEW','BROTHER','SISTER','FATHER IN LAW','MOTHER IN LAW','BROTHER IN LAW',
            'SISTER IN LAW','COUSIN','HR','EMPLOYER','SUPERVISOR','MANAGER','HEAD','LANDLORD','HOUSEMATE','NEIGHBOR','OTHERS']],
            'formElement' => 'select'
        ])->addAttribute(
        //Client Character Reference Contact
        Customer::ENTITY,
        'client_second_character_reference_contact',
        [
            'label' => 'Client Second Character Reference Contact',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Character Reference Name
        Customer::ENTITY,
        'client_third_character_reference_name',
        [
            'label' => 'Client Third Character Reference Name',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Character Reference Relationship
        Customer::ENTITY,
        'client_third_character_reference_relationship',
        [
            'label' => 'Client Third Character Reference Relationship',
            'type' => 'varchar',
            'input' => 'select',
            'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'option' => ['values' => ['FATHER','MOTHER','SON','DAUGHTER','SPOUSE','GRANDMOTHER','GRANDFATHER','UNCLE',
            'AUNTIE','NIECE','NEPHEW','BROTHER','SISTER','FATHER IN LAW','MOTHER IN LAW','BROTHER IN LAW',
            'SISTER IN LAW','COUSIN','HR','EMPLOYER','SUPERVISOR','MANAGER','HEAD','LANDLORD','HOUSEMATE','NEIGHBOR','OTHERS']],
            'formElement' => 'select'
        ])->addAttribute(
        //Client Character Reference Contact
        Customer::ENTITY,
        'client_third_character_reference_contact',
        [
            'label' => 'Client Third Character Reference Contact',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Food
        Customer::ENTITY,
        'client_family_expenditure_food',
        [
            'label' => 'Client Family Expenditure Food',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Education Allowance
        Customer::ENTITY,
        'client_family_expenditure_education_allowance',
        [
            'label' => 'Client Family Expenditure Education Allowance',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Education Tuition Fee Public
        Customer::ENTITY,
        'client_family_expenditure_education_tuition_fee_public',
        [
            'label' => 'Client Family Expenditure Education Tuition Fee Public',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Education Tuition Fee Private
        Customer::ENTITY,
        'client_family_expenditure_education_tuition_fee_private',
        [
            'label' => 'Client Family Expenditure Education Tuition Fee Private',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Electricity
        Customer::ENTITY,
        'client_family_expenditure_electricity',
        [
            'label' => 'Client Family Expenditure Electricity',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Water
        Customer::ENTITY,
        'client_family_expenditure_water',
        [
            'label' => 'Client Family Expenditure Water',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Electronic Load
        Customer::ENTITY,
        'client_family_expenditure_electronic_load',
        [
            'label' => 'Client Family Expenditure Electronic Load',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Cable Television
        Customer::ENTITY,
        'client_family_expenditure_cable_television',
        [
            'label' => 'Client Family Expenditure Cable Television',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Internet
        Customer::ENTITY,
        'client_family_expenditure_internet',
        [
            'label' => 'Client Family Expenditure Internet',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Transportation
        Customer::ENTITY,
        'client_family_expenditure_transportation',
        [
            'label' => 'Client Family Expenditure Transportation',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Medical
        Customer::ENTITY,
        'client_family_expenditure_medical',
        [
            'label' => 'Client Family Expenditure Medical',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Existing Obligation
        Customer::ENTITY,
        'client_family_expenditure_existing_obligation',
        [
            'label' => 'Client Family Expenditure Existing Obligation',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Miscellaneous
        Customer::ENTITY,
        'client_family_expenditure_miscellaneous',
        [
            'label' => 'Client Family Expenditure Miscellaneous',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure House Rent
        Customer::ENTITY,
        'client_family_expenditure_house_rent',
        [
            'label' => 'Client Family Expenditure House Rent',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Utilities
        Customer::ENTITY,
        'client_family_expenditure_utilities',
        [
            'label' => 'Client Family Expenditure Utilities',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
        //Client Family Expenditure Others
        Customer::ENTITY,
        'client_family_expenditure_others',
        [
            'label' => 'Client Family Expenditure Others',
            'type' => 'varchar',
            'input' => 'text',
            'required' => false,
            'visible' => true,
            'system' => false,
            'position' => 100,
            'sort_order' => 100,
            'default' => '',
            'adminhtml_only' => 0,
            'frontend_class' => '',
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_searchable_in_grid' => false,
            'unique' => false,
            'validate_rules' => '',
            'is_user_defined' => true,
            'is_system' => 0,
            'is_visible' => 1,
            'formElement' => 'input',
        ])->addAttribute(
            //Client Identification Type
            Customer::ENTITY,
            'client_identification_type',
            [
                'label' => 'Client Identification Type',
                'type' => 'varchar',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'option' => [
                    'values' => [
                        'PCC' => 'Police Clearance Certificate',
                        'SOCIAL.SEC.SYS' => 'Social Security System ID',
                        'VOTER.ID' => 'Voter ID',
                        'PHIL.HEAL' => 'PhilHealth ID',
                        'COMP.ID' => 'Company ID',
                        'POST.ID' => 'Postal ID',
                        'STUD.ID' => 'Student ID',
                        'BARANGAY.CC' => 'Barangay Certification/Clearance',
                        'UMID' => 'Unified Multi-Purpose ID',
                        'DRIVING.LICENSE' => 'Driver\'s License',
                        'PRF.REG.COM.ID' => 'Professional Regulation Commission (PRC) ID',
                        'DTI.CERT.REG' => 'Department of Trade and Industry (DTI) Certificate of Registration',
                        'PASSPORT' => 'Passport',
                        'TAX.ID.NO' => 'Tax Identification Number (TIN)',
                        'GOVT.SERV.INS' => 'Government Service Insurance System (GSIS) ID',
                    ],
                ],
                'formElement' => 'select',
            ])->addAttribute(
            //Client Identification Number
            Customer::ENTITY,
            'client_identification_number',
            [
                'label' => 'Client Identification Number',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Client Personal Information Beneficiary
            Customer::ENTITY,
            'client_personal_information_beneficiary',
            [
                'label' => 'Client Personal Information Beneficiary',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Client Personal Information Birth Place
            Customer::ENTITY,
            'client_personal_information_birth_place',
            [
                'label' => 'Client Personal Information Birth Place',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Client Personal Information Nationality
            Customer::ENTITY,
            'client_personal_information_nationality',
            [
                'label' => 'Client Personal Information Nationality',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Client Personal Information Civil Status
            Customer::ENTITY,
            'client_personal_information_civil_status',
            [
                'label' => 'Client Personal Information Civil Status',
                'type' => 'varchar',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'option' => ['values' => ['LIVE-IN','MARRIED','SEPARATED','SINGLE','WIDOWED']],
                'formElement' => 'select'
            ])->addAttribute(
            //Client Personal Information Educational Attainment
            Customer::ENTITY,
            'client_personal_information_educational_attainment',
            [
                'label' => 'Client Personal Information Educational Attainment',
                'type' => 'varchar',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'option' => ['values' => ['ELEMENTARY UNDERGRADUATE','WORKING','NOT YET ATTENDING SCHOOL','ELEMENTARY GRADUATE','COLLEGE UNDERGRADUATE',
                'POST GRADUATE','COLLEGE GRADUATE','HIGH SCHOOL GRADUATE','HIGH SCHOOL UNDERGRADUATE','PRE-SCHOOL']],
                'formElement' => 'select'
            ])->addAttribute(
            //Client Source Of Income Category Employee
            Customer::ENTITY,
            'source_of_income_category',
            [
                'label' => 'Source Of Income Category Employee',
                'type' => 'varchar',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'option' => ['values' => ['GOVERNMENT EMPLOYEE','PENSION','PRIVATE EMPLOYEE','REMITTANCE','SELF-EMPLOYED',
                'BUSINESS','OTHERS']],
                'formElement' => 'select'
            ])->addAttribute(
            //Client Source Of Income Type
            Customer::ENTITY,
            'source_of_income_type',
            [
                'label' => 'Source Of Income Type',
                 'type' => 'varchar',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'option' => ['values' => ['SPOUSE','BORROWER']],
                'formElement' => 'select'
            ])->addAttribute(
            //Source Of Income Private Employee Occupation
            Customer::ENTITY,
            'source_of_income_private_employee_occupation',
            [
                'label' => 'Source Of Income Private Employee Occupation',
                'type' => 'varchar',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'option' => ['values' => ['ACCOUNTANT','CALL CENTER EMPLOYEE','CARETAKER','CASHIER','COMPANY DRIVER','CONSTRUCTION WORKER - EMPLOYED',
                'DEBT COLLECTOR','FACTORY WORKER','GASOLINE BOY','MAINTENANCE','MANAGER - CORPORATE','MANAGER - FOOD INDUSTRY',
                'MECHANIC - EMPLOYEE','MERCHANDISER','MESSENGER - COURIER','OFFICE CLERK','PERSONAL/FAMILY DRIVER','SECURITY GUARD',
                'SERVICE CREW','SEWER','TEACHER','TECHNICIAN - EMPLOYED','TRUCK DRIVER','ARCHITECT',
                'BAGGER','BAKER','BARBER','BUS CONDUCTOR','CAREGIVER','CARWASH BOY','CONTRACTOR','COOK','DELIVERY RIDER','DISHWASHER','ELECTRICIAN','ENGINEER',
                'FASHION DESIGNER','FOREMAN','GARBAGE COLLECTOR','HOUSEMAID','KITCHEN HELPER','LABORER','MACHINE OPERATOR','MASON','MASSAGE THERAPIST','NURSE AID',
                'PAHINANTE','PHARMACIST','PIPEMAN','PROGRAMMER','OTHERS']],
                'formElement' => 'select'
            ])->addAttribute(
            //Source Of Income Private Employee Nature Of Work
            Customer::ENTITY,
            'source_of_income_private_employee_nature_of_work',
            [
                'label' => 'Source Of Income Private Employee Nature Of Work',
                'type' => 'varchar',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'option' => ['values' => ['REP. OF PERSNL&HOUSEHOLD GOODS','EMPLOYMENT ACTIVITIES','ADVERTISING AND MARKET RESEARCH',
                'MANUFACTURE OF BEVERAGES','CONSUMPTION-MOTORCYCLE','ACCOMMODATION SERVICE','WHOLESALE/RETAIL TRADE OF GOODS',
                'FINANCIAL SERVICE','HUMAN HEALTH','REAL ESTATE ACTIVITES','RETAIL TRADE OF GOODS','WATER TRANSPORTATION',
                'OTHER PERSONAL SERVICE ACTIVITIES','MANUFACTURE OF FOOD PRODUCTS','MANUFACTURE OF FURNITURE','ANIMAL PRODUCTION',
                'INDIVIDUAL-HOUSING','CONSTRUCTION OF BUILDINGS','LIB.,ARCH.,MUSEUMS &OTHR CULTRL ACT','WHLSALE&RET&REP OF MTR VEH &MTR CYC',
                'EDUCATION/SCHOOL','MANUFACTURE OF LEATHER','CREATIVE, ARTS AND ENTERTAINMENT','WAREHOUSING & SUPP ACT. FOR TRANSP.',
                'TRANSPORT SERVICE','INSURANCE SERVICE','TRVL AGN,TOUR OPR,RES SERV&REL ACT','RESIDENTIAL CARE','POSTAL AND COURIER',
                'PRODUCTION ACTIVITIES OF HOUSEHOLDS','CROP PRODUCTION','LAND TRANSPORTATION','FOOD AND BEVERAGE SERVICE',
                'SPRTS ACT. & AMUSEMENT & RECREATION','RENTAL AND LEASING ACTIVITIES','OFFICE ADMINISTRATIVE & OFFICE SUPP',
                'SERV. TO BUILDINGS & LANDSCAPE ACT.','OTHER PROF., SCIENT. & TECH ACT.','MANUFACTURE OF WOOD & WOOD PRODUCTS','CONSUMPTION-SALARY']],
                'formElement' => 'select'
            ])->addAttribute(
            //Source Of Income Private Employee Position
            Customer::ENTITY,
            'source_of_income_private_employee_position',
            [
                'label' => 'Source Of Income Private Employee Position',
                'type' => 'varchar',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'option' => ['values' => ['MANAGER','OWNER','RANK AND FILE','SELF-EMPLOYED','SUPERVISOR']],
                'formElement' => 'select'
            ])->addAttribute(
            //Source Of Income Private Employee Tenure
            Customer::ENTITY,
            'source_of_income_private_employee_tenure',
            [
                'label' => 'Source Of Income Private Employee Tenure',
                'type' => 'varchar',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'option' => ['values' => ['6 MOS. - 1 YEAR','2-3 YEARS','< 6 MONTHS','> 5 YEARS','1-2 YEARS','3-5 YEARS']],
                'formElement' => 'select'
            ])->addAttribute(
            //Source Of Income Private Employee Net Income
            Customer::ENTITY,
            'source_of_income_private_employee_net_income',
            [
                'label' => 'Source Of Income Private Employee Net Income',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Source Of Income Private Employee Contact Person
            Customer::ENTITY,
            'source_of_income_private_employee_contact_person',
            [
                'label' => 'Source Of Income Private Employee Contact Person',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Source Of Income Private Employee Contact Number
            Customer::ENTITY,
            'source_of_income_private_employee_contact_number',
            [
                'label' => 'Source Of Income Private Employee Contact Number',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Source Of Income Private Employee Company Name
            Customer::ENTITY,
            'source_of_income_private_employee_company_name',
            [
                'label' => 'Source Of Income Private Employee Company Name',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Source Of Income Private Employee Building Number
            Customer::ENTITY,
            'source_of_income_private_employee_building_number',
            [
                'label' => 'Source Of Income Private Employee Building Number',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Source Of Income Private Employee Street
            Customer::ENTITY,
            'source_of_income_private_employee_street',
            [
                'label' => 'Source Of Income Private Employee Street',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Source Of Income Private Employee Barangay
            Customer::ENTITY,
            'source_of_income_private_employee_barangay',
            [
                'label' => 'Source Of Income Private Employee Barangay',
                'type' => 'int',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Source Of Income Private Employee City
            Customer::ENTITY,
            'source_of_income_private_employee_city',
            [
                'label' => 'Source Of Income Private Employee City',
                'type' => 'int',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Source Of Income Private Employee Province
            Customer::ENTITY,
            'source_of_income_private_employee_province',
            [
                'label' => 'Source Of Income Private Employee Province',
                'type' => 'int',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Source Of Income Private Employee Employment Status
            Customer::ENTITY,
            'source_of_income_private_employee_employment_status',
            [
                'label' => 'Source Of Income Private Employee Employment Status',
                'type' => 'varchar',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'option' => ['values' => ['CONTRACTUAL','PROBATIONARY','REGULAR','CASUAL','SELF-EMPLOYED','PROJECT BASED','PIECEMEAL','JOB ORDER']],
                'formElement' => 'select'
            ])->addAttribute(
            //Source Of Income Private Employee Other Occupation
            Customer::ENTITY,
            'source_of_income_private_employee_other_occupation',
            [
                'label' => 'Source Of Income Private Employee Other Occupation',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Source Of Income Private Employee Date Hired
            Customer::ENTITY,
            'source_of_income_private_employee_date_hired',
            [
                'label' => 'Source Of Income Private Employee Date Hired',
                'type' => 'datetime',
                'input' => 'date',
                'date_format' => 'yyyy-dd-MM',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'date',
            ])->addAttribute(
            //Comaker Address Current Barangay
            Customer::ENTITY,
            'comaker_address_current_barangay',
            [
                'label' => 'Comaker Address Current Barangay',
                'type' => 'int',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Comaker Address Current Block Number
            Customer::ENTITY,
            'comaker_address_current_block_number',
            [
                'label' => 'Comaker Address Current Block Number',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Comaker Address Current City
            Customer::ENTITY,
            'comaker_address_current_city',
            [
                'label' => 'Comaker Address Current City',
                'type' => 'int',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Comaker Address Current Duration
            Customer::ENTITY,
            'comaker_address_current_duration',
            [
                'label' => 'Comaker Address Current Duration',
                'type' => 'varchar',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'option' => ['values' => ['6 MOS. - 1 YEAR','2-3 YEARS','< 6 MONTHS','> 5 YEARS','1-2 YEARS','3-5 YEARS']],
                'formElement' => 'select'
            ])->addAttribute(
            //Comaker Address Current Province
            Customer::ENTITY,
            'comaker_address_current_province',
            [
                'label' => 'Comaker Address Current Province',
                'type' => 'int',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Comaker Address Current Street
            Customer::ENTITY,
            'comaker_address_current_street',
            [
                'label' => 'Comaker Address Current Street',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Comaker Address Current Type
            Customer::ENTITY,
            'comaker_address_current_type',
            [
                'label' => 'Comaker Address Current Type',
                'type' => 'varchar',
                'input' => 'select',
                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'option' => ['values' => ['LIVING WITH PARENT', 'LIVING WITH RELATIVE', 'OWNED', 'RENTED', 'STAY-IN']],
                'formElement' => 'select'
            ])->addAttribute(
            //Comaker Personal Info First Name
            Customer::ENTITY,
            'comaker_personal_info_first_name',
            [
                'label' => 'Comaker Personal Info First Name',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Comaker Personal Info Last Name
            Customer::ENTITY,
            'comaker_personal_info_last_name',
            [
                'label' => 'Comaker Personal Info Last Name',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Comaker Personal Info Middle Name
            Customer::ENTITY,
            'comaker_personal_info_middle_name',
            [
                'label' => 'Comaker Personal Info Middle Name',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Comaker Personal Info Mobile Number
            Customer::ENTITY,
            'comaker_personal_info_mobile_number',
            [
                'label' => 'Comaker Personal Info Mobile Number',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Comaker Personal Info Occupation
            Customer::ENTITY,
            'comaker_personal_info_occupation',
            [
                'label' => 'Comaker Personal Info Occupation',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Comaker Personal Info Suffix Name
            Customer::ENTITY,
            'comaker_personal_info_suffix_name',
            [
                'label' => 'Comaker Personal Info Suffix Name',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Motorcycle Loan Attachment Full Name
            Customer::ENTITY,
            'mc_loan_attachment_full_name',
            [
                'label' => 'Motorcycle Loan Attachment Full Name',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Motorcycle Loan Attachment Issued Date
            Customer::ENTITY,
            'mc_loan_attachment_issued_date',
            [
                'label' => 'Motorcycle Loan Attachment Issued Date',
                'type' => 'datetime',
                'input' => 'date',
                'date_format' => 'yyyy-dd-MM',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'date',
            ])->addAttribute(
            //Motorcycle Loan Attachment Expiration Date
            Customer::ENTITY,
            'mc_loan_attachment_expiration_date',
            [
                'label' => 'Motorcycle Loan Attachment Expiration Date',
                'type' => 'datetime',
                'input' => 'date',
                'date_format' => 'yyyy-dd-MM',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'date',
            ])->addAttribute(
            //Motorcycle Loan Attachment Photo Client
            Customer::ENTITY,
            'mc_loan_attachment_image_photo_client',
            [
                'label' => 'Motorcycle Loan Attachment Photo Client',
                'input' => 'textarea',
                'type' => 'text',
                'backend' => '',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'is_user_defined' => true,
                'is_visible' => true,
                'is_system' => 0,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'validate_rules' => '',
                'frontend_class' => '',
            ])->addAttribute(
            //Motorcycle Loan Attachment Identification
            Customer::ENTITY,
            'mc_loan_attachment_image_identification',
            [
                'label' => 'Motorcycle Loan Attachment Identification',
                'input' => 'textarea',
                'type' => 'text',
                'backend' => '',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'is_user_defined' => true,
                'is_visible' => true,
                'is_system' => 0,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'validate_rules' => '',
                'frontend_class' => '',
            ])->addAttribute(
            //Motorcycle Loan Attachment Proof Of Income
            Customer::ENTITY,
            'mc_loan_attachment_image_proof_of_income',
            [
                'label' => 'Motorcycle Loan Attachment Proof Of Income',
                'input' => 'textarea',
                'type' => 'text',
                'backend' => '',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'is_user_defined' => true,
                'is_visible' => true,
                'is_system' => 0,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'validate_rules' => '',
                'frontend_class' => '',
            ])->addAttribute(
            //Motorcycle Loan Attachment Photo Client Remarks
            Customer::ENTITY,
            'mc_loan_attachment_image_photo_client_remarks',
            [
                'label' => 'Motorcycle Loan Attachment Photo Client Remarks',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Motorcycle Loan Attachment Identification Remarks
            Customer::ENTITY,
            'mc_loan_attachment_image_identification_remarks',
            [
                'label' => 'Motorcycle Loan Attachment Identification Remarks',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ])->addAttribute(
            //Motorcycle Loan Attachment Proof Of Income Remarks
            Customer::ENTITY,
            'mc_loan_attachment_image_proof_of_income_remarks',
            [
                'label' => 'Motorcycle Loan Attachment Proof Of Income Remarks',
                'type' => 'varchar',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'system' => false,
                'position' => 100,
                'sort_order' => 100,
                'default' => '',
                'adminhtml_only' => 0,
                'frontend_class' => '',
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'is_searchable_in_grid' => false,
                'unique' => false,
                'validate_rules' => '',
                'is_user_defined' => true,
                'is_system' => 0,
                'is_visible' => 1,
                'formElement' => 'input',
            ]);





        //Repeat Borrower
        $repeat_borrower = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'repeat_borrower');


        //Lead Source
        $lead_source = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'lead_source');


        //Availment Purpose
        $availment_purpose = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'availment_purpose');


        //Client Character Reference Name
        $client_character_reference_name = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_character_reference_name');


        //Client Character Reference Relationship
        $client_character_reference_relationship = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_character_reference_relationship');


        //Client Character Reference Contact
        $client_character_reference_contact = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_character_reference_contact');


        //Client Second Character Reference Name
        $client_second_character_reference_name = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_second_character_reference_name');


        //Client Second Character Reference Relationship
        $client_second_character_reference_relationship = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_second_character_reference_relationship');


        //Client Second Character Reference Contact
        $client_second_character_reference_contact = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_second_character_reference_contact');


        //Client Third Character Reference Name
        $client_third_character_reference_name = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_third_character_reference_name');


        //Client Third Character Reference Relationship
        $client_third_character_reference_relationship = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_third_character_reference_relationship');


        //Client Third Character Reference Contact
        $client_third_character_reference_contact = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_third_character_reference_contact');


        //Client Family Expenditure Food
        $client_family_expenditure_food = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_food');


        //Client Family Expenditure Education Allowance
        $client_family_expenditure_education_allowance = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_education_allowance');


        //Client Family Expenditure Education Tuition Fee Public
        $client_family_expenditure_education_tuition_fee_public = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_education_tuition_fee_public');


        //Client Family Expenditure Education Tuition Fee Private
        $client_family_expenditure_education_tuition_fee_private = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_education_tuition_fee_private');


        //Client Family Expenditure Electricity
        $client_family_expenditure_electricity = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_electricity');


        //Client Family Expenditure Water
        $client_family_expenditure_water = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_water');


        //Client Family Expenditure Electronic Load
        $client_family_expenditure_electronic_load = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_electronic_load');


        //Client Family Expenditure Cable Television
        $client_family_expenditure_cable_television = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_cable_television');


        //Client Family Expenditure Internet
        $client_family_expenditure_internet = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_internet');


        //Client Family Expenditure Transportation
        $client_family_expenditure_transportation = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_transportation');


        //Client Family Expenditure Medical
        $client_family_expenditure_medical = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_medical');


        //Client Family Expenditure Existing Obligation
        $client_family_expenditure_existing_obligation = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_existing_obligation');


        //Client Family Expenditure Miscellaneous
        $client_family_expenditure_miscellaneous = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_miscellaneous');


        //Client Family Expenditure House Rent
        $client_family_expenditure_house_rent = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_house_rent');


        //Client Family Expenditure Utilities
        $client_family_expenditure_utilities = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_utilities');


        //Client Family Expenditure Others
        $client_family_expenditure_others = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_family_expenditure_others');


        //Client Identification Type
        $client_identification_type = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_identification_type');


        //Client Identification Number
        $client_identification_number = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_identification_number');


        //Client Personal Information Beneficiary
        $client_personal_information_beneficiary = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_personal_information_beneficiary');


        //Client Personal Information Birth Place
        $client_personal_information_birth_place = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_personal_information_birth_place');


        //Client Personal Information Nationality
        $client_personal_information_nationality = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_personal_information_nationality');


        //Client Personal Information Civil Status
        $client_personal_information_civil_status = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_personal_information_civil_status');


        //Client Personal Information Educational Attainment
        $client_personal_information_educational_attainment = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'client_personal_information_educational_attainment');


        //Client Source Of Income Category Employee
        $source_of_income_category = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_category');


        //Client Source Of Income Type
        $source_of_income_type = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_type');


        //Source Of Income Private Employee Occupation
        $source_of_income_private_employee_occupation = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_occupation');


        //Source Of Income Private Employee Nature Of Work
        $source_of_income_private_employee_nature_of_work = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_nature_of_work');


        //Source Of Income Private Employee Position
        $source_of_income_private_employee_position = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_position');


        //Source Of Income Private Employee Tenure
        $source_of_income_private_employee_tenure = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_tenure');


        //Source Of Income Private Employee Net Income
        $source_of_income_private_employee_net_income = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_net_income');


        //Source Of Income Private Employee Contact Person
        $source_of_income_private_employee_contact_person = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_contact_person');


        //Source Of Income Private Employee Contact Number
        $source_of_income_private_employee_contact_number = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_contact_number');


        //Source Of Income Private Employee Company Name
        $source_of_income_private_employee_company_name = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_company_name');


        //Source Of Income Private Employee Building Number
        $source_of_income_private_employee_building_number = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_building_number');


        //Source Of Income Private Employee Street
        $source_of_income_private_employee_street = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_street');


        //Source Of Income Private Employee Barangay
        $source_of_income_private_employee_barangay = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_barangay');


        //Source Of Income Private Employee City
        $source_of_income_private_employee_city = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_city');


        //Source Of Income Private Employee Province
        $source_of_income_private_employee_province = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_province');


        //Source Of Income Private Employee Employment Status
        $source_of_income_private_employee_employment_status = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_employment_status');


        //Source Of Income Private Employee Other Occupation
        $source_of_income_private_employee_other_occupation = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_other_occupation');


        //Source Of Income Private Employee Date Hired
        $source_of_income_private_employee_date_hired = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'source_of_income_private_employee_date_hired');


        //Comaker Address Current Barangay
        $comaker_address_current_barangay = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'comaker_address_current_barangay');


        //Comaker Address Current Block Number
        $comaker_address_current_block_number = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'comaker_address_current_block_number');


        //Comaker Address Current City
        $comaker_address_current_city = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'comaker_address_current_city');


        //Comaker Address Current Duration
        $comaker_address_current_duration = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'comaker_address_current_duration');


        //Comaker Address Current Province
        $comaker_address_current_province = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'comaker_address_current_province');


        //Comaker Address Current Street
        $comaker_address_current_street = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'comaker_address_current_street');


        //Comaker Address Current Type
        $comaker_address_current_type = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'comaker_address_current_type');


        //Comaker Personal Info First Name
        $comaker_personal_info_first_name = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'comaker_personal_info_first_name');


        //Comaker Personal Info Last Name
        $comaker_personal_info_last_name = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'comaker_personal_info_last_name');


        //Comaker Personal Info Middle Name
        $comaker_personal_info_middle_name = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'comaker_personal_info_middle_name');


        //Comaker Personal Info Mobile Number
        $comaker_personal_info_mobile_number = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'comaker_personal_info_mobile_number');


        //Comaker Personal Info Occupation
        $comaker_personal_info_occupation = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'comaker_personal_info_occupation');


        //Comaker Personal Info Suffix Name
        $comaker_personal_info_suffix_name = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'comaker_personal_info_suffix_name');


        //Motorcycle Loan Attachment Full Name
        $mc_loan_attachment_full_name = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'mc_loan_attachment_full_name');


        //Motorcycle Loan Attachment Issued Date
        $mc_loan_attachment_issued_date = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'mc_loan_attachment_issued_date');


        //Motorcycle Loan Attachment Expiration Date
        $mc_loan_attachment_expiration_date = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'mc_loan_attachment_expiration_date');


        //Motorcycle Loan Attachment Photo Client
        $mc_loan_attachment_image_photo_client = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'mc_loan_attachment_image_photo_client');


        //Motorcycle Loan Attachment Identification
        $mc_loan_attachment_image_identification = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'mc_loan_attachment_image_identification');


        //Motorcycle Loan Attachment Proof Of Income
        $mc_loan_attachment_image_proof_of_income = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'mc_loan_attachment_image_proof_of_income');


        //Motorcycle Loan Attachment Photo Client Remarks
        $mc_loan_attachment_image_photo_client_remarks = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'mc_loan_attachment_image_photo_client_remarks');

        //Motorcycle Loan Attachment Identification Remarks
        $mc_loan_attachment_image_identification_remarks = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'mc_loan_attachment_image_identification_remarks');

        //Motorcycle Loan Attachment Proof Of Income Remarks
        $mc_loan_attachment_image_proof_of_income_remarks = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'mc_loan_attachment_image_proof_of_income_remarks');



















        //Repeat Borrower
        $repeat_borrower->setData('attribute_set_id', $attributeSetId);
        $repeat_borrower->setData('attribute_group_id', $attributeGroupId);
        $repeat_borrower->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $repeat_borrower->save();


        //Lead Source
        $lead_source->setData('attribute_set_id', $attributeSetId);
        $lead_source->setData('attribute_group_id', $attributeGroupId);
        $lead_source->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $lead_source->save();


        //Availment Purpose
        $availment_purpose->setData('attribute_set_id', $attributeSetId);
        $availment_purpose->setData('attribute_group_id', $attributeGroupId);
        $availment_purpose->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $availment_purpose->save();


        //Client Character Reference Name
        $client_character_reference_name->setData('attribute_set_id', $attributeSetId);
        $client_character_reference_name->setData('attribute_group_id', $attributeGroupId);
        $client_character_reference_name->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_character_reference_name->save();


        //Client Character Reference Relationship
        $client_character_reference_relationship->setData('attribute_set_id', $attributeSetId);
        $client_character_reference_relationship->setData('attribute_group_id', $attributeGroupId);
        $client_character_reference_relationship->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_character_reference_relationship->save();


        //Client Character Reference Contact
        $client_character_reference_contact->setData('attribute_set_id', $attributeSetId);
        $client_character_reference_contact->setData('attribute_group_id', $attributeGroupId);
        $client_character_reference_contact->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_character_reference_contact->save();


        //Client Second Character Reference Name
        $client_second_character_reference_name->setData('attribute_set_id', $attributeSetId);
        $client_second_character_reference_name->setData('attribute_group_id', $attributeGroupId);
        $client_second_character_reference_name->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_second_character_reference_name->save();


        //Client Second Character Reference Relationship
        $client_second_character_reference_relationship->setData('attribute_set_id', $attributeSetId);
        $client_second_character_reference_relationship->setData('attribute_group_id', $attributeGroupId);
        $client_second_character_reference_relationship->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_second_character_reference_relationship->save();


        //Client Second Character Reference Contact
        $client_second_character_reference_contact->setData('attribute_set_id', $attributeSetId);
        $client_second_character_reference_contact->setData('attribute_group_id', $attributeGroupId);
        $client_second_character_reference_contact->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_second_character_reference_contact->save();


        //Client Third Character Reference Name
        $client_third_character_reference_name->setData('attribute_set_id', $attributeSetId);
        $client_third_character_reference_name->setData('attribute_group_id', $attributeGroupId);
        $client_third_character_reference_name->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_third_character_reference_name->save();


        //Client Third Character Reference Relationship
        $client_third_character_reference_relationship->setData('attribute_set_id', $attributeSetId);
        $client_third_character_reference_relationship->setData('attribute_group_id', $attributeGroupId);
        $client_third_character_reference_relationship->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_third_character_reference_relationship->save();


        //Client Third Character Reference Contact
        $client_third_character_reference_contact->setData('attribute_set_id', $attributeSetId);
        $client_third_character_reference_contact->setData('attribute_group_id', $attributeGroupId);
        $client_third_character_reference_contact->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_third_character_reference_contact->save();


        //Client Family Expenditure Food
        $client_family_expenditure_food->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_food->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_food->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_food->save();


        //Client Family Expenditure Education Allowance
        $client_family_expenditure_education_allowance->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_education_allowance->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_education_allowance->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_education_allowance->save();


        //Client Family Expenditure Education Tuition Fee Public
        $client_family_expenditure_education_tuition_fee_public->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_education_tuition_fee_public->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_education_tuition_fee_public->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_education_tuition_fee_public->save();


        //Client Family Expenditure Education Tuition Fee Private
        $client_family_expenditure_education_tuition_fee_private->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_education_tuition_fee_private->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_education_tuition_fee_private->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_education_tuition_fee_private->save();


        //Client Family Expenditure Electricity
        $client_family_expenditure_electricity->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_electricity->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_electricity->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_electricity->save();


        //Client Family Expenditure Water
        $client_family_expenditure_water->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_water->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_water->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_water->save();


        //Client Family Expenditure Electronic Load
        $client_family_expenditure_electronic_load->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_electronic_load->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_electronic_load->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_electronic_load->save();


        //Client Family Expenditure Cable Television
        $client_family_expenditure_cable_television->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_cable_television->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_cable_television->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_cable_television->save();


        //Client Family Expenditure Internet
        $client_family_expenditure_internet->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_internet->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_internet->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_internet->save();


        //Client Family Expenditure Transportation
        $client_family_expenditure_transportation->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_transportation->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_transportation->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_transportation->save();


        //Client Family Expenditure Medical
        $client_family_expenditure_medical->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_medical->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_medical->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_medical->save();


        //Client Family Expenditure Existing Obligation
        $client_family_expenditure_existing_obligation->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_existing_obligation->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_existing_obligation->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_existing_obligation->save();


        //Client Family Expenditure Miscellaneous
        $client_family_expenditure_miscellaneous->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_miscellaneous->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_miscellaneous->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_miscellaneous->save();


        //Client Family Expenditure House Rent
        $client_family_expenditure_house_rent->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_house_rent->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_house_rent->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_house_rent->save();


        //Client Family Expenditure Utilities
        $client_family_expenditure_utilities->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_utilities->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_utilities->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_utilities->save();


        //Client Family Expenditure Others
        $client_family_expenditure_others->setData('attribute_set_id', $attributeSetId);
        $client_family_expenditure_others->setData('attribute_group_id', $attributeGroupId);
        $client_family_expenditure_others->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_family_expenditure_others->save();


        //Client Identification Type
        $client_identification_type->setData('attribute_set_id', $attributeSetId);
        $client_identification_type->setData('attribute_group_id', $attributeGroupId);
        $client_identification_type->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_identification_type->save();


        //Client Identification Number
        $client_identification_number->setData('attribute_set_id', $attributeSetId);
        $client_identification_number->setData('attribute_group_id', $attributeGroupId);
        $client_identification_number->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_identification_number->save();


        //Client Personal Information Beneficiary
        $client_personal_information_beneficiary->setData('attribute_set_id', $attributeSetId);
        $client_personal_information_beneficiary->setData('attribute_group_id', $attributeGroupId);
        $client_personal_information_beneficiary->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_personal_information_beneficiary->save();


        //Client Personal Information Birth Place
        $client_personal_information_birth_place->setData('attribute_set_id', $attributeSetId);
        $client_personal_information_birth_place->setData('attribute_group_id', $attributeGroupId);
        $client_personal_information_birth_place->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_personal_information_birth_place->save();


        //Client Personal Information Nationality
        $client_personal_information_nationality->setData('attribute_set_id', $attributeSetId);
        $client_personal_information_nationality->setData('attribute_group_id', $attributeGroupId);
        $client_personal_information_nationality->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_personal_information_nationality->save();


        //Client Personal Information Civil Status
        $client_personal_information_civil_status->setData('attribute_set_id', $attributeSetId);
        $client_personal_information_civil_status->setData('attribute_group_id', $attributeGroupId);
        $client_personal_information_civil_status->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_personal_information_civil_status->save();


        //Client Personal Information Educational Attainment
        $client_personal_information_educational_attainment->setData('attribute_set_id', $attributeSetId);
        $client_personal_information_educational_attainment->setData('attribute_group_id', $attributeGroupId);
        $client_personal_information_educational_attainment->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $client_personal_information_educational_attainment->save();


        //Client Source Of Income Category Employee
        $source_of_income_category->setData('attribute_set_id', $attributeSetId);
        $source_of_income_category->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_category->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_category->save();


        //Client Source Of Income Type
        $source_of_income_type->setData('attribute_set_id', $attributeSetId);
        $source_of_income_type->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_type->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_type->save();


        //Source Of Income Private Employee Occupation
        $source_of_income_private_employee_occupation->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_occupation->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_occupation->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_occupation->save();


         //Source Of Income Private Employee Nature Of Work
        $source_of_income_private_employee_nature_of_work->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_nature_of_work->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_nature_of_work->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_nature_of_work->save();


        //Source Of Income Private Employee Position
        $source_of_income_private_employee_position->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_position->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_position->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_position->save();


        //Source Of Income Private Employee Tenure
        $source_of_income_private_employee_tenure->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_tenure->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_tenure->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_tenure->save();


        //Source Of Income Private Employee Net Income
        $source_of_income_private_employee_net_income->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_net_income->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_net_income->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_net_income->save();


        //Source Of Income Private Employee Contact Person
        $source_of_income_private_employee_contact_person->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_contact_person->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_contact_person->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_contact_person->save();


        //Source Of Income Private Employee Contact Number
        $source_of_income_private_employee_contact_number->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_contact_number->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_contact_number->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_contact_number->save();


        //Source Of Income Private Employee Company Name
        $source_of_income_private_employee_company_name->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_company_name->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_company_name->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_company_name->save();


        //Source Of Income Private Employee Building Number
        $source_of_income_private_employee_building_number->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_building_number->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_building_number->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_building_number->save();


        //Source Of Income Private Employee Street
        $source_of_income_private_employee_street->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_street->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_street->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_street->save();


        //Source Of Income Private Employee Barangay
        $source_of_income_private_employee_barangay->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_barangay->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_barangay->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_barangay->save();


        //Source Of Income Private Employee City
        $source_of_income_private_employee_city->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_city->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_city->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_city->save();


        //Source Of Income Private Employee Province
        $source_of_income_private_employee_province->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_province->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_province->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_province->save();


        //Source Of Income Private Employee Employment Status
        $source_of_income_private_employee_employment_status->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_employment_status->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_employment_status->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_employment_status->save();


        //Source Of Income Private Employee Other Occupation
        $source_of_income_private_employee_other_occupation->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_other_occupation->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_other_occupation->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_other_occupation->save();


        //Source Of Income Private Employee Date Hired
        $source_of_income_private_employee_date_hired->setData('attribute_set_id', $attributeSetId);
        $source_of_income_private_employee_date_hired->setData('attribute_group_id', $attributeGroupId);
        $source_of_income_private_employee_date_hired->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $source_of_income_private_employee_date_hired->save();


        //Comaker Address Current Barangay
        $comaker_address_current_barangay->setData('attribute_set_id', $attributeSetId);
        $comaker_address_current_barangay->setData('attribute_group_id', $attributeGroupId);
        $comaker_address_current_barangay->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $comaker_address_current_barangay->save();


        //Comaker Address Current Block Number
        $comaker_address_current_block_number->setData('attribute_set_id', $attributeSetId);
        $comaker_address_current_block_number->setData('attribute_group_id', $attributeGroupId);
        $comaker_address_current_block_number->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $comaker_address_current_block_number->save();


        //Comaker Address Current City
        $comaker_address_current_city->setData('attribute_set_id', $attributeSetId);
        $comaker_address_current_city->setData('attribute_group_id', $attributeGroupId);
        $comaker_address_current_city->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $comaker_address_current_city->save();


        //Comaker Address Current Duration
        $comaker_address_current_duration->setData('attribute_set_id', $attributeSetId);
        $comaker_address_current_duration->setData('attribute_group_id', $attributeGroupId);
        $comaker_address_current_duration->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $comaker_address_current_duration->save();


        //Comaker Address Current Province
        $comaker_address_current_province->setData('attribute_set_id', $attributeSetId);
        $comaker_address_current_province->setData('attribute_group_id', $attributeGroupId);
        $comaker_address_current_province->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $comaker_address_current_province->save();


        //Comaker Address Current Street
        $comaker_address_current_street->setData('attribute_set_id', $attributeSetId);
        $comaker_address_current_street->setData('attribute_group_id', $attributeGroupId);
        $comaker_address_current_street->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $comaker_address_current_street->save();


        //Comaker Address Current Type
        $comaker_address_current_type->setData('attribute_set_id', $attributeSetId);
        $comaker_address_current_type->setData('attribute_group_id', $attributeGroupId);
        $comaker_address_current_type->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $comaker_address_current_type->save();


        //Comaker Personal Info First Name
        $comaker_personal_info_first_name->setData('attribute_set_id', $attributeSetId);
        $comaker_personal_info_first_name->setData('attribute_group_id', $attributeGroupId);
        $comaker_personal_info_first_name->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $comaker_personal_info_first_name->save();


        //Comaker Personal Info Last Name
        $comaker_personal_info_last_name->setData('attribute_set_id', $attributeSetId);
        $comaker_personal_info_last_name->setData('attribute_group_id', $attributeGroupId);
        $comaker_personal_info_last_name->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $comaker_personal_info_last_name->save();


        //Comaker Personal Info Middle Name
        $comaker_personal_info_middle_name->setData('attribute_set_id', $attributeSetId);
        $comaker_personal_info_middle_name->setData('attribute_group_id', $attributeGroupId);
        $comaker_personal_info_middle_name->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $comaker_personal_info_middle_name->save();


        //Comaker Personal Info Occupation
        $comaker_personal_info_occupation->setData('attribute_set_id', $attributeSetId);
        $comaker_personal_info_occupation->setData('attribute_group_id', $attributeGroupId);
        $comaker_personal_info_occupation->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $comaker_personal_info_occupation->save();


        //Comaker Personal Info Mobile Number
        $comaker_personal_info_mobile_number->setData('attribute_set_id', $attributeSetId);
        $comaker_personal_info_mobile_number->setData('attribute_group_id', $attributeGroupId);
        $comaker_personal_info_mobile_number->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $comaker_personal_info_mobile_number->save();


        //Comaker Personal Info Suffix Name
        $comaker_personal_info_suffix_name->setData('attribute_set_id', $attributeSetId);
        $comaker_personal_info_suffix_name->setData('attribute_group_id', $attributeGroupId);
        $comaker_personal_info_suffix_name->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $comaker_personal_info_suffix_name->save();


        //Motorcycle Loan Attachment Full Name
        $mc_loan_attachment_full_name->setData('attribute_set_id', $attributeSetId);
        $mc_loan_attachment_full_name->setData('attribute_group_id', $attributeGroupId);
        $mc_loan_attachment_full_name->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $mc_loan_attachment_full_name->save();


        //Motorcycle Loan Attachment Issued Date
        $mc_loan_attachment_issued_date->setData('attribute_set_id', $attributeSetId);
        $mc_loan_attachment_issued_date->setData('attribute_group_id', $attributeGroupId);
        $mc_loan_attachment_issued_date->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $mc_loan_attachment_issued_date->save();


        //Motorcycle Loan Attachment Expiration Date
        $mc_loan_attachment_expiration_date->setData('attribute_set_id', $attributeSetId);
        $mc_loan_attachment_expiration_date->setData('attribute_group_id', $attributeGroupId);
        $mc_loan_attachment_expiration_date->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $mc_loan_attachment_expiration_date->save();


        //Motorcycle Loan Attachment Photo Client
        $mc_loan_attachment_image_photo_client->setData('attribute_set_id', $attributeSetId);
        $mc_loan_attachment_image_photo_client->setData('attribute_group_id', $attributeGroupId);
        $mc_loan_attachment_image_photo_client->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $mc_loan_attachment_image_photo_client->save();


        //Motorcycle Loan Attachment Identification
        $mc_loan_attachment_image_identification->setData('attribute_set_id', $attributeSetId);
        $mc_loan_attachment_image_identification->setData('attribute_group_id', $attributeGroupId);
        $mc_loan_attachment_image_identification->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $mc_loan_attachment_image_identification->save();


        //Motorcycle Loan Attachment Proof Of Income
        $mc_loan_attachment_image_proof_of_income->setData('attribute_set_id', $attributeSetId);
        $mc_loan_attachment_image_proof_of_income->setData('attribute_group_id', $attributeGroupId);
        $mc_loan_attachment_image_proof_of_income->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $mc_loan_attachment_image_proof_of_income->save();


        //Motorcycle Loan Attachment Photo Client Remarks
        $mc_loan_attachment_image_photo_client_remarks->setData('attribute_set_id', $attributeSetId);
        $mc_loan_attachment_image_photo_client_remarks->setData('attribute_group_id', $attributeGroupId);
        $mc_loan_attachment_image_photo_client_remarks->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $mc_loan_attachment_image_photo_client_remarks->save();


        //Motorcycle Loan Attachment Identification Remarks
        $mc_loan_attachment_image_identification_remarks->setData('attribute_set_id', $attributeSetId);
        $mc_loan_attachment_image_identification_remarks->setData('attribute_group_id', $attributeGroupId);
        $mc_loan_attachment_image_identification_remarks->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $mc_loan_attachment_image_identification_remarks->save();


        //Motorcycle Loan Attachment Proof Of Income Remarks
        $mc_loan_attachment_image_proof_of_income_remarks->setData('attribute_set_id', $attributeSetId);
        $mc_loan_attachment_image_proof_of_income_remarks->setData('attribute_group_id', $attributeGroupId);
        $mc_loan_attachment_image_proof_of_income_remarks->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create', 'customer_account_edit']);
        $mc_loan_attachment_image_proof_of_income_remarks->save();








        $setup->endSetup();
    }
}
