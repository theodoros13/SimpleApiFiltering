<?php

namespace Zavos\WebApiLogger\Model\System\Config;

use Magento\Integration\Model\IntegrationFactory;
use Magento\Framework\Option\ArrayInterface;

class ApiUsers implements ArrayInterface {


	private $_integrationFactory;

	public function __construct ( IntegrationFactory $integrationFactory ) {
		$this->_integrationFactory = $integrationFactory;
	}


	public function toOptionArray () {

		$collection = $this->_integrationFactory->create()->getCollection();
		$options    = [ "" => "No User", "anonymous" => "anonymous" ];
		foreach ( $collection as $integration ) {
			$options[ $integration->getName() ] = $integration->getName();
		}
		return $options;
	}


}