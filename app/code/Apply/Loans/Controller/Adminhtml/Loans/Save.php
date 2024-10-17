<?php
namespace Apply\Loans\Controller\Adminhtml\Loans;

use Magento\Backend\App\Action;
use Magento\Customer\Model\CustomerFactory;
use Apply\Loans\Model\Email\Sender\LoanAdminSender;

class Save extends Action
{
    /**
     * @var \Apply\Loans\Model\Loan
     */
    protected $_model;

    /**
     * @param Action\Context $context
     * @param \Apply\Loans\Model\Loan $model
     */

       /**
     * @var LoanAdminSender
     */
    protected $loanAdminSender;

    protected $customerFactory;

    public function __construct(
        Action\Context $context,
        \Apply\Loans\Model\Loan $model,
        CustomerFactory $customerFactory,
        LoanAdminSender $loanAdminSender // Corrected namespace
    ) {
        parent::__construct($context);
        $this->_model = $model;
        $this->customerFactory = $customerFactory;
        $this->loanAdminSender= $loanAdminSender; // Corrected namespace
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Apply_Loans::loans_save');
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            /** @var \Apply\Loans\Model\Loan $model */
            $model = $this->_model;

            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }

            $model->setData($data);

            $this->_eventManager->dispatch(
                'apply_loan_prepare_save',
                ['loans' => $model, 'request' => $this->getRequest()]
            );


            try {

                $model->save();

                // Call the loan confirmation email sender method only if the new status is 'Canceled'
                if ($model->getLoanStatus() === 'Canceled') {
                    $this->sendLoanCanceledEmail($model->getId());
                }elseif($model->getLoanStatus() === 'Processing'){
                    $this->sendLoanProcessingEmail($model->getId());
                }elseif($model->getLoanStatus() === 'Rejected'){
                    $this->sendLoanRejectedEmail($model->getId());
                }elseif($model->getLoanStatus() === 'Approved'){
                    $this->sendLoanApprovedEmail($model->getId());
                }

                $this->messageManager->addSuccess(__('Loans saved'));
                $this->_getSession()->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');

            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the loans'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['entity_id' => $this->getRequest()->getParam('id')]);
        }

        return $resultRedirect->setPath('*/*/');
    }


    protected function sendLoanCanceledEmail($id)
    {

        $model = $this->_model;
if ($id) {
    $model->load($id);
}
        // Get the customer email from the application model
        $customerId =  $model->getCustomerEntityId();
        $customer = $this->customerFactory->create()->load($customerId);
        $customerEmail =  $customer->getEmail();
        $customerName = $customer->getFirstname() . ' ' . $customer->getMiddlename() . ' ' . $customer->getLastname() . ' ' . $customer->getSuffix();

        $downpayment = $model->getLoanDowpayment();
        $terms = $model->getLoanTerm();
        $branchTitle = $model->getLoanDealerBranchTitle();
        $totalComputed = $model->getLoanAmortization();

        $productName = $model->getMotorcycleModel();
        $productPrice = $model->getMotorcyclePrice();

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
            'downpayments' =>  $downpayments,
            'myBranchTitle' => $branchTitle,
            'store_phone' => '123-456-7890',
            'store_email' => 'contact@example.com',
            'store_hours' => 'Monday-Friday: 9 AM - 5 PM',
            'product_name' =>  $productName,
            'product_price' =>  $productPrice,
        ];

        // Call the email sender method with the email variables
        $this->loanAdminSender->sendLoanCanceledEmail($emailVars, $customerEmail);
    }

    protected function sendLoanProcessingEmail($id)
    {

        $model = $this->_model;
        if ($id) {
            $model->load($id);
        }
        // Get the customer email from the application model
        $customerId =  $model->getCustomerEntityId();
        $customer = $this->customerFactory->create()->load($customerId);
        $customerEmail =  $customer->getEmail();
        $customerName = $customer->getFirstname() . ' ' . $customer->getMiddlename() . ' ' . $customer->getLastname() . ' ' . $customer->getSuffix();

        $downpayment = $model->getLoanDowpayment();
        $terms = $model->getLoanTerm();
        $branchTitle = $model->getLoanDealerBranchTitle();
        $totalComputed = $model->getLoanAmortization();

        $productName = $model->getMotorcycleModel();
        $productPrice = $model->getMotorcyclePrice();

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
            'downpayments' =>  $downpayments,
            'myBranchTitle' => $branchTitle,
            'store_phone' => '123-456-7890',
            'store_email' => 'contact@example.com',
            'store_hours' => 'Monday-Friday: 9 AM - 5 PM',
            'product_name' =>  $productName,
            'product_price' =>  $productPrice,
        ];

        // Call the email sender method with the email variables
        $this->loanAdminSender->sendLoanProcessingEmail($emailVars, $customerEmail);
    }

    protected function sendLoanRejectedEmail($id)
    {

        $model = $this->_model;
        if ($id) {
            $model->load($id);
        }
        // Get the customer email from the application model
        $customerId =  $model->getCustomerEntityId();
        $customer = $this->customerFactory->create()->load($customerId);
        $customerEmail =  $customer->getEmail();
        $customerName = $customer->getFirstname() . ' ' . $customer->getMiddlename() . ' ' . $customer->getLastname() . ' ' . $customer->getSuffix();

        $downpayment = $model->getLoanDowpayment();
        $terms = $model->getLoanTerm();
        $branchTitle = $model->getLoanDealerBranchTitle();
        $totalComputed = $model->getLoanAmortization();

        $productName = $model->getMotorcycleModel();
        $productPrice = $model->getMotorcyclePrice();

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
            'downpayments' =>  $downpayments,
            'myBranchTitle' => $branchTitle,
            'store_phone' => '123-456-7890',
            'store_email' => 'contact@example.com',
            'store_hours' => 'Monday-Friday: 9 AM - 5 PM',
            'product_name' =>  $productName,
            'product_price' =>  $productPrice,
        ];

        // Call the email sender method with the email variables
        $this->loanAdminSender->sendLoanRejectedEmail($emailVars, $customerEmail);
    }




    protected function sendLoanApprovedEmail($id)
    {

        $model = $this->_model;
        if ($id) {
            $model->load($id);
        }
        // Get the customer email from the application model
        $customerId =  $model->getCustomerEntityId();
        $customer = $this->customerFactory->create()->load($customerId);
        $customerEmail =  $customer->getEmail();
        $customerName = $customer->getFirstname() . ' ' . $customer->getMiddlename() . ' ' . $customer->getLastname() . ' ' . $customer->getSuffix();

        $downpayment = $model->getLoanDowpayment();
        $terms = $model->getLoanTerm();
        $branchTitle = $model->getLoanDealerBranchTitle();
        $totalComputed = $model->getLoanAmortization();

        $productName = $model->getMotorcycleModel();
        $productPrice = $model->getMotorcyclePrice();

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
            'downpayments' =>  $downpayments,
            'myBranchTitle' => $branchTitle,
            'store_phone' => '123-456-7890',
            'store_email' => 'contact@example.com',
            'store_hours' => 'Monday-Friday: 9 AM - 5 PM',
            'product_name' =>  $productName,
            'product_price' =>  $productPrice,
        ];

        // Call the email sender method with the email variables
        $this->loanAdminSender->sendLoanApprovedEmail($emailVars, $customerEmail);
    }

}
