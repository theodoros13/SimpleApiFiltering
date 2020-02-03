<?php

namespace Zavos\TrafficApi\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Filesystem\Driver\File as Filesystem;
use Magento\Framework\Serialize\Serializer\Json;
use Psr\Log\LoggerInterface as Logger;
use Zavos\TrafficApi\Model\ShipPositionsFactory;
use Zavos\TrafficApi\Model\ResourceModel\ShipPositions as ShipPositionsResource;

class UpgradeData implements UpgradeDataInterface {

    private $_json;

    /**
     * @var Logger
     */
    private $_logger;

    private $_driver;


    private $_shipPositionsFactory;

    private $_resource;

    public function __construct (
        Filesystem $driver,
        Logger $logger,
        JSON $json,
        ShipPositionsFactory $shipPositionsFactory,
        ShipPositionsResource $positionsResource
    ) {
        $this->_driver               = $driver;
        $this->_logger               = $logger;
        $this->_json                 = $json;
        $this->_shipPositionsFactory = $shipPositionsFactory;
        $this->_resource = $positionsResource;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface   $context
     */
    public function upgrade ( ModuleDataSetupInterface $setup, ModuleContextInterface $context ) {
        if ( version_compare( $context->getVersion(), '1.1.1', '<' ) ) {
            $process_data = $this->readJson('ship_positions.json');
            $data = json_decode($process_data, true);

            foreach ( $data as $datum ) {
                $shipPosition = $this->_shipPositionsFactory->create();
                $datum['stationid'] = $datum['stationId'];
                unset($datum['stationId']);
                $shipPosition->addData( $datum );
                $this->_resource->save($shipPosition);
            }
        }
    }

    /**
     * @param $file
     */
    private function readJson($file) {
        $json_file = $this->_driver->fileGetContents($file);

        return $json_file;
    }

}
