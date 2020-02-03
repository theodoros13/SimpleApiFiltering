<?php

namespace Zavos\WebApiLogger\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ApiLogger extends AbstractDb {


	/**
	 * Initialize resource
	 *
	 * @return void
	 */
	public function _construct () {
		$this->_init( 'zavos_api_logger', 'id' );
	}


}

