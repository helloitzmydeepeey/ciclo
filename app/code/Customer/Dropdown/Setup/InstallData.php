<?php

namespace Customer\Dropdown\Setup;

use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Customer\Model\ResourceModel\Address\Attribute\CollectionFactory as AddressAttributeCollectionFactory;
use Magento\Customer\Setup\CustomerSetup;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Table;

class InstallData implements InstallDataInterface
{
    private $customerSetupFactory;
    private $addressAttributeCollectionFactory;
    private $attributeSetFactory;

    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        AddressAttributeCollectionFactory $addressAttributeCollectionFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->addressAttributeCollectionFactory = $addressAttributeCollectionFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerEntity = $customerSetup->getEavConfig()->getEntityType(AddressMetadataInterface::ENTITY_TYPE_ADDRESS);
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();

        $attributeSet = $this->attributeSetFactory->create();
        $attributeSet->load($attributeSetId);

        // Create the custom attribute
        $customerSetup->addAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'sub_city_id',
            [
                'label' => 'Sub City ID',
                'input' => 'text',
                'type' => 'int',
                'source' => '',
                'required' => false,
                'position' => 333,
                'visible' => true,
                'system' => false,
                'is_user_defined' => true,
                'is_visible_in_grid' => false,
                'is_visible_in_form' => false, // Set to false to hide on customer admin address edit
                'is_visible_on_front' => false,
                'used_in_forms' => [
                    'adminhtml_customer_address',
                    'customer_address_edit',
                    'customer_register_address'
                ],
            ]
        );

        $attribute = $customerSetup->getEavConfig()->getAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'sub_city_id'
        );
        $attribute->addData([
            'attribute_set_id' => $attributeSet->getId(),
            'attribute_group_id' => $attributeSet->getDefaultGroupId(),
            'used_in_forms' => [
                'adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address'
            ],
        ]);
        $attribute->save();


        // Create the custom attribute
        $customerSetup->addAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'sub_region_id',
            [
                'label' => 'Sub Region ID',
                'input' => 'text',
                'type' => 'varchar',
                'source' => '',
                'required' => false,
                'position' => 333,
                'visible' => true,
                'system' => false,
                'is_user_defined' => true,
                'is_visible_in_grid' => false,
                'is_visible_in_form' => false, // Set to false to hide on customer admin address edit
                'is_visible_on_front' => false,
                'used_in_forms' => [
                    'adminhtml_customer_address',
                    'customer_address_edit',
                    'customer_register_address'
                ],
            ]
        );

        $attribute = $customerSetup->getEavConfig()->getAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'sub_region_id'
        );
        $attribute->addData([
            'attribute_set_id' => $attributeSet->getId(),
            'attribute_group_id' => $attributeSet->getDefaultGroupId(),
            'used_in_forms' => [
                'adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address'
            ],
        ]);
        $attribute->save();

        // Create the custom attribute
        $customerSetup->addAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'barangay_id',
            [
                'label' => 'Barangay ID',
                'input' => 'text',
                'type' => 'varchar',
                'source' => '',
                'required' => false,
                'position' => 333,
                'visible' => true,
                'system' => false,
                'is_user_defined' => true,
                'is_visible_in_grid' => false,
                'is_visible_in_form' => false, // Set to false to hide on customer admin address edit
                'is_visible_on_front' => false,
                'used_in_forms' => [
                    'adminhtml_customer_address',
                    'customer_address_edit',
                    'customer_register_address'
                ],
            ]
        );

        $attribute = $customerSetup->getEavConfig()->getAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'barangay_id'
        );
        $attribute->addData([
            'attribute_set_id' => $attributeSet->getId(),
            'attribute_group_id' => $attributeSet->getDefaultGroupId(),
            'used_in_forms' => [
                'adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address'
            ],
        ]);
        $attribute->save();

        // Create the custom attribute
        $customerSetup->addAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'barangay_title',
            [
                'label' => 'Barangay Title',
                'input' => 'text',
                'type' => 'varchar',
                'source' => '',
                'required' => false,
                'position' => 333,
                'visible' => true,
                'system' => false,
                'is_user_defined' => true,
                'is_visible_in_grid' => false,
                'is_visible_in_form' => true,
                'is_visible_on_front' => false,
                'used_in_forms' => [
                    'adminhtml_customer_address',
                    'customer_address_edit',
                    'customer_register_address'
                ],
            ]
        );

        $attribute = $customerSetup->getEavConfig()->getAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'barangay_title'
        );
        $attribute->addData([
            'attribute_set_id' => $attributeSet->getId(),
            'attribute_group_id' => $attributeSet->getDefaultGroupId(),
            'used_in_forms' => [
                'adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address'
            ],
        ]);
        $attribute->save();

        // Create the custom attribute
        $customerSetup->addAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'address_type',
            [
                'label' => 'Address Type',
                'input' => 'select',
                'type' => 'varchar',
                'source' => Table::class,
                'required' => false,
                'position' => 333,
                'visible' => true,
                'system' => false,
                'is_user_defined' => true,
                'is_visible_in_grid' => false,
                'is_visible_in_form' => false, // Set to false to hide on customer admin address edit
                'is_visible_on_front' => false,
                'used_in_forms' => [
                    'adminhtml_customer_address',
                    'customer_address_edit',
                    'customer_register_address'
                ],
        'option' => ['values' => ['LIVING WITH PARENT', 'LIVING WITH RELATIVE', 'OWNED', 'RENTED', 'STAY-IN']],
        'formElement' => 'select'
            ]
        );

        $attribute = $customerSetup->getEavConfig()->getAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'address_type'
        );
        $attribute->addData([
            'attribute_set_id' => $attributeSet->getId(),
            'attribute_group_id' => $attributeSet->getDefaultGroupId(),
            'used_in_forms' => [
                'adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address'
            ],
        ]);
        $attribute->save();


        // Create the custom attribute
        $customerSetup->addAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'address_duration',
            [
                'label' => 'Address Duration',
                'input' => 'select',
                'type' => 'varchar',
                'source' => Table::class,
                'required' => false,
                'position' => 333,
                'visible' => true,
                'system' => false,
                'is_user_defined' => true,
                'is_visible_in_grid' => false,
                'is_visible_in_form' => false, // Set to false to hide on customer admin address edit
                'is_visible_on_front' => false,
                'used_in_forms' => [
                    'adminhtml_customer_address',
                    'customer_address_edit',
                    'customer_register_address'
                ],
        'option' => ['values' => ['6 MOS. - 1 YEAR', '2-3 YEARS', '< 6 MONTHS', '> 5 YEARS', '1-2 YEARS', '3-5 YEARS']],
        'formElement' => 'select'
            ]
        );

        $attribute = $customerSetup->getEavConfig()->getAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'address_duration'
        );
        $attribute->addData([
            'attribute_set_id' => $attributeSet->getId(),
            'attribute_group_id' => $attributeSet->getDefaultGroupId(),
            'used_in_forms' => [
                'adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address'
            ],
        ]);
        $attribute->save();


         // Create the custom attribute
         $customerSetup->addAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'building_number',
            [
                'label' => 'Building Number',
                'input' => 'text',
                'type' => 'varchar',
                'source' => '',
                'required' => false,
                'position' => 333,
                'visible' => true,
                'system' => false,
                'is_user_defined' => true,
                'is_visible_in_grid' => false,
                'is_visible_in_form' => true,
                'is_visible_on_front' => false,
                'used_in_forms' => [
                    'adminhtml_customer_address',
                    'customer_address_edit',
                    'customer_register_address'
                ],
            ]
        );

        $attribute = $customerSetup->getEavConfig()->getAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            'building_number'
        );
        $attribute->addData([
            'attribute_set_id' => $attributeSet->getId(),
            'attribute_group_id' => $attributeSet->getDefaultGroupId(),
            'used_in_forms' => [
                'adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address'
            ],
        ]);
        $attribute->save();



                 // Create the custom attribute
                 $customerSetup->addAttribute(
                    AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
                    'building_name',
                    [
                        'label' => 'Building Name',
                        'input' => 'text',
                        'type' => 'varchar',
                        'source' => '',
                        'required' => false,
                        'position' => 333,
                        'visible' => true,
                        'system' => false,
                        'is_user_defined' => true,
                        'is_visible_in_grid' => false,
                        'is_visible_in_form' => true,
                        'is_visible_on_front' => false,
                        'used_in_forms' => [
                            'adminhtml_customer_address',
                            'customer_address_edit',
                            'customer_register_address'
                        ],
                    ]
                );

                $attribute = $customerSetup->getEavConfig()->getAttribute(
                    AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
                    'building_name'
                );
                $attribute->addData([
                    'attribute_set_id' => $attributeSet->getId(),
                    'attribute_group_id' => $attributeSet->getDefaultGroupId(),
                    'used_in_forms' => [
                        'adminhtml_customer_address',
                        'customer_address_edit',
                        'customer_register_address'
                    ],
                ]);
                $attribute->save();





        $installer->endSetup();
    }
}
