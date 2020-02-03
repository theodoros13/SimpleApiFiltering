<?php
/**
 * UpgradeSchema
 *
 * @author Theodoros Zavos
 * @copyright Theodoros Zavos
 * @package Zavos_TrafficApi
 */
namespace Zavos\TrafficApi\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Zavos\TrafficApi\Api\Data\ShipPositionsInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();
        if (version_compare($context->getVersion(), '1.1.0', '<')) {
            $tableName = ShipPositionsInterface::TABLE_NAME;

            /**
             * Create table instance (php instance for ORM)
             */
            $table = $installer->getConnection()
                        ->newTable($tableName)
                        ->addColumn(
                            'id',
                            Table::TYPE_INTEGER,
                            null,
                            array(
                                'identity' => true,
                                'unsigned' => true,
                                'nullable' => false,
                                'primary'  => true,
                            ),
                            'Increment Id'
                        )
                        ->addColumn(
                            ShipPositionsInterface::MMSI,
                            Table::TYPE_INTEGER,
                            12,
                            ['nullable' => false],
                            'unique vessel identifier'
                        )
                        ->addColumn(
                            ShipPositionsInterface::STATUS,
                            Table::TYPE_BOOLEAN,
                            1,
                            [],
                            'AIS vessel status'
                        )
                        ->addColumn(
                            ShipPositionsInterface::STATION_ID,
                            Table::TYPE_INTEGER,
                            6,
                            ['nullable' => false],
                            'receiving station ID'
                        )
                        ->addColumn(
                            ShipPositionsInterface::SPEED,
                            Table::TYPE_INTEGER,
                            6,
                            ['nullable' => false],
                            'speed in knots x 10'
                        )
                        ->addColumn(
                            ShipPositionsInterface::LON,
                            Table::TYPE_DECIMAL,
                            [10, 5],
                            ['nullable' => false],
                            'Longitude'
                        )
                        ->addColumn(
                            ShipPositionsInterface::LAT,
                            Table::TYPE_DECIMAL,
                            [10, 5],
                            ['nullable' => false],
                            'Latitude'
                        )
                        ->addColumn(
                            ShipPositionsInterface::COURSE,
                            Table::TYPE_INTEGER,
                            6,
                            ['nullable' => false],
                            'vessel\'s course over ground'
                        )
                        ->addColumn(
                            ShipPositionsInterface::HEADING,
                            Table::TYPE_INTEGER,
                            6,
                            ['nullable' => false],
                            'vessel\'s true heading'
                        )
                        ->addColumn(
                            ShipPositionsInterface::ROT,
                            Table::TYPE_INTEGER,
                            6,
                            ['nullable' => true],
                            'vessel\'s rate of turn'
                        )
                        ->addColumn(
                            ShipPositionsInterface::TIMESTAMP,
                            Table::TYPE_TIMESTAMP,
                            null,
                            ['default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                            'Timestamp'
                        )
                        ->setComment('Table to keep data of ship_posistions.json');


            /**
             * Create table in MySQL
             */
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
