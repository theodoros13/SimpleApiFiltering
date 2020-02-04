<?php

namespace Zavos\TrafficApi\Model;

use Psr\Log\LoggerInterface as Logger;
use Zavos\TrafficApi\Api\ShipPositionsRepositoryInterface;
use Zavos\TrafficApi\Model\ShipPositionsFactory as Factory;

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

    public function __construct(Factory $shipPositionsFactory, Logger $logger)
    {
        $this->_shipPositionsFactory = $shipPositionsFactory;
        $this->_logger               = $logger;
    }

    /**
     * @param \Zavos\TrafficApi\Api\Data\UniqueFilterInterface[] $filters
     * @return array
     */
    public function filterData($filters)
    {
        $mmsi = $minLat = $minLon = $coordinates = $maxLat = $maxLon = [];
        $toTimestamp = $fromTimestamp = [];

        try {
            $shipPositions = $this->_shipPositionsFactory->create();
            $collection = $shipPositions->getCollection();
            foreach ($filters as $position) {
                if (isset($position['mmsi'])) {
                    $mmsi[] = $position['mmsi'];
                }

                if (isset($position['min_lon']) || isset($position['max_lon'])
                    || isset($position['min_lat']) || isset($position['max_lat'])) {
                    if (isset($position['min_lon']) && isset($position['max_lon']) && !($position['max_lon']>$position['min_lon'])) {
                        echo 'max_lon must be greater than min_lon';
                        return;
                    }

                    if (isset($position['min_lat']) && isset($position['max_lat']) && !($position['max_lat']>$position['min_lat'])) {
                        echo 'max_lat must be greater than min_lat';
                        return;
                    }

                    if (isset($position['min_lon'])) {
                        $minLon[] = $position['min_lon'];
                    }
                    if (isset($position['max_lon'])) {
                        $maxLon[] = $position['max_lon'];
                    }
                    if (isset($position['min_lat'])) {
                        $minLat[] = $position['min_lat'];
                    }
                    if (isset($position['max_lat'])) {
                        $maxLat[] = $position['max_lat'];
                    }
                }

                if (isset($position['from_timestamp']) || isset($position['to_timestamp'])) {
                    if (isset($position['from_timestamp']) && isset($position['to_timestamp']) && !($position['from_timestamp'] < $position['to_timestamp'])) {
                        echo 'from_timestamp should be less than to_timestamp';
                        return;
                    }

                    if (isset($position['from_timestamp'])) {
                        $fromDate = \DateTime::createFromFormat("Y-m-d H:i:s", $position['from_timestamp'], new \DateTimeZone("Europe/Athens"));
                        $fromTimestamp[] = $fromDate;
                    }

                    if (isset($position['to_timestamp'])) {
                        $toDate = \DateTime::createFromFormat("Y-m-d H:i:s", $position['to_timestamp'], new \DateTimeZone("Europe/Athens"));
                        $toTimestamp[] = $toDate;
                    }
                }
            }

            asort($minLon);
            asort($minLat);
            arsort($maxLon);
            arsort($maxLat);
            asort($fromTimestamp);
            arsort($toTimestamp);


            $collection->addFieldToSelect('*');

            if (!empty($mmsi)) {
                $collection->addFieldToFilter('mmsi', ['in' => [$mmsi]]);
            }
            if (!empty($minLon)) {
                $collection->addFieldToFilter('lon', ['gt' => [current($minLon)]]);
            }
            if (!empty($maxLon)) {
                $collection->addFieldToFilter('lon', ['lt' => [current($maxLon)]]);
            }
            if (!empty($minLat)) {
                $collection->addFieldToFilter('lat', ['gt' => [current($minLat)]]);
            }
            if (!empty($maxLat)) {
                $collection->addFieldToFilter('lat', ['lt' => [current($maxLat)]]);
            }
            if (!empty($fromTimestamp)) {
                $from = current($fromTimestamp);
                $collection->addFieldToFilter('timestamp',['from' => $from->format('Y-m-d H:i:s')]);
            }
            if (!empty($toTimestamp)) {
                $collection->addFieldToFilter('timestamp',['to' => current($toTimestamp)]);
            }

            $result = $collection->load();
            return $result->getData();
        } catch (\Exception $e) {
            $this->_logger->critical($e);
            echo $e;
            echo 'Please check the body again';
        }
    }
}
