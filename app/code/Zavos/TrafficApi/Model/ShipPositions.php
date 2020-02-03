<?php

namespace Zavos\TrafficApi\Model;

use Magento\Framework\Model\AbstractModel;
use Zavos\TrafficApi\Api\Data\ShipPositionsInterface;
use Zavos\TrafficApi\Model\ResourceModel\ShipPositions as RecourseModel;

class ShipPositions extends AbstractModel implements ShipPositionsInterface
{
    const CACHE_TAG = ShipPositionsInterface::TABLE_NAME;

    protected $_cacheTag = ShipPositionsInterface::TABLE_NAME;

    protected $_eventPrefix = ShipPositionsInterface::TABLE_NAME;

    /**
     * @return void
     */
    protected function _construct() {

        $this->_init( \Zavos\TrafficApi\Model\ResourceModel\ShipPositions::class );
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function getMmsi()
    {
        return $this->getData(self::MMSI);
    }

    public function setMmsi($data)
    {
        return $this->setData(self::MMSI, $data);
    }

    public function getStatus() {
        return $this->getData(self::STATUS);
    }

    public function setStatus($data) {
        return $this->setData(self::STATUS, $data);
    }

    public function getStationid() {
        return $this->getData(self::STATION_ID);
    }

    public function setStationid($data) {
        return $this->setData(self::STATION_ID, $data);
    }

    public function getSpeed() {
        return $this->getData(self::SPEED);
    }

    public function setSpeed($data) {
        return $this->setData(self::SPEED, $data);
    }

    public function getLon() {
        return $this->getData(self::LON);
    }

    public function setLon($data) {
        return $this->setData(self::LON, $data);
    }

    public function getLat() {
        return $this->getData(self::LAT);
    }

    public function setLat($data) {
        return $this->setData(self::LAT, $data);
    }

    public function getCourse() {
        return $this->getData(self::COURSE);
    }

    public function setCourse($data) {
        return $this->setData(self::COURSE, $data);
    }

    public function getHeading() {
        return $this->getData(self::HEADING);
    }

    public function setHeading($data) {
        return $this->setData(self::HEADING, $data);
    }

    public function getRot() {
        return $this->getData(self::ROT);
    }

    public function setRot($data) {
        return $this->setData(self::ROT, $data);
    }

    public function getTimestamp() {
        return $this->getData(self::TIMESTAMP);
    }

    public function setTimestamp($data) {
        return $this->setData(self::TIMESTAMP, $data);
    }
}
