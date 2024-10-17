<?php
namespace Customer\Barangay\Controller\Adminhtml\Barangays;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Customer_Barangay::barangay';

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
        $resultPage->setActiveMenu('Customer_Barangay::barangay');
        $resultPage->addBreadcrumb(__('Barangay'), __('Barangay'));
        $resultPage->addBreadcrumb(__('Manage Barangay'), __('Manage Barangay'));
        $resultPage->getConfig()->getTitle()->prepend(__('Barangay'));

        return $resultPage;
    }
}
