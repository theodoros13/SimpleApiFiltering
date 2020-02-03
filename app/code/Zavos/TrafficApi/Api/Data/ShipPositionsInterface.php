<?php


namespace Zavos\TrafficApi\Api\Data;


interface ShipPositionsInterface
{
    const TABLE_NAME = 'ship_positions';

    const ID           = 'id';
    const MMSI         = 'mmsi';
    const STATUS       = 'status';
    const STATION_ID   = 'stationid';
    const SPEED        = 'speed';
    const LON          = 'lon';
    const LAT          = 'lat';
    const COURSE       = 'course';
    const HEADING      = 'heading';
    const ROT          = 'rot';
    const TIMESTAMP    = 'timestamp';


    /**
     * @return int
     */
    public function getId();

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
     * @return int
     */
    public function getStatus();

    /**
     * @param int $data
     * @return $this
     */
    public function setStatus($data);

    /**
     * @return int
     */
    public function getStationId();

    /**
     * @param int $data
     * @return $this
     */
    public function setStationId($data);

    /**
     * @return int
     */
    public function getSpeed();

    /**
     * @param int $data
     * @return $this
     */
    public function setSpeed($data);

    /**
     * @return float
     */
    public function getLon();

    /**
     * @param float $data
     * @return $this
     */
    public function setLon($data);

    /**
     * @return float
     */
    public function getLat();

    /**
     * @param float $data
     * @return $this
     */
    public function setLat($data);

    /**
     * @return int
     */
    public function getCourse();

    /**
     * @param int $data
     * @return $this
     */
    public function setCourse($data);

    /**
     * @return int
     */
    public function getHeading();

    /**
     * @param int $data
     * @return $this
     */
    public function setHeading($data);

    /**
     * @return int
     */
    public function getRot();

    /**
     * @param int $data
     * @return $this
     */
    public function setRot($data);

    /**
     * @return int
     */
    public function getTimestamp();

    /**
     * @param int $data
     * @return $this
     */
    public function setTimestamp($data);
}
