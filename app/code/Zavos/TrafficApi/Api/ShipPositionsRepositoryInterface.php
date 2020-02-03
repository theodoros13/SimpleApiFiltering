<?php


namespace Zavos\TrafficApi\Api;


interface ShipPositionsRepositoryInterface
{

    /**
     * GET REQUESTED DATA OF THE DATABASE
     * @param \Zavos\TrafficApi\Api\Data\UniqueFilterInterface[] $filters
     * @return mixed
     */
    public function filterData($filters);
}
