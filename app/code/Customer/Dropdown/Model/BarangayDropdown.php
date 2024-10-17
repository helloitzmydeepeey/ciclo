<?php

namespace Customer\Dropdown\Model;

use Magento\Framework\Model\AbstractModel;
use Customer\Dropdown\Model\ResourceModel\BarangayDropdown\CollectionFactory;

class BarangayDropdown extends AbstractModel
{
    protected $barangayDropdownCollectionFactory;

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CollectionFactory $barangayDropdownCollectionFactory,
        array $data = []
    ) {
        $this->barangayDropdownCollectionFactory = $barangayDropdownCollectionFactory;
        parent::__construct($context, $registry, null, null, $data);
    }

    public function getBarangayOptions($cityId)
        {
            $options = [];

            $barangayDropdownCollection = $this->barangayDropdownCollectionFactory->create()
                ->addFieldToFilter('customer_parent_barangay_id', ['eq' => $cityId])
                ->load();

            foreach ($barangayDropdownCollection as $barangayDropdown) {
                $options[] = [
                    'label' => $barangayDropdown->getCustomerBarangayTitle(),
                    'value' => $barangayDropdown->getCustomerBarangayId(),
                ];
            }

            return $options;
        }

        public function getBarangayPersonalOptions($barangayCont)
        {
            $options = [['label' => '', 'value' => '']];

            $barangayDropdownCollection = $this->barangayDropdownCollectionFactory->create()
            ->addFieldToFilter('customer_parent_barangay_id', ['eq' => $barangayCont])
            ->load();

            foreach ($barangayDropdownCollection as $barangayDropdown) {
                $options[] = [
                    'label' => $barangayDropdown->getCustomerBarangayTitle(),
                    'value' => $barangayDropdown->getCustomerBarangayId(),
                ];
            }

            return $options;
        }

}
