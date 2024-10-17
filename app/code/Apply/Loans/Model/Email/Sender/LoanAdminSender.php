<?php
namespace Apply\Loans\Model\Email\Sender;

use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Mail\Template\TransportBuilder;

/**
 * Sends the loan confirmation email to the customer.
 */
class LoanAdminSender
{
    /**
     * @var ManagerInterface
     */
    protected $eventManager;

    protected $transportObject;

    /**
     * @param ManagerInterface $eventManager
     * @param TransportBuilder $transportObject
     */
    public function __construct(
        ManagerInterface $eventManager,
        TransportBuilder $transportObject
    ) {
        $this->eventManager = $eventManager;
        $this->transportObject = $transportObject;
    }



    /**
      * Sends the loan canceled email to the customer.
     *
     * @param array $emailVars
     * @param string $customerEmail
     * @return bool
     */
     public function sendLoanCanceledEmail(array $emailVars, $customerEmail)
    {
        // Prepare email template with variables
        $transport = new DataObject($emailVars);

        $this->eventManager->dispatch(
            'email_loan_set_template_vars_before',
            ['sender' => $this, 'transport' => $transport, 'transportObject' => $transport]
        );

        // Load the email template using your preferred method, such as sending via TransportBuilder or any other
        // custom method you are using to send emails in Magento.
         $this->sendCanceledEmail($transport, $customerEmail); // Pass $transport and $customerEmail to the sendEmail method

        return true;
    }

    /**
     * Sends the email using the given transport object.
     *
     * @param DataObject $transportObject
     * @param string $customerEmail
     * @return void
     */
    protected function sendCanceledEmail(DataObject $transportObject, $customerEmail)
    {
        $emailVars = $transportObject->getData();

        $transport = $this->transportObject
        ->setTemplateIdentifier('loan_emails_loans_canceled_template_loans_admin_canceled') // Identifier of your custom email template for adminhtml
            ->setTemplateOptions([
                'area' => \Magento\Framework\App\Area::AREA_ADMINHTML, // Use AREA_ADMINHTML for backend email templates
                'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
            ])
            ->setTemplateVars($emailVars)
            ->setFrom('general') // Replace with the sender name defined in the configuration
            ->addTo($customerEmail) // Pass the customer email address
            ->getTransport();

        $transport->sendMessage();
    }




    /**
      * Sends the loan processing email to the customer.
     *
     * @param array $emailVars
     * @param string $customerEmail
     * @return bool
     */
    public function sendLoanProcessingEmail(array $emailVars, $customerEmail)
    {
        // Prepare email template with variables
        $transport = new DataObject($emailVars);

        $this->eventManager->dispatch(
            'email_loan_set_template_vars_before',
            ['sender' => $this, 'transport' => $transport, 'transportObject' => $transport]
        );

        // Load the email template using your preferred method, such as sending via TransportBuilder or any other
        // custom method you are using to send emails in Magento.
         $this->sendProcessingEmail($transport, $customerEmail); // Pass $transport and $customerEmail to the sendEmail method

        return true;
    }

    /**
     * Sends the email using the given transport object.
     *
     * @param DataObject $transportObject
     * @param string $customerEmail
     * @return void
     */
    protected function sendProcessingEmail(DataObject $transportObject, $customerEmail)
    {
        $emailVars = $transportObject->getData();

        $transport = $this->transportObject
        ->setTemplateIdentifier('loan_emails_loans_admin_processing_template_loans_admin_processing') // Identifier of your custom email template for adminhtml
            ->setTemplateOptions([
                'area' => \Magento\Framework\App\Area::AREA_ADMINHTML, // Use AREA_ADMINHTML for backend email templates
                'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
            ])
            ->setTemplateVars($emailVars)
            ->setFrom('general') // Replace with the sender name defined in the configuration
            ->addTo($customerEmail) // Pass the customer email address
            ->getTransport();

        $transport->sendMessage();
    }

     /**
      * Sends the loan rejected email to the customer.
     *
     * @param array $emailVars
     * @param string $customerEmail
     * @return bool
     */
    public function sendLoanRejectedEmail(array $emailVars, $customerEmail)
    {
        // Prepare email template with variables
        $transport = new DataObject($emailVars);

        $this->eventManager->dispatch(
            'email_loan_set_template_vars_before',
            ['sender' => $this, 'transport' => $transport, 'transportObject' => $transport]
        );

        // Load the email template using your preferred method, such as sending via TransportBuilder or any other
        // custom method you are using to send emails in Magento.
         $this->sendRejectedEmail($transport, $customerEmail); // Pass $transport and $customerEmail to the sendEmail method

        return true;
    }

    /**
     * Sends the email using the given transport object.
     *
     * @param DataObject $transportObject
     * @param string $customerEmail
     * @return void
     */
    protected function sendRejectedEmail(DataObject $transportObject, $customerEmail)
    {
        $emailVars = $transportObject->getData();

        $transport = $this->transportObject
        ->setTemplateIdentifier('loan_emails_loans_admin_rejected_template_loans_admin_rejected') // Identifier of your custom email template for adminhtml
            ->setTemplateOptions([
                'area' => \Magento\Framework\App\Area::AREA_ADMINHTML, // Use AREA_ADMINHTML for backend email templates
                'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
            ])
            ->setTemplateVars($emailVars)
            ->setFrom('general') // Replace with the sender name defined in the configuration
            ->addTo($customerEmail) // Pass the customer email address
            ->getTransport();

        $transport->sendMessage();
    }



    /**
      * Sends the loan processing email to the customer.
     *
     * @param array $emailVars
     * @param string $customerEmail
     * @return bool
     */
    public function sendLoanApprovedEmail(array $emailVars, $customerEmail)
    {
        // Prepare email template with variables
        $transport = new DataObject($emailVars);

        $this->eventManager->dispatch(
            'email_loan_set_template_vars_before',
            ['sender' => $this, 'transport' => $transport, 'transportObject' => $transport]
        );

        // Load the email template using your preferred method, such as sending via TransportBuilder or any other
        // custom method you are using to send emails in Magento.
         $this->sendApprovedEmail($transport, $customerEmail); // Pass $transport and $customerEmail to the sendEmail method

        return true;
    }

    /**
     * Sends the email using the given transport object.
     *
     * @param DataObject $transportObject
     * @param string $customerEmail
     * @return void
     */
    protected function sendApprovedEmail(DataObject $transportObject, $customerEmail)
    {
        $emailVars = $transportObject->getData();

        $transport = $this->transportObject
        ->setTemplateIdentifier('loan_emails_loans_admin_approved_template_loans_admin_approved') // Identifier of your custom email template for adminhtml
            ->setTemplateOptions([
                'area' => \Magento\Framework\App\Area::AREA_ADMINHTML, // Use AREA_ADMINHTML for backend email templates
                'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
            ])
            ->setTemplateVars($emailVars)
            ->setFrom('general') // Replace with the sender name defined in the configuration
            ->addTo($customerEmail) // Pass the customer email address
            ->getTransport();

        $transport->sendMessage();
    }
}
