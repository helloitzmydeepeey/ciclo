<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Downpayment\Terms\Setup;

use Downpayment\Terms\Model\Term;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{

    protected $_term;

    public function __construct(Term $term){
        $this->_term = $term;
    }


    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        // Action to do if module version is less than 1.0.0.1
        if (version_compare($context->getVersion(), '1.0.2') < 0) {
            $term = [
                [
                    'term_months' => 12,
                ],
                [
                    'term_months' => 18,
                ],
                [
                    'term_months' => 24,
                ],
            ];

            /**
             * Insert terms
             */
            $termsIds = array();
            foreach ($term as $data) {
                $term = $this->_term->setData($data)->save();
                $termsIds[] = $term->getId();
            }



        }

        $installer->endSetup();
    }
}

