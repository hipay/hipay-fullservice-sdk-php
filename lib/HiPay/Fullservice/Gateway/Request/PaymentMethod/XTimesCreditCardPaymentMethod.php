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

namespace HiPay\Fullservice\Gateway\Request\PaymentMethod;

/**
 * 3X,4X,3X no fees and 4X no fees creditcard Payment Method
 * Data related to payment with split payment system
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class XTimesCreditCardPaymentMethod extends PaymentMethodRequest
{
    /**
     * Gender of the ship-to customer.
     *
     * Possible values:
     * - M (Male)
     * - F (Female)
     * - U (Unknown)
     *
     * @var string $shipto_gender Gender of the ship-to customer.
     * @required
     * @values M|Male,F|Female,U|Unknown
     * @length 1
     */
    public $shipto_gender;

    /**
     * @var string $shipto_phone The customer's ship-to phone number.
     * @required
     */
    public $shipto_phone;

    /**
     * @var string $shipto_msisdn The customer's ship-to mobile phone number
     * @required
     */
    public $shipto_msisdn;

    /**
     * @var string $order_category_code Order category list
     */
    public $order_category_code;

    /**
     * @var string $delivery_date Estimated delivery date (yyyy-mm-dd).
     * @format yyyy-mm-dd
     */
    public $delivery_date;

    /**
     * Delivery method type
     *
     * Possible values:
     * - STORE24H
     * - CARRIER
     * - CARRIER24H
     * - RELAYPOINT
     * - RELAYPOINT24H
     *
     * @var string $delivery_method Delivery method
     * $value STORE24H,CARRIER,CARRIER24H,RELAYPOINT,RELAYPOINT24H
     */
    public $delivery_method;

    /**
     * @var string $carrier_description Carrier Description
     */
    public $carrier_description;
}
