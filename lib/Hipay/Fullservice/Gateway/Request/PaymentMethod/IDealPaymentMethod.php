<?php
/*
 * Hipay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - Hipay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace Hipay\Fullservice\Gateway\Request\PaymentMethod;

use Hipay\Fullservice\Request\AbstractRequest;

/**
 * IDeal Payment Method
 * Data related to payment with IDeal system
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
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