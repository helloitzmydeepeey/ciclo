<?php
namespace Customer\City\Block\Adminhtml\Cities;

use Magento\Backend\Block\Widget\Form\Container;

class Edit extends Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Cities edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'customer_city_id';
        $this->_blockGroup = 'Customer_City';
        $this->_controller = 'adminhtml_cities';

        parent::_construct();

        if ($this->_isAllowedAction('Customer_City::city_save')) {
            $this->buttonList->update('save', 'label', __('Save City'));
            $this->buttonList->add(
                'saveandcontinue',
                [
                    'label' => __('Save and Continue Edit'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => [
                            'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                        ],
                    ]
                ],
                -100
            );
        } else {
            $this->buttonList->remove('save');
        }

    }

    /**
     * Get header with City name
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('customer_city')->getId()) {
            return __("Edit City '%1'", $this->escapeHtml($this->_coreRegistry->registry('customer_city')->getName()));
        } else {
            return __('New City');
        }
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    /**
     * Getter of url for "Save and Continue" button
     * tab_id will be replaced by desired by JS later
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('customer/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }
}
