<?php

namespace Zavos\TrafficApi\Model;

use Zavos\TrafficApi\Api\ShipPositionsRepositoryInterface;

class ShipPositionsRepository implements ShipPositionsRepositoryInterface
{

    /**
     * @param \Zavos\TrafficApi\Api\Data\UniqueFilterInterface[] $filters
     * @return boolean
     */
    public function filterData($filters)
    {
        echo '<pre>';
        print_r($filters);
        echo '</pre>';
        die;

    }

}
