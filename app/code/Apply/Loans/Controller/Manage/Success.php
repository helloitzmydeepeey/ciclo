<?php
namespace Apply\Loans\Controller\Manage;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Apply\Loans\Model\Email\Sender\LoanSender; // Corrected namespace
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;


class Success extends Action
{

    /**
     * @var LoanSender
     */
    protected $loanSender;

    protected $cookieManager;
    protected $customerSession;
    protected $resultPageFactory;
    protected $productFactory;
    protected $productRepository;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CookieManagerInterface $cookieManager,
        LoanSender $loanSender, // Corrected namespace
        CustomerSession $customerSession,
        ProductFactory $productFactory,
        ProductRepositoryInterface $productRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->cookieManager = $cookieManager;
        $this->loanSender = $loanSender; // Corrected namespace
        $this->customerSession = $customerSession;
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        // Call the loan confirmation email sender method
        $this->sendLoanConfirmationEmail();
        // Create and return the result page
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
    protected function sendLoanConfirmationEmail()
    {
         // Get the customer email from the logged-in customer session
        $customer = $this->customerSession->getCustomer();
        $customerName = $customer->getData('firstname'). ' ' . $customer->getData('middlename'). ' ' .$customer->getData('lastname') . ' ' .$customer->getData('suffix');

        $downpayment = $this->cookieManager->getCookie('myDownpayment');
        $terms = $this->cookieManager->getCookie('myTerms');
        $branchTitle = $this->cookieManager->getCookie('myBranchTitle');
        $totalComputed =$this->cookieManager->getCookie('totalComputed');

        $productId = $this->cookieManager->getCookie('product_id');
        $product = $this->productRepository->getById($productId);
        $productImageUrl = $this->getProductImageUrl($product);
        $productName = $product->getName();
        $productPrice = $product->getFinalPrice();


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
            'product_image' =>  $productImageUrl,
            'product_name' =>  $productName,
            'product_price' =>  $productPrice,
        ];

        // Call the email sender method with the email variables
        $this->loanSender->sendLoanConfirmationEmail($emailVars);
        
           // Your code to delete the cookies
           $this->cookieManager->deleteCookie('product_id');
           $this->cookieManager->deleteCookie('myDownpayment');
           $this->cookieManager->deleteCookie('myTerms');
           $this->cookieManager->deleteCookie('myBranchCode');
           $this->cookieManager->deleteCookie('myBranchCompany');
           $this->cookieManager->deleteCookie('myBranchKey');
           $this->cookieManager->deleteCookie('totalComputed');
           $this->cookieManager->deleteCookie('totalRebate');
    }

    protected function getProductImageUrl($product)
    {
        $productId = $this->cookieManager->getCookie('product_id');
        $product = $this->productRepository->getById($productId);

        $imageUrl = '';
        if ($product->getImage()) {
            $imageUrl = $product->getMediaConfig()->getMediaUrl($product->getImage());
        }
        return $imageUrl;

    }

}
