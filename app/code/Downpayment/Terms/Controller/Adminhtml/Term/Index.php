<?php
namespace Downpayment\Terms\Controller\Adminhtml\Term;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Downpayment_Terms::term';

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
        $resultPage->setActiveMenu('Downpayment_Terms::term');
        $resultPage->addBreadcrumb(__('Terms'), __('Terms'));
        $resultPage->addBreadcrumb(__('Manage Terms'), __('Manage Terms'));
        $resultPage->getConfig()->getTitle()->prepend(__('Term'));

        return $resultPage;
    }
}
