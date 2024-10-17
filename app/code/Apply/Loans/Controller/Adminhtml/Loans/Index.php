<?php
namespace Apply\Loans\Controller\Adminhtml\Loans;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Apply_Loan::loan';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Apply_Loan::loan');
        $resultPage->addBreadcrumb(__('Loans'), __('Loans'));
        $resultPage->addBreadcrumb(__('Manage Loans'), __('Manage Loans'));
        $resultPage->getConfig()->getTitle()->prepend(__('Loans'));

        return $resultPage;
    }
}
