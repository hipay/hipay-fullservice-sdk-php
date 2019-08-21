<?php
/**
 * HiPay Enterprise SDK PHP
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Apache 2.0 Licence
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * @copyright      Copyright (c) 2019 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */

namespace HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo;

use HiPay\Fullservice\Model\AbstractModel;
use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo\Customer;
use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo\Purchase;
use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo\Payment;
use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo\Shipping;

/**
 * Information about the customer's account on the merchant's website
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class AccountInfo extends AbstractModel
{
    /**
     * Customer's account information
     *
     * @var Customer $customer
     */
    public $customer;

    /**
     * Customer's purchase information
     *
     * @var Purchase $purchase
     */
    public $purchase;

    /**
     * Customer's payment information
     *
     * @var Payment $payment
     */
    public $payment;

    /**
     * Customer's shipping information
     *
     * @var Shipping $shipping
     */
    public $shipping;
}
