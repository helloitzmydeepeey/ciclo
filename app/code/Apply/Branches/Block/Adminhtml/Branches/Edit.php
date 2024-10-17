<?php
namespace Apply\Branches\Block\Adminhtml\Branches;

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
     * Branches edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'branch_system_id';
        $this->_blockGroup = 'Apply_Branches';
        $this->_controller = 'adminhtml_branches';

        parent::_construct();

        if ($this->_isAllowedAction('Apply_Branches::branches_save')) {
            $this->buttonList->update('save', 'label', __('Save Branches'));
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
     * Get header with Branches name
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('apply_branch')->getId()) {
            return __("Edit Branches '%1'", $this->escapeHtml($this->_coreRegistry->registry('apply_branch')->getName()));
        } else {
            return __('New Branches');
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
        return $this->getUrl('apply/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }
}
