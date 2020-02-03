<?php

namespace Zavos\WebApiLogger\Plugin;

class Soap
	extends AbstractPlugin
{
	/**
	 * @return string
	 */
	public function getApiType()
	{
		return "Soap";
	}
}