<?php

namespace Zavos\WebApiLogger\Model\ResourceModel\ApiLogger;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use  Zavos\WebApiLogger\Model\ApiLogger as ModelClass;
use Zavos\WebApiLogger\Model\ResourceModel\ApiLogger as ResourceModelClass;


class Collection extends AbstractCollection {
	/**
	 * Initialize resource collection
	 *
	 * @return void
	 */
	public function _construct () {
		$this->_init( ModelClass::class, ResourceModelClass::class );
	}
}
