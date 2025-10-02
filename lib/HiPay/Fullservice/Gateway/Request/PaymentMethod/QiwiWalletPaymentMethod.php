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
 * Qiwi Wallet Payment Method
 * Data related to payment with qiwi wallet system
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class QiwiWalletPaymentMethod extends AbstractPaymentMethodRequest
{
    /**
     * The Qiwi user's ID, to whom the invoice is issued.
     * It is the user's phone number, in international format (+79263745223).
     *
     * @var string $qiwiuser The Qiwi user's ID
     * @length 12
     * @required
     */
    public $qiwiuser;
}
