<?php

namespace Zavos\WebApiLogger\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class InstallData
 * @package Zavos\WebApiLogger\Setup
 */
class InstallData implements InstallDataInterface {
	/**
	 * Function install
	 *
	 * @param ModuleDataSetupInterface $setup
	 * @param ModuleContextInterface   $context
	 *
	 * @return void
	 */
	public function install ( ModuleDataSetupInterface $setup, ModuleContextInterface $context ) {
		//install data here
	}
}