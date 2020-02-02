<?php

namespace Zavos\TrafficApi\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Json\Helper\Data;
use Magento\Framework\Filesystem\Driver\File as Filesystem;
use Magento\Framework\Serialize\Serializer\Json;
use Psr\Log\LoggerInterface as Logger;
use Zavos\TrafficApi\Model\ShipPositionsFactory;

class UpgradeData implements UpgradeDataInterface {

    private $_json;

    /**
     * @var Logger
     */
    private $_logger;

    private $_driver;

    private $_jsonHelper;

    private $_shipPositionsFactory;


    public function __construct ( Data $jsonHelper, Filesystem $driver, Logger $logger, JSON $json, ShipPositionsFactory $shipPositionsFactory) {
        $this->_jsonHelper           = $jsonHelper;
        $this->_driver               = $driver;
        $this->_logger               = $logger;
        $this->_json                 = $json;
        $this->_shipPositionsFactory = $shipPositionsFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface   $context
     */
    public function upgrade ( ModuleDataSetupInterface $setup, ModuleContextInterface $context ) {
        if ( version_compare( $context->getVersion(), '1.0.1', '<' ) ) {
            $process_data = $this->readJson('ship_positions.json');
            $data = json_decode($process_data);

            foreach ( $data as $datum ) {
                $shipPosition = $this->_shipPositionsFactory->create();
                $shipPosition->addData( (array)$datum );
                $shipPosition->save();
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