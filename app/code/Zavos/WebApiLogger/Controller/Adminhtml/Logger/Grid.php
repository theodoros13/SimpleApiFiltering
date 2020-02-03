<?php

namespace Zavos\WebApiLogger\Controller\Adminhtml\Logger;


use Zavos\WebApiLogger\Controller\Adminhtml\Logger;


class Grid extends Logger {

	/**
	 * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
	 */
	public function execute () {
		return $this->_resultPageFactory->create();
	}
}