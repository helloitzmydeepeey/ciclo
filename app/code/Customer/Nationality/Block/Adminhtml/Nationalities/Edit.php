<?php
namespace Customer\Nationality\Block\Adminhtml\Nationalities;

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
     * Provinces edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'customer_nationality_id';
        $this->_blockGroup = 'Customer_Nationality';
        $this->_controller = 'adminhtml_nationalities';

        parent::_construct();

        if ($this->_isAllowedAction('Customer_Nationality::nationality_save')) {
            $this->buttonList->update('save', 'label', __('Save Nationality'));
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
     * Get header with Province name
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('customer_nationality')->getId()) {
            return __("Edit Province '%1'", $this->escapeHtml($this->_coreRegistry->registry('customer_nationality')->getName()));
        } else {
            return __('New Province');
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
