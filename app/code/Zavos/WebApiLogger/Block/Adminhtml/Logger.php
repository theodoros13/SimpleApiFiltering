<?php

namespace Zavos\WebApiLogger\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;


class Logger extends Container {
	/**
	 * Constructor
	 *
	 * @return void
	 */
	protected function _construct() {
		$this->_controller = 'adminhtml_logger';
		$this->_blockGroup = 'Zavos_WebApiLogger';
		$this->_headerText = __( 'Api Logger' );
		#	$this->_addButtonLabel = __('Add News');
		parent::_construct();
		$this->removeButton( "add" );
	}
}