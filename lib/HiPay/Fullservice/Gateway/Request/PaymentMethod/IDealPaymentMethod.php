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
 * IDeal Payment Method
 * Data related to payment with IDeal system
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class IDealPaymentMethod extends AbstractRequest
{
   /**
    * Issuers’ bank Id list
    * 
    * |issuer_bank_id|Bank description| 
    *  --------------|----------------
    * | ABNANL2A     | ABN AMRO       |
    * | INGBNL2A     | ING            |
    * | RABONL2U     | Rabobank       |
    * | SNSBNL2A     | SNS Bank       |
    * | ASNBNL21     | ASN Bank       |
    * | FRBKNL2L     | Friesland Bank |
    * | KNABNL2H     | Knab           |
    * | RBRBNL21     | SNS RegioBank  |
    * | TRIONL2U     | Triodos bank   |
    * | FVLBNL22     | Van Lanschot   |
    *  -------------------------------
    * 
    * @var string $issuer_bank_id Issuers’ bank Id
    * @required
    */ 
   public $issuer_bank_id;
}