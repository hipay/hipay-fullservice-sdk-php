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


/**
 * Payment Page request class.
 * Based on HiPay\Fullservice\Gateway\Request\Order\OrderRequest
 *
 * @see \HiPay\Fullservice\Gateway\Request\Order\OrderRequest
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 * */
class HostedPaymentPageRequest extends OrderRequest
{

    /**
     * @var array The list of payment products to display on the payment page.
     * @required
     */
    public $payment_product_list;

    /**
     * @var array The categories of payment products to be displayed on the payment page.
     * @value "visa","mastercard","maestro","cb"
     */
    public $payment_product_category_list;

    /**
     * @var string URL to merchant style sheet. HTTPS protocol is required.
     * @type https url to stylesheet
     */
    public $css;

    /**
     * @var string The template name.
     * @value "basic-js" for a full page redirection | "iframe-js" for an iframe integration
     */
    public $template;

    /**
     * @var int Enable/disable the payment products selector.
     * @value 0 or 1
     */
    public $display_selector;

    /**
     * @var int Time in second of Period of validity of the payment page
     * @value Maximum 18000000 ( 7 days )
     *
     */
    public $time_limit_to_pay;
}