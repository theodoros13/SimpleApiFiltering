<?php


namespace Zavos\TrafficApi\Api;


interface ShipPositionsRepositoryInterface
{

    /**
     * GET REQUESTED DATA OF THE DATABASE
     * @param $filters
     * @return mixed
     */
    public function filterData($filters);
}
