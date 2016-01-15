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

/**
 * Transaction model
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Transaction extends AbstractTransaction
{
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
     * @see \Hipay\Fullservice\Enum\Transaction\AVSResult     
     */
    private $_avsResult;
    
    /**
     * @var string $_cvcResult Result of the CVC (Card Verification Code) check
     * @see \Hipay\Fullservice\Enum\Transaction\CVCResult
     */
    private $_cvcResult;
    
    /**
     * @var string $_eci  Electronic Commerce Indicator (ECI).
     * @see \Hipay\Fullservice\Gateway\Request\PaymentMethod\CardTokenPaymentMethod::$eci
     */
    private $_eci;
    
    /**
     * @var string $_paymentProduct Payment product used to complete the transaction.
     * @see \Hipay\Fullservice\Gateway\Model\PaymentProduct
     */
    private $_paymentProduct;
    
    /**
     * @var string $_paymentMethod Payment method name
     *  @see \Hipay\Fullservice\Gateway\Request\Order\OrderRequest::$paymentMethod
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
     * @var Order $_order Model Result Orde (customer, order informations...)
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
    private $_cdata1,$_cdata2,$_cdata3,$_cdata3,$_cdata5,$_cdata6,$_cdata7,$_cdata8,$_cdata9,$_cdata10;
    
    
    
}