<?php
namespace Apply\Branches\Controller\Adminhtml\Branches;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Apply_Branches::branch';

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
        $resultPage->setActiveMenu('Apply_Branches::branch');
        $resultPage->addBreadcrumb(__('Branches'), __('Branches'));
        $resultPage->addBreadcrumb(__('Manage Branches'), __('Manage Branches'));
        $resultPage->getConfig()->getTitle()->prepend(__('Branches'));

        return $resultPage;
    }
}
