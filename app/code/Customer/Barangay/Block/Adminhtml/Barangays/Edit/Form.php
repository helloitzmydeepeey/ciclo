<?php
namespace Customer\Barangay\Block\Adminhtml\Barangays\Edit;

use \Magento\Backend\Block\Widget\Form\Generic;

class Form extends Generic
{

    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;


    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_barangayMapping;


    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Customer\Barangay\Model\Source\BarangayMapping $barangayMapping,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        $this->_barangayMapping= $barangayMapping;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Init form
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('barangay_form');
        $this->setTitle(__('Barangay Information'));
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \Customer\Barangay\Model\Barangay $model */
        $model = $this->_coreRegistry->registry('customer_barangay');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('barangay_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField('customer_barangay_id', 'hidden', ['name' => 'customer_barangay_id']);
        }

        $fieldset->addField(
            'customer_barangay_title',
            'text',
            ['name' => 'customer_barangay_title', 'label' => __('Barangay Title'), 'title' => __('Barangay Title'), 'required' => true]
        );


        // Barangay - Dropdown
        $barangayMapping = $this->_barangayMapping->toOptionArray();
        $fieldset->addField(
            'customer_parent_barangay_id',
            'select',
            ['name' => 'customer_parent_barangay_id', 'label' => __('Select City'), 'title' => __('Select City'), 'required' => true, 'values' => $barangayMapping]
        );



        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
