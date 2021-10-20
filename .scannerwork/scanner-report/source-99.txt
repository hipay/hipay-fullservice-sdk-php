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
 * Astropay Payment Method
 *
 * Data related to payment with Astropay
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class AstropayPaymentMethod extends AbstractRequest
{
    /**
     *  The national Identification Number
     *
     *  For Mexican identification use CPF CURP
     *  For Brazilian identification use CPN
     *
     * @var string CPN or CPF
     * @values Ex CPN : 621.413.068-76 or CPF (Curp) SSS230202HASDDD04
     * @required
     */
    public $national_identification_number;
}
