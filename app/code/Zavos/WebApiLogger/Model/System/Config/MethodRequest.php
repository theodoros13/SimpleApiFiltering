<?php

namespace Zavos\WebApiLogger\Model\System\Config;

use Magento\Framework\Option\ArrayInterface;

class MethodRequest implements ArrayInterface {

	/**
	 * @return array
	 */
	public function toOptionArray () {
		return [
			"GET"     => "GET",
			"POST"    => "POST",
			"PUT"     => "PUT",
			"HEAD"    => "HEAD",
			"DELETE"  => "DELETE",
			"PATCH"   => "PATCH",
			"OPTIONS" => "OPTIONS",
		];
	}
}