<?php
/**
 * HiPay Fullservice SDK PHP.
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
 */

namespace HiPay\Fullservice\Gateway\Request\PaymentMethod;

/**
 * Expiration Limit Payment Method
 * Data related to payment with an expiration limit.
 *
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 *
 * @see https://github.com/hipay/hipay-fullservice-sdk-php
 *
 * @api
 */
class ExpirationLimitPaymentMethod extends AbstractPaymentMethodRequest
{
    /**
     * expiration limit in day.
     *
     * @var int
     *
     * @required
     */
    public $expiration_limit;
}
