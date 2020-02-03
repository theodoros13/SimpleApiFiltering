<?php


namespace Zavos\TrafficApi\Model\ResourceModel\ShipPositions;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
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
        $this->_init('Zavos\TrafficApi\Model\ShipPositions', 'Zavos\TrafficApi\Model\ResourceModel\ShipPositions');
    }
}
