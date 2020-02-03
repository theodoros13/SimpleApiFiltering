<?php

namespace Zavos\WebApiLogger\Controller\Adminhtml\Logger;


use Zavos\WebApiLogger\Controller\Adminhtml\Logger;

class Index extends Logger {

	/**
	 * @return \Magento\Backend\Model\View\Result\Page|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
	 */
	public function execute () {
		if ( $this->getRequest()->getQuery( 'ajax' ) ) {
			$this->_forward( 'grid' );

			return;
		}
		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
		$resultPage = $this->_resultPageFactory->create();
		$resultPage->setActiveMenu( 'Zavos_WebApiLogger::api_logger' );
		$resultPage->getConfig()->getTitle()->prepend( __( 'Web Api Logger' ) );

		return $resultPage;
	}
}