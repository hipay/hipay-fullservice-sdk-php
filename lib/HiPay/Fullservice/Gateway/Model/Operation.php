<?php

namespace HiPay\Fullservice\Gateway\Model;

use HiPay\Fullservice\Gateway\Model\AbstractTransaction;

/**
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class Operation extends AbstractTransaction {
	
	/**
	 * @var string $_operation Type of maintenance operation
	 */
	private $_operation;
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \HiPay\Fullservice\Gateway\Model\AbstractTransaction::__construct()
	 */
	public function __construct(
			$mid,$authorizationCode, $transactionReference, $dateCreated,  $dateUpdated,  
			$dateAuthorized,  $status,  $state,  $message,  $authorizedAmount,  $capturedAmount,  
			$refundedAmount, $decimals,  $currency,$operation) {
		
		parent::__construct ( $mid, $authorizationCode, $transactionReference, $dateCreated, $dateUpdated, $dateAuthorized, $status, $state, $message, $authorizedAmount, $capturedAmount, $refundedAmount, $decimals, $currency );
		
		$this->_operation = $operation;
		
	}
	
	public function getOperation() {
		return $this->_operation;
	}
	
}