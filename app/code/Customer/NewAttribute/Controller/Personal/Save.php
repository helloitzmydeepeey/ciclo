<?php
namespace Customer\NewAttribute\Controller\Personal;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Customer\Model\Session;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Magento\Framework\Stdlib\Cookie\CookieMetadataFactory;
use Magento\Framework\Stdlib\Cookie\CookieMetadataInterface;
class Save extends Action
{
    protected $resultRedirectFactory;
    protected $customerSession;
    protected $customerFactory;
    protected $messageManager;
    protected $cookieManager;
    protected $cookieMetadataFactory;

    public function __construct(
        Context $context,
        ResultFactory $resultFactory,
        Session $customerSession,
        CustomerFactory $customerFactory,
        ManagerInterface $messageManager,
        CookieManagerInterface $cookieManager,
        CookieMetadataFactory $cookieMetadataFactory
    ) {
        $this->resultRedirectFactory = $resultFactory;
        $this->customerSession = $customerSession;
        $this->customerFactory = $customerFactory;
        $this->messageManager = $messageManager;
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
                $client_personal_information_beneficiary = $postData['client_personal_information_beneficiary'];
                $client_personal_information_birth_place = $postData['client_personal_information_birth_place'];
                $client_personal_information_nationality = $postData['nationalitydrop'];
                $client_personal_information_civil_status = $postData['client_personal_information_civil_status'];
                $client_personal_information_civil_status_first_name = $postData['client_personal_information_civil_status_first_name'];
                $client_personal_information_civil_status_middle_name = $postData['client_personal_information_civil_status_middle_name'];
                $client_personal_information_civil_status_last_name = $postData['client_personal_information_civil_status_last_name'];
                $client_personal_information_civil_status_name_suffix = $postData['client_personal_information_civil_status_name_suffix'];
                $client_personal_information_civil_status_birth_place = $postData['client_personal_information_civil_status_birth_place'];
                $client_personal_information_civil_status_birth_date = $postData['client_personal_information_civil_status_birth_date'];
                $client_personal_information_civil_status_mobile_number = $postData['client_personal_information_civil_status_mobile_number'];
                $client_personal_information_civil_status_email = $postData['client_personal_information_civil_status_email'];
                $client_personal_information_educational_attainment = $postData['client_personal_information_educational_attainment'];
                $source_of_income_category = $postData['source_of_income_category'];
                $source_of_income_type = 4913;
                
                if($client_personal_information_civil_status!=4893){
                    $customer->setData('client_personal_information_civil_status_first_name',$client_personal_information_civil_status_first_name);
                    $customer->setData('client_personal_information_civil_status_middle_name',$client_personal_information_civil_status_middle_name);
                    $customer->setData('client_personal_information_civil_status_last_name',$client_personal_information_civil_status_last_name);
                    $customer->setData('client_personal_information_civil_status_name_suffix',$client_personal_information_civil_status_name_suffix);
                    $customer->setData('client_personal_information_civil_status_birth_place',$client_personal_information_civil_status_birth_place);
                    $customer->setData('client_personal_information_civil_status_birth_date',$client_personal_information_civil_status_birth_date);
                    $customer->setData('client_personal_information_civil_status_mobile_number',$client_personal_information_civil_status_mobile_number);
                    $customer->setData('client_personal_information_civil_status_email',$client_personal_information_civil_status_email);
                    }else{
                        $customer->setData('client_personal_information_civil_status_first_name','');
                        $customer->setData('client_personal_information_civil_status_middle_name','');
                        $customer->setData('client_personal_information_civil_status_last_name','');
                        $customer->setData('client_personal_information_civil_status_name_suffix','');
                        $customer->setData('client_personal_information_civil_status_birth_place','');
                        $customer->setData('client_personal_information_civil_status_birth_date','');
                        $customer->setData('client_personal_information_civil_status_mobile_number','');
                        $customer->setData('client_personal_information_civil_status_email','');
                    }

                $customer->setData('client_personal_information_beneficiary', $client_personal_information_beneficiary);
                $customer->setData('client_personal_information_birth_place', $client_personal_information_birth_place);
                $customer->setData('client_personal_information_nationality', $client_personal_information_nationality);
                $customer->setData('client_personal_information_civil_status', $client_personal_information_civil_status);
                $customer->setData('client_personal_information_educational_attainment', $client_personal_information_educational_attainment);
                $customer->setData('source_of_income_type', $source_of_income_type);
                $customer->setData('source_of_income_category', $source_of_income_category);


                $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/saveerror.log');
                $logger = new \Zend\Log\Logger();
                $logger->addWriter($writer);
                $logger->info('BEFORE IF');
        
                if($source_of_income_category==4911){
               
                $source_of_income_private_employee_other_occupation =$postData['source_of_income_private_employee_other_occupation'];


                $customer->setData('source_of_income_private_employee_other_occupation', $source_of_income_private_employee_other_occupation);

                $customer->setData('source_of_income_government_employee_occupation', '');
                $customer->setData('source_of_income_government_employee_nature_of_work', '');
                $customer->setData('source_of_income_government_employee_position', '');
                $customer->setData('source_of_income_government_employee_tenure', '');
                $customer->setData('source_of_income_government_employee_net_income', '');
                $customer->setData('source_of_income_government_employee_contact_person', '');
                $customer->setData('source_of_income_government_employee_contact_number', '');
                $customer->setData('source_of_income_government_employee_company_name', '');
                $customer->setData('source_of_income_government_employee_building_number', '');
                //$customer->setData('source_of_income_government_employee_subdivision', '');
                $customer->setData('source_of_income_government_employee_street', '');
                $customer->setData('source_of_income_government_employee_province', '');
                $customer->setData('source_of_income_government_employee_city', '');
                $customer->setData('source_of_income_government_employee_barangay', '');
                $customer->setData('source_of_income_government_employee_date_hired', '');
                $customer->setData('source_of_income_government_employee_employment_status', '');
                $customer->setData('source_of_income_government_employee_occupation_other', '');


                $customer->setData('source_of_income_pension', '');
                $customer->setData('source_of_income_pension_amount', '');


                $customer->setData('source_of_income_self_employed_occupation','');
                $customer->setData('source_of_income_self_employed_type','');
                $customer->setData('source_of_income_self_employed_years_of_operation','');
                $customer->setData('source_of_income_self_employed_net_income','');
                $customer->setData('source_of_income_self_employed_contact_person','');
                $customer->setData('source_of_income_self_employed_contact_number','');
                $customer->setData('source_of_income_self_employed_name','');
                $customer->setData('source_of_income_self_employed_building_number','');
               // $customer->setData('source_of_income_self_employed_subdivision','');
                $customer->setData('source_of_income_self_employed_street','');
                $customer->setData('source_of_income_self_employed_barangay','');
                $customer->setData('source_of_income_self_employed_city','');
                $customer->setData('source_of_income_self_employed_province','');


                $customer->setData('source_of_income_private_employee_occupation', '');
                $customer->setData('source_of_income_private_employee_nature_of_work', '');
                $customer->setData('source_of_income_private_employee_position', '');
                $customer->setData('source_of_income_private_employee_tenure', '');
                $customer->setData('source_of_income_private_employee_net_income', '');
                $customer->setData('source_of_income_private_employee_contact_person', '');
                $customer->setData('source_of_income_private_employee_contact_number', '');
                $customer->setData('source_of_income_private_employee_company_name', '');
                $customer->setData('source_of_income_private_employee_building_number', '');
               // $customer->setData('source_of_income_private_employee_subdivision', '');
                $customer->setData('source_of_income_private_employee_street', '');
                $customer->setData('source_of_income_private_employee_province', '');
                $customer->setData('source_of_income_private_employee_city', '');
                $customer->setData('source_of_income_private_employee_barangay', '');
                $customer->setData('source_of_income_private_employee_date_hired', '');
                $customer->setData('source_of_income_private_employee_employment_status', '');
                $customer->setData('source_of_income_private_employee_occupation_other', '');
               


                $customer->setData('source_of_income_remittance_sender','');
                $customer->setData('source_of_income_remittance_relationship','');
                $customer->setData('source_of_income_remittance_country','');
                $customer->setData('source_of_income_remittance_amount','');



                $customer->setData('source_of_income_self_employed_occupation','');
                $customer->setData('source_of_income_self_employed_type','');
                $customer->setData('source_of_income_self_employed_years_of_operation','');
                $customer->setData('source_of_income_self_employed_net_income','');
                $customer->setData('source_of_income_self_employed_contact_person','');
                $customer->setData('source_of_income_self_employed_contact_number','');
                $customer->setData('source_of_income_self_employed_name','');
                $customer->setData('source_of_income_self_employed_building_number','');
                //$customer->setData('source_of_income_self_employed_subdivision','');
                $customer->setData('source_of_income_self_employed_street','');
                $customer->setData('source_of_income_self_employed_barangay','');
                $customer->setData('source_of_income_self_employed_city','');
                $customer->setData('source_of_income_self_employed_province','');

                $customer->setData('source_of_income_business_occupation','');
                $customer->setData('source_of_income_business_type','');
                $customer->setData('source_of_income_business_years_of_operation','');
                $customer->setData('source_of_income_business_net_income','');
                $customer->setData('source_of_income_business_contact_person','');
                $customer->setData('source_of_income_business_contact_number','');
                $customer->setData('source_of_income_business_name','');
                $customer->setData('source_of_income_business_building_number','');
                //$customer->setData('source_of_income_business_subdivision','');
                $customer->setData('source_of_income_business_street','');
                $customer->setData('source_of_income_business_barangay','');
                $customer->setData('source_of_income_business_city','');
                $customer->setData('source_of_income_business_province','');
                }else if($source_of_income_category==4905){

                    $source_of_income_government_employee_occupation = $postData['source_of_income_government_employee_occupation'];
                    $source_of_income_government_employee_nature_of_work = $postData['source_of_income_government_employee_nature_of_work'];
                    $source_of_income_government_employee_position = $postData['source_of_income_government_employee_position'];
                    $source_of_income_government_employee_tenure = $postData['source_of_income_government_employee_tenure'];
                    $source_of_income_government_employee_net_income = $postData['source_of_income_government_employee_net_income'];
                    $source_of_income_government_employee_contact_person = $postData['source_of_income_government_employee_contact_person'];
                    $source_of_income_government_employee_contact_number = $postData['source_of_income_government_employee_contact_number'];
                    $source_of_income_government_employee_company_name = $postData['source_of_income_government_employee_company_name'];
                    $source_of_income_government_employee_building_number = $postData['source_of_income_government_employee_building_number'];
                   // $source_of_income_government_employee_subdivision = $postData['source_of_income_government_employee_subdivision'];
                    $source_of_income_government_employee_street = $postData['source_of_income_government_employee_street'];
                    $source_of_income_government_employee_province = $postData['provincedropgovernment'];
                    $source_of_income_government_employee_city = $postData['citydropgovernment'];
                    $source_of_income_government_employee_barangay = $postData['barangaydropgovernment'];
                    $source_of_income_government_employee_date_hired = $postData['source_of_income_government_employee_date_hired'];
                    $source_of_income_government_employee_employment_status = $postData['source_of_income_government_employee_employment_status'];

                    if($source_of_income_government_employee_occupation!=6714){
                        $source_of_income_government_employee_occupation_other='';
                    }else{
                    $source_of_income_government_employee_occupation_other=$postData['source_of_income_government_employee_occupation_other'];
                    }


                    $customer->setData('source_of_income_private_employee_occupation', '');
                    $customer->setData('source_of_income_private_employee_nature_of_work', '');
                    $customer->setData('source_of_income_private_employee_position', '');
                    $customer->setData('source_of_income_private_employee_tenure', '');
                    $customer->setData('source_of_income_private_employee_net_income', '');
                    $customer->setData('source_of_income_private_employee_contact_person', '');
                    $customer->setData('source_of_income_private_employee_contact_number', '');
                    $customer->setData('source_of_income_private_employee_company_name', '');
                    $customer->setData('source_of_income_private_employee_building_number', '');
                    //$customer->setData('source_of_income_private_employee_subdivision', '');
                    $customer->setData('source_of_income_private_employee_street', '');
                    $customer->setData('source_of_income_private_employee_province', '');
                    $customer->setData('source_of_income_private_employee_city', '');
                    $customer->setData('source_of_income_private_employee_barangay', '');
                    $customer->setData('source_of_income_private_employee_date_hired', '');
                    $customer->setData('source_of_income_private_employee_employment_status', '');
                    $customer->setData('source_of_income_private_employee_occupation_other', '');
                    $customer->setData('source_of_income_private_employee_other_occupation', '');

                 
                    $customer->setData('source_of_income_government_employee_occupation', $source_of_income_government_employee_occupation);
                    $customer->setData('source_of_income_government_employee_nature_of_work', $source_of_income_government_employee_nature_of_work);
                    $customer->setData('source_of_income_government_employee_position', $source_of_income_government_employee_position);
                    $customer->setData('source_of_income_government_employee_tenure', $source_of_income_government_employee_tenure);
                    $customer->setData('source_of_income_government_employee_net_income', $source_of_income_government_employee_net_income);
                    $customer->setData('source_of_income_government_employee_contact_person', $source_of_income_government_employee_contact_person);
                    $customer->setData('source_of_income_government_employee_contact_number', $source_of_income_government_employee_contact_number);
                    $customer->setData('source_of_income_government_employee_company_name', $source_of_income_government_employee_company_name);
                    $customer->setData('source_of_income_government_employee_building_number', $source_of_income_government_employee_building_number);
                    //$customer->setData('source_of_income_government_employee_subdivision', $source_of_income_government_employee_subdivision);
                    $customer->setData('source_of_income_government_employee_street', $source_of_income_government_employee_street);
                    $customer->setData('source_of_income_government_employee_province', $source_of_income_government_employee_province);
                    $customer->setData('source_of_income_government_employee_city', $source_of_income_government_employee_city);
                    $customer->setData('source_of_income_government_employee_barangay', $source_of_income_government_employee_barangay);
                    $customer->setData('source_of_income_government_employee_date_hired', $source_of_income_government_employee_date_hired);
                    $customer->setData('source_of_income_government_employee_employment_status', $source_of_income_government_employee_employment_status);
                    //$customer->setData('source_of_income_government_employee_occupation_other', $source_of_income_government_employee_occupation_other);


                    $customer->setData('source_of_income_pension', '');
                    $customer->setData('source_of_income_pension_amount', '');

                    $customer->setData('source_of_income_remittance_sender','');
                    $customer->setData('source_of_income_remittance_relationship','');
                    $customer->setData('source_of_income_remittance_country','');
                    $customer->setData('source_of_income_remittance_amount','');




                    $customer->setData('source_of_income_self_employed_occupation','');
                    $customer->setData('source_of_income_self_employed_type','');
                    $customer->setData('source_of_income_self_employed_years_of_operation','');
                    $customer->setData('source_of_income_self_employed_net_income','');
                    $customer->setData('source_of_income_self_employed_contact_person','');
                    $customer->setData('source_of_income_self_employed_contact_number','');
                    $customer->setData('source_of_income_self_employed_name','');
                    $customer->setData('source_of_income_self_employed_building_number','');
                    //$customer->setData('source_of_income_self_employed_subdivision','');
                    $customer->setData('source_of_income_self_employed_street','');
                    $customer->setData('source_of_income_self_employed_barangay','');
                    $customer->setData('source_of_income_self_employed_city','');
                    $customer->setData('source_of_income_self_employed_province','');


                    $customer->setData('source_of_income_business_occupation','');
                    $customer->setData('source_of_income_business_type','');
                    $customer->setData('source_of_income_business_years_of_operation','');
                    $customer->setData('source_of_income_business_net_income','');
                    $customer->setData('source_of_income_business_contact_person','');
                    $customer->setData('source_of_income_business_contact_number','');
                    $customer->setData('source_of_income_business_name','');
                    $customer->setData('source_of_income_business_building_number','');
                    //$customer->setData('source_of_income_business_subdivision','');
                    $customer->setData('source_of_income_business_street','');
                    $customer->setData('source_of_income_business_barangay','');
                    $customer->setData('source_of_income_business_city','');
                    $customer->setData('source_of_income_business_province','');

                }else if($source_of_income_category==4906){


                    $source_of_income_pension = $postData['source_of_income_pension'];
                    $source_of_income_pension_amount=$postData['source_of_income_pension_amount'];

                    $customer->setData('source_of_income_private_employee_occupation', '');
                    $customer->setData('source_of_income_private_employee_nature_of_work', '');
                    $customer->setData('source_of_income_private_employee_position', '');
                    $customer->setData('source_of_income_private_employee_tenure', '');
                    $customer->setData('source_of_income_private_employee_net_income', '');
                    $customer->setData('source_of_income_private_employee_contact_person', '');
                    $customer->setData('source_of_income_private_employee_contact_number', '');
                    $customer->setData('source_of_income_private_employee_company_name', '');
                    $customer->setData('source_of_income_private_employee_building_number', '');
                    //$customer->setData('source_of_income_private_employee_subdivision', '');
                    $customer->setData('source_of_income_private_employee_street', '');
                    $customer->setData('source_of_income_private_employee_province', '');
                    $customer->setData('source_of_income_private_employee_city', '');
                    $customer->setData('source_of_income_private_employee_barangay', '');
                    $customer->setData('source_of_income_private_employee_date_hired', '');
                    $customer->setData('source_of_income_private_employee_employment_status', '');
                    $customer->setData('source_of_income_private_employee_occupation_other', '');
                    $customer->setData('source_of_income_private_employee_other_occupation', '');



                    $customer->setData('source_of_income_government_employee_occupation', '');
                    $customer->setData('source_of_income_government_employee_nature_of_work', '');
                    $customer->setData('source_of_income_government_employee_position', '');
                    $customer->setData('source_of_income_government_employee_tenure', '');
                    $customer->setData('source_of_income_government_employee_net_income', '');
                    $customer->setData('source_of_income_government_employee_contact_person', '');
                    $customer->setData('source_of_income_government_employee_contact_number', '');
                    $customer->setData('source_of_income_government_employee_company_name', '');
                    $customer->setData('source_of_income_government_employee_building_number', '');
                    //$customer->setData('source_of_income_government_employee_subdivision', '');
                    $customer->setData('source_of_income_government_employee_street', '');
                    $customer->setData('source_of_income_government_employee_province', '');
                    $customer->setData('source_of_income_government_employee_city', '');
                    $customer->setData('source_of_income_government_employee_barangay', '');
                    $customer->setData('source_of_income_government_employee_date_hired', '');
                    $customer->setData('source_of_income_government_employee_employment_status', '');
                    $customer->setData('source_of_income_government_employee_occupation_other', '');


                    $customer->setData('source_of_income_pension', $source_of_income_pension);
                    $customer->setData('source_of_income_pension_amount', $source_of_income_pension_amount);

                     $customer->setData('source_of_income_remittance_sender','');
                     $customer->setData('source_of_income_remittance_relationship','');
                     $customer->setData('source_of_income_remittance_country','');
                     $customer->setData('source_of_income_remittance_amount','');




                     $customer->setData('source_of_income_self_employed_occupation','');
                     $customer->setData('source_of_income_self_employed_type','');
                     $customer->setData('source_of_income_self_employed_years_of_operation','');
                     $customer->setData('source_of_income_self_employed_net_income','');
                     $customer->setData('source_of_income_self_employed_contact_person','');
                     $customer->setData('source_of_income_self_employed_contact_number','');
                     $customer->setData('source_of_income_self_employed_name','');
                     $customer->setData('source_of_income_self_employed_building_number','');
                    //$customer->setData('source_of_income_self_employed_subdivision','');
                     $customer->setData('source_of_income_self_employed_street','');
                     $customer->setData('source_of_income_self_employed_barangay','');
                     $customer->setData('source_of_income_self_employed_city','');
                     $customer->setData('source_of_income_self_employed_province','');


                     $customer->setData('source_of_income_business_occupation','');
                     $customer->setData('source_of_income_business_type','');
                     $customer->setData('source_of_income_business_years_of_operation','');
                     $customer->setData('source_of_income_business_net_income','');
                     $customer->setData('source_of_income_business_contact_person','');
                     $customer->setData('source_of_income_business_contact_number','');
                     $customer->setData('source_of_income_business_name','');
                     $customer->setData('source_of_income_business_building_number','');
                    // $customer->setData('source_of_income_business_subdivision','');
                     $customer->setData('source_of_income_business_street','');
                     $customer->setData('source_of_income_business_barangay','');
                     $customer->setData('source_of_income_business_city','');
                     $customer->setData('source_of_income_business_province','');

                }else if($source_of_income_category==4907){

                   
            
                $source_of_income_private_employee_occupation = $postData['source_of_income_private_employee_occupation'];
                $source_of_income_private_employee_nature_of_work = $postData['source_of_income_private_employee_nature_of_work'];
                $source_of_income_private_employee_position = $postData['source_of_income_private_employee_position'];
                $source_of_income_private_employee_tenure = $postData['source_of_income_private_employee_tenure'];
                $source_of_income_private_employee_net_income = $postData['source_of_income_private_employee_net_income'];
                $source_of_income_private_employee_contact_person = $postData['source_of_income_private_employee_contact_person'];
                $source_of_income_private_employee_contact_number = $postData['source_of_income_private_employee_contact_number'];
                $source_of_income_private_employee_company_name = $postData['source_of_income_private_employee_company_name'];
                $source_of_income_private_employee_building_number = $postData['source_of_income_private_employee_building_number'];
                //$source_of_income_private_employee_subdivision = $postData['source_of_income_private_employee_subdivision'];
                $source_of_income_private_employee_street = $postData['source_of_income_private_employee_street'];
                $source_of_income_private_employee_province = $postData['provincedrop'];
                $source_of_income_private_employee_city = $postData['citydrop'];
                $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/saveerror.log');
                $logger = new \Zend\Log\Logger();
                $logger->addWriter($writer);
                $logger->info('BEFORE IF '.$source_of_income_private_employee_city);
        
                
                $source_of_income_private_employee_barangay = $postData['barangaydrop'];
                $source_of_income_private_employee_date_hired = $postData['source_of_income_private_employee_date_hired'];
                $source_of_income_private_employee_employment_status = $postData['source_of_income_private_employee_employment_status'];

                if($source_of_income_private_employee_occupation !=6593){
                    $source_of_income_private_employee_occupation_other ='';
                }else{
                    $source_of_income_private_employee_occupation_other =$postData['source_of_income_private_employee_occupation_other'];
                }
         

                    $customer->setData('source_of_income_government_employee_occupation', '');
                    $customer->setData('source_of_income_government_employee_nature_of_work', '');
                    $customer->setData('source_of_income_government_employee_position', '');
                    $customer->setData('source_of_income_government_employee_tenure', '');
                    $customer->setData('source_of_income_government_employee_net_income', '');
                    $customer->setData('source_of_income_government_employee_contact_person', '');
                    $customer->setData('source_of_income_government_employee_contact_number', '');
                    $customer->setData('source_of_income_government_employee_company_name', '');
                    $customer->setData('source_of_income_government_employee_building_number', '');
                    //$customer->setData('source_of_income_government_employee_subdivision', '');
                    $customer->setData('source_of_income_government_employee_street', '');
                    $customer->setData('source_of_income_government_employee_province', '');
                    $customer->setData('source_of_income_government_employee_city', '');
                    $customer->setData('source_of_income_government_employee_barangay', '');
                    $customer->setData('source_of_income_government_employee_date_hired', '');
                    $customer->setData('source_of_income_government_employee_employment_status', '');
                    $customer->setData('source_of_income_government_employee_occupation_other', '');


                    $customer->setData('source_of_income_pension', '');
                    $customer->setData('source_of_income_pension_amount', '');

                     $customer->setData('source_of_income_remittance_sender','');
                     $customer->setData('source_of_income_remittance_relationship','');
                     $customer->setData('source_of_income_remittance_country','');
                     $customer->setData('source_of_income_remittance_amount','');




                     $customer->setData('source_of_income_self_employed_occupation','');
                     $customer->setData('source_of_income_self_employed_type','');
                     $customer->setData('source_of_income_self_employed_years_of_operation','');
                     $customer->setData('source_of_income_self_employed_net_income','');
                     $customer->setData('source_of_income_self_employed_contact_person','');
                     $customer->setData('source_of_income_self_employed_contact_number','');
                     $customer->setData('source_of_income_self_employed_name','');
                     $customer->setData('source_of_income_self_employed_building_number','');
                    // $customer->setData('source_of_income_self_employed_subdivision','');
                     $customer->setData('source_of_income_self_employed_street','');
                     $customer->setData('source_of_income_self_employed_barangay','');
                     $customer->setData('source_of_income_self_employed_city','');
                     $customer->setData('source_of_income_self_employed_province','');


                     $customer->setData('source_of_income_private_employee_occupation', $source_of_income_private_employee_occupation);
                     $customer->setData('source_of_income_private_employee_nature_of_work', $source_of_income_private_employee_nature_of_work);
                     $customer->setData('source_of_income_private_employee_position', $source_of_income_private_employee_position);
                     $customer->setData('source_of_income_private_employee_tenure', $source_of_income_private_employee_tenure);
                     $customer->setData('source_of_income_private_employee_net_income', $source_of_income_private_employee_net_income);
                     $customer->setData('source_of_income_private_employee_contact_person', $source_of_income_private_employee_contact_person);
                     $customer->setData('source_of_income_private_employee_contact_number', $source_of_income_private_employee_contact_number);
                     $customer->setData('source_of_income_private_employee_company_name', $source_of_income_private_employee_company_name);
                     $customer->setData('source_of_income_private_employee_building_number', $source_of_income_private_employee_building_number);
                     //$customer->setData('source_of_income_private_employee_subdivision', $source_of_income_private_employee_subdivision);
                     $customer->setData('source_of_income_private_employee_street', $source_of_income_private_employee_street);
                     $customer->setData('source_of_income_private_employee_province', $source_of_income_private_employee_province);
                     $customer->setData('source_of_income_private_employee_city', $source_of_income_private_employee_city);
                     $customer->setData('source_of_income_private_employee_barangay', $source_of_income_private_employee_barangay);
                     $customer->setData('source_of_income_private_employee_date_hired', $source_of_income_private_employee_date_hired);
                     $customer->setData('source_of_income_private_employee_employment_status', $source_of_income_private_employee_employment_status);
                     //$customer->setData('source_of_income_private_employee_occupation_other', $source_of_income_private_employee_occupation_other);

                     $customer->setData('source_of_income_private_employee_other_occupation', '');

                     $customer->setData('source_of_income_business_occupation','');
                     $customer->setData('source_of_income_business_type','');
                     $customer->setData('source_of_income_business_years_of_operation','');
                     $customer->setData('source_of_income_business_net_income','');
                     $customer->setData('source_of_income_business_contact_person','');
                     $customer->setData('source_of_income_business_contact_number','');
                     $customer->setData('source_of_income_business_name','');
                     $customer->setData('source_of_income_business_building_number','');
                     //$customer->setData('source_of_income_business_subdivision','');
                     $customer->setData('source_of_income_business_street','');
                     $customer->setData('source_of_income_business_barangay','');
                     $customer->setData('source_of_income_business_city','');
                     $customer->setData('source_of_income_business_province','');

            
                }else if($source_of_income_category==4908){


                    $source_of_income_remittance_sender =$postData['source_of_income_remittance_sender'];
                    $source_of_income_remittance_relationship =$postData['source_of_income_remittance_relationship'];
                    $source_of_income_remittance_country =$postData['source_of_income_remittance_country'];
                    $source_of_income_remittance_amount =$postData['source_of_income_remittance_amount'];



                    $customer->setData('source_of_income_government_employee_occupation', '');
                    $customer->setData('source_of_income_government_employee_nature_of_work', '');
                    $customer->setData('source_of_income_government_employee_position', '');
                    $customer->setData('source_of_income_government_employee_tenure', '');
                    $customer->setData('source_of_income_government_employee_net_income', '');
                    $customer->setData('source_of_income_government_employee_contact_person', '');
                    $customer->setData('source_of_income_government_employee_contact_number', '');
                    $customer->setData('source_of_income_government_employee_company_name', '');
                    $customer->setData('source_of_income_government_employee_building_number', '');
                   // $customer->setData('source_of_income_government_employee_subdivision', '');
                    $customer->setData('source_of_income_government_employee_street', '');
                    $customer->setData('source_of_income_government_employee_province', '');
                    $customer->setData('source_of_income_government_employee_city', '');
                    $customer->setData('source_of_income_government_employee_barangay', '');
                    $customer->setData('source_of_income_government_employee_date_hired', '');
                    $customer->setData('source_of_income_government_employee_employment_status', '');
                    $customer->setData('source_of_income_government_employee_occupation_other', '');


                    $customer->setData('source_of_income_pension', '');
                    $customer->setData('source_of_income_pension_amount', '');


                    $customer->setData('source_of_income_self_employed_occupation','');
                    $customer->setData('source_of_income_self_employed_type','');
                    $customer->setData('source_of_income_self_employed_years_of_operation','');
                    $customer->setData('source_of_income_self_employed_net_income','');
                    $customer->setData('source_of_income_self_employed_contact_person','');
                    $customer->setData('source_of_income_self_employed_contact_number','');
                    $customer->setData('source_of_income_self_employed_name','');
                    $customer->setData('source_of_income_self_employed_building_number','');
                    //$customer->setData('source_of_income_self_employed_subdivision','');
                    $customer->setData('source_of_income_self_employed_street','');
                    $customer->setData('source_of_income_self_employed_barangay','');
                    $customer->setData('source_of_income_self_employed_city','');
                    $customer->setData('source_of_income_self_employed_province','');


                    $customer->setData('source_of_income_private_employee_occupation', '');
                    $customer->setData('source_of_income_private_employee_nature_of_work', '');
                    $customer->setData('source_of_income_private_employee_position', '');
                    $customer->setData('source_of_income_private_employee_tenure', '');
                    $customer->setData('source_of_income_private_employee_net_income', '');
                    $customer->setData('source_of_income_private_employee_contact_person', '');
                    $customer->setData('source_of_income_private_employee_contact_number', '');
                    $customer->setData('source_of_income_private_employee_company_name', '');
                    $customer->setData('source_of_income_private_employee_building_number', '');
                   // $customer->setData('source_of_income_private_employee_subdivision', '');
                    $customer->setData('source_of_income_private_employee_street', '');
                    $customer->setData('source_of_income_private_employee_province', '');
                    $customer->setData('source_of_income_private_employee_city', '');
                    $customer->setData('source_of_income_private_employee_barangay', '');
                    $customer->setData('source_of_income_private_employee_date_hired', '');
                    $customer->setData('source_of_income_private_employee_employment_status', '');
                    $customer->setData('source_of_income_private_employee_occupation_other', '');
                    $customer->setData('source_of_income_private_employee_other_occupation', '');


                    $customer->setData('source_of_income_remittance_sender',$source_of_income_remittance_sender);
                    $customer->setData('source_of_income_remittance_relationship',$source_of_income_remittance_relationship);
                    $customer->setData('source_of_income_remittance_country',$source_of_income_remittance_country);
                    $customer->setData('source_of_income_remittance_amount',$source_of_income_remittance_amount);

                    $customer->setData('source_of_income_business_occupation','');
                    $customer->setData('source_of_income_business_type','');
                    $customer->setData('source_of_income_business_years_of_operation','');
                    $customer->setData('source_of_income_business_net_income','');
                    $customer->setData('source_of_income_business_contact_person','');
                    $customer->setData('source_of_income_business_contact_number','');
                    $customer->setData('source_of_income_business_name','');
                    $customer->setData('source_of_income_business_building_number','');
                    //$customer->setData('source_of_income_business_subdivision','');
                    $customer->setData('source_of_income_business_street','');
                    $customer->setData('source_of_income_business_barangay','');
                    $customer->setData('source_of_income_business_city','');
                    $customer->setData('source_of_income_business_province','');



                }else if($source_of_income_category==4909){

                    $source_of_income_self_employed_occupation = $postData['source_of_income_self_employed_occupation'];
                    $source_of_income_self_employed_type=$postData['source_of_income_self_employed_type'];
                    $source_of_income_self_employed_years_of_operation=$postData['source_of_income_self_employed_years_of_operation'];
                    $source_of_income_self_employed_net_income=$postData['source_of_income_self_employed_net_income'];
                    $source_of_income_self_employed_contact_person=$postData['source_of_income_self_employed_contact_person'];
                    $source_of_income_self_employed_contact_number=$postData['source_of_income_self_employed_contact_number'];
                    $source_of_income_self_employed_name=$postData['source_of_income_self_employed_name'];
                    $source_of_income_self_employed_building_number=$postData['source_of_income_self_employed_building_number'];
                    //$source_of_income_self_employed_subdivision=$postData['source_of_income_self_employed_subdivision'];
                    $source_of_income_self_employed_street=$postData['source_of_income_self_employed_street'];
                    $source_of_income_self_employed_barangay=$postData['barangaydropselfemployed'];
                    $source_of_income_self_employed_city=$postData['citydropselfemployed'];
                    $source_of_income_self_employed_province=$postData['provincedropselfemployed'];



                    $customer->setData('source_of_income_government_employee_occupation', '');
                    $customer->setData('source_of_income_government_employee_nature_of_work', '');
                    $customer->setData('source_of_income_government_employee_position', '');
                    $customer->setData('source_of_income_government_employee_tenure', '');
                    $customer->setData('source_of_income_government_employee_net_income', '');
                    $customer->setData('source_of_income_government_employee_contact_person', '');
                    $customer->setData('source_of_income_government_employee_contact_number', '');
                    $customer->setData('source_of_income_government_employee_company_name', '');
                    $customer->setData('source_of_income_government_employee_building_number', '');
                    //$customer->setData('source_of_income_government_employee_subdivision', '');
                    $customer->setData('source_of_income_government_employee_street', '');
                    $customer->setData('source_of_income_government_employee_province', '');
                    $customer->setData('source_of_income_government_employee_city', '');
                    $customer->setData('source_of_income_government_employee_barangay', '');
                    $customer->setData('source_of_income_government_employee_date_hired', '');
                    $customer->setData('source_of_income_government_employee_employment_status', '');
                    $customer->setData('source_of_income_government_employee_occupation_other', '');


                    $customer->setData('source_of_income_pension', '');
                    $customer->setData('source_of_income_pension_amount', '');


                    $customer->setData('source_of_income_self_employed_occupation','');
                    $customer->setData('source_of_income_self_employed_type','');
                    $customer->setData('source_of_income_self_employed_years_of_operation','');
                    $customer->setData('source_of_income_self_employed_net_income','');
                    $customer->setData('source_of_income_self_employed_contact_person','');
                    $customer->setData('source_of_income_self_employed_contact_number','');
                    $customer->setData('source_of_income_self_employed_name','');
                    $customer->setData('source_of_income_self_employed_building_number','');
                    //$customer->setData('source_of_income_self_employed_subdivision','');
                    $customer->setData('source_of_income_self_employed_street','');
                    $customer->setData('source_of_income_self_employed_barangay','');
                    $customer->setData('source_of_income_self_employed_city','');
                    $customer->setData('source_of_income_self_employed_province','');


                    $customer->setData('source_of_income_private_employee_occupation', '');
                    $customer->setData('source_of_income_private_employee_nature_of_work', '');
                    $customer->setData('source_of_income_private_employee_position', '');
                    $customer->setData('source_of_income_private_employee_tenure', '');
                    $customer->setData('source_of_income_private_employee_net_income', '');
                    $customer->setData('source_of_income_private_employee_contact_person', '');
                    $customer->setData('source_of_income_private_employee_contact_number', '');
                    $customer->setData('source_of_income_private_employee_company_name', '');
                    $customer->setData('source_of_income_private_employee_building_number', '');
                    //$customer->setData('source_of_income_private_employee_subdivision', '');
                    $customer->setData('source_of_income_private_employee_street', '');
                    $customer->setData('source_of_income_private_employee_province', '');
                    $customer->setData('source_of_income_private_employee_city', '');
                    $customer->setData('source_of_income_private_employee_barangay', '');
                    $customer->setData('source_of_income_private_employee_date_hired', '');
                    $customer->setData('source_of_income_private_employee_employment_status', '');
                    $customer->setData('source_of_income_private_employee_occupation_other', '');
                    $customer->setData('source_of_income_private_employee_other_occupation', '');


                    $customer->setData('source_of_income_remittance_sender','');
                    $customer->setData('source_of_income_remittance_relationship','');
                    $customer->setData('source_of_income_remittance_country','');
                    $customer->setData('source_of_income_remittance_amount','');



                    $customer->setData('source_of_income_self_employed_occupation',$source_of_income_self_employed_occupation);
                    $customer->setData('source_of_income_self_employed_type',$source_of_income_self_employed_type);
                    $customer->setData('source_of_income_self_employed_years_of_operation',$source_of_income_self_employed_years_of_operation);
                    $customer->setData('source_of_income_self_employed_net_income',$source_of_income_self_employed_net_income);
                    $customer->setData('source_of_income_self_employed_contact_person',$source_of_income_self_employed_contact_person);
                    $customer->setData('source_of_income_self_employed_contact_number',$source_of_income_self_employed_contact_number);
                    $customer->setData('source_of_income_self_employed_name',$source_of_income_self_employed_name);
                    $customer->setData('source_of_income_self_employed_building_number',$source_of_income_self_employed_building_number);
                    //$customer->setData('source_of_income_self_employed_subdivision',$source_of_income_self_employed_subdivision);
                    $customer->setData('source_of_income_self_employed_street',$source_of_income_self_employed_street);
                    $customer->setData('source_of_income_self_employed_barangay',$source_of_income_self_employed_barangay);
                    $customer->setData('source_of_income_self_employed_city',$source_of_income_self_employed_city);
                    $customer->setData('source_of_income_self_employed_province',$source_of_income_self_employed_province);

                    $customer->setData('source_of_income_business_occupation','');
                    $customer->setData('source_of_income_business_type','');
                    $customer->setData('source_of_income_business_years_of_operation','');
                    $customer->setData('source_of_income_business_net_income','');
                    $customer->setData('source_of_income_business_contact_person','');
                    $customer->setData('source_of_income_business_contact_number','');
                    $customer->setData('source_of_income_business_name','');
                    $customer->setData('source_of_income_business_building_number','');
                    //$customer->setData('source_of_income_business_subdivision','');
                    $customer->setData('source_of_income_business_street','');
                    $customer->setData('source_of_income_business_barangay','');
                    $customer->setData('source_of_income_business_city','');
                    $customer->setData('source_of_income_business_province','');


                    
                
                }else if($source_of_income_category==4910){
                    

                    $source_of_income_business_occupation = $postData['source_of_income_business_occupation'];
                    $source_of_income_business_type = $postData['source_of_income_business_type'];
                    $source_of_income_business_years_of_operation = $postData['source_of_income_business_years_of_operation'];
                    $source_of_income_business_net_income = $postData['source_of_income_business_net_income'];
                    $source_of_income_business_contact_person = $postData['source_of_income_business_contact_person'];
                    $source_of_income_business_contact_number = $postData['source_of_income_business_contact_number'];
                    $source_of_income_business_name = $postData['source_of_income_business_name'];
                    $source_of_income_business_building_number = $postData['source_of_income_business_building_number'];
                    //$source_of_income_business_subdivision = $postData['source_of_income_business_subdivision'];
                    $source_of_income_business_street = $postData['source_of_income_business_street'];
                    $source_of_income_business_barangay = $postData['source_of_income_business_barangay'];
                    $source_of_income_business_city = $postData['citydropbusiness'];
                    $source_of_income_business_province = $postData['source_of_income_business_province'];


                    $customer->setData('source_of_income_business_occupation', $source_of_income_business_occupation);
                    $customer->setData('source_of_income_business_type',$source_of_income_business_type);
                    $customer->setData('source_of_income_business_years_of_operation', $source_of_income_business_years_of_operation);
                    $customer->setData('source_of_income_business_net_income',$source_of_income_business_net_income);
                    $customer->setData('source_of_income_business_contact_person',$source_of_income_business_contact_person);
                    $customer->setData('source_of_income_business_contact_number',$source_of_income_business_contact_number);
                    $customer->setData('source_of_income_business_name',$source_of_income_business_name);
                    $customer->setData('source_of_income_business_building_number',$source_of_income_business_building_number);
                    //$customer->setData('source_of_income_business_subdivision',$source_of_income_business_subdivision);
                    $customer->setData('source_of_income_business_street',$source_of_income_business_street);
                    $customer->setData('source_of_income_business_barangay',$source_of_income_business_barangay);
                    $customer->setData('source_of_income_business_city', $source_of_income_business_city);
                    $customer->setData('source_of_income_business_province',$source_of_income_business_province);



                       
                    $customer->setData('source_of_income_private_employee_other_occupation', '');

                    $customer->setData('source_of_income_government_employee_occupation', '');
                    $customer->setData('source_of_income_government_employee_nature_of_work', '');
                    $customer->setData('source_of_income_government_employee_position', '');
                    $customer->setData('source_of_income_government_employee_tenure', '');
                    $customer->setData('source_of_income_government_employee_net_income', '');
                    $customer->setData('source_of_income_government_employee_contact_person', '');
                    $customer->setData('source_of_income_government_employee_contact_number', '');
                    $customer->setData('source_of_income_government_employee_company_name', '');
                    $customer->setData('source_of_income_government_employee_building_number', '');
                    //$customer->setData('source_of_income_government_employee_subdivision', '');
                    $customer->setData('source_of_income_government_employee_street', '');
                    $customer->setData('source_of_income_government_employee_province', '');
                    $customer->setData('source_of_income_government_employee_city', '');
                    $customer->setData('source_of_income_government_employee_barangay', '');
                    $customer->setData('source_of_income_government_employee_date_hired', '');
                    $customer->setData('source_of_income_government_employee_employment_status', '');
                    $customer->setData('source_of_income_government_employee_occupation_other', '');


                    $customer->setData('source_of_income_pension', '');
                    $customer->setData('source_of_income_pension_amount', '');


                    $customer->setData('source_of_income_self_employed_occupation','');
                    $customer->setData('source_of_income_self_employed_type','');
                    $customer->setData('source_of_income_self_employed_years_of_operation','');
                    $customer->setData('source_of_income_self_employed_net_income','');
                    $customer->setData('source_of_income_self_employed_contact_person','');
                    $customer->setData('source_of_income_self_employed_contact_number','');
                    $customer->setData('source_of_income_self_employed_name','');
                    $customer->setData('source_of_income_self_employed_building_number','');
                    //$customer->setData('source_of_income_self_employed_subdivision','');
                    $customer->setData('source_of_income_self_employed_street','');
                    $customer->setData('source_of_income_self_employed_barangay','');
                    $customer->setData('source_of_income_self_employed_city','');
                    $customer->setData('source_of_income_self_employed_province','');


                    $customer->setData('source_of_income_private_employee_occupation', '');
                    $customer->setData('source_of_income_private_employee_nature_of_work', '');
                    $customer->setData('source_of_income_private_employee_position', '');
                    $customer->setData('source_of_income_private_employee_tenure', '');
                    $customer->setData('source_of_income_private_employee_net_income', '');
                    $customer->setData('source_of_income_private_employee_contact_person', '');
                    $customer->setData('source_of_income_private_employee_contact_number', '');
                    $customer->setData('source_of_income_private_employee_company_name', '');
                    $customer->setData('source_of_income_private_employee_building_number', '');
                    //$customer->setData('source_of_income_private_employee_subdivision', '');
                    $customer->setData('source_of_income_private_employee_street', '');
                    $customer->setData('source_of_income_private_employee_province', '');
                    $customer->setData('source_of_income_private_employee_city', '');
                    $customer->setData('source_of_income_private_employee_barangay', '');
                    $customer->setData('source_of_income_private_employee_date_hired', '');
                    $customer->setData('source_of_income_private_employee_employment_status', '');
                    $customer->setData('source_of_income_private_employee_occupation_other', '');
                   


                    $customer->setData('source_of_income_remittance_sender','');
                    $customer->setData('source_of_income_remittance_relationship','');
                    $customer->setData('source_of_income_remittance_country','');
                    $customer->setData('source_of_income_remittance_amount','');



                    $customer->setData('source_of_income_self_employed_occupation','');
                    $customer->setData('source_of_income_self_employed_type','');
                    $customer->setData('source_of_income_self_employed_years_of_operation','');
                    $customer->setData('source_of_income_self_employed_net_income','');
                    $customer->setData('source_of_income_self_employed_contact_person','');
                    $customer->setData('source_of_income_self_employed_contact_number','');
                    $customer->setData('source_of_income_self_employed_name','');
                    $customer->setData('source_of_income_self_employed_building_number','');
                    //$customer->setData('source_of_income_self_employed_subdivision','');
                    $customer->setData('source_of_income_self_employed_street','');
                    $customer->setData('source_of_income_self_employed_barangay','');
                    $customer->setData('source_of_income_self_employed_city','');
                    $customer->setData('source_of_income_self_employed_province','');
                
                }else{
                    
                    $customer->setData('source_of_income_private_employee_other_occupation', '');

                    $customer->setData('source_of_income_government_employee_occupation', '');
                    $customer->setData('source_of_income_government_employee_nature_of_work', '');
                    $customer->setData('source_of_income_government_employee_position', '');
                    $customer->setData('source_of_income_government_employee_tenure', '');
                    $customer->setData('source_of_income_government_employee_net_income', '');
                    $customer->setData('source_of_income_government_employee_contact_person', '');
                    $customer->setData('source_of_income_government_employee_contact_number', '');
                    $customer->setData('source_of_income_government_employee_company_name', '');
                    $customer->setData('source_of_income_government_employee_building_number', '');
                    //$customer->setData('source_of_income_government_employee_subdivision', '');
                    $customer->setData('source_of_income_government_employee_street', '');
                    $customer->setData('source_of_income_government_employee_province', '');
                    $customer->setData('source_of_income_government_employee_city', '');
                    $customer->setData('source_of_income_government_employee_barangay', '');
                    $customer->setData('source_of_income_government_employee_date_hired', '');
                    $customer->setData('source_of_income_government_employee_employment_status', '');
                    $customer->setData('source_of_income_government_employee_occupation_other', '');


                    $customer->setData('source_of_income_pension', '');
                    $customer->setData('source_of_income_pension_amount', '');


                    $customer->setData('source_of_income_self_employed_occupation','');
                    $customer->setData('source_of_income_self_employed_type','');
                    $customer->setData('source_of_income_self_employed_years_of_operation','');
                    $customer->setData('source_of_income_self_employed_net_income','');
                    $customer->setData('source_of_income_self_employed_contact_person','');
                    $customer->setData('source_of_income_self_employed_contact_number','');
                    $customer->setData('source_of_income_self_employed_name','');
                    $customer->setData('source_of_income_self_employed_building_number','');
                    //$customer->setData('source_of_income_self_employed_subdivision','');
                    $customer->setData('source_of_income_self_employed_street','');
                    $customer->setData('source_of_income_self_employed_barangay','');
                    $customer->setData('source_of_income_self_employed_city','');
                    $customer->setData('source_of_income_self_employed_province','');


                    $customer->setData('source_of_income_private_employee_occupation', '');
                    $customer->setData('source_of_income_private_employee_nature_of_work', '');
                    $customer->setData('source_of_income_private_employee_position', '');
                    $customer->setData('source_of_income_private_employee_tenure', '');
                    $customer->setData('source_of_income_private_employee_net_income', '');
                    $customer->setData('source_of_income_private_employee_contact_person', '');
                    $customer->setData('source_of_income_private_employee_contact_number', '');
                    $customer->setData('source_of_income_private_employee_company_name', '');
                    $customer->setData('source_of_income_private_employee_building_number', '');
                    //$customer->setData('source_of_income_private_employee_subdivision', '');
                    $customer->setData('source_of_income_private_employee_street', '');
                    $customer->setData('source_of_income_private_employee_province', '');
                    $customer->setData('source_of_income_private_employee_city', '');
                    $customer->setData('source_of_income_private_employee_barangay', '');
                    $customer->setData('source_of_income_private_employee_date_hired', '');
                    $customer->setData('source_of_income_private_employee_employment_status', '');
                    $customer->setData('source_of_income_private_employee_occupation_other', '');
                   


                    $customer->setData('source_of_income_remittance_sender','');
                    $customer->setData('source_of_income_remittance_relationship','');
                    $customer->setData('source_of_income_remittance_country','');
                    $customer->setData('source_of_income_remittance_amount','');



                    $customer->setData('source_of_income_self_employed_occupation','');
                    $customer->setData('source_of_income_self_employed_type','');
                    $customer->setData('source_of_income_self_employed_years_of_operation','');
                    $customer->setData('source_of_income_self_employed_net_income','');
                    $customer->setData('source_of_income_self_employed_contact_person','');
                    $customer->setData('source_of_income_self_employed_contact_number','');
                    $customer->setData('source_of_income_self_employed_name','');
                    $customer->setData('source_of_income_self_employed_building_number','');
                    //$customer->setData('source_of_income_self_employed_subdivision','');
                    $customer->setData('source_of_income_self_employed_street','');
                    $customer->setData('source_of_income_self_employed_barangay','');
                    $customer->setData('source_of_income_self_employed_city','');
                    $customer->setData('source_of_income_self_employed_province','');

                    $customer->setData('source_of_income_business_occupation','');
                    $customer->setData('source_of_income_business_type','');
                    $customer->setData('source_of_income_business_years_of_operation','');
                    $customer->setData('source_of_income_business_net_income','');
                    $customer->setData('source_of_income_business_contact_person','');
                    $customer->setData('source_of_income_business_contact_number','');
                    $customer->setData('source_of_income_business_name','');
                    $customer->setData('source_of_income_business_building_number','');
                    //$customer->setData('source_of_income_business_subdivision','');
                    $customer->setData('source_of_income_business_street','');
                    $customer->setData('source_of_income_business_barangay','');
                    $customer->setData('source_of_income_business_city','');
                    $customer->setData('source_of_income_business_province','');

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

                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath('client/personal/index');
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