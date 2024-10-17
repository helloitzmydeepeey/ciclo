<?php
namespace Apply\Loans\Model\Email\Sender;

use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Customer\Model\Session as CustomerSession;

/**
 * Sends the loan confirmation email to the customer.
 */
class LoanSender
{
    /**
     * @var ManagerInterface
     */
    protected $eventManager;

    protected $transportObject;

    protected $customerSession;

    /**
     * @param ManagerInterface $eventManager
     * @param TransportBuilder $transportObject
     * @param CustomerSession $customerSession
     */
    public function __construct(
        ManagerInterface $eventManager,
        TransportBuilder $transportObject,
        CustomerSession $customerSession
    ) {
        $this->eventManager = $eventManager;
        $this->transportObject = $transportObject;
        $this->customerSession = $customerSession;
    }

    // ... other class properties and methods ...

    /**
     * Sends the loan confirmation email to the customer.
     *
     * @param array $emailVars
     * @return bool
     */
    public function sendLoanConfirmationEmail(array $emailVars)
    {
        // Prepare email template with variables
        $transport = new DataObject($emailVars);

        $this->eventManager->dispatch(
            'email_loan_set_template_vars_before',
            ['sender' => $this, 'transport' => $transport, 'transportObject' => $transport]
        );

        // Load the email template using your preferred method, such as sending via TransportBuilder or any other
        // custom method you are using to send emails in Magento.
        $this->sendEmail($transport); // Pass $transport to the sendEmail method

        return true;
    }

    /**
     * Sends the email using the given transport object.
     *
     * @param DataObject $transportObject
     * @return void
     */
    protected function sendEmail(DataObject $transportObject)
    {
        $emailVars = $transportObject->getData();

        // Get the customer email from the logged-in customer session
        $customerData = $this->customerSession->getCustomerData();
        $customerEmail = $customerData->getEmail();

        // Ensure that the customer email is not empty
        if (empty($customerEmail)) {
            // If customer email is not available, handle it as per your use case
            // For example, throw an exception, log an error, or set a default email address.
            throw new \Exception("Customer email address not found.");
        }

        $transport = $this->transportObject
            ->setTemplateIdentifier('loan_emails_loans_confirmation_template_loans') // Identifier of your custom email template
            ->setTemplateOptions([
                'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
                'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
            ])
            ->setTemplateVars($emailVars)
            ->setFrom('general') // Replace with the sender name defined in the configuration
            ->addTo($customerEmail) // Pass the customer email address
            ->getTransport();

        $transport->sendMessage();

    }


    public function sendLoanCanceledEmail(array $emailVars)
    {
        // Prepare email template with variables
        $transport = new DataObject($emailVars);

        $this->eventManager->dispatch(
            'email_loan_set_template_vars_before',
            ['sender' => $this, 'transport' => $transport, 'transportObject' => $transport]
        );

        // Load the email template using your preferred method, such as sending via TransportBuilder or any other
        // custom method you are using to send emails in Magento.
        $this->sendCanceledEmail($transport); // Pass $transport to the sendEmail method

        return true;
    }

    /**
     * Sends the email using the given transport object.
     *
     * @param DataObject $transportObject
     * @return void
     */
    protected function sendCanceledEmail(DataObject $transportObject)
    {
        $emailVars = $transportObject->getData();

        // Get the customer email from the logged-in customer session
        $customerData = $this->customerSession->getCustomerData();
        $customerEmail = $customerData->getEmail();

        // Ensure that the customer email is not empty
        if (empty($customerEmail)) {
            // If customer email is not available, handle it as per your use case
            // For example, throw an exception, log an error, or set a default email address.
            throw new \Exception("Customer email address not found.");
        }

        $transport = $this->transportObject
            ->setTemplateIdentifier('loan_emails_loans_canceled_template_loans_canceled') // Identifier of your custom email template
            ->setTemplateOptions([
                'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
                'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
            ])
            ->setTemplateVars($emailVars)
            ->setFrom('general') // Replace with the sender name defined in the configuration
            ->addTo($customerEmail) // Pass the customer email address
            ->getTransport();

        $transport->sendMessage();

    }
}
