<?php

namespace Customer\Barangay\Setup;

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

        /**
         * Create table 'customer_city'
         */

        $tableName = $installer->getTable('customer_barangay');
        $tableComment = 'Barangay table';
        $columns = array(
            'customer_barangay_id' => array(
                'type' => Table::TYPE_INTEGER,
                'size' => null,
                'options' => array('identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true),
                'comment' => 'Customer Barangay ID',
            ),
            'customer_barangay_created_at' => array(
                'type' => Table::TYPE_TIMESTAMP,
                'size' => 100,
                'options' => array('nullable' => false, 'default' => Table::TIMESTAMP_INIT),
                'comment' => 'Customer Barangay Creation Time',
            ),
            'customer_barangay_updated_at' => array(
                'type' => Table::TYPE_TIMESTAMP,
                'size' => 100,
                'options' => array('nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE),
                'comment' => 'Customer Barangay Modification Time',
            ),
            'customer_barangay_title' => array(
                'type' => Table::TYPE_TEXT,
                'size' => 255,
                'options' => array('nullable' => false, 'default' => ''),
                'comment' => 'Customer Barangay Title',
            ),

            'customer_parent_barangay_id' => array(
                'type' => Table::TYPE_INTEGER,
                'size' => null,
                'options' => array( 'nullable' => false),
                'comment' => 'Customer Parent Barangay ID',
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
