<?php namespace Downpayment\Terms\Setup;

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
         * Create table 'downpayment_terms'
         */

        $tableName = $installer->getTable('downpayment_terms');
        $tableComment = 'Downpayment Terms';
        $columns = array(
            'entity_id' => array(
                'type' => Table::TYPE_INTEGER,
                'size' => null,
                'options' => array('identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true),
                'comment' => 'Terms Id',
            ),
            'term_months' => array(
                'type' => Table::TYPE_INTEGER,
                'size' => 255,
                'options' => array('nullable' => false),
                'comment' => 'Downpayment Terms',
            ),
            'created_at' => array(
                'type' => Table::TYPE_TIMESTAMP,
                'size' => 100,
                'options' => array('nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT),
                'comment' => 'Terms Creation Time',
            ),
            'updated_at' => array(
                'type' => Table::TYPE_TIMESTAMP,
                'size' => 100,
                'options' => array('nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE),
                'comment' => 'Terms Modification Time',
            ),
            'term_status' => array(
                'type' => Table::TYPE_INTEGER,
                'size' => 100,
                'options' => array('nullable' => false, 'default' => '0'),
                'comment' => 'Terms Status',
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
