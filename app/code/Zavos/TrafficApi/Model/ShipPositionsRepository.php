<?php

namespace Zavos\TrafficApi\Model;

use Zavos\TrafficApi\Api\ShipPositionsRepositoryInterface;
use Zavos\TrafficApi\Model\ResourceModel\ShipPositionsFactory;
use Psr\Log\LoggerInterface as Logger;

class ShipPositionsRepository implements ShipPositionsRepositoryInterface
{
    /**
     * @var $_logger
     */
    private $_logger;

    /**
     * @var \Zavos\TrafficApi\Model\ResourceModel\ShipPositions $_shipPositionsFactory
     */
    private $_shipPositionsFactory;

    public function __construct(ShipPositionsFactory $shipPositionsFactory, Logger $logger)
    {
        $this->_shipPositionsFactory = $shipPositionsFactory;
        $this->_logger               = $logger;
    }

    /**
     * @param \Zavos\TrafficApi\Api\Data\UniqueFilterInterface[] $filters
     * @return boolean
     */
    public function filterData($filters)
    {
        try {
            $shipPositions = $this->_shipPositionsFactory->create();
            $collection = $shipPositions->getCollection();
            echo '<pre>';
            print_r($shipPositions->debug());
            echo '</pre>';
            die;
            foreach ($filters as $filter) {
                if (array_key_exists('mmsi',$filter)) {

                }
                echo '<pre>';
                print_r($filter);
                echo '</pre>';
                die;
            }

        } catch (\Exception $e) {
            $this->_logger->critical($e);
            echo 'Please check the body again';
        }
    }

}
