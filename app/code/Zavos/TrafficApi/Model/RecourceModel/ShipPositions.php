<?php
/**
 * Created by PhpStorm.
 * User: MCode
 * Date: 8/30/17
 * Time: 4:34 PM
 */

namespace Zavos\TrafficApi\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Zavos\TrafficApi\Api\Data\ShipPositionsInterface;

class ShipPositions extends AbstractDb {

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct() {
        // TODO: Implement _construct() method.
        $this->_init( ShipPositionsInterface::TABLE_NAME, ShipPositionsInterface::ID);
    }
}