<?php


namespace Zavos\WebApiLogger\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface {

	private $_tableName;

	/**
	 * @param SchemaSetupInterface   $setup
	 * @param ModuleContextInterface $context
	 */
	public function upgrade ( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$setup->startSetup();
		$this->_tableName = $setup->getTable( 'zavos_api_logger' );
		if ( version_compare( $context->getVersion(), '2.0.1', "<" ) ) {
			$this->updateTo201( $setup );
		}
		if ( version_compare( $context->getVersion(), '2.1.0', "<" ) ) {
			$this->updateTo210( $setup );
		}
		$setup->endSetup();
	}

	/**
	 * @param SchemaSetupInterface $setup
	 */
	private function updateTo201 ( SchemaSetupInterface $setup ) {

		if ( $setup->getConnection()->isTableExists( $this->_tableName ) == true ) {
			$columns = [
				'api_user' => [
					'type'     => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'nullable' => true,
					'comment'  => 'Api User',
				],
			];

			$connection = $setup->getConnection();
			foreach ( $columns as $name => $definition ) {
				$connection->addColumn( $this->_tableName, $name, $definition );
			}

		}
	}

	/**
	 * @param SchemaSetupInterface $setup
	 */
	private function updateTo210 ( SchemaSetupInterface $setup ) {

		if ( $setup->getConnection()->isTableExists( $this->_tableName ) == true ) {
			$columns = [
				'response_data' => [
					'type'     => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'nullable' => true,
					'comment'  => 'Response Data',
				]
			];

			$connection = $setup->getConnection();
			foreach ( $columns as $name => $definition ) {
				$connection->addColumn( $this->_tableName, $name, $definition );
			}
		}
	}
}