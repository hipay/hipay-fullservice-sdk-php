<?php
/*
 * Hipay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - Hipay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace Hipay\Fullservice\Gateway\Model;


use Hipay\Fullservice\Model\AbstractModel;

/**
 * Abstract Model Transaction response.
 * Order and Transaction commons methods
 *
 * @category    Hipay
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
abstract class AbstractTransaction extends AbstractModel{
	
	
	/**
	 * 
	 * @param string $mid
	 * @param string $authorizationCode
	 * @param string $transactionReference
	 * @param string $dateCreated
	 * @param string $dateUpdated
	 * @param string $dateAuthorized
	 * @param int $status
	 * @param string $state
	 * @param string $message
	 * @param float $authorizedAmount
	 * @param float $capturedAmount
	 * @param float $refundedAmount
	 * @param int $decimals
	 * @param string $currency
	 */
	public function __construct(
			$mid,
			$authorizationCode,
			$transactionReference,
			$dateCreated,
			$dateUpdated,
			$dateAuthorized,
			$status,
			$state,
			$message,
			$authorizedAmount,
			$capturedAmount,
			$refundedAmount,
			$decimals,
			$currency
			){
		
				$this->_mid = $mid;
				$this->_authorizationCode = $authorizationCode;
				$this->_transactionReference = $transactionReference;
				$this->_dateCreated = $dateCreated;
				$this->_dateUpdated = $dateUpdated;
				$this->_dateAuthorized = $dateAuthorized;
				$this->_status = $status;
				$this->_state = $state;
				$this->_message = $message;
				$this->_authorizedAmount = $authorizedAmount;
				$this->_capturedAmount = $capturedAmount;
				$this->_refundedAmount = $refundedAmount;
				$this->_decimals = $decimals;
				$this->_currency = $currency;
		
	}
    
    /**
     * @var string $_mid Your merchant account number
     */
    private $_mid;
    
    /**
     * An authorization code (up to 35 characters) generated for each approved or pending transaction by the acquiring provider.
     * 
     * @var string $_authorizationCode An authorization code
     */
    private $_authorizationCode;
    
    /**
     * @var string $_transactionReference The unique identifier of the transaction
     */
    private $_transactionReference;
    
    /**
     * @var string $_dateCreated Time when transaction was created (yyyy-mm-ddTH:i:sZ).
     * @type date
     * @format yyyy-mm-ddTH:i:sZ
     */
    private $_dateCreated;
    
    /**
     * @var string $_dateUpdated Time when transaction was last updated (yyyy-mm-ddTH:i:sZ).
     * @type date
     * @format yyyy-mm-ddTH:i:sZ
     */
    private $_dateUpdated;
    
    /**
     * @var string $_dateAuthorized Time when transaction was authorized (yyyy-mm-ddTH:i:sZ).
     * @type date
     * @format yyyy-mm-ddTH:i:sZ
     */
    private $_dateAuthorized;
    
    /**
     * @var int $_status Transaction status return by Fullservice API.
     * @see \Hipay\Fullservice\Enum\Transaction\TransactionStatus
     */
    private $_status;
    
    /**
     * @var string $_state Transaction state return by Fullservice API.
     * @see \Hipay\Fullservice\Enum\Transaction\TransactionState
     */
    private $_state;
    
    /**
     * @var string $_message Transaction message
     */
    private $_message;
    
    /**
     * @var float $_authorizedAmount The transaction amount.
     */
    private $_authorizedAmount;
    
    /**
     * @var flaot $_capturedAmount The captured amount
     */
    private $_capturedAmount;
    
    /**
     * @var float $_refundedAmount The refunded amount
     */
    private $_refundedAmount;
    
    /**
     * @var int $_decimals Decimal precision of transaction amount.
     */
    private $_decimals;
    
    /**
     * @var string $_currency Base currency for this transaction. This three-character currency code complies with ISO 4217.
     * @type currency
     */
    private $_currency;
	public function getMid() {
		return $this->_mid;
	}
	public function getAuthorizationCode() {
		return $this->_authorizationCode;
	}
	public function getTransactionReference() {
		return $this->_transactionReference;
	}
	public function getDateCreated() {
		return $this->_dateCreated;
	}
	public function getDateUpdated() {
		return $this->_dateUpdated;
	}
	public function getDateAuthorized() {
		return $this->_dateAuthorized;
	}
	public function getStatus() {
		return $this->_status;
	}
	public function getState() {
		return $this->_state;
	}
	public function getMessage() {
		return $this->_message;
	}
	public function getAuthorizedAmount() {
		return $this->_authorizedAmount;
	}
	public function getCapturedAmount() {
		return $this->_capturedAmount;
	}
	public function getRefundedAmount() {
		return $this->_refundedAmount;
	}
	public function getDecimals() {
		return $this->_decimals;
	}
	public function getCurrency() {
		return $this->_currency;
	}
	
    
}