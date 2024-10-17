<?php
namespace Customer\Progress\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Customer\Progress\Model\ProgressFactory;

class Progress extends Action
{
    protected $progressFactory;

    public function __construct(Context $context, ProgressFactory $progressFactory)
    {
        parent::__construct($context);
        $this->progressFactory = $progressFactory;
    }

    public function execute()
    {
        $progress = $this->progressFactory->create()->load(1); // Assuming you have a record with ID 1

        $result = [
            'progress' => $progress->calculateProgress()
        ];

        $this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody(json_encode($result));
    }
}
