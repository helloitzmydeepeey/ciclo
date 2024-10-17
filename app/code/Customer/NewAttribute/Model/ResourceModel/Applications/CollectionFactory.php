<?php

namespace Customer\NewAttribute\Model\ResourceModel\Applications;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Customer\NewAttribute\Model\ResourceModel\Applications\Collection;

class CollectionFactory
{
    protected $objectManager;
    protected $instanceName;

    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        $instanceName = Collection::class
    ) {
        $this->objectManager = $objectManager;
        $this->instanceName = $instanceName;
    }

    public function create(array $data = [])
    {
        return $this->objectManager->create($this->instanceName, $data);
    }
}
