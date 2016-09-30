<?php
/**
 * HiPay Fullservice SDK PHP
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Apache 2.0 Licence
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * @copyright      Copyright (c) 2016 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */
namespace HiPay\Fullservice\Gateway\Model;

/**
 * Transaction model
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Transaction extends AbstractTransaction
{
	
	
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
			$currency,
			$reason,
			$forwardUrl,
			$attemptId,
			$referenceToPay,
			$ipAddress,
			$ipCountry,
			$deviceId,
			$avsResult,
			$cvcResult,
			$eci,
			$paymentProduct,
			$paymentMethod,
			$threeDSecure,
			$fraudScreenig,
			$order,
			$debitAgreement,
			$cdata1 = "",
			$cdata2 = "",
			$cdata3 = "",
			$cdata4 = "",
			$cdata5 = "",
			$cdata6 = "",
			$cdata7 = "",
			$cdata8 = "",
			$cdata9 = "",
			$cdata10 = ""
		){
		parent::__construct($mid, $authorizationCode, $transactionReference, $dateCreated, $dateUpdated, 
				$dateAuthorized, $status, $state, $message, $authorizedAmount, $capturedAmount, $refundedAmount, $decimals, $currency);
		
		$this->_reason = $reason;
		$this->_forwardUrl = $forwardUrl;
		$this->_attemptId = $attemptId;
		$this->_referenceToPay = $referenceToPay;
		$this->_ipAddress = $ipAddress;
		$this->_ipCountry = $ipCountry;
		$this->_deviceId = $deviceId;
		$this->_avsResult = $avsResult;
		$this->_cvcResult = $cvcResult;
		$this->_eci = $eci;
		$this->_paymentMethod = $paymentMethod;
		$this->_paymentProduct = $paymentProduct;
		$this->_threeDSecure = $threeDSecure;
		$this->_fraudScreening = $fraudScreenig;
		$this->_order = $order;
		$this->_debitAgreement = $debitAgreement;
		$this->_transactionReference = $transactionReference;

		$this->_cdata1 = $cdata1;
		$this->_cdata2 = $cdata2;
		$this->_cdata3 = $cdata3;
		$this->_cdata4 = $cdata4;
		$this->_cdata5 = $cdata5;
		$this->_cdata6 = $cdata6;
		$this->_cdata7 = $cdata7;
		$this->_cdata8 = $cdata8;
		$this->_cdata9 = $cdata9;
		$this->_cdata10 = $cdata10;
		
	}
	
    /**
     * @var string $_transactionReference Transaction unique ID.
     */
    private $_transactionReference;
    
    /**
     * @var string $_reason Reason why transaction was declined. Optional.
     */
    private $_reason;
    
    /**
     * @var string $_forwardUrl Merchant must redirect the customer's browser to this URL. 
     * @type url
     */
    private $_forwardUrl;
    
    /**
     * @var string $_attemptId Attempt id of the payment.
     */
    private $_attemptId;
    
    /**
     * Reference to pay 
     * 
     * In some payment methods the customer can
     * receive a reference to pay, at this point, the
     * customer has the option to physically paying with
     * cash at any bank branch, or at authorized
     * processors such as drugstores, supermarkets or
     * post offices, or paying electronically at an electronic
     * banking point.
     * 
     * @var string $_referenceToPay Reference to pay
     */
    private $_referenceToPay;
    
    /**
     * @var string $_ipAddress The IP address of the customer making the purchase
     * @type ip
     */
    private $_ipAddress;
    
    /**
     * @var string $_ipCountry Country code associated to the customer's IP address.
     * @type ip
     */
    private $_ipCountry;
    
    /**
     * @var string $_deviceId Unique identifier assigned to device (the customer's browser) by HiPay TPP.
     */
    private $_deviceId;
    
    /**
     * @var string Result of the Address Verification Service (AVS).  
     * @see \HiPay\Fullservice\Enum\Transaction\AVSResult     
     */
    private $_avsResult;
    
    /**
     * @var string $_cvcResult Result of the CVC (Card Verification Code) check
     * @see \HiPay\Fullservice\Enum\Transaction\CVCResult
     */
    private $_cvcResult;
    
    /**
     * @var string $_eci  Electronic Commerce Indicator (ECI).
     * @see \HiPay\Fullservice\Gateway\Request\PaymentMethod\CardTokenPaymentMethod::$eci
     */
    private $_eci;
    
    /**
     * @var string $_paymentProduct Payment product used to complete the transaction.
     * @see \HiPay\Fullservice\Data\PaymentProduct
     */
    private $_paymentProduct;
    
    /**
     * @var \HiPay\Fullservice\Gateway\Model\PaymentMethod $_paymentMethod Payment method object 
     * @see \HiPay\Fullservice\Gateway\Request\Order\OrderRequest::$paymentMethod
     * @see \HiPay\Fullservice\Gateway\Model\PaymentMethod
     */
    private $_paymentMethod;
    
    /**
     * @var ThreeDSecure $_threeDSecure Model 3ds secure enrollment and authentication result
     */
    private $_threeDSecure;
    
    /**
     * 
     * @var FraudScreening $_fraudScreening  Model Result of the fraud screening
     */
    private $_fraudScreening;
    
    /**
     * 
     * @var Order $_order Model Result Order (customer, order informations...)
     */
    private $_order;
    
    /**
     * @var array $_debitAgreement Information about the debit agreement created
     */
    private $_debitAgreement;
    
     /**
     * You may use these parameters to submit values you wish to receive back in the API response messages or in the notifications.
     * You can use these parameters to get back session data, order content or user info.
     * 
     * @var string $_cdata1 Custom data 1.
     */
    private $_cdata1,$_cdata2,$_cdata3,$_cdata4,$_cdata5,$_cdata6,$_cdata7,$_cdata8,$_cdata9,$_cdata10;
	public function getTransactionReference() {
		return $this->_transactionReference;
	}
	public function getReason() {
		return $this->_reason;
	}
	public function getForwardUrl() {
		return $this->_forwardUrl;
	}
	public function getAttemptId() {
		return $this->_attemptId;
	}
	public function getReferenceToPay() {
		return $this->_referenceToPay;
	}
	public function getIpAddress() {
		return $this->_ipAddress;
	}
	public function getIpCountry() {
		return $this->_ipCountry;
	}
	public function getDeviceId() {
		return $this->_deviceId;
	}
	public function getAvsResult() {
		return $this->_avsResult;
	}
	public function getCvcResult() {
		return $this->_cvcResult;
	}
	public function getEci() {
		return $this->_eci;
	}
	public function getPaymentProduct() {
		return $this->_paymentProduct;
	}
	public function getPaymentMethod() {
		return $this->_paymentMethod;
	}
	public function getThreeDSecure() {
		return $this->_threeDSecure;
	}
	public function getFraudScreening() {
		return $this->_fraudScreening;
	}
	public function getOrder() {
		return $this->_order;
	}
	public function getDebitAgreement() {
		return $this->_debitAgreement;
	}
	public function getCdata1() {
		return $this->_cdata1;
	}
	public function getCdata2() {
		return $this->_cdata2;
	}
	public function getCdata3() {
		return $this->_cdata3;
	}
	public function getCdata4() {
		return $this->_cdata4;
	}
	public function getCdata5() {
		return $this->_cdata5;
	}
	public function getCdata6() {
		return $this->_cdata6;
	}
	public function getCdata7() {
		return $this->_cdata7;
	}
	public function getCdata8() {
		return $this->_cdata8;
	}
	public function getCdata9() {
		return $this->_cdata9;
	}
	public function getCdata10() {
		return $this->_cdata10;
	}
	
    
    
    
}