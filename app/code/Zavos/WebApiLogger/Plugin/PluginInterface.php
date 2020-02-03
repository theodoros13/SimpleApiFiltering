<?php

namespace Zavos\WebApiLogger\Plugin;

interface PluginInterface {

	/**
	 * @return string
	 */
	public function getApiType();
}