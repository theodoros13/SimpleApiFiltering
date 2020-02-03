<?php


namespace Zavos\TrafficApi\Api\Data;


interface FiltersInterface
{

    const FILTERS          = 'filters';

    /**
     * @return \Zavos\TrafficApi\Api\Data\UniqueFilterInterface[]
     */
    public function getFilters();

    /**
     * @param \Zavos\TrafficApi\Api\Data\UniqueFilterInterface[] $filters
     * @return mixed
     */
    public function setFilters($filters);
}
