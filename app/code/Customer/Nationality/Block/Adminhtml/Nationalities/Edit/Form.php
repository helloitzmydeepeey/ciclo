<?php
namespace Customer\Nationality\Block\Adminhtml\Nationalities\Edit;

use \Magento\Backend\Block\Widget\Form\Generic;

class Form extends Generic
{

    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

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
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
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
        $this->setId('nationality_form');
        $this->setTitle(__('Nationalities Information'));
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \Customer\Province\Model\Nationalities $model */
        $model = $this->_coreRegistry->registry('customer_nationality');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('nationality_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField('customer_nationality_id', 'hidden', ['name' => 'customer_nationality_id']);
        }

        $fieldset->addField(
            'customer_nationality_title',
            'text',
            ['name' => 'customer_nationality_title', 'label' => __('Nationalities Title'), 'title' => __('Nationalities Title'), 'required' => true]
        );


        $fieldset->addField(
            'customer_nationality_value',
            'text',
            ['name' => 'customer_nationality_value', 'label' => __('Nationalities Value'), 'title' => __('Nationalities Value'), 'required' => true]
        );



        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
