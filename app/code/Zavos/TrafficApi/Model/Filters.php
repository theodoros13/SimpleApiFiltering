<?php


namespace Zavos\TrafficApi\Model;

use Magento\Framework\Model\AbstractModel;
use Zavos\TrafficApi\Api\Data\FiltersInterface;

class Filters extends AbstractModel implements FiltersInterface
{
    public function getFilters()
    {
        $filters = $this->getData(self::FILTERS);
        return $filters ?: [];
    }

    public function setFilters($filters)
    {
        return $this->setData(self::FILTERS, $filters);
    }
}
