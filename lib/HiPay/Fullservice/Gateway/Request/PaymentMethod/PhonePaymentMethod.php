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

use HiPay\Fullservice\Request\AbstractRequest;

/**
 * Phone Payment Method
 * Data related to payment with phone number (generic method)
 *
 * @package HiPay\Fullservice
 * @author Etienne Landais <elandais@hipay.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PhonePaymentMethod extends AbstractRequest
{
    /**
     * phone number
     * @var string $phone
     * @required
     */
    public $phone;
}
