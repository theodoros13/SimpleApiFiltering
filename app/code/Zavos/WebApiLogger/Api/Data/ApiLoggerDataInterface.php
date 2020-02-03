<?php

namespace Zavos\WebApiLogger\Api\Data;


interface ApiLoggerDataInterface {

	/**
	 * @param string $urlRequest
	 *
	 * @return $this
	 */
	public function setUrlRequest ( $urlRequest );

	/**
	 * @param string $requestData
	 *
	 * @return $this
	 */
	public function setRequestData ( $requestData );

	/**
	 * @param string $responseData
	 *
	 * @return $this
	 */
	public function setResponseData ( $responseData );

	/**
	 * @param string $methodRequest
	 *
	 * @return $this
	 */
	public function setMethodRequest ( $methodRequest );

	/**
	 * @param $apiType
	 *
	 * @return $this
	 */
	public function setApiType ( $apiType );

	/**
	 * @param $apiUser
	 *
	 * @return $this
	 */
	public function setApiUser ( $apiUser );

	/**
	 * @return string
	 */
	public function getUrlRequest ();

	/**
	 * @return string
	 */
	public function getRequestData ();

	/**
	 * @return string
	 */
	public function getResponseData ();

	/**
	 * @return string
	 */
	public function getMethodRequest ();

	/**
	 * @return string
	 */
	public function getApiType ();

	/**
	 * @return string
	 */
	public function getApiUser ();

}