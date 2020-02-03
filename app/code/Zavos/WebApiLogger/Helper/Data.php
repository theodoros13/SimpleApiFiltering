<?php

namespace Zavos\WebApiLogger\Helper;


use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper implements ScopeInterface {
	/**
	 * DEFAULT XML PATH
	 */
	const XML_PATH = "zavos_api/";

	/**
	 * API XML PATH
	 */
	const API_XML_PATH = self::XML_PATH . "general/";

	/**
	 * CONFIG_ACTIVE
	 */
	const CONFIG_ACTIVE = 'active';

	/**
	 * CONFIG_CLEAN_UP_DAYS
	 */
	const CONFIG_CLEAN_UP_DAYS = 'cleanup_days';

	/**
	 * CONFIG_ACCEPT_ALL_HTTP_METHODS
	 */
	const CONFIG_ACCEPT_ALL_HTTP_METHODS = 'accept_all_http_methods';

	/**
	 * CONFIG_SELECTED_HTTP_METHOD
	 */
	const CONFIG_SELECTED_HTTP_METHODS = 'selected_http_methods';

	/**
	 * @param      $field
	 * @param null $storeId
	 *
	 * @return mixed
	 */
	private function getConfigValue ( $field, $storeId = null ) {
		return $this->scopeConfig->getValue(
			$field, self::SCOPE_STORE, $storeId
		);
	}


	/**
	 * @param      $code
	 * @param null $storeId
	 *
	 * @return mixed
	 */
	public function getApiConfig ( $code, $storeId = null ) {
		return $this->getConfigValue( self::API_XML_PATH . $code, $storeId );
	}
}