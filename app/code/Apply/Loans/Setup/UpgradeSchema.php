<?php
namespace Apply\Loans\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$installer = $setup;

		$installer->startSetup();

		if(version_compare($context->getVersion(), '1.0.1', '<')) {
			$installer->getConnection()->addColumn(
				$installer->getTable( 'apply_loan' ),
				'loan_images',
				[
					'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'nullable' => false,
					'size' => 2048,
					'comment' => 'Loan Images',
				]
			);
		}


		$installer->endSetup();
	}
}
