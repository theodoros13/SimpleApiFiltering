<?php


namespace Zavos\TrafficApi\Model\ResourceModel\ShipPositions;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Zavos\TrafficApi\Model\ShipPositions as ModelClass;
use Zavos\TrafficApi\Model\ResourceModel\ShipPositions as ResourceModelClass;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'zavos_ship_positions_collection';
    protected $_eventObject = 'ship_positions';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ModelClass::class, ResourceModelClass::class);
    }
}
