<?php

namespace Zavos\WebApiLogger\Controller\Adminhtml\Logger;


use Zavos\WebApiLogger\Controller\Adminhtml\Logger;
use Zavos\WebApiLogger\Model\ApiLogger;

class Edit extends Logger {


	/**
	 * @return void
	 */
	public function execute () {
		$id = $this->getRequest()->getParam( 'id' );
		/** @var ApiLogger $model */
		$model = $this->_apiLoggerFactory->create();


		if ( $id ) {
			$model->load( $id );
			if ( ! $model->getId() ) {
				$this->messageManager->addError( __( 'This Api Request no longer exists.' ) );
				$this->_redirect( '*/*/' );

				return;
			}
		}

		// Restore previously entered form data from session
		#$data = $this->_session->getApiRequestData( true );

		$data = $this->_session->getApiRequestData( true );
		if ( ! empty( $data ) ) {
			$model->setData( $data );
		}
		$this->_coreRegistry->register( 'api_logger', $model );

		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
		$resultPage = $this->_resultPageFactory->create();

		$resultPage->getConfig()->getTitle()->prepend( __( 'Api Request' . $model->getUrlRequest() ) );

		return $resultPage;
	}
}