<?php
namespace Downpayment\Terms\Block\Adminhtml\Term\Edit;

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
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param \Downpayment\Terms\Model\Source\Term\Status $status
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Downpayment\Terms\Model\Source\Term\Status $status,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        $this->_status = $status;
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
        $this->setId('term_form');
        $this->setTitle(__('Term Information'));
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \Downpayment\Terms\Model\Term $model */
        $model = $this->_coreRegistry->registry('downpayment_terms');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('term_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        }

        $fieldset->addField(
            'term_months',
            'text',
            ['name' => 'term_months', 'label' => __('Terms'), 'title' => __('Terms'), 'required' => true]
        );

         // Status - Dropdown
         if (!$model->getId()) {
            $model->setStatus('1'); // Enable status when adding a Term
        }
        $statuses = $this->_status->toOptionArray();
        $fieldset->addField(
            'term_status',
            'select',
            ['name' => 'term_status', 'label' => __('Status'), 'title' => __('Status'), 'required' => true, 'values' => $statuses]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
