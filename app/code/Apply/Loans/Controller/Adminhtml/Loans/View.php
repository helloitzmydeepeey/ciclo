<?php
namespace Apply\Loans\Controller\Adminhtml\Loans;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Apply\Loans\Model\Loan;

class View extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * @var Loan
     */
    protected $loanModel;

    /**
     * @param Action\Context $context
     * @param PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $registry
     * @param Loan $loanModel
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        Loan $loanModel
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->registry = $registry;
        $this->loanModel = $loanModel;
    }

    /**
     * View action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $loanId = $this->getRequest()->getParam('id');
        $loan = $this->loanModel->load($loanId);

        if (!$loan->getId()) {
            $this->messageManager->addError(__('This loan does not exist.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/');
        }

        $this->registry->register('apply_loan', $loan);

        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('View Loan'));
        return $resultPage;
    }
}
