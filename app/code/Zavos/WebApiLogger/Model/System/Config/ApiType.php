<?php

namespace Zavos\WebApiLogger\Model\System\Config;

use Magento\Framework\Option\ArrayInterface;

class ApiType implements ArrayInterface {

	/**
	 * @return array
	 */
	public function toOptionArray () {
		$options = [
			"REST" => "REST",
			"SOAP" => "SOAP"
		];

		return $options;
	}
}