<?php
namespace Apply\Loans\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;



class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */


    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();




        $tableName = $installer->getTable('apply_loan');
        $tableComment = 'Apply for a loan table';
        $columns = array(
            'entity_id' => array(
                'type' => Table::TYPE_INTEGER,
                'size' => null,
                'options' => array('identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true),
                'comment' => 'Loan Id',
            ),
            'created_at' => array(
                'type' => Table::TYPE_TIMESTAMP,
                'size' => 100,
                'options' => array('nullable' => false, 'default' => Table::TIMESTAMP_INIT),
                'comment' => 'Loan Creation Time',
            ),
            'updated_at' => array(
                'type' => Table::TYPE_TIMESTAMP,
                'size' => 100,
                'options' => array('nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE),
                'comment' => 'Loan Modification Time',
            ),
            'customer_entity_id' => array(
                'type' => Table::TYPE_INTEGER,
                'size' => null,
                'options' => array('nullable' => false),
                'comment' => 'Loan Customer ID',
            ),
            'loan_dealer_branch_title' => array(
                'type' => Table::TYPE_TEXT,
                'size' => 2048,
                'options' => array('nullable' => false),
                'comment' => 'Loan Dealer Branch Title',
            ),
            'loan_dealer_branch_code' => array(
                'type' => Table::TYPE_TEXT,
                'size' => 2048,
                'options' => array('nullable' => false),
                'comment' => 'Loan Dealer Branch Code',
            ),
            'loan_dealer_branch_company' => array(
                'type' => Table::TYPE_TEXT,
                'size' => 2048,
                'options' => array('nullable' => false),
                'comment' => 'Loan Dealer Branch Company',
            ),
            'loan_dealer_branch_key' => array(
                'type' => Table::TYPE_TEXT,
                'size' => 2048,
                'options' => array('nullable' => false),
                'comment' => 'Loan Dealer Branch Key',
            ),
            'loan_dealer_financing_branch' => array(
                'type' => Table::TYPE_TEXT,
                'size' => 2048,
                'options' => array('nullable' => false),
                'comment' => 'Loan Dealer Financing Branch',
            ),
            'loan_downpayment' => array(
                'type' => Table::TYPE_TEXT,
                'size' => 2048,
                'options' => array('nullable' => false),
                'comment' => 'Loan Downpayment',
            ),
            'loan_term' => array(
                'type' => Table::TYPE_TEXT,
                'size' => 2048,
                'options' => array('nullable' => false),
                'comment' => 'Loan Terms',
            ),
            'loan_amortization' => array(
                'type' => Table::TYPE_TEXT,
                'size' => 2048,
                'options' => array('nullable' => false),
                'comment' => 'Loan Amortization',
            ),
            'motorcycle_brand' => array(
                'type' => Table::TYPE_TEXT,
                'size' => 2048,
                'options' => array('nullable' => false),
                'comment' => 'Loan Motorcycle Brand',
            ),
            'motorcycle_model' => array(
                'type' => Table::TYPE_TEXT,
                'size' => 2048,
                'options' => array('nullable' => false),
                'comment' => 'Loan Motorcycle Model',
            ),
            'motorcycle_price' => array(
                'type' => Table::TYPE_TEXT,
                'size' => 2048,
                'options' => array('nullable' => false),
                'comment' => 'Loan Motorcycle Price',
            ),
            'loan_status' => array(
                'type' => Table::TYPE_TEXT,
                'size' => 2048,
                'options' => array('nullable' => false),
                'comment' => 'Loan Status',
            ),
        );


        $indexes =  array(
            // No index for this table
        );

        $foreignKeys = array(
            // No foreign keys for this table
        );

        /**
         *  We can use the parameters above to create our table
         */

        // Table creation
        $table = $installer->getConnection()->newTable($tableName);

        // Columns creation
        foreach($columns AS $name => $values){
            $table->addColumn(
                $name,
                $values['type'],
                $values['size'],
                $values['options'],
                $values['comment']
            );
        }

        // Indexes creation
        foreach($indexes AS $index){
            $table->addIndex(
                $installer->getIdxName($tableName, array($index)),
                array($index)
            );
        }

        // Foreign keys creation
        foreach($foreignKeys AS $column => $foreignKey){
            $table->addForeignKey(
                $installer->getFkName($tableName, $column, $foreignKey['ref_table'], $foreignKey['ref_column']),
                $column,
                $foreignKey['ref_table'],
                $foreignKey['ref_column'],
                $foreignKey['on_delete']
            );
        }

        // Table comment
        $table->setComment($tableComment);

        // Execute SQL to create the table
        $installer->getConnection()->createTable($table);

        // End Setup
        $installer->endSetup();
    }

}
