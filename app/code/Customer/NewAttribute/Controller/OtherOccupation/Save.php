<?php
namespace Customer\NewAttribute\Controller\OtherOccupation;

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
        // Initialize Logger
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('BEFORE TRY');

        try {
            // Fetching customer session ID
            $customerId = $this->customerSession->getCustomerId();
            $customer = $this->customerFactory->create()->load($customerId);

            $logger->info('Customer ID: ' . $customerId);

            // Fetching post data
            $postData = $this->getRequest()->getPostValue();
            $logger->info('Post Data: ' . json_encode($postData));

            if (!empty($postData)) {
                // Category
                $source_of_income_second_category = $postData['source_of_income_second_category'];

              //Others
              $source_of_income_private_employee_second_other_occupation= $postData['source_of_income_private_employee_second_other_occupation'];


            




            


              if($source_of_income_second_category == 6119){
              $customer->setData('source_of_income_private_employee_second_other_occupation',$source_of_income_private_employee_second_other_occupation);
              $customer->setData('source_of_income_second_category', $source_of_income_second_category);

              $customer->setData('source_of_income_second_pension', '');
              $customer->setData('source_of_income_second_pension_amount', '');

              $customer->setData('source_of_income_second_remittance_sender','');
              $customer->setData('source_of_income_second_remittance_relationship','');
              $customer->setData('source_of_income_second_remittance_country','');
              $customer->setData('source_of_income_second_remittance_amount','');




              $customer->setData('source_of_income_second_self_employed_occupation','');
              $customer->setData('source_of_income_second_self_employed_type','');
              $customer->setData('source_of_income_second_self_employed_years_of_operation','');
              $customer->setData('source_of_income_second_self_employed_net_income','');
              $customer->setData('source_of_income_second_self_employed_contact_person','');
              $customer->setData('source_of_income_second_self_employed_contact_number','');
              $customer->setData('source_of_income_second_self_employed_name','');
              $customer->setData('source_of_income_second_self_employed_building_number','');
              $customer->setData('source_of_income_second_self_employed_subdivision','');
              $customer->setData('source_of_income_second_self_employed_street','');
              $customer->setData('source_of_income_second_self_employed_barangay','');
              $customer->setData('source_of_income_second_self_employed_city','');
              $customer->setData('source_of_income_second_self_employed_province','');


              $customer->setData('source_of_income_second_business_occupation','');
              $customer->setData('source_of_income_second_business_type','');
              $customer->setData('source_of_income_second_business_years_of_operation','');
              $customer->setData('source_of_income_second_business_net_income','');
              $customer->setData('source_of_income_second_business_contact_person','');
              $customer->setData('source_of_income_second_business_contact_number','');
              $customer->setData('source_of_income_second_business_name','');
              $customer->setData('source_of_income_second_business_building_number','');
              $customer->setData('source_of_income_second_business_subdivision','');
              $customer->setData('source_of_income_second_business_street','');
              $customer->setData('source_of_income_second_business_barangay','');
              $customer->setData('source_of_income_second_business_city','');
              $customer->setData('source_of_income_second_business_province','');

              $customer->setData('source_of_income_private_employee_second_occupation', '');
              $customer->setData('source_of_income_private_employee_second_nature_of_work', '');
              $customer->setData('source_of_income_private_employee_second_position', '');
              $customer->setData('source_of_income_private_employee_second_tenure', '');
              $customer->setData('source_of_income_private_employee_second_net_income', '');
              $customer->setData('source_of_income_private_employee_second_contact_person', '');
              $customer->setData('source_of_income_private_employee_second_contact_number', '');
              $customer->setData('source_of_income_private_employee_second_company_name', '');
              $customer->setData('source_of_income_private_employee_second_building_number', '');
              $customer->setData('source_of_income_private_employee_second_subdivision', '');
              $customer->setData('source_of_income_private_employee_second_street', '');
              $customer->setData('source_of_income_private_employee_second_province', '');
              $customer->setData('source_of_income_private_employee_second_city', '');
              $customer->setData('source_of_income_private_employee_second_barangay', '');
              $customer->setData('source_of_income_private_employee_second_date_hired', '');
              $customer->setData('source_of_income_private_employee_employment_second_status', '');
              $customer->setData('source_of_income_private_employee_second_occupation_other', '');



              $customer->setData('source_of_income_government_employee_second_occupation', '');
              $customer->setData('source_of_income_government_employee_second_nature_of_work', '');
              $customer->setData('source_of_income_government_employee_second_position', '');
              $customer->setData('source_of_income_government_employee_second_tenure', '');
              $customer->setData('source_of_income_government_employee_second_net_income', '');
              $customer->setData('source_of_income_government_employee_second_contact_person', '');
              $customer->setData('source_of_income_government_employee_second_contact_number', '');
              $customer->setData('source_of_income_government_employee_second_company_name', '');
              $customer->setData('source_of_income_government_employee_second_building_number', '');
              $customer->setData('source_of_income_government_employee_second_subdivision', '');
              $customer->setData('source_of_income_government_employee_second_street', '');
              $customer->setData('source_of_income_government_employee_second_province', '');
              $customer->setData('source_of_income_government_employee_second_city', '');
              $customer->setData('source_of_income_government_employee_second_barangay', '');
              $customer->setData('source_of_income_government_employee_second_date_hired', '');
              $customer->setData('source_of_income_government_employee_second_status', '');
              $customer->setData('source_of_income_government_employee_second_occupation_other', '');
              }else if($source_of_income_second_category == 6114){


                $customer->setData('source_of_income_private_employee_second_other_occupation','');





                $customer->setData('source_of_income_second_pension', $source_of_income_second_pension);
                $customer->setData('source_of_income_second_pension_amount', $source_of_income_second_pension_amount);

                $customer->setData('source_of_income_second_remittance_sender','');
                $customer->setData('source_of_income_second_remittance_relationship','');
                $customer->setData('source_of_income_second_remittance_country','');
                $customer->setData('source_of_income_second_remittance_amount','');




                $customer->setData('source_of_income_second_self_employed_occupation','');
                $customer->setData('source_of_income_second_self_employed_type','');
                $customer->setData('source_of_income_second_self_employed_years_of_operation','');
                $customer->setData('source_of_income_second_self_employed_net_income','');
                $customer->setData('source_of_income_second_self_employed_contact_person','');
                $customer->setData('source_of_income_second_self_employed_contact_number','');
                $customer->setData('source_of_income_second_self_employed_name','');
                $customer->setData('source_of_income_second_self_employed_building_number','');
                $customer->setData('source_of_income_second_self_employed_subdivision','');
                $customer->setData('source_of_income_second_self_employed_street','');
                $customer->setData('source_of_income_second_self_employed_barangay','');
                $customer->setData('source_of_income_second_self_employed_city','');
                $customer->setData('source_of_income_second_self_employed_province','');


                $customer->setData('source_of_income_second_business_occupation','');
                $customer->setData('source_of_income_second_business_type','');
                $customer->setData('source_of_income_second_business_years_of_operation','');
                $customer->setData('source_of_income_second_business_net_income','');
                $customer->setData('source_of_income_second_business_contact_person','');
                $customer->setData('source_of_income_second_business_contact_number','');
                $customer->setData('source_of_income_second_business_name','');
                $customer->setData('source_of_income_second_business_building_number','');
                $customer->setData('source_of_income_second_business_subdivision','');
                $customer->setData('source_of_income_second_business_street','');
                $customer->setData('source_of_income_second_business_barangay','');
                $customer->setData('source_of_income_second_business_city','');
                $customer->setData('source_of_income_second_business_province','');


                $customer->setData('source_of_income_private_employee_second_occupation', '');
                $customer->setData('source_of_income_private_employee_second_nature_of_work', '');
                $customer->setData('source_of_income_private_employee_second_position', '');
                $customer->setData('source_of_income_private_employee_second_tenure', '');
                $customer->setData('source_of_income_private_employee_second_net_income', '');
                $customer->setData('source_of_income_private_employee_second_contact_person', '');
                $customer->setData('source_of_income_private_employee_second_contact_number', '');
                $customer->setData('source_of_income_private_employee_second_company_name', '');
                $customer->setData('source_of_income_private_employee_second_building_number', '');
                $customer->setData('source_of_income_private_employee_second_subdivision', '');
                $customer->setData('source_of_income_private_employee_second_street', '');
                $customer->setData('source_of_income_private_employee_second_province', '');
                $customer->setData('source_of_income_private_employee_second_city', '');
                $customer->setData('source_of_income_private_employee_second_barangay', '');
                $customer->setData('source_of_income_private_employee_second_date_hired', '');
                $customer->setData('source_of_income_private_employee_employment_second_status', '');
                $customer->setData('source_of_income_private_employee_second_occupation_other', '');



                $customer->setData('source_of_income_government_employee_second_occupation', '');
                $customer->setData('source_of_income_government_employee_second_nature_of_work', '');
                $customer->setData('source_of_income_government_employee_second_position', '');
                $customer->setData('source_of_income_government_employee_second_tenure', '');
                $customer->setData('source_of_income_government_employee_second_net_income', '');
                $customer->setData('source_of_income_government_employee_second_contact_person', '');
                $customer->setData('source_of_income_government_employee_second_contact_number', '');
                $customer->setData('source_of_income_government_employee_second_company_name', '');
                $customer->setData('source_of_income_government_employee_second_building_number', '');
                $customer->setData('source_of_income_government_employee_second_subdivision', '');
                $customer->setData('source_of_income_government_employee_second_street', '');
                $customer->setData('source_of_income_government_employee_second_province', '');
                $customer->setData('source_of_income_government_employee_second_city', '');
                $customer->setData('source_of_income_government_employee_second_barangay', '');
                $customer->setData('source_of_income_government_employee_second_date_hired', '');
                $customer->setData('source_of_income_government_employee_second_status', '');
                $customer->setData('source_of_income_government_employee_second_occupation_other', '');

              }else if($source_of_income_second_category == 6116){


                $customer->setData('source_of_income_private_employee_second_other_occupation','');





                $customer->setData('source_of_income_second_pension', );
                $customer->setData('source_of_income_second_pension_amount', );

                $customer->setData('source_of_income_second_remittance_sender',$source_of_income_second_remittance_sender);
                $customer->setData('source_of_income_second_remittance_relationship',$source_of_income_second_remittance_relationship);
                $customer->setData('source_of_income_second_remittance_country',$source_of_income_second_remittance_country);
                $customer->setData('source_of_income_second_remittance_amount',$source_of_income_second_remittance_amount);




                $customer->setData('source_of_income_second_self_employed_occupation','');
                $customer->setData('source_of_income_second_self_employed_type','');
                $customer->setData('source_of_income_second_self_employed_years_of_operation','');
                $customer->setData('source_of_income_second_self_employed_net_income','');
                $customer->setData('source_of_income_second_self_employed_contact_person','');
                $customer->setData('source_of_income_second_self_employed_contact_number','');
                $customer->setData('source_of_income_second_self_employed_name','');
                $customer->setData('source_of_income_second_self_employed_building_number','');
                $customer->setData('source_of_income_second_self_employed_subdivision','');
                $customer->setData('source_of_income_second_self_employed_street','');
                $customer->setData('source_of_income_second_self_employed_barangay','');
                $customer->setData('source_of_income_second_self_employed_city','');
                $customer->setData('source_of_income_second_self_employed_province','');


                $customer->setData('source_of_income_second_business_occupation','');
                $customer->setData('source_of_income_second_business_type','');
                $customer->setData('source_of_income_second_business_years_of_operation','');
                $customer->setData('source_of_income_second_business_net_income','');
                $customer->setData('source_of_income_second_business_contact_person','');
                $customer->setData('source_of_income_second_business_contact_number','');
                $customer->setData('source_of_income_second_business_name','');
                $customer->setData('source_of_income_second_business_building_number','');
                $customer->setData('source_of_income_second_business_subdivision','');
                $customer->setData('source_of_income_second_business_street','');
                $customer->setData('source_of_income_second_business_barangay','');
                $customer->setData('source_of_income_second_business_city','');
                $customer->setData('source_of_income_second_business_province','');


                $customer->setData('source_of_income_private_employee_second_occupation', '');
                $customer->setData('source_of_income_private_employee_second_nature_of_work', '');
                $customer->setData('source_of_income_private_employee_second_position', '');
                $customer->setData('source_of_income_private_employee_second_tenure', '');
                $customer->setData('source_of_income_private_employee_second_net_income', '');
                $customer->setData('source_of_income_private_employee_second_contact_person', '');
                $customer->setData('source_of_income_private_employee_second_contact_number', '');
                $customer->setData('source_of_income_private_employee_second_company_name', '');
                $customer->setData('source_of_income_private_employee_second_building_number', '');
                $customer->setData('source_of_income_private_employee_second_subdivision', '');
                $customer->setData('source_of_income_private_employee_second_street', '');
                $customer->setData('source_of_income_private_employee_second_province', '');
                $customer->setData('source_of_income_private_employee_second_city', '');
                $customer->setData('source_of_income_private_employee_second_barangay', '');
                $customer->setData('source_of_income_private_employee_second_date_hired', '');
                $customer->setData('source_of_income_private_employee_employment_second_status', '');
                $customer->setData('source_of_income_private_employee_second_occupation_other', '');



                $customer->setData('source_of_income_government_employee_second_occupation', '');
                $customer->setData('source_of_income_government_employee_second_nature_of_work', '');
                $customer->setData('source_of_income_government_employee_second_position', '');
                $customer->setData('source_of_income_government_employee_second_tenure', '');
                $customer->setData('source_of_income_government_employee_second_net_income', '');
                $customer->setData('source_of_income_government_employee_second_contact_person', '');
                $customer->setData('source_of_income_government_employee_second_contact_number', '');
                $customer->setData('source_of_income_government_employee_second_company_name', '');
                $customer->setData('source_of_income_government_employee_second_building_number', '');
                $customer->setData('source_of_income_government_employee_second_subdivision', '');
                $customer->setData('source_of_income_government_employee_second_street', '');
                $customer->setData('source_of_income_government_employee_second_province', '');
                $customer->setData('source_of_income_government_employee_second_city', '');
                $customer->setData('source_of_income_government_employee_second_barangay', '');
                $customer->setData('source_of_income_government_employee_second_date_hired', '');
                $customer->setData('source_of_income_government_employee_second_status', '');
                $customer->setData('source_of_income_government_employee_second_occupation_other', '');
              }else if($source_of_income_second_category ==6117){


                $customer->setData('source_of_income_private_employee_second_other_occupation','');





                $customer->setData('source_of_income_second_pension', );
                $customer->setData('source_of_income_second_pension_amount', );

                $customer->setData('source_of_income_second_remittance_sender','');
                $customer->setData('source_of_income_second_remittance_relationship','');
                $customer->setData('source_of_income_second_remittance_country','');
                $customer->setData('source_of_income_second_remittance_amount','');




                $customer->setData('source_of_income_second_self_employed_occupation',$source_of_income_second_self_employed_occupation);
                $customer->setData('source_of_income_second_self_employed_type',$source_of_income_second_self_employed_type);
                $customer->setData('source_of_income_second_self_employed_years_of_operation',$source_of_income_second_self_employed_years_of_operation);
                $customer->setData('source_of_income_second_self_employed_net_income',$source_of_income_second_self_employed_net_income);
                $customer->setData('source_of_income_second_self_employed_contact_person',$source_of_income_second_self_employed_contact_person);
                $customer->setData('source_of_income_second_self_employed_contact_number',$source_of_income_second_self_employed_contact_number);
                $customer->setData('source_of_income_second_self_employed_name',$source_of_income_second_self_employed_name);
                $customer->setData('source_of_income_second_self_employed_building_number',$source_of_income_second_self_employed_building_number);
                $customer->setData('source_of_income_second_self_employed_subdivision',$source_of_income_second_self_employed_subdivision);
                $customer->setData('source_of_income_second_self_employed_street',$source_of_income_second_self_employed_street);
                $customer->setData('source_of_income_second_self_employed_barangay',$barangaydropselfemployed);
                $customer->setData('source_of_income_second_self_employed_city',$source_of_income_second_self_employed_city);
                $customer->setData('source_of_income_second_self_employed_province',$source_of_income_second_self_employed_province);


                $customer->setData('source_of_income_second_business_occupation','');
                $customer->setData('source_of_income_second_business_type','');
                $customer->setData('source_of_income_second_business_years_of_operation','');
                $customer->setData('source_of_income_second_business_net_income','');
                $customer->setData('source_of_income_second_business_contact_person','');
                $customer->setData('source_of_income_second_business_contact_number','');
                $customer->setData('source_of_income_second_business_name','');
                $customer->setData('source_of_income_second_business_building_number','');
                $customer->setData('source_of_income_second_business_subdivision','');
                $customer->setData('source_of_income_second_business_street','');
                $customer->setData('source_of_income_second_business_barangay','');
                $customer->setData('source_of_income_second_business_city','');
                $customer->setData('source_of_income_second_business_province','');


                $customer->setData('source_of_income_private_employee_second_occupation', '');
                $customer->setData('source_of_income_private_employee_second_nature_of_work', '');
                $customer->setData('source_of_income_private_employee_second_position', '');
                $customer->setData('source_of_income_private_employee_second_tenure', '');
                $customer->setData('source_of_income_private_employee_second_net_income', '');
                $customer->setData('source_of_income_private_employee_second_contact_person', '');
                $customer->setData('source_of_income_private_employee_second_contact_number', '');
                $customer->setData('source_of_income_private_employee_second_company_name', '');
                $customer->setData('source_of_income_private_employee_second_building_number', '');
                $customer->setData('source_of_income_private_employee_second_subdivision', '');
                $customer->setData('source_of_income_private_employee_second_street', '');
                $customer->setData('source_of_income_private_employee_second_province', '');
                $customer->setData('source_of_income_private_employee_second_city', '');
                $customer->setData('source_of_income_private_employee_second_barangay', '');
                $customer->setData('source_of_income_private_employee_second_date_hired', '');
                $customer->setData('source_of_income_private_employee_employment_second_status', '');
                $customer->setData('source_of_income_private_employee_second_occupation_other', '');



                $customer->setData('source_of_income_government_employee_second_occupation', '');
                $customer->setData('source_of_income_government_employee_second_nature_of_work', '');
                $customer->setData('source_of_income_government_employee_second_position', '');
                $customer->setData('source_of_income_government_employee_second_tenure', '');
                $customer->setData('source_of_income_government_employee_second_net_income', '');
                $customer->setData('source_of_income_government_employee_second_contact_person', '');
                $customer->setData('source_of_income_government_employee_second_contact_number', '');
                $customer->setData('source_of_income_government_employee_second_company_name', '');
                $customer->setData('source_of_income_government_employee_second_building_number', '');
                $customer->setData('source_of_income_government_employee_second_subdivision', '');
                $customer->setData('source_of_income_government_employee_second_street', '');
                $customer->setData('source_of_income_government_employee_second_province', '');
                $customer->setData('source_of_income_government_employee_second_city', '');
                $customer->setData('source_of_income_government_employee_second_barangay', '');
                $customer->setData('source_of_income_government_employee_second_date_hired', '');
                $customer->setData('source_of_income_government_employee_second_status', '');
                $customer->setData('source_of_income_government_employee_second_occupation_other', '');

            }else if($source_of_income_second_category ==6118){
                $customer->setData('source_of_income_private_employee_second_other_occupation','');





                $customer->setData('source_of_income_second_pension', );
                $customer->setData('source_of_income_second_pension_amount', );

                $customer->setData('source_of_income_second_remittance_sender','');
                $customer->setData('source_of_income_second_remittance_relationship','');
                $customer->setData('source_of_income_second_remittance_country','');
                $customer->setData('source_of_income_second_remittance_amount','');




                $customer->setData('source_of_income_second_self_employed_occupation','');
                $customer->setData('source_of_income_second_self_employed_type','');
                $customer->setData('source_of_income_second_self_employed_years_of_operation','');
                $customer->setData('source_of_income_second_self_employed_net_income','');
                $customer->setData('source_of_income_second_self_employed_contact_person','');
                $customer->setData('source_of_income_second_self_employed_contact_number','');
                $customer->setData('source_of_income_second_self_employed_name','');
                $customer->setData('source_of_income_second_self_employed_building_number','');
                $customer->setData('source_of_income_second_self_employed_subdivision','');
                $customer->setData('source_of_income_second_self_employed_street','');
                $customer->setData('source_of_income_second_self_employed_barangay','');
                $customer->setData('source_of_income_second_self_employed_city',);
                $customer->setData('source_of_income_second_self_employed_province','');


                $customer->setData('source_of_income_second_business_occupation',$source_of_income_second_business_occupation);
                $customer->setData('source_of_income_second_business_type',$source_of_income_second_business_type);
                $customer->setData('source_of_income_second_business_years_of_operation',$source_of_income_second_business_years_of_operation);
                $customer->setData('source_of_income_second_business_net_income',$source_of_income_second_business_net_income);
                $customer->setData('source_of_income_second_business_contact_person',$source_of_income_second_business_contact_person);
                $customer->setData('source_of_income_second_business_contact_number',$source_of_income_second_business_contact_number);
                $customer->setData('source_of_income_second_business_name',$source_of_income_second_business_name);
                $customer->setData('source_of_income_second_business_building_number',$source_of_income_second_business_building_number);
                $customer->setData('source_of_income_second_business_subdivision',$source_of_income_second_business_subdivision);
                $customer->setData('source_of_income_second_business_street',$source_of_income_second_business_street);
                $customer->setData('source_of_income_second_business_barangay',$source_of_income_second_business_barangay);
                $customer->setData('source_of_income_second_business_city',$source_of_income_second_business_city);
                $customer->setData('source_of_income_second_business_province',$source_of_income_second_business_province);


                $customer->setData('source_of_income_private_employee_second_occupation', '');
                $customer->setData('source_of_income_private_employee_second_nature_of_work', '');
                $customer->setData('source_of_income_private_employee_second_position', '');
                $customer->setData('source_of_income_private_employee_second_tenure', '');
                $customer->setData('source_of_income_private_employee_second_net_income', '');
                $customer->setData('source_of_income_private_employee_second_contact_person', '');
                $customer->setData('source_of_income_private_employee_second_contact_number', '');
                $customer->setData('source_of_income_private_employee_second_company_name', '');
                $customer->setData('source_of_income_private_employee_second_building_number', '');
                $customer->setData('source_of_income_private_employee_second_subdivision', '');
                $customer->setData('source_of_income_private_employee_second_street', '');
                $customer->setData('source_of_income_private_employee_second_province', '');
                $customer->setData('source_of_income_private_employee_second_city', '');
                $customer->setData('source_of_income_private_employee_second_barangay', '');
                $customer->setData('source_of_income_private_employee_second_date_hired', '');
                $customer->setData('source_of_income_private_employee_employment_second_status', '');
                $customer->setData('source_of_income_private_employee_second_occupation_other', '');



                $customer->setData('source_of_income_government_employee_second_occupation', '');
                $customer->setData('source_of_income_government_employee_second_nature_of_work', '');
                $customer->setData('source_of_income_government_employee_second_position', '');
                $customer->setData('source_of_income_government_employee_second_tenure', '');
                $customer->setData('source_of_income_government_employee_second_net_income', '');
                $customer->setData('source_of_income_government_employee_second_contact_person', '');
                $customer->setData('source_of_income_government_employee_second_contact_number', '');
                $customer->setData('source_of_income_government_employee_second_company_name', '');
                $customer->setData('source_of_income_government_employee_second_building_number', '');
                $customer->setData('source_of_income_government_employee_second_subdivision', '');
                $customer->setData('source_of_income_government_employee_second_street', '');
                $customer->setData('source_of_income_government_employee_second_province', '');
                $customer->setData('source_of_income_government_employee_second_city', '');
                $customer->setData('source_of_income_government_employee_second_barangay', '');
                $customer->setData('source_of_income_government_employee_second_date_hired', '');
                $customer->setData('source_of_income_government_employee_second_status', '');
                $customer->setData('source_of_income_government_employee_second_occupation_other', '');
        }else if($source_of_income_second_category ==6115){

            $customer->setData('source_of_income_private_employee_second_other_occupation','');





            $customer->setData('source_of_income_second_pension', );
            $customer->setData('source_of_income_second_pension_amount', );

            $customer->setData('source_of_income_second_remittance_sender','');
            $customer->setData('source_of_income_second_remittance_relationship','');
            $customer->setData('source_of_income_second_remittance_country','');
            $customer->setData('source_of_income_second_remittance_amount','');




            $customer->setData('source_of_income_second_self_employed_occupation','');
            $customer->setData('source_of_income_second_self_employed_type','');
            $customer->setData('source_of_income_second_self_employed_years_of_operation','');
            $customer->setData('source_of_income_second_self_employed_net_income','');
            $customer->setData('source_of_income_second_self_employed_contact_person','');
            $customer->setData('source_of_income_second_self_employed_contact_number','');
            $customer->setData('source_of_income_second_self_employed_name','');
            $customer->setData('source_of_income_second_self_employed_building_number','');
            $customer->setData('source_of_income_second_self_employed_subdivision','');
            $customer->setData('source_of_income_second_self_employed_street','');
            $customer->setData('source_of_income_second_self_employed_barangay','');
            $customer->setData('source_of_income_second_self_employed_city',);
            $customer->setData('source_of_income_second_self_employed_province','');


            $customer->setData('source_of_income_second_business_occupation','');
            $customer->setData('source_of_income_second_business_type','');
            $customer->setData('source_of_income_second_business_years_of_operation','');
            $customer->setData('source_of_income_second_business_net_income','');
            $customer->setData('source_of_income_second_business_contact_person','');
            $customer->setData('source_of_income_second_business_contact_number','');
            $customer->setData('source_of_income_second_business_name','');
            $customer->setData('source_of_income_second_business_building_number','');
            $customer->setData('source_of_income_second_business_subdivision','');
            $customer->setData('source_of_income_second_business_street','');
            $customer->setData('source_of_income_second_business_barangay','');
            $customer->setData('source_of_income_second_business_city','');
            $customer->setData('source_of_income_second_business_province','');


            $customer->setData('source_of_income_private_employee_second_occupation', $source_of_income_private_employee_second_occupation);
            $customer->setData('source_of_income_private_employee_second_nature_of_work', $source_of_income_private_employee_second_nature_of_work);
            $customer->setData('source_of_income_private_employee_second_position', $source_of_income_private_employee_second_position);
            $customer->setData('source_of_income_private_employee_second_tenure', $source_of_income_private_employee_second_tenure);
            $customer->setData('source_of_income_private_employee_second_net_income', $source_of_income_private_employee_second_net_income);
            $customer->setData('source_of_income_private_employee_second_contact_person', $source_of_income_private_employee_second_contact_person);
            $customer->setData('source_of_income_private_employee_second_contact_number', $source_of_income_private_employee_second_contact_number);
            $customer->setData('source_of_income_private_employee_second_company_name', $source_of_income_private_employee_second_company_name);
            $customer->setData('source_of_income_private_employee_second_building_number', $source_of_income_private_employee_second_building_number);
            $customer->setData('source_of_income_private_employee_second_subdivision', $source_of_income_private_employee_second_subdivision);
            $customer->setData('source_of_income_private_employee_second_street', $source_of_income_private_employee_second_street);
            $customer->setData('source_of_income_private_employee_second_province', $source_of_income_private_employee_second_province);
            $customer->setData('source_of_income_private_employee_second_city', $source_of_income_private_employee_second_city);
            $customer->setData('source_of_income_private_employee_second_barangay', $source_of_income_private_employee_second_barangay);
            $customer->setData('source_of_income_private_employee_second_date_hired', $source_of_income_private_employee_second_date_hired);
            $customer->setData('source_of_income_private_employee_employment_second_status', $source_of_income_private_employee_employment_second_status);
            $customer->setData('source_of_income_private_employee_second_occupation_other', $source_of_income_private_employee_second_occupation_other);



            $customer->setData('source_of_income_government_employee_second_occupation', '');
            $customer->setData('source_of_income_government_employee_second_nature_of_work', '');
            $customer->setData('source_of_income_government_employee_second_position', '');
            $customer->setData('source_of_income_government_employee_second_tenure', '');
            $customer->setData('source_of_income_government_employee_second_net_income', '');
            $customer->setData('source_of_income_government_employee_second_contact_person', '');
            $customer->setData('source_of_income_government_employee_second_contact_number', '');
            $customer->setData('source_of_income_government_employee_second_company_name', '');
            $customer->setData('source_of_income_government_employee_second_building_number', '');
            $customer->setData('source_of_income_government_employee_second_subdivision', '');
            $customer->setData('source_of_income_government_employee_second_street', '');
            $customer->setData('source_of_income_government_employee_second_province', '');
            $customer->setData('source_of_income_government_employee_second_city', '');
            $customer->setData('source_of_income_government_employee_second_barangay', '');
            $customer->setData('source_of_income_government_employee_second_date_hired', '');
            $customer->setData('source_of_income_government_employee_second_status', '');
            $customer->setData('source_of_income_government_employee_second_occupation_other', '');

    }else if($source_of_income_second_category ==6113){

        $customer->setData('source_of_income_private_employee_second_other_occupation','');





    $customer->setData('source_of_income_second_pension', );
    $customer->setData('source_of_income_second_pension_amount', );

    $customer->setData('source_of_income_second_remittance_sender','');
    $customer->setData('source_of_income_second_remittance_relationship','');
    $customer->setData('source_of_income_second_remittance_country','');
    $customer->setData('source_of_income_second_remittance_amount','');




    $customer->setData('source_of_income_second_self_employed_occupation','');
    $customer->setData('source_of_income_second_self_employed_type','');
    $customer->setData('source_of_income_second_self_employed_years_of_operation','');
    $customer->setData('source_of_income_second_self_employed_net_income','');
    $customer->setData('source_of_income_second_self_employed_contact_person','');
    $customer->setData('source_of_income_second_self_employed_contact_number','');
    $customer->setData('source_of_income_second_self_employed_name','');
    $customer->setData('source_of_income_second_self_employed_building_number','');
    $customer->setData('source_of_income_second_self_employed_subdivision','');
    $customer->setData('source_of_income_second_self_employed_street','');
    $customer->setData('source_of_income_second_self_employed_barangay','');
    $customer->setData('source_of_income_second_self_employed_city',);
    $customer->setData('source_of_income_second_self_employed_province','');


    $customer->setData('source_of_income_second_business_occupation','');
    $customer->setData('source_of_income_second_business_type','');
    $customer->setData('source_of_income_second_business_years_of_operation','');
    $customer->setData('source_of_income_second_business_net_income','');
    $customer->setData('source_of_income_second_business_contact_person','');
    $customer->setData('source_of_income_second_business_contact_number','');
    $customer->setData('source_of_income_second_business_name','');
    $customer->setData('source_of_income_second_business_building_number','');
    $customer->setData('source_of_income_second_business_subdivision','');
    $customer->setData('source_of_income_second_business_street','');
    $customer->setData('source_of_income_second_business_barangay','');
    $customer->setData('source_of_income_second_business_city','');
    $customer->setData('source_of_income_second_business_province','');


    $customer->setData('source_of_income_private_employee_second_occupation', '');
    $customer->setData('source_of_income_private_employee_second_nature_of_work', '');
    $customer->setData('source_of_income_private_employee_second_position', '');
    $customer->setData('source_of_income_private_employee_second_tenure', '');
    $customer->setData('source_of_income_private_employee_second_net_income', '');
    $customer->setData('source_of_income_private_employee_second_contact_person', '');
    $customer->setData('source_of_income_private_employee_second_contact_number', '');
    $customer->setData('source_of_income_private_employee_second_company_name', '');
    $customer->setData('source_of_income_private_employee_second_building_number', '');
    $customer->setData('source_of_income_private_employee_second_subdivision', '');
    $customer->setData('source_of_income_private_employee_second_street', '');
    $customer->setData('source_of_income_private_employee_second_province','');
    $customer->setData('source_of_income_private_employee_second_city', '');
    $customer->setData('source_of_income_private_employee_second_barangay', '');
    $customer->setData('source_of_income_private_employee_second_date_hired', '');
    $customer->setData('source_of_income_private_employee_employment_second_status', '');
    $customer->setData('source_of_income_private_employee_second_occupation_other', '');



    $customer->setData('source_of_income_government_employee_second_occupation', $source_of_income_government_employee_second_occupation);
    $customer->setData('source_of_income_government_employee_second_nature_of_work', $source_of_income_government_employee_second_nature_of_work);
    $customer->setData('source_of_income_government_employee_second_position', $source_of_income_government_employee_second_position);
    $customer->setData('source_of_income_government_employee_second_tenure', $source_of_income_government_employee_second_tenure);
    $customer->setData('source_of_income_government_employee_second_net_income', $source_of_income_government_employee_second_net_income);
    $customer->setData('source_of_income_government_employee_second_contact_person', $source_of_income_government_employee_second_contact_person);
    $customer->setData('source_of_income_government_employee_second_contact_number', $source_of_income_government_employee_second_contact_number);
    $customer->setData('source_of_income_government_employee_second_company_name', $source_of_income_government_employee_second_company_name);
    $customer->setData('source_of_income_government_employee_second_building_number', $source_of_income_government_employee_second_building_number);
    $customer->setData('source_of_income_government_employee_second_subdivision', $source_of_income_government_employee_second_subdivision);
    $customer->setData('source_of_income_government_employee_second_street', $source_of_income_government_employee_second_street);
    $customer->setData('source_of_income_government_employee_second_province', $source_of_income_government_employee_second_province);
    $customer->setData('source_of_income_government_employee_second_city', $source_of_income_government_employee_second_city);
    $customer->setData('source_of_income_government_employee_second_barangay', $source_of_income_government_employee_second_barangay);
    $customer->setData('source_of_income_government_employee_second_date_hired', $source_of_income_government_employee_second_date_hired);
    $customer->setData('source_of_income_government_employee_second_status', $source_of_income_government_employee_second_status);
    $customer->setData('source_of_income_government_employee_second_occupation_other', $source_of_income_government_employee_second_occupation_other);

}else{
                $customer->setData('source_of_income_private_employee_second_other_occupation',$source_of_income_private_employee_second_other_occupation);


                $customer->setData('source_of_income_second_pension', $source_of_income_second_pension);
                $customer->setData('source_of_income_second_pension_amount', $source_of_income_second_pension_amount);

                $customer->setData('source_of_income_second_remittance_sender',$source_of_income_second_remittance_sender);
                $customer->setData('source_of_income_second_remittance_relationship',$source_of_income_second_remittance_relationship);
                $customer->setData('source_of_income_second_remittance_country',$source_of_income_second_remittance_country);
                $customer->setData('source_of_income_second_remittance_amount',$source_of_income_second_remittance_amount);



                $customer->setData('source_of_income_second_self_employed_occupation',$source_of_income_second_self_employed_occupation);
                $customer->setData('source_of_income_second_self_employed_type',$source_of_income_second_self_employed_type);
                $customer->setData('source_of_income_second_self_employed_years_of_operation',$source_of_income_second_self_employed_years_of_operation);
                $customer->setData('source_of_income_second_self_employed_net_income',$source_of_income_second_self_employed_net_income);
                $customer->setData('source_of_income_second_self_employed_contact_person',$source_of_income_second_self_employed_contact_person);
                $customer->setData('source_of_income_second_self_employed_contact_number',$source_of_income_second_self_employed_contact_number);
                $customer->setData('source_of_income_second_self_employed_name',$source_of_income_second_self_employed_name);
                $customer->setData('source_of_income_second_self_employed_building_number',$source_of_income_second_self_employed_building_number);
                $customer->setData('source_of_income_second_self_employed_subdivision',$source_of_income_second_self_employed_subdivision);
                $customer->setData('source_of_income_second_self_employed_street',$source_of_income_second_self_employed_street);
                $customer->setData('source_of_income_second_self_employed_barangay',$barangaydropselfemployed);
                $customer->setData('source_of_income_second_self_employed_city',$source_of_income_second_self_employed_city);
                $customer->setData('source_of_income_second_self_employed_province',$source_of_income_second_self_employed_province);





                $customer->setData('source_of_income_second_business_occupation',$source_of_income_second_business_occupation);
                $customer->setData('source_of_income_second_business_type',$source_of_income_second_business_type);
                $customer->setData('source_of_income_second_business_years_of_operation',$source_of_income_second_business_years_of_operation);
                $customer->setData('source_of_income_second_business_net_income',$source_of_income_second_business_net_income);
                $customer->setData('source_of_income_second_business_contact_person',$source_of_income_second_business_contact_person);
                $customer->setData('source_of_income_second_business_contact_number',$source_of_income_second_business_contact_number);
                $customer->setData('source_of_income_second_business_name',$source_of_income_second_business_name);
                $customer->setData('source_of_income_second_business_building_number',$source_of_income_second_business_building_number);
                $customer->setData('source_of_income_second_business_subdivision',$source_of_income_second_business_subdivision);
                $customer->setData('source_of_income_second_business_street',$source_of_income_second_business_street);
                $customer->setData('source_of_income_second_business_barangay',$barangaydropbusiness);
                $customer->setData('source_of_income_second_business_city',$source_of_income_second_business_city);
                $customer->setData('source_of_income_second_business_province',$source_of_income_second_business_province);




            $customer->setData('source_of_income_private_employee_second_occupation', $source_of_income_private_employee_second_occupation);
            $customer->setData('source_of_income_private_employee_second_nature_of_work', $source_of_income_private_employee_second_nature_of_work);
            $customer->setData('source_of_income_private_employee_second_position', $source_of_income_private_employee_second_position);
            $customer->setData('source_of_income_private_employee_second_tenure', $source_of_income_private_employee_second_tenure);
            $customer->setData('source_of_income_private_employee_second_net_income', $source_of_income_private_employee_second_net_income);
            $customer->setData('source_of_income_private_employee_second_contact_person', $source_of_income_private_employee_second_contact_person);
            $customer->setData('source_of_income_private_employee_second_contact_number', $source_of_income_private_employee_second_contact_number);
            $customer->setData('source_of_income_private_employee_second_company_name', $source_of_income_private_employee_second_company_name);
            $customer->setData('source_of_income_private_employee_second_building_number', $source_of_income_private_employee_second_building_number);
            $customer->setData('source_of_income_private_employee_second_subdivision', $source_of_income_private_employee_second_subdivision);
            $customer->setData('source_of_income_private_employee_second_street', $source_of_income_private_employee_second_street);
            $customer->setData('source_of_income_private_employee_second_province', $source_of_income_private_employee_second_province);
            $customer->setData('source_of_income_private_employee_second_city', $source_of_income_private_employee_second_city);
            $customer->setData('source_of_income_private_employee_second_barangay', $source_of_income_private_employee_second_barangay);
            $customer->setData('source_of_income_private_employee_second_date_hired', $source_of_income_private_employee_second_date_hired);
            $customer->setData('source_of_income_private_employee_employment_second_status', $source_of_income_private_employee_employment_second_status);
            $customer->setData('source_of_income_private_employee_second_occupation_other', $source_of_income_private_employee_second_occupation_other);


            $customer->setData('source_of_income_government_employee_second_occupation', $source_of_income_government_employee_second_occupation);
            $customer->setData('source_of_income_government_employee_second_nature_of_work', $source_of_income_government_employee_second_nature_of_work);
            $customer->setData('source_of_income_government_employee_second_position', $source_of_income_government_employee_second_position);
            $customer->setData('source_of_income_government_employee_second_tenure', $source_of_income_government_employee_second_tenure);
            $customer->setData('source_of_income_government_employee_second_net_income', $source_of_income_government_employee_second_net_income);
            $customer->setData('source_of_income_government_employee_second_contact_person', $source_of_income_government_employee_second_contact_person);
            $customer->setData('source_of_income_government_employee_second_contact_number', $source_of_income_government_employee_second_contact_number);
            $customer->setData('source_of_income_government_employee_second_company_name', $source_of_income_government_employee_second_company_name);
            $customer->setData('source_of_income_government_employee_second_building_number', $source_of_income_government_employee_second_building_number);
            $customer->setData('source_of_income_government_employee_second_subdivision', $source_of_income_government_employee_second_subdivision);
            $customer->setData('source_of_income_government_employee_second_street', $source_of_income_government_employee_second_street);
            $customer->setData('source_of_income_government_employee_second_province', $source_of_income_government_employee_second_province);
            $customer->setData('source_of_income_government_employee_second_city', $source_of_income_government_employee_second_city);
            $customer->setData('source_of_income_government_employee_second_barangay', $source_of_income_government_employee_second_barangay);
            $customer->setData('source_of_income_government_employee_second_date_hired', $source_of_income_government_employee_second_date_hired);
            $customer->setData('source_of_income_government_employee_second_status', $source_of_income_government_employee_second_status);
            $customer->setData('source_of_income_government_employee_second_occupation_other', $source_of_income_government_employee_second_occupation_other);

            
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
            } else {
                $logger->info('source_of_income_second_category is not set');
            }

        } catch (\Exception $e) {
            // Log the exception
            $logger->info('Exception: ' . $e->getMessage());

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

            // Optionally, redirect to an error page
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('client/personal/index');
            return $resultRedirect;
        }
    }
}
