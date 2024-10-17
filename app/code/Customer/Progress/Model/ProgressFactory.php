<?php

namespace Customer\Progress\Model;

use Magento\Framework\Model\AbstractModel;
use Customer\Progress\Model\ResourceModel\Progress as ProgressResource;
use Customer\Progress\Model\ResourceModel\Progress\CollectionFactory as ProgressCollectionFactory;

class ProgressFactory
{
    protected $progressResource;
    protected $progressCollectionFactory;

    public function __construct(
        ProgressResource $progressResource,
        ProgressCollectionFactory $progressCollectionFactory
    ) {
        $this->progressResource = $progressResource;
        $this->progressCollectionFactory = $progressCollectionFactory;
    }

    public function create(): AbstractModel
    {
        return new Progress($this->progressResource);
    }

    public function createCollection()
    {
        return $this->progressCollectionFactory->create();
    }
}
