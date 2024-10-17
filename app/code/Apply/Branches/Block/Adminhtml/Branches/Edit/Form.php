<?php
namespace Apply\Branches\Block\Adminhtml\Branches\Edit;

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
    protected $_branchs;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param \Apply\Branches\Model\Source\Branches\Status $status
     * @param \Apply\Branches\Model\Source\Branches $branch
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Apply\Branches\Model\Source\Branches\Status $status,
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
        $this->setId('branch_form');
        $this->setTitle(__('Branches Information'));
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \Apply\Branches\Model\Loan $model */
        $model = $this->_coreRegistry->registry('apply_branch');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('branchs_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Branch Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField('branch_system_id', 'hidden', ['name' => 'branch_system_id']);
        }

       //Branch Dealer Key
       $fieldset->addField(
        'branch_dealer_key',
        'text',
        ['name' => 'branch_dealer_key', 'label' => __('Branch Dealer Key'), 'title' => __('Branch Dealer Key'), 'required' => true]
       );

       //Branch Code
       $fieldset->addField(
        'branch_code',
        'text',
        ['name' => 'branch_code', 'label' => __('Branch Code'), 'title' => __('Branch Code'), 'required' => true]
       );

         //Branch Dealer Group
         $fieldset->addField(
            'branch_dealer_group',
            'text',
            ['name' => 'branch_dealer_group', 'label' => __('Branch Dealer Group'), 'title' => __('Branch Dealer Group'), 'required' => true]
        );

        //Branch Title
        $fieldset->addField(
            'branch_title',
            'text',
            ['name' => 'branch_title', 'label' => __('Branch Title'), 'title' => __('Branch Title'), 'required' => true]
        );


         //Branch City
         $fieldset->addField(
            'branch_city',
            'text',
            ['name' => 'branch_city', 'label' => __('Branch City'), 'title' => __('Branch City'), 'required' => true]
        );


          //Branch Province
          $fieldset->addField(
            'branch_province',
            'text',
            ['name' => 'branch_province', 'label' => __('Branch Province'), 'title' => __('Branch Province'), 'required' => true]
        );


          //Branch Barangay
          $fieldset->addField(
            'branch_barangay',
            'text',
            ['name' => 'branch_barangay', 'label' => __('Branch Barangay'), 'title' => __('Branch Barangay'), 'required' => true]
        );

        //Branch Street
        $fieldset->addField(
            'branch_street',
            'text',
            ['name' => 'branch_street', 'label' => __('Branch Street'), 'title' => __('Branch Street'), 'required' => true]
        );



        //Branch Building
        $fieldset->addField(
            'branch_building',
            'text',
            ['name' => 'branch_building', 'label' => __('Branch Building'), 'title' => __('Branch Building'), 'required' => true]
        );


        //Branch Longitude
        $fieldset->addField(
            'branch_longitude',
            'text',
            ['name' => 'branch_longitude', 'label' => __('Branch Longitude'), 'title' => __('Branch Longitude'), 'required' => true]
        );


         //Branch Latitude
         $fieldset->addField(
            'branch_latitude',
            'text',
            ['name' => 'branch_latitude', 'label' => __('Branch Latitude'), 'title' => __('Branch Latitude'), 'required' => true]
        );


         //Branch Email
         $fieldset->addField(
            'branch_email',
            'text',
            ['name' => 'branch_email', 'label' => __('Branch Email'), 'title' => __('Branch Email'), 'required' => true]
        );


         //Branch Mobile Number
         $fieldset->addField(
            'branch_mobile_number',
            'text',
            ['name' => 'branch_mobile_number', 'label' => __('Branch Mobile Number'), 'title' => __('Branch Mobile Number'), 'required' => true]
        );


        //Branch Landline Number
        $fieldset->addField(
            'branch_landline_number',
            'text',
            ['name' => 'branch_landline_number', 'label' => __('Branch Landline Number'), 'title' => __('Branch Landline Number'), 'required' => true]
        );


        //Branch Area Code
        $fieldset->addField(
            'branch_area_code',
            'text',
            ['name' => 'branch_area_code', 'label' => __('Branch Area Code'), 'title' => __('Branch Area Code'), 'required' => true]
        );




         //Branch ACU ID
        $fieldset->addField(
            'branch_acu_id',
            'text',
            ['name' => 'branch_acu_id', 'label' => __('Branch ACU ID'), 'title' => __('Branch ACU ID'), 'required' => true]
        );


         //Branch Dealer Code
         $fieldset->addField(
            'branch_dealer_code',
            'text',
            ['name' => 'branch_dealer_code', 'label' => __('Branch Dealer Code'), 'title' => __('Branch Dealer Code'), 'required' => true]
        );


        // Status - Dropdown
       if (!$model->getId()) {
        $model->setStatus('1'); 
            }
            $statuses = $this->_status->toOptionArray();
            $fieldset->addField(
                'branch_status',
                'select',
                ['name' => 'branch_status', 'label' => __('Status'), 'title' => __('Status'), 'required' => true, 'values' => $statuses]
            );


        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}


