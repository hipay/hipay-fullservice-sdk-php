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
use HiPay\Fullservice\Data\PaymentProduct\Collection;

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
     * @var array<string>|string|null $payment_product_list The list of payment products to display on the payment page.
     * @required
     */
    public $payment_product_list;

    /**
     * @var array<string> The categories of payment products to be displayed on the payment page.
     * @value "visa","mastercard","maestro","cb"
     */
    public $payment_product_category_list;

    /**
     * @var string URL to merchant style sheet. HTTPS protocol is required.
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

    /**
     * Indicates the tokenization module whether the payment card token
     * should be generated either for a single-use or a multi-use. Possible values:
     *
     * 1: Generates a multi-use token
     * 0: Generates a single-use token While a single-use token is typically generated for a short time and for
     * processing a single transaction, multi-use tokens are generally generated for recurrent payments.
     *
     * @var int $multi_use
     * @length 1
     * @values 0|Generate a single-use token,1|Generate a multi-use token
     */
    public $multi_use;

    /**
     * @return void
     */
    public function reorderPaymentProductList(){
        $this->payment_product_list = Collection::orderByPriority($this->payment_product_list);
    }
}
