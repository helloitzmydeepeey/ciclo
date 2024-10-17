<?php

namespace Customer\NewAttribute\Controller\Applications;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Customer\NewAttribute\Model\ApplicationsFactory;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Customer\Model\CustomerFactory;
use Apply\Loans\Model\Email\Sender\LoanSender; // Corrected namespace

class Cancel extends Action
{
      /**
     * @var LoanSender
     */
    protected $loanSender;
    protected $applicationsFactory;
    protected $customerFactory;
    protected $customerSession;
    public function __construct(
        Context $context,
        ApplicationsFactory $applicationsFactory,
        CustomerSession $customerSession,
        CustomerFactory $customerFactory,
        LoanSender $loanSender // Corrected namespace
    ) {
        parent::__construct($context);
        $this->applicationsFactory = $applicationsFactory;
        $this->customerSession = $customerSession;
        $this->customerFactory = $customerFactory;
        $this->loanSender = $loanSender; // Corrected namespace
    }

    public function execute()
    {
        $applicationId = $this->getRequest()->getParam('id');

        if ($applicationId) {
            $applicationsModel = $this->applicationsFactory->create();
            $applicationsModel->load($applicationId);
            if ($applicationsModel->getId()) {
                // Change the status to "Canceled" and save the application
                $applicationsModel->setData('loan_status', 'Canceled');
                $applicationsModel->save();
            }
        }
        // Call the loan confirmation email sender method
        $this->sendLoanCanceledEmail();
        // Redirect back to the applications page
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('client/applications/index');
        return $resultRedirect;
    }

    protected function sendLoanCanceledEmail()
    {
        $applicationId = $this->getRequest()->getParam('id');
        $applicationsModel = $this->applicationsFactory->create();
        $applicationsModel->load($applicationId);

         // Get the customer email from the logged-in customer session
         $customerId = $applicationsModel->getCustomerEntityId();
         $customer = $this->customerFactory->create()->load($customerId);
         $customerName = $customer->getFirstname() . ' ' . $customer->getMiddlename() . ' ' . $customer->getLastname() . ' ' . $customer->getSuffix();

         $downpayment = $applicationsModel->getLoanDowpayment();
        $terms = $applicationsModel->getLoanTerm();
        $branchTitle = $applicationsModel->getLoanDealerBranchTitle();
        $totalComputed =$applicationsModel->getLoanAmortization();



        $productName =$applicationsModel->getMotorcycleModel();
        $productPrice = $applicationsModel->getMotorcyclePrice();


        // Prepare the necessary data for the email template
        $customerNames = $customerName;
        $downpayments = $downpayment;
        $monthlyAmort =  $totalComputed;
        $loanTerms = $terms;

        // Set up email variables
        $emailVars = [
            'customer_name' => $customerNames,
            'monthly_amortization' => $monthlyAmort,
            'loan_terms' => $loanTerms,
            'downpayments'=>  $downpayments,
            'myBranchTitle' => $branchTitle,
            'store_phone' => '123-456-7890',
            'store_email' => 'contact@example.com',
            'store_hours' => 'Monday-Friday: 9 AM - 5 PM',
            'product_name' =>  $productName,
            'product_price' =>  $productPrice,
        ];
         // Call the email sender method with the email variables
         $this->loanSender->sendLoanCanceledEmail($emailVars);
    }
}
