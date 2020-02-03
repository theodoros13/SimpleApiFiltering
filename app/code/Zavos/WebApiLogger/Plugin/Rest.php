<?php

namespace Zavos\WebApiLogger\Plugin;

class Rest
	extends AbstractPlugin
{
	/**
	 * @return string
	 */
	public function getApiType()
	{
		return 'REST';
	}
}