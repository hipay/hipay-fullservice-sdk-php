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

namespace HiPay\Fullservice\Gateway\Request\Order;

use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo;
use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\BrowserInfo;
use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\MerchantRiskStatement;
use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\PreviousAuthInfo;
use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\RecurringInfo;
use HiPay\Fullservice\Gateway\Request\Info\CustomerBillingInfoRequest;
use HiPay\Fullservice\Gateway\Request\Info\CustomerShippingInfoRequest;
use HiPay\Fullservice\Gateway\Request\CommonRequest;
use HiPay\Fullservice\Gateway\Request\Info\DeliveryShippingInfoRequest;
use HiPay\Fullservice\Gateway\Model\PaymentMethod;

/**
 * Order request class.
 * Base order information to send
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 * */
class OrderRequest extends CommonRequest
{
    /**
     * @var string $orderid Unique order id
     * @length 32
     * @required
     */
    public $orderid;

    /**
     * Indicates how you want to process the payment.
     * The default transaction type is set in the Merchant Interface.
     *
     * @var string $operation Transaction type.
     */
    public $operation;

    /**
     * Depending on the payment product, elements specific to the payment method are required.
     *
     * @var string $payment_product The payment product (visa, mastercard, ideal ...).
     * @required
     */
    public $payment_product;

    /**
     * @var string $description The order short description
     * @length 255
     * @required
     */
    public $description;

    /**
     * @var string $long_description Additional order description.
     */
    public $long_description;

    /**
     * @var string $currency Base currency for this order. (Default to EUR).  This three-character currency code complies with ISO 4217.
     * @required
     * @length 3
     */
    public $currency = 'EUR';

    /**
     * It should be calculated as a sum of the items purchased,
     * plus the shipping fee (if present), plus the tax fee (if present).
     *
     * @var float $amount The total order amount
     * @required
     */
    public $amount;

    /**
     * @var float $shipping The order shipping fee (Default to zero). It can be omitted if the shipping fee value is zero.
     * @required
     */
    public $shipping = 0.00;

    /**
     * @var float $tax The order tax fee (Default to zero). It can be omitted if the order tax value is zero.
     * @required
     */
    public $tax = 0.00;

    /**
     * @var string $cid Unique customer id. For fraud detection reasons.
     */
    public $cid;

    /**
     * @var string $ipaddr The IP address of your customer making a purchase.
     * @required
     */
    public $ipaddr;

    /**
     * @var string $accept_url The URL to return your customer to once the payment process is completed successfully.
     */
    public $accept_url;

    /**
     * @var string $decline_url The URL to return your customer to after the acquirer declines the payment.
     */
    public $decline_url;

    /**
     * @var string $pending_url The URL to return your customer to when the payment request was submitted to the acquirer but response is not yet available.
     */
    public $pending_url;

    /**
     * @var string $exception_url The URL to return your customer to after a system failure.
     */
    public $exception_url;

    /**
     * @var string $cancel_url The URL to return your customer to when he or she decides to abort the payment.
     */
    public $cancel_url;

    /**
     * @var string $notify_url Override the notification url specified in the HiPay backend
     */
    public $notify_url;

    /**
     * This element should contain the exact content of the HTTP "Accept" header as sent to the merchant from the customer's browser
     *
     * @var string $http_accept HTTP "Accept" header (Default to "{@*}*").
     */
    public $http_accept = "*/*";

    /**
     * This element should contain the exact content of the HTTP "User-Agent" header as sent to the merchant from the customer's browser
     * @var string $http_user_agent HTTP "User-Agent" header (Default to "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)").
     */
    public $http_user_agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)";

    /**
     * @var string $device_fingerprint This element should contain the value of the "ioBB" hidden field.
     */
    public $device_fingerprint;

    /**
     * It may be used for sending confirmation emails to your customer or for displaying payment pages.
     * Values format example: en_Gb, fr_FR,es_ES,it_IT ...
     *
     * @var string $language Locale code of your customer (Default to en_GB – English – Great Britain).
     */
    public $language;

    /**
     * @var CustomerBillingInfoRequest $customerBillingInfo Customer Billing information
     */
    public $customerBillingInfo;

    /**
     * @var CustomerShippingInfoRequest $customerShippingInfo Customer Shipping information
     */
    public $customerShippingInfo;

    /**
     * @var PaymentMethod $paymentMethod A specific payment method (Card Token, IDeal,Qiwi Wallet,Split Payment ...)
     */
    public $paymentMethod;

    /**
     * @var DeliveryShippingInfoRequest $delivery_information
     */
    public $delivery_information;

    /**
     * @var BrowserInfo $browser_info
     */
    public $browser_info;

    /**
     * @var PreviousAuthInfo $previous_auth_info
     */
    public $previous_auth_info;

    /**
     * @var MerchantRiskStatement $merchant_risk_statement
     */
    public $merchant_risk_statement;

    /**
     * Information about the customer's account on the merchant's website
     *
     * @var AccountInfo $account_info
     */
    public $account_info;

    /**
     * Channel through which the transaction is being processed
     *
     * @var integer $device_channel
     * @value DeviceChannel::APP_BASED | DeviceChannel::BROWSER | DeviceChannel::THREE_DS_REQUESTOR_INITIATED
     */
    public $device_channel;

    /**
     * Information on recurring transaction
     *
     * @var RecurringInfo $recurring_info
     */
    public $recurring_info;
}
