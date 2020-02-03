<?php


namespace Zavos\TrafficApi\Api\Data;

interface UniqueFilterInterface
{
    const MMSI             = 'mmsi';
    const MIN_LON          = 'min_lon';
    const MAX_LON          = 'max_lon';
    const MIN_LAT          = 'min_lat';
    const MAX_LAT          = 'max_lat';
    const FROM_TIMESTAMP   = 'from_timestamp';
    const TO_TIMESTAMP     = 'to_timestamp';

    /**
     * @return int
     */
    public function getMmsi();

    /**
     * @param int $data
     * @return $this
     */
    public function setMmsi($data);

    /**
     * @return float
     */
    public function getMinLon();

    /**
     * @return float
     */
    public function getMaxLon();

    /**
     * @param float $data
     * @return $this
     */
    public function setMinLon($data);

    /**
     * @param float $data
     * @return $this
     */
    public function setMaxLon($data);

    /**
     * @return float
     */
    public function getMinLat();

    /**
     * @return float
     */
    public function getMaxLat();

    /**
     * @param float $data
     * @return $this
     */
    public function setMinLat($data);

    /**
     * @param float $data
     * @return $this
     */
    public function setMaxLat($data);

    /**
     * @return string
     */
    public function getFromTimestamp();

    /**
     * @return string
     */
    public function getToTimestamp();

    /**
     * @param string $data
     * @return $this
     */
    public function setFromTimestamp($data);

    /**
     * @param string $data
     * @return $this
     */
    public function setToTimestamp($data);
}
