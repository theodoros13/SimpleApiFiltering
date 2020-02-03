<?php


namespace Zavos\TrafficApi\Model;

use Magento\Framework\DataObject;
use Zavos\TrafficApi\Api\Data\UniqueFilterInterface;

class UniqueFilter extends DataObject implements UniqueFilterInterface
{
    public function getToTimestamp()
    {
        return $this->getData(self::TO_TIMESTAMP);
    }

    public function getMmsi()
    {
        return $this->getData(self::MMSI);
    }

    public function getFromTimestamp()
    {
        return $this->getData(self::FROM_TIMESTAMP);
    }

    public function getMaxLat()
    {
        return $this->getData(self::MAX_LAT);
    }

    public function getMaxLon()
    {
        return $this->getData(self::MAX_LON);
    }

    public function getMinLat()
    {
        return $this->getData(self::MIN_LAT);
    }

    public function getMinLon()
    {
        return $this->getData(self::MIN_LON);
    }

    public function setToTimestamp($data)
    {
        return $this->setData(self::TO_TIMESTAMP, $data);
    }

    public function setMmsi($data)
    {
        return $this->setData(self::MMSI, $data);
    }

    public function setMinLon($data)
    {
        return $this->setData(self::MIN_LON, $data);
    }

    public function setMinLat($data)
    {
        return $this->setData(self::MIN_LAT, $data);
    }

    public function setMaxLon($data)
    {
        return $this->setData(self::MAX_LON, $data);
    }

    public function setMaxLat($data)
    {
        return $this->setData(self::MAX_LAT, $data);
    }

    public function setFromTimestamp($data)
    {
        return $this->setData(self::FROM_TIMESTAMP, $data);
    }

}
