<?php

namespace Zavos\TrafficApi\Model;

use Zavos\TrafficApi\Api\ShipPositionsRepositoryInterface;

class ShipPositionsRepository implements ShipPositionsRepositoryInterface
{

    /**
     * @param $filters
     * @return mixed|void
     */
    public function filterData($filters)
    {
        echo '<pre>';
        print_r($filters);
        echo '</pre>';
        die;
        // TODO: Implement filterData() method.
    }

}
