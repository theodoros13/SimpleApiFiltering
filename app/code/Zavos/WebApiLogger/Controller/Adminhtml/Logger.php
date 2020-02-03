<?php

namespace Zavos\WebApiLogger\Controller\Adminhtml;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
use Zavos\WebApiLogger\Model\ApiLoggerFactory;
use Magento\Framework\Registry;

class Logger extends Action {


	/**
	 * Index resultPageFactory
	 * @var PageFactory
	 */
	protected $_resultPageFactory;

	/**
	 * @var ApiLoggerFactory
	 */
	protected $_apiLoggerFactory;

	/**
	 * @var Registry
	 */
	protected $_coreRegistry;

	/**
	 * Logger constructor.
	 *
	 * @param Context          $context
	 * @param PageFactory      $resultPageFactory
	 * @param ApiLoggerFactory $apiLoggerFactory
	 * @param Registry         $registry
	 */
	public function __construct (
		Context $context,
		PageFactory $resultPageFactory,
		ApiLoggerFactory $apiLoggerFactory,
		Registry $registry
	) {
		$this->_resultPageFactory = $resultPageFactory;
		$this->_apiLoggerFactory  = $apiLoggerFactory;
		$this->_coreRegistry      = $registry;
		parent::__construct( $context );
	}


	public function execute () {
	}
}
