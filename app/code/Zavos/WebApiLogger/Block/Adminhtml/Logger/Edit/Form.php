<?php

namespace Zavos\WebApiLogger\Block\Adminhtml\Logger\Edit;

use Magento\Backend\Block\Widget\Form\Generic;
use Zavos\WebApiLogger\Model\ApiLogger;

class Form extends Generic {

	/**
	 * @return Generic
	 * @throws \Magento\Framework\Exception\LocalizedException
	 */
	protected function _prepareForm () {

		/** @var ApiLogger $model */
		$model = $this->_coreRegistry->registry( 'api_logger' );
		/** @var \Magento\Framework\Data\Form $form */
		$form = $this->_formFactory->create(
			[
				'data' => [
					'id'     => 'edit_form',
					'action' => $this->getData( 'action' ),
					'method' => 'post'
				]
			]
		);

		$form->setHtmlIdPrefix( 'api_logger_' );
		$form->setFieldNameSuffix( 'api_logger' );

		$fieldset = $form->addFieldset(
			'base_fieldset',
			[ 'legend' => __( 'General' ) ]
		);
		$fieldset->addField(
			'url_request',
			'label',
			[
				'name'  => 'url_request',
				'label' => __( 'Url Request' ),
				"value" => $model->getUrlRequest()
			]
		);
		$fieldset->addField(
			'api_type',
			'label',
			[
				'name'  => 'api_type',
				'label' => __( 'Api Type' ),
				'value' => $model->getApiType()
			]
		);
		$fieldset->addField(
			'method_request',
			'label',
			[
				'name'  => 'method_request',
				'label' => __( 'Request Method' ),
				'value' => $model->getMethodRequest()
			]
		);
		$fieldset->addField(
			'request_data',
			'label',
			[
				'name'  => 'request_data',
				'label' => __( 'Request Data' ),
				'value' => $model->getRequestData()
			]
		);
		$fieldset->addField(
			'response_data',
			'label',
			[
				'name'  => 'response_data',
				'label' => __( 'Response Data' ),
				'value' => $model->getResponseData()
			]
		);

		$form->setUseContainer( true );
		$this->setForm( $form );

		return parent::_prepareForm();
	}
}