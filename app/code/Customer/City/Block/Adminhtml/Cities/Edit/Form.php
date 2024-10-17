<?php
namespace Customer\City\Block\Adminhtml\Cities\Edit;

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
    protected $_cityMapping;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param \Customer\City\Model\Source\CityMapping $cityMapping
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Customer\City\Model\Source\CityMapping $cityMapping,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        $this->_cityMapping= $cityMapping;
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
        $this->setId('city_form');
        $this->setTitle(__('Cities Information'));
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \Customer\City\Model\City $model */
        $model = $this->_coreRegistry->registry('customer_city');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('city_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField('customer_city_id', 'hidden', ['name' => 'customer_city_id']);
        }

        $fieldset->addField(
            'customer_city_title',
            'text',
            ['name' => 'customer_city_title', 'label' => __('City Title'), 'title' => __('City Title'), 'required' => true]
        );

        // City - Dropdown
        $cityMapping = $this->_cityMapping->toOptionArray();
        $fieldset->addField(
            'customer_parent_city_id',
            'select',
            ['name' => 'customer_parent_city_id', 'label' => __('Select Province'), 'title' => __('Select Province'), 'required' => true, 'values' => $cityMapping]
        );


        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
