<?php
namespace Customer\Dropdown\Block;

use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Customer\Model\Session;

class AddressType extends Template
{
    private $customerSession;
    private $attributeRepository;

    public function __construct(
        Context $context,
        AttributeRepositoryInterface $attributeRepository,
        Session $customerSession,
        array $data = []
    ) {
        $this->customerSession = $customerSession;
        $this->attributeRepository = $attributeRepository;
        parent::__construct($context, $data);
    }

    public function getAddressTypeOptions()
    {
        $attributeCode = 'address_type';
        $attribute = $this->attributeRepository->get(\Magento\Customer\Api\AddressMetadataInterface::ENTITY_TYPE_ADDRESS, $attributeCode);
        if ($attribute->getSource() instanceof \Magento\Eav\Model\Entity\Attribute\Source\Table) {
            return $attribute->getSource()->getAllOptions();
        }
        return [];
    }
      public function getAddressDurationOptions()
    {
        $attribute = $this->attributeRepository->get(AddressMetadataInterface::ENTITY_TYPE_ADDRESS, 'address_duration');
        if ($attribute->getSource() instanceof \Magento\Eav\Model\Entity\Attribute\Source\Table) {
            return $attribute->getSource()->getAllOptions();
        }
        return [];
    }

}
