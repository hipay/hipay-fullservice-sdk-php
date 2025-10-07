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

use HiPay\Fullservice\Data\PaymentProduct;
use HiPay\Fullservice\Enum\Transaction\TransactionState;
use HiPay\Fullservice\Enum\Transaction\TransactionStatus;

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
    /**
     * Transaction constructor.
     * @param string $mid
     * @param string $authorizationCode
     * @param string $transactionReference
     * @param string $dateCreated
     * @param string $dateUpdated
     * @param string $dateAuthorized
     * @param int|null $status
     * @param string $state
     * @param string $message
     * @param float $authorizedAmount
     * @param float $capturedAmount
     * @param float $refundedAmount
     * @param int $decimals
     * @param string $currency
     * @param array<string, mixed>|null $reason
     * @param string $forwardUrl
     * @param string $attemptId
     * @param string|false|null $referenceToPay
     * @param string $ipAddress
     * @param string $ipCountry
     * @param string $deviceId
     * @param string $avsResult
     * @param string $cvcResult
     * @param string $eci
     * @param string $paymentProduct
     * @param PaymentMethod|null $paymentMethod
     * @param ThreeDSecure|null $threeDSecure
     * @param FraudScreening|null $fraudScreening
     * @param Order|null $order
     * @param array<string, mixed> $debitAgreement
     * @param array<string, mixed> $basket
     * @param OperationResponse|null $operation
     * @param array<string, mixed>|null $customData
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
        $fraudScreening,
        $order,
        $debitAgreement,
        $basket = null,
        $operation = null,
        $customData = null
    ) {
        parent::__construct(
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
        );

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
        $this->_fraudScreening = $fraudScreening;
        $this->_order = $order;
        $this->_debitAgreement = $debitAgreement;
        $this->_transactionReference = $transactionReference;
        $this->_operation = $operation;
        $this->_basket = $basket;
        $this->_customData = $customData;
    }

    /**
     * @var string $_transactionReference Transaction unique ID.
     */
    protected $_transactionReference;

    /**
     * @var array<string, mixed>|null $_reason Reason why transaction was declined. Optional.
     */
    protected $_reason;

    /**
     * @var string $_forwardUrl Merchant must redirect the customer's browser to this URL.
     */
    protected $_forwardUrl;

    /**
     * @var string $_attemptId Attempt id of the payment.
     */
    protected $_attemptId;

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
     * @var string|false|null $_referenceToPay Reference to pay
     */
    protected $_referenceToPay;

    /**
     * @var string $_ipAddress The IP address of the customer making the purchase
     */
    protected $_ipAddress;

    /**
     * @var string $_ipCountry Country code associated to the customer's IP address.
     */
    protected $_ipCountry;

    /**
     * @var string $_deviceId Unique identifier assigned to device (the customer's browser) by HiPay TPP.
     */
    protected $_deviceId;

    /**
     * @var string Result of the Address Verification Service (AVS).
     * @see \HiPay\Fullservice\Enum\Transaction\AVSResult
     */
    protected $_avsResult;

    /**
     * @var string $_cvcResult Result of the CVC (Card Verification Code) check
     * @see \HiPay\Fullservice\Enum\Transaction\CVCResult
     */
    protected $_cvcResult;

    /**
     * @var string $_eci Electronic Commerce Indicator (ECI).
     * @see \HiPay\Fullservice\Gateway\Request\PaymentMethod\CardTokenPaymentMethod::$eci
     */
    protected $_eci;

    /**
     * @var string $_paymentProduct Payment product used to complete the transaction.
     * @see \HiPay\Fullservice\Data\PaymentProduct
     */
    protected $_paymentProduct;

    /**
     * @var \HiPay\Fullservice\Gateway\Model\PaymentMethod|null $_paymentMethod Payment method object
     * @see \HiPay\Fullservice\Gateway\Request\Order\OrderRequest::$paymentMethod
     * @see \HiPay\Fullservice\Gateway\Model\PaymentMethod
     */
    protected $_paymentMethod;

    /**
     * @var ThreeDSecure|null $_threeDSecure Model 3ds secure enrollment and authentication result
     */
    protected $_threeDSecure;

    /**
     *
     * @var FraudScreening|null $_fraudScreening Model Result of the fraud screening
     */
    protected $_fraudScreening;

    /**
     *
     * @var Order|null $_order Model Result Order (customer, order information...)
     */
    protected $_order;

    /**
     * @var array<string, mixed> $_debitAgreement Information about the debit agreement created
     */
    protected $_debitAgreement;

    /**
     *
     * @var OperationResponse|null $_operation Result Operation ( Operation ID, reference ... )
     */
    protected $_operation;

    /**
     * @var array<string, mixed>|null
     */
    protected $_customData;

    /**
     * @var array<string, mixed>|null
     */
    protected $_basket;

    /**
     * @return array<string, mixed>|null
     */
    public function getCustomData()
    {
        return $this->_customData;
    }

    /**
     * @return string
     */
    public function getTransactionReference()
    {
        return $this->_transactionReference;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getReason()
    {
        return $this->_reason;
    }

    /**
     * @return string
     */
    public function getForwardUrl()
    {
        return $this->_forwardUrl;
    }

    /**
     * @return string
     */
    public function getAttemptId()
    {
        return $this->_attemptId;
    }

    /**
     * @return string|false|null
     */
    public function getReferenceToPay()
    {
        return $this->_referenceToPay;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->_ipAddress;
    }

    /**
     * @return string
     */
    public function getIpCountry()
    {
        return $this->_ipCountry;
    }

    /**
     * @return string
     */
    public function getDeviceId()
    {
        return $this->_deviceId;
    }

    /**
     * @return string
     */
    public function getAvsResult()
    {
        return $this->_avsResult;
    }

    /**
     * @return string
     */
    public function getCvcResult()
    {
        return $this->_cvcResult;
    }

    /**
     * @return string
     */
    public function getEci()
    {
        return $this->_eci;
    }

    /**
     * @return string
     */
    public function getPaymentProduct()
    {
        return $this->_paymentProduct;
    }

    /**
     * @return PaymentMethod|null
     */
    public function getPaymentMethod()
    {
        return $this->_paymentMethod;
    }

    /**
     * @return ThreeDSecure|null
     */
    public function getThreeDSecure()
    {
        return $this->_threeDSecure;
    }

    /**
     * @return FraudScreening|null
     */
    public function getFraudScreening()
    {
        return $this->_fraudScreening;
    }

    /**
     * @return Order|null
     */
    public function getOrder()
    {
        return $this->_order;
    }

    /**
     * @return array<string, mixed>
     */
    public function getDebitAgreement()
    {
        return $this->_debitAgreement;
    }

    /**
     * @return OperationResponse|null
     */
    public function getOperation()
    {
        return $this->_operation;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getBasket()
    {
        return $this->_basket;
    }
}
