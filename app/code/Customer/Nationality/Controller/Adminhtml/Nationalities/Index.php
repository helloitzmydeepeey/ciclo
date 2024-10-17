<?php
namespace Customer\Nationality\Controller\Adminhtml\Nationalities;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Customer_Nationality::nationality';

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
        $resultPage->setActiveMenu('Customer_Nationality::nationality');
        $resultPage->addBreadcrumb(__('Nationality'), __('Nationality'));
        $resultPage->addBreadcrumb(__('Manage Nationalities'), __('Manage Nationalities'));
        $resultPage->getConfig()->getTitle()->prepend(__('Nationality'));

        return $resultPage;
    }
}
