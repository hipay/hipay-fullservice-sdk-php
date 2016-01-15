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
namespace Hipay\Fullservice\Gateway\Request\Order;


use Hipay\Fullservice\Request\AbstractRequest;
use Hipay\Fullservice\Gateway\Request\Info\CustomerBillingInfoRequest;
use Hipay\Fullservice\Gateway\Request\Info\CustomerShippingInfoRequest;
/**
 * Order request class.
 * Base order informations to send
 *
 * @category    Hipay
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 * */
class OrderRequest extends AbstractRequest {
    
    /**
     * @var string 32 required 
     * @length 32
     * @required
     * @desc Unique order id
     */
    public $orderid;
    
    /**
     * @var string
     * @desc Transaction type.
     * Indicates how you want to process the payment. 
     * The default transaction type is set in the Merchant Interface
     */
    public $operation;
    
    /**
     * @var string
     * @required
     * @desc The payment product
     * Depending on the payment product, elements specific to the payment method are required.
     * @example visa, mastercard, ideal
     */
    public $payment_product;
    
    /**
     * @var string
     * @length 255
     * @required 
     * @desc The order short descrption
     */
    public $description;
    
    /**
     * @var string
     * @desc Additional order description.
     */
    public $long_description;
    
    /**
     * @var string
     * @required
     * @lenth 3
     * @type currency
     * @desc Base currency for this order. (Default to EUR)
     * This three-character currency code complies with ISO 4217.
     */
    public $currency = 'EUR';
    
    /**
     * @var float
     * @required
     * @desc The total order amount
     * It should be calculated as a sum of the items purchased,
     * plus the shipping fee (if present), plus the tax fee (if present).
     */
    public $amount;
    
    /**
     * @var float
     * @required
     * @desc The order shipping fee (Default to zero).
     * It can be omitted if the shipping fee value is zero.
     */
    public $shipping = 0.00;
    
    /**
     * @var float
     * @required
     * @desc The order tax fee (Default to zero).
     * It can be omitted if the order tax value is zero.
     */
    public $tax = 0.00;
    
    /**
     * @var string
     * @desc Unique customer id.
     * @required For fraud detection reasons.
     */
    public $cid;
    
    /**
     * @var string
     * @desc The IP address of your customer making a purchase.
     * @required
     * @type ipv4
     */
    public $ipaddr;
    
    /**
     * @type url
     * @var string
     * @desc The URL to return your customer to once the payment process is completed successfully.
     */
    public $accept_url;
    
    /**
     * @type url
     * @var string
     * @desc The URL to return your customer to after the acquirer declines the payment.
     */
    public $decline_url;
    
    /**
     * @type url
     * @var string
     * @desc The URL to return your customer to when the payment request was submitted to the acquirer but response is not yet available.
     */
    public $pending_url;
    
    /**
     * @type url
     * @var string
     * @desc The URL to return your customer to after a system failure.
     */
    public $exception_url;
    
    
    /**
     * @type url
     * @var string
     * @desc The URL to return your customer to when he or she decides to abort the payment.
     */
    public $cancel_url;
    
    /**
     * @var string
     * @desc This element should contain the exact content of the HTTP "Accept" header as sent to the merchant from the customer's browser (Default to "*//*").
     */
    public $http_accept = "*/*";
    
    /**
     * @var string
     * @desc This element should contain the exact content of the HTTP "User-Agent" header as sent to the merchant from the
     * customer's browser (Default to "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)").
     */
    public $http_user_agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)";
    
    /**
     * 
     * @var string
     * @desc This element should contain the value of the "ioBB" hidden field.
     */
    public $device_fingerprint;
    
    /**
     * @var string
     * @desc Locale code of your customer (Default to en_GB – English – Great Britain).
     * It may be used for sending confirmation emails to your customer or for displaying payment pages.
     * @example en_Gb, fr_FR,es_ES,it_IT
     */
    public $language;
    
    /**
     * 
     * @var AbstractRequest $paymentMethod
     * @desc A specific payment method
     * @example Card Token, IDeal,Qiwi Wallet,Split Payment (XTimesCreditCard)
     */
    public $paymentMethod;
    
    /**
     * @var CustomerBillingInfoRequest
     * @desc Customer Billing informations
     */
    public $customerBillingInfo;
    
    /**
     * @var CustomerShippingInfoRequest
     * @desc Customer Shipping informations
     */
    public $customerShippingInfo;
    
    /**
     * @var string
     * @desc Custom data. You may use these parameters to submit values you wish to receive back in the API response messages
     * or in the notifications.
     * @example You can use these parameters to get back session data, order content or user info.
     */
    public $cdata1;
    
    /**
     * @var string
     * @desc Custom data. You may use these parameters to submit values you wish to receive back in the API response messages
     * or in the notifications.
     * @example You can use these parameters to get back session data, order content or user info.
     */
    public $cdata2;
    
    /**
     * @var string
     * @desc Custom data. You may use these parameters to submit values you wish to receive back in the API response messages
     * or in the notifications.
     * @example You can use these parameters to get back session data, order content or user info.
     */
    public $cdata3;
    
    /**
     * @var string
     * @desc Custom data. You may use these parameters to submit values you wish to receive back in the API response messages
     * or in the notifications.
     * @example You can use these parameters to get back session data, order content or user info.
     */
    public $cdata4;
    
    /**
     * @var string
     * @desc Custom data. You may use these parameters to submit values you wish to receive back in the API response messages
     * or in the notifications.
     * @example You can use these parameters to get back session data, order content or user info.
     */
    public $cdata5;
    
    /**
     * @var string
     * @desc Custom data. You may use these parameters to submit values you wish to receive back in the API response messages
     * or in the notifications.
     * @example You can use these parameters to get back session data, order content or user info.
     */
    public $cdata6;
    
    /**
     * @var string
     * @desc Custom data. You may use these parameters to submit values you wish to receive back in the API response messages
     * or in the notifications.
     * @example You can use these parameters to get back session data, order content or user info.
     */
    public $cdata7;
    
    /**
     * @var string
     * @desc Custom data. You may use these parameters to submit values you wish to receive back in the API response messages
     * or in the notifications.
     * @example You can use these parameters to get back session data, order content or user info.
     */
    public $cdata8;
    
    /**
     * @var string
     * @desc Custom data. You may use these parameters to submit values you wish to receive back in the API response messages
     * or in the notifications.
     * @example You can use these parameters to get back session data, order content or user info.
     */
    public $cdata9;
    
    /**
     * @var string
     * @desc Custom data. You may use these parameters to submit values you wish to receive back in the API response messages
     * or in the notifications.
     * @example You can use these parameters to get back session data, order content or user info.
     */
    public $cdata10;
    
    
	
}