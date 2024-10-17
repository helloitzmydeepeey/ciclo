<?php
namespace Apply\Loans\Block\Adminhtml\Loans\Edit;

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
     * @var \Magento\Store\Model\System\Store
     */
    protected $_loans;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param \Apply\Loans\Model\Source\Loans\Status $status
     * @param \Apply\Loans\Model\Source\Loans $loan
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Apply\Loans\Model\Source\Loans\Status $status,
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
        $this->setId('loan_form');
        $this->setTitle(__('Loans Information'));
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \Apply\Loans\Model\Loan $model */
        $model = $this->_coreRegistry->registry('apply_loan');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('loans_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        }

         // Created At
         if (!$model->getId()) {
            $model->setDate(date('Y-m-d')); // Day date when adding a job
        }
      

       // Status - Dropdown
       if (!$model->getId()) {
        $model->setStatus('1'); // Enable status when adding a Job
    }
    $statuses = $this->_status->toOptionArray();
    $fieldset->addField(
        'loan_status',
        'select',
        ['name' => 'loan_status', 'label' => __('Status'), 'title' => __('Status'), 'required' => true, 'values' => $statuses]
    );


        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}


