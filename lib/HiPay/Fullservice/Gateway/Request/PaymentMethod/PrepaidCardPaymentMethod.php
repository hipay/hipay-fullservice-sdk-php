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
 * PrepaidCardPaymentMethod Payment Method
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PrepaidCardPaymentMethod extends AbstractPaymentMethodRequest
{
    /**
     *  The prepaid card number
     *
     * @required
     *
     * @var string
     */
    public $prepaid_card_number;

    /**
     * The prepaid card security code
     *
     * @required
     *
     * @var string
     */
    public $prepaid_card_security_code;
}
