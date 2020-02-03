<?php

namespace Zavos\WebApiLogger\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;


class InstallSchema implements InstallSchemaInterface {
	/**
	 * @param SchemaSetupInterface   $setup
	 * @param ModuleContextInterface $context
	 *
	 * @throws \Zend_Db_Exception
	 */
	public function install ( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$installer = $setup;
		$installer->startSetup();
		$table = $installer->getConnection()->newTable(
			$installer->getTable( 'zavos_api_logger' )
		)->addColumn(
			'id',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			null,
			[ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true, ],
			'Entity ID'
		)->addColumn(
			'url_request',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			\Magento\Framework\DB\Ddl\Table::DEFAULT_TEXT_SIZE,
			[ 'nullable' => false, ],
			'url_request'
		)->addColumn(
			'request_data',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			\Magento\Framework\DB\Ddl\Table::DEFAULT_TEXT_SIZE,
			[ 'nullable' => false, ],
			'request_data'
		)->addColumn(
			'method_request',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			10,
			[ 'nullable' => false, ],
			'json_request'
		)->addColumn(
			'api_type',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			10,
			[ 'nullable' => false, ],
			'api_type'
		)->addColumn(
			'created_at',
			\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
			null,
			[ 'nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT, ],
			'Creation Time'
		)->addColumn(
			'updated_at',
			\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
			null,
			[ 'nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE, ],
			'Modification Time'
		);
		$installer->getConnection()->createTable( $table );
	}
}
