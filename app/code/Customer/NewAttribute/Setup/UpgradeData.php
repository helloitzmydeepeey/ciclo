<?php

namespace Customer\NewAttribute\Setup;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    private $customerSetupFactory;

    public function __construct(CustomerSetupFactory $customerSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();


        if (version_compare($context->getVersion(), '1.1.0', '<')) {
            // Add new customer attribute
            $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'client_personal_information_civil_status_first_name',
                [
                    'type' => 'varchar',
                    'label' => 'Client Personal Information Civil Status First Name',
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
                    'is_visible' => 1
                ],
            );

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'client_personal_information_civil_status_middle_name',
                [
                    'type' => 'varchar',
                    'label' => 'Client Personal Information Civil Status Middle Name',
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
                    'is_visible' => 1
                ],
            );

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'client_personal_information_civil_status_last_name',
                [
                    'type' => 'varchar',
                    'label' => 'Client Personal Information Civil Status Last Name',
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
                    'is_visible' => 1
                ],
            );
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'client_personal_information_civil_status_name_suffix',
                [
                    'type' => 'varchar',
                    'label' => 'Client Personal Information Civil Status Name Suffix',
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
                    'is_visible' => 1
                ],
            );
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'client_personal_information_civil_status_birth_place',
                [
                    'type' => 'varchar',
                    'label' => 'Client Personal Information Civil Status Birth Place',
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
                    'is_visible' => 1
                ],
            );
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'client_personal_information_civil_status_birth_date',
                [
                'label' => 'Client Personal Information Civil Status Birth Date',
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
                ],
            );

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'client_personal_information_civil_status_mobile_number',
                [
                    'type' => 'varchar',
                    'label' => 'Client Personal Information Civil Status Mobile Number',
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
                    'is_visible' => 1
                ],
            );
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'client_personal_information_civil_status_email',
                [
                    'type' => 'varchar',
                    'label' => 'Client Personal Information Civil Status Email',
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
                    'is_visible' => 1
                ],
            );

            $installer->endSetup();
        }



        if (version_compare($context->getVersion(), '1.1.1', '<')) {
            // Add new customer attribute
            $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_private_employee_occupation_other',
                [
                    'type' => 'varchar',
                    'label' => 'Source Of Income Private Employee Occupation Other',
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
                    'is_visible' => 1
                ],
            );

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_private_employee_subdivision',
                [
                    'label' => 'Source Of Income Private Employee Subdivision',
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
                ],
            );

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_occupation',
            [
                'label' => 'Source Of Income Government Employee Occupation',
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
            ],);

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_occupation_other',
                [
                    'type' => 'varchar',
                    'label' => 'Source Of Income Government Occupation Other',
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
                    'is_visible' => 1
                ],
            );

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_nature_of_work',
            [
                'label' => 'Source Of Income Government Employee Nature Of Work',
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
            ],
            );
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_position',
                [
                    'label' => 'Source Of Income Government Employee Position',
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
                ],
            );
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_tenure',
            [
                'label' => 'Source Of Income Government Employee Tenure',
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
            ],
            );
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_net_income',
            [
                'label' => 'Source Of Income Government Employee Net Income',
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
            ],
            );

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_contact_person',
                [
                    'label' => 'Source Of Income Government Employee Contact Person',
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
                ],
            );
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_contact_number',
            [
                'label' => 'Source Of Income Government Employee Contact Number',
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
            ],
            );


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_company_name',
                [
                    'label' => 'Source Of Income Government Employee Company Name',
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
                ],
            );






            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_building_number',
                [
                    'label' => 'Source Of Income Government Employee Building Number',
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
                ],
            );


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_subdivision',
                [
                    'label' => 'Source Of Income Government Employee Subdivision',
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
                ],
            );




            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_street',
                [
                    'label' => 'Source Of Income Government Employee Street',
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
                ],
            );








            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_barangay',
            [
                'label' => 'Source Of Income Government Employee Barangay',
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
            ],
            );



            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_city',
            [
                'label' => 'Source Of Income Government Employee City',
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
            ],
            );




            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_province',
            [
                'label' => 'Source Of Income Government Employee Province',
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
            ],
            );


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_government_employee_employment_status',
                [
                    'label' => 'Source Of Income Government Employee Employment Status',
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
                ],
            );

            $installer->endSetup();
        }






        if (version_compare($context->getVersion(), '1.1.2', '<')) {
            // Add new customer attribute
            $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_pension',
            [
                'label' => 'Source Of Income Pension',
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
                'option' => ['values' => ['GSIS','OTHERS','SSS']],
                'formElement' => 'select'
            ],);

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_pension_amount',
                [
                    'type' => 'varchar',
                    'label' => 'Source Of Income Pension Amount',
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
                    'is_visible' => 1
                ],
            );



            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_remittance_sender',
                [
                    'type' => 'varchar',
                    'label' => 'Source Of Income Remittance Sender',
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
                    'is_visible' => 1
                ],
            );


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_remittance_relationship',
            [
                'label' => 'Source Of Income Remittance Relationship',
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
                'option' => ['values' => ['UNCLE','NIECE','FATHER','NEPHEW','BROTHER','MOTHER IN LAW',
                'GRANDMOTHER','FATHER IN LAW','SISTER','SPOUSE','COUSIN','SISTER IN LAW','SON','AUNTIE',
                'BROTHER IN LAW','GRANDFATHER','DAUGHTER','MOTHER']],
                'formElement' => 'select'
            ],);

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_remittance_country',
            [
                'label' => 'Source Of Income Remittance Country',
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
                'option' => ['values' => ["BELARUS"," COMOROS"," NEW CALEDONIA"," GIBRALTAR"," BAHRAIN"," LIBYA"," FINLAND"," TURKS & CAICOS IS"," MONGOLIA","
                AZERBAIJAN"," ARMENIA"," SIERRA LEONE"," UNITED STATES"," BANGLADESH"," VIETNAM"," GAZA STRIP"," SWEDEN"," ERITREA","
                LIBERIA"," LESOTHO"," MARSHALL ISLANDS"," SYRIA"," GUATEMALA"," ST PIERRE & MIQUELON"," VIRGIN ISLANDS"," REUNION","
                WEST BANK"," ARGENTINA"," PAKISTAN"," MAURITANIA"," ANDORRA"," BRAZIL"," MAURITIUS"," LAOS"," PHILIPPINES"," TUNISIA","
                MOZAMBIQUE"," JORDAN"," NIGERIA"," BULGARIA"," NEW ZEALAND"," IRAN"," EL SALVADOR"," CAPE VERDE"," MALAWI"," ISLE OF MAN","
                DENMARK"," DOMINICA"," BELIZE"," ESTONIA"," BURUNDI"," ZAMBIA"," MARTINIQUE"," ALGERIA"," MALDIVES"," HONG KONG"," NETHERLANDS
                ANTILLES"," FRENCH GUIANA"," COTE D'IVOIRE"," BRUNEI"," SAINT VINCENT AND THE GRENADINES"," GERMANY"," ROMANIA"," OMAN","
                BURKINA FASO"," NEPAL"," LIECHTENSTEIN"," ANGOLA"," SPAIN"," BOTSWANA"," KYRGYZSTAN"," SINGAPORE"," SEYCHELLES"," GEORGIA","
                SAUDI ARABIA"," IRELAND"," PALAU"," UNITED KINGDOM"," DJIBOUTI"," CAYMAN ISLANDS"," BURMA"," TUVALU"," HAITI"," QATAR"," KUWAIT","
                MICRONESIA"," FED. ST."," TONGA"," PARAGUAY"," CHAD"," THAILAND"," PORTUGAL"," ICELAND"," UKRAINE"," SOLOMON ISLANDS"," RUSSIA","
                MONTSERRAT"," KENYA"," LUXEMBOURG"," GUINEA-BISSAU"," BRITISH VIRGIN IS."," IRAQ"," SUDAN"," TRINIDAD & TOBAGO"," MOLDOVA","
                LEBANON"," CUBA"," SLOVAKIA"," JAPAN"," COSTA RICA"," POLAND"," SAO TOME & PRINCIPE"," ANGUILLA"," ETHIOPIA"," SOUTH AFRICA","
                SWITZERLAND"," MAYOTTE"," FAROE ISLANDS"," GABON"," LITHUANIA"," UZBEKISTAN"," NAMIBIA"," CAMBODIA"," URUGUAY"," ZIMBABWE","
                NIGER"," SOMALIA"," EAST TIMOR"," GRENADA"," SAMOA"," UGANDA"," FRENCH POLYNESIA"," BAHAMAS"," THE"," JAMAICA"," PANAMA"," MOROCCO","
                BELGIUM"," RWANDA"," SRI LANKA"," MACEDONIA"," YEMEN"," PUERTO RICO"," CANADA"," INDIA"," GAMBIA"," THE"," PAPUA NEW GUINEA","
                MEXICO"," TAJIKISTAN"," AFGHANISTAN"," CHINA"," VENEZUELA"," DOMINICAN REPUBLIC"," EQUATORIAL GUINEA"," UNITED ARAB EMIRATES","
                BOSNIA & HERZEGOVINA"," AMERICAN SAMOA"," INDONESIA"," CONGO"," DEM. REP."," MACAU"," GUADELOUPE"," ISRAEL"," SAN MARINO","
                ANTIGUA & BARBUDA"," AUSTRALIA"," ARUBA"," SAINT LUCIA"," CYPRUS"," BENIN"," AUSTRIA"," FIJI"," SAINT HELENA"," TURKMENISTAN","
                GREENLAND"," TANZANIA"," N. MARIANA ISLANDS"," CROATIA"," TOGO"," CONGO"," REPUB. OF THE"," KAZAKHSTAN"," HUNGARY"," KOREA"," SOUTH","
                GUINEA"," MALTA"," BOLIVIA"," VANUATU"," NAURU"," SLOVENIA"," HONDURAS"," ALBANIA"," SAINT KITTS & NEVIS"," JERSEY"," KIRIBATI","
                CAMEROON"," CHILE"," MONACO"," CENTRAL AFRICAN REP."," MALI"," COOK ISLANDS"," TURKEY"," SURINAME"," NETHERLANDS"," FRANCE","
                ECUADOR"," CZECH REPUBLIC"," MADAGASCAR"," TAIWAN"," COLOMBIA"," GUYANA"," NICARAGUA"," WESTERN SAHARA"," GUERNSEY"," BARBADOS","
                EGYPT"," GHANA"," SWAZILAND"," MALAYSIA"," WALLIS AND FUTUNA"," PERU"," BHUTAN"," NORWAY"," GUAM"," LATVIA"," ITALY"," KOREA"," NORTH","
                SENEGAL"," BERMUDA"," SERBIA"," GREECE" ]],
                'formElement' => 'select'
            ],);

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_remittance_amount',
                [
                    'type' => 'varchar',
                    'label' => 'Source Of Income Remittance Amount',
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
                    'is_visible' => 1
                ],
            );


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_self_employed_occupation',
            [
                'label' => 'Source Of Income Self Employed Occupation',
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
                'option' => ['values' => ['BEAUTICIAN', 'CARPENTER', 'CONSTRUCTION WORKER - SELF EMPLOYED', 'ELECTRICIAN', 'FISH VENDOR',
                 'JEEPNEY DRIVER - OPERATOR', 'JEEPNEY DRIVER ONLY', 'MECHANIC - SELF EMPLOYED', 'TAXI DRIVER', 'TECHNICIAN - SELF EMPLOYED',
                 'TRICYCLE DRIVER', 'TRICYCLE DRIVER - OPERATOR', 'WELDER - SELF EMPLOYED', 'BUTCHER', 'FARMER', 'FISHERMAN', 'HABAL HABAL DRIVER',
                 'LABANDERA', 'MARKET VENDOR', 'NATASHA/AVON DEALER', 'PAINTER', 'VULCANISING']],
                'formElement' => 'select'
            ],);


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_self_employed_type',
            [
                'label' => 'Source Of Income Self Employed Type',
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
            ],
            );


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_self_employed_years_of_operation',
            [
                'label' => 'Source Of Income Self Employed Years Of Operation',
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
            ],
            );

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_self_employed_net_income',
            [
                'label' => 'Source Of Income Self Employed Net Income',
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
            ],
            );



            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_self_employed_contact_person',
                [
                    'label' => 'Source Of Income Self Employed Contact Person',
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
                ],
            );
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_self_employed_contact_number',
            [
                'label' => 'Source Of Income Self Employed Contact Number',
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
            ],
            );


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_self_employed_name',
                [
                    'label' => 'Source Of Income Self Employed Name',
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
                ],
            );






            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_self_employed_building_number',
                [
                    'label' => 'Source Of Income Self Employed Building Number',
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
                ],
            );


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_self_employed_subdivision',
                [
                    'label' => 'Source Of Income Self Employed Subdivision',
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
                ],
            );




            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_self_employed_street',
                [
                    'label' => 'Source Of Income Self Employed Street',
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
                ],
            );








            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_self_employed_barangay',
            [
                'label' => 'Source Of Income Self Employed Barangay',
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
            ],
            );



            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_self_employed_city',
            [
                'label' => 'Source Of Income Self Employed City',
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
            ],
            );




            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_self_employed_province',
            [
                'label' => 'Source Of Income Self Employed Province',
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
            ],
            );



            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_business_occupation',
            [
                'label' => 'Source Of Income Business Occupation',
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
                'option' => ['values' => ['APARTMENT/ROOM FOR RENT BUSINESS', 'BAKESHOP/BAKERY', 'BARBER SHOP OWNER', 'CANTEEN OWNER',
                'CARINDERIA OWNER', 'CATERING BUSINESS', 'COMPUTER SHOP OWNER', 'FRUIT VENDOR - STALL OWNER', 'JEEPNEY OPERATOR',
                'JUNKSHOP OWNER', 'MEAT SHOP OWNER', 'POULTRY BUSINESS', 'RESTAURANT OWNER', 'ROLLING STORE VENDOR', 'RTW CLOTHES SHOP OWNER',
                 'SARI-SARI STORE OWNER', 'TAILORING BUSINESS', 'TRICYCLE - OPERATOR', 'VEGETABLE VENDOR - STALL OWNER', 'WATER - REFILLING STATION',
                 'BUY & SELL', 'GROCERY OWNER', 'JUNK SHOP', 'LAUNDRY SHOP', 'LIVESTOCK FARMER', 'ONLINE RESELLER', 'PISONET', 'RICE DEALER',
                  'SAND & GRAVEL SUPPLIER', 'SPARE PARTS STORE', 'VIDEOKE RENTAL']],
                'formElement' => 'select'
            ],);


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_business_type',
            [
                'label' => 'Source Of Income Business Type',
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
                'MANUFACTURE OF BEVERAGES','CONSUMPTION-MOTORCYCLE','ACCOMMODATION SERVICE','WHOLESALE/RETAIL TRADE OF GOODS','FINANCIAL SERVICE',
                'HUMAN HEALTH','REAL ESTATE ACTIVITES','RETAIL TRADE OF GOODS','WATER TRANSPORTATION','OTHER PERSONAL SERVICE ACTIVITIES',
                'MANUFACTURE OF FOOD PRODUCTS','MANUFACTURE OF FURNITURE','ANIMAL PRODUCTION','INDIVIDUAL-HOUSING','CONSTRUCTION OF BUILDINGS',
                'LIB.,ARCH.,MUSEUMS &OTHR CULTRL ACT','WHLSALE&RET&REP OF MTR VEH &MTR CYC','EDUCATION/SCHOOL','MANUFACTURE OF LEATHER',
                'CREATIVE, ARTS AND ENTERTAINMENT','WAREHOUSING & SUPP ACT. FOR TRANSP.','TRANSPORT SERVICE','INSURANCE SERVICE',
                'TRVL AGN,TOUR OPR,RES SERV&REL ACT','RESIDENTIAL CARE','POSTAL AND COURIER','PRODUCTION ACTIVITIES OF HOUSEHOLDS',
                'CROP PRODUCTION','LAND TRANSPORTATION','FOOD AND BEVERAGE SERVICE','SPRTS ACT. & AMUSEMENT & RECREATION','RENTAL AND LEASING ACTIVITIES',
                'OFFICE ADMINISTRATIVE & OFFICE SUPP','SERV. TO BUILDINGS & LANDSCAPE ACT.','OTHER PROF., SCIENT. & TECH ACT.',
                'MANUFACTURE OF WOOD & WOOD PRODUCTS','CONSUMPTION-SALARY']],
                'formElement' => 'select'
            ],
            );


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_business_years_of_operation',
            [
                'label' => 'Source Of Income Business Years Of Operation',
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
            ],
            );

            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_business_net_income',
            [
                'label' => 'Source Of Income Business Net Income',
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
            ],
            );



            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_business_contact_person',
                [
                    'label' => 'Source Of Income Business Contact Person',
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
                ],
            );
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_business_contact_number',
            [
                'label' => 'Source Of Income Business Contact Number',
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
            ],
            );


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_business_name',
                [
                    'label' => 'Source Of Income Business Name',
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
                ],
            );






            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_business_building_number',
                [
                    'label' => 'Source Of Income Business Building Number',
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
                ],
            );


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_business_subdivision',
                [
                    'label' => 'Source Of Income Business Subdivision',
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
                ],
            );




            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_business_street',
                [
                    'label' => 'Source Of Income Business Street',
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
                ],
            );








            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_business_barangay',
            [
                'label' => 'Source Of Income Business Barangay',
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
            ],
            );



            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_business_city',
            [
                'label' => 'Source Of Income Business City',
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
            ],
            );




            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_business_province',
            [
                'label' => 'Source Of Income Business Province',
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
            ],
            );


            $installer->endSetup();
        }





        if (version_compare($context->getVersion(), '1.1.3', '<')) {
            // Add new customer attribute


            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_private_employee_second_nature_of_work',
            [
                'label' => 'Source Of Income Private Employee Second Nature Of Work',
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
            ],
            );




            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_private_employee_second_position',
            [
                'label' => 'Source Of Income Private Employee Second Position',
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
            ],
            );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_second_tenure',
        [
            'label' => 'Source Of Income Private Employee Second Tenure',
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
        ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_second_net_income',
        [
            'label' => 'Source Of Income Private Employee Second Net Income',
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
        ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_second_contact_person',
        [
            'label' => 'Source Of Income Private Employee Second Contact Person',
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
        ],
        );



        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_second_contact_number',
        [
            'label' => 'Source Of Income Private Employee Second Contact Number',
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
        ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_second_company_name',
        [
            'label' => 'Source Of Income Private Employee Second Company Name',
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
        ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_second_building_number',
        [
            'label' => 'Source Of Income Private Employee Second Building Number',
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
        ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_second_street',
        [
            'label' => 'Source Of Income Private Employee Second Street',
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
        ],
        );

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_second_subdivision',
            [
                'label' => 'Source Of Income Private Employee Second Subdivision',
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
            ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_second_barangay',
            [
                'label' => 'Source Of Income Private Employee Second Barangay',
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
            ],
        );



        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_second_city',
            [
                'label' => 'Source Of Income Private Employee Second City',
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
            ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_second_province',
            [
                'label' => 'Source Of Income Private Employee Second Province',
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
            ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_employment_second_status',
            [
                'label' => 'Source Of Income Private Employee Second Tenure',
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
            ],
        );

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_second_occupation_other',
            [
                'type' => 'varchar',
                'label' => 'Source Of Income Private Employee Second Occupation Other',
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
                'is_visible' => 1
            ],
        );



        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_private_employee_second_date_hired',
            [
                'label' => 'Source Of Income Private Employee Second Date Hired',
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
            ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_occupation',
        [
            'label' => 'Source Of Income Government Employee Second Occupation',
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
        ],);

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_occupation_other',
            [
                'type' => 'varchar',
                'label' => 'Source Of Income Government Occupation Other',
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
                'is_visible' => 1
            ],
        );

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_nature_of_work',
        [
            'label' => 'Source Of Income Government Employee Second Nature Of Work',
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
        ],
        );
        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_position',
            [
                'label' => 'Source Of Income Government Employee Second Position',
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
            ],
        );
        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_tenure',
        [
            'label' => 'Source Of Income Government Employee Second Tenure',
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
        ],
        );
        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_net_income',
        [
            'label' => 'Source Of Income Government Employee Second Net Income',
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
        ],
        );

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_contact_person',
            [
                'label' => 'Source Of Income Government Employee Second Contact Person',
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
            ],
        );
        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_contact_number',
        [
            'label' => 'Source Of Income Government Employee Second Contact Number',
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
        ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_company_name',
            [
                'label' => 'Source Of Income Government Employee Second Company Name',
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
            ],
        );






        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_building_number',
            [
                'label' => 'Source Of Income Government Employee Second Building Number',
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
            ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_subdivision',
            [
                'label' => 'Source Of Income Government Employee Second Subdivision',
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
            ],
        );




        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_street',
            [
                'label' => 'Source Of Income Government Employee Second Street',
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
            ],
        );








        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_barangay',
        [
            'label' => 'Source Of Income Government Employee Second Barangay',
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
        ],
        );



        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_city',
        [
            'label' => 'Source Of Income Government Employee Second City',
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
        ],
        );




        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_province',
        [
            'label' => 'Source Of Income Government Employee Second Province',
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
        ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_status',
            [
                'label' => 'Source Of Income Government Employee Second Status',
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
            ],
        );



        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_second_date_hired',
            [
                'label' => 'Source Of Income Government Employee Second Date Hired',
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
            ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_government_employee_date_hired',
            [
                'label' => 'Source Of Income Government Employee Date Hired',
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
            ],
        );





        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_pension',
        [
            'label' => 'Source Of Income Second Pension',
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
            'option' => ['values' => ['GSIS','OTHERS','SSS']],
            'formElement' => 'select'
        ],);

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_pension_amount',
            [
                'type' => 'varchar',
                'label' => 'Source Of Income Second Pension Amount',
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
                'is_visible' => 1
            ],
        );



        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_remittance_sender',
            [
                'type' => 'varchar',
                'label' => 'Source Of Income Second Remittance Sender',
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
                'is_visible' => 1
            ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_remittance_relationship',
        [
            'label' => 'Source Of Income Second Remittance Relationship',
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
            'option' => ['values' => ['UNCLE','NIECE','FATHER','NEPHEW','BROTHER','MOTHER IN LAW',
            'GRANDMOTHER','FATHER IN LAW','SISTER','SPOUSE','COUSIN','SISTER IN LAW','SON','AUNTIE',
            'BROTHER IN LAW','GRANDFATHER','DAUGHTER','MOTHER']],
            'formElement' => 'select'
        ],);

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_remittance_country',
        [
            'label' => 'Source Of Income Second Remittance Country',
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
            'option' => ['values' => ["BELARUS"," COMOROS"," NEW CALEDONIA"," GIBRALTAR"," BAHRAIN"," LIBYA"," FINLAND"," TURKS & CAICOS IS"," MONGOLIA","
            AZERBAIJAN"," ARMENIA"," SIERRA LEONE"," UNITED STATES"," BANGLADESH"," VIETNAM"," GAZA STRIP"," SWEDEN"," ERITREA","
            LIBERIA"," LESOTHO"," MARSHALL ISLANDS"," SYRIA"," GUATEMALA"," ST PIERRE & MIQUELON"," VIRGIN ISLANDS"," REUNION","
            WEST BANK"," ARGENTINA"," PAKISTAN"," MAURITANIA"," ANDORRA"," BRAZIL"," MAURITIUS"," LAOS"," PHILIPPINES"," TUNISIA","
            MOZAMBIQUE"," JORDAN"," NIGERIA"," BULGARIA"," NEW ZEALAND"," IRAN"," EL SALVADOR"," CAPE VERDE"," MALAWI"," ISLE OF MAN","
            DENMARK"," DOMINICA"," BELIZE"," ESTONIA"," BURUNDI"," ZAMBIA"," MARTINIQUE"," ALGERIA"," MALDIVES"," HONG KONG"," NETHERLANDS
            ANTILLES"," FRENCH GUIANA"," COTE D'IVOIRE"," BRUNEI"," SAINT VINCENT AND THE GRENADINES"," GERMANY"," ROMANIA"," OMAN","
            BURKINA FASO"," NEPAL"," LIECHTENSTEIN"," ANGOLA"," SPAIN"," BOTSWANA"," KYRGYZSTAN"," SINGAPORE"," SEYCHELLES"," GEORGIA","
            SAUDI ARABIA"," IRELAND"," PALAU"," UNITED KINGDOM"," DJIBOUTI"," CAYMAN ISLANDS"," BURMA"," TUVALU"," HAITI"," QATAR"," KUWAIT","
            MICRONESIA"," FED. ST."," TONGA"," PARAGUAY"," CHAD"," THAILAND"," PORTUGAL"," ICELAND"," UKRAINE"," SOLOMON ISLANDS"," RUSSIA","
            MONTSERRAT"," KENYA"," LUXEMBOURG"," GUINEA-BISSAU"," BRITISH VIRGIN IS."," IRAQ"," SUDAN"," TRINIDAD & TOBAGO"," MOLDOVA","
            LEBANON"," CUBA"," SLOVAKIA"," JAPAN"," COSTA RICA"," POLAND"," SAO TOME & PRINCIPE"," ANGUILLA"," ETHIOPIA"," SOUTH AFRICA","
            SWITZERLAND"," MAYOTTE"," FAROE ISLANDS"," GABON"," LITHUANIA"," UZBEKISTAN"," NAMIBIA"," CAMBODIA"," URUGUAY"," ZIMBABWE","
            NIGER"," SOMALIA"," EAST TIMOR"," GRENADA"," SAMOA"," UGANDA"," FRENCH POLYNESIA"," BAHAMAS"," THE"," JAMAICA"," PANAMA"," MOROCCO","
            BELGIUM"," RWANDA"," SRI LANKA"," MACEDONIA"," YEMEN"," PUERTO RICO"," CANADA"," INDIA"," GAMBIA"," THE"," PAPUA NEW GUINEA","
            MEXICO"," TAJIKISTAN"," AFGHANISTAN"," CHINA"," VENEZUELA"," DOMINICAN REPUBLIC"," EQUATORIAL GUINEA"," UNITED ARAB EMIRATES","
            BOSNIA & HERZEGOVINA"," AMERICAN SAMOA"," INDONESIA"," CONGO"," DEM. REP."," MACAU"," GUADELOUPE"," ISRAEL"," SAN MARINO","
            ANTIGUA & BARBUDA"," AUSTRALIA"," ARUBA"," SAINT LUCIA"," CYPRUS"," BENIN"," AUSTRIA"," FIJI"," SAINT HELENA"," TURKMENISTAN","
            GREENLAND"," TANZANIA"," N. MARIANA ISLANDS"," CROATIA"," TOGO"," CONGO"," REPUB. OF THE"," KAZAKHSTAN"," HUNGARY"," KOREA"," SOUTH","
            GUINEA"," MALTA"," BOLIVIA"," VANUATU"," NAURU"," SLOVENIA"," HONDURAS"," ALBANIA"," SAINT KITTS & NEVIS"," JERSEY"," KIRIBATI","
            CAMEROON"," CHILE"," MONACO"," CENTRAL AFRICAN REP."," MALI"," COOK ISLANDS"," TURKEY"," SURINAME"," NETHERLANDS"," FRANCE","
            ECUADOR"," CZECH REPUBLIC"," MADAGASCAR"," TAIWAN"," COLOMBIA"," GUYANA"," NICARAGUA"," WESTERN SAHARA"," GUERNSEY"," BARBADOS","
            EGYPT"," GHANA"," SWAZILAND"," MALAYSIA"," WALLIS AND FUTUNA"," PERU"," BHUTAN"," NORWAY"," GUAM"," LATVIA"," ITALY"," KOREA"," NORTH","
            SENEGAL"," BERMUDA"," SERBIA"," GREECE" ]],
            'formElement' => 'select'
        ],);

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_remittance_amount',
            [
                'type' => 'varchar',
                'label' => 'Source Of Income Second Remittance Amount',
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
                'is_visible' => 1
            ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_self_employed_occupation',
        [
            'label' => 'Source Of Income Second Self Employed Occupation',
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
            'option' => ['values' => ['BEAUTICIAN', 'CARPENTER', 'CONSTRUCTION WORKER - SELF EMPLOYED', 'ELECTRICIAN', 'FISH VENDOR',
             'JEEPNEY DRIVER - OPERATOR', 'JEEPNEY DRIVER ONLY', 'MECHANIC - SELF EMPLOYED', 'TAXI DRIVER', 'TECHNICIAN - SELF EMPLOYED',
             'TRICYCLE DRIVER', 'TRICYCLE DRIVER - OPERATOR', 'WELDER - SELF EMPLOYED', 'BUTCHER', 'FARMER', 'FISHERMAN', 'HABAL HABAL DRIVER',
             'LABANDERA', 'MARKET VENDOR', 'NATASHA/AVON DEALER', 'PAINTER', 'VULCANISING']],
            'formElement' => 'select'
        ],);


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_self_employed_type',
        [
            'label' => 'Source Of Income Second Self Employed Type',
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
        ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_self_employed_years_of_operation',
        [
            'label' => 'Source Of Income Second Self Employed Years Of Operation',
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
        ],
        );

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_self_employed_net_income',
        [
            'label' => 'Source Of Income Second Self Employed Net Income',
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
        ],
        );



        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_self_employed_contact_person',
            [
                'label' => 'Source Of Income Second Self Employed Contact Person',
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
            ],
        );
        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_self_employed_contact_number',
        [
            'label' => 'Source Of Income Second Self Employed Contact Number',
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
        ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_self_employed_name',
            [
                'label' => 'Source Of Income Second Self Employed Name',
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
            ],
        );






        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_self_employed_building_number',
            [
                'label' => 'Source Of Income Second Self Employed Building Number',
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
            ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_self_employed_subdivision',
            [
                'label' => 'Source Of Income Second Self Employed Subdivision',
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
            ],
        );




        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_self_employed_street',
            [
                'label' => 'Source Of Income Second Self Employed Street',
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
            ],
        );








        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_self_employed_barangay',
        [
            'label' => 'Source Of Income Second Self Employed Barangay',
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
        ],
        );



        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_self_employed_city',
        [
            'label' => 'Source Of Income Second Self Employed City',
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
        ],
        );




        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_self_employed_province',
        [
            'label' => 'Source Of Income Second Self Employed Province',
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
        ],
        );




        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_business_occupation',
        [
            'label' => 'Source Of Income Second Business Occupation',
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
            'option' => ['values' => ['APARTMENT/ROOM FOR RENT BUSINESS', 'BAKESHOP/BAKERY', 'BARBER SHOP OWNER', 'CANTEEN OWNER',
            'CARINDERIA OWNER', 'CATERING BUSINESS', 'COMPUTER SHOP OWNER', 'FRUIT VENDOR - STALL OWNER', 'JEEPNEY OPERATOR',
            'JUNKSHOP OWNER', 'MEAT SHOP OWNER', 'POULTRY BUSINESS', 'RESTAURANT OWNER', 'ROLLING STORE VENDOR', 'RTW CLOTHES SHOP OWNER',
             'SARI-SARI STORE OWNER', 'TAILORING BUSINESS', 'TRICYCLE - OPERATOR', 'VEGETABLE VENDOR - STALL OWNER', 'WATER - REFILLING STATION',
             'BUY & SELL', 'GROCERY OWNER', 'JUNK SHOP', 'LAUNDRY SHOP', 'LIVESTOCK FARMER', 'ONLINE RESELLER', 'PISONET', 'RICE DEALER',
              'SAND & GRAVEL SUPPLIER', 'SPARE PARTS STORE', 'VIDEOKE RENTAL']],
            'formElement' => 'select'
        ],);


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_business_type',
        [
            'label' => 'Source Of Income Second Business Type',
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
            'MANUFACTURE OF BEVERAGES','CONSUMPTION-MOTORCYCLE','ACCOMMODATION SERVICE','WHOLESALE/RETAIL TRADE OF GOODS','FINANCIAL SERVICE',
            'HUMAN HEALTH','REAL ESTATE ACTIVITES','RETAIL TRADE OF GOODS','WATER TRANSPORTATION','OTHER PERSONAL SERVICE ACTIVITIES',
            'MANUFACTURE OF FOOD PRODUCTS','MANUFACTURE OF FURNITURE','ANIMAL PRODUCTION','INDIVIDUAL-HOUSING','CONSTRUCTION OF BUILDINGS',
            'LIB.,ARCH.,MUSEUMS &OTHR CULTRL ACT','WHLSALE&RET&REP OF MTR VEH &MTR CYC','EDUCATION/SCHOOL','MANUFACTURE OF LEATHER',
            'CREATIVE, ARTS AND ENTERTAINMENT','WAREHOUSING & SUPP ACT. FOR TRANSP.','TRANSPORT SERVICE','INSURANCE SERVICE',
            'TRVL AGN,TOUR OPR,RES SERV&REL ACT','RESIDENTIAL CARE','POSTAL AND COURIER','PRODUCTION ACTIVITIES OF HOUSEHOLDS',
            'CROP PRODUCTION','LAND TRANSPORTATION','FOOD AND BEVERAGE SERVICE','SPRTS ACT. & AMUSEMENT & RECREATION','RENTAL AND LEASING ACTIVITIES',
            'OFFICE ADMINISTRATIVE & OFFICE SUPP','SERV. TO BUILDINGS & LANDSCAPE ACT.','OTHER PROF., SCIENT. & TECH ACT.',
            'MANUFACTURE OF WOOD & WOOD PRODUCTS','CONSUMPTION-SALARY']],
            'formElement' => 'select'
        ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_business_years_of_operation',
        [
            'label' => 'Source Of Income Second Business Years Of Operation',
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
        ],
        );

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_business_net_income',
        [
            'label' => 'Source Of Income Second Business Net Income',
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
        ],
        );



        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_business_contact_person',
            [
                'label' => 'Source Of Income Second Business Contact Person',
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
            ],
        );
        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_business_contact_number',
        [
            'label' => 'Source Of Income Second Business Contact Number',
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
        ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_business_name',
            [
                'label' => 'Source Of Income Second Business Name',
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
            ],
        );






        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_business_building_number',
            [
                'label' => 'Source Of Income Second Business Building Number',
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
            ],
        );


        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_business_subdivision',
            [
                'label' => 'Source Of Income Second Business Subdivision',
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
            ],
        );




        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_business_street',
            [
                'label' => 'Source Of Income Second Business Street',
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
            ],
        );








        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_business_barangay',
        [
            'label' => 'Source Of Income Second Business Barangay',
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
        ],
        );



        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_business_city',
        [
            'label' => 'Source Of Income Second Business City',
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
        ],
        );




        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_business_province',
        [
            'label' => 'Source Of Income Second Business Province',
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
        ],
        );



        $customerSetup->addAttribute(
            Customer::ENTITY,
            'source_of_income_second_category',
        [
            'label' => 'Source Of Income Second Category',
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
        ],);


        $installer->endSetup();
        }

        if (version_compare($context->getVersion(), '1.1.7', '<')) {
            $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
            $customerSetup->addAttribute(Customer::ENTITY,
            'source_of_income_private_employee_second_occupation',
            [
                'label' => 'Source Of Income Second Category Employee',
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
            ],
        );
        $installer->endSetup();
        }


        if (version_compare($context->getVersion(), '1.1.8', '<')) {
            $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'source_of_income_private_employee_second_other_occupation',
                [
                    'type' => 'varchar',
                    'label' => 'Source Of Income Private Employee Second Other Occupation',
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
                    'is_visible' => 1
                ],
            );


            $installer->endSetup();
        }


    }





}
