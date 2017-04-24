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
 * SEPA Direct Debit Payment Method
 *
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class SEPADirectDebitPaymentMethod extends AbstractRequest
{
   /**
    * If recurring payment the agreement ID returned on first transaction.
    * 
    * @var int $debit_agreement_id Agreement ID returned on first transaction 
    */ 
   public $debit_agreement_id;
   
   /**
    * Indicates if the debit agreement will be created for a single-use or a multi-use.
    * 
    * Possible values:
    * - 0 = Single use
    * - 1 = Multi use
    * 
    * @var int $recurring_payment Represent debit agreement (single-use = 0 or a multi-use = 1)
    * @length 1
    * @type options
    * @values 0|Generate a single-use agreement id,1|Generate a multi-use agreement id
    */
   public $recurring_payment;

    /**
     * Issuer Bank Name
     *
     * @var string
     */
   public $bank_name;

    /**
     * @var string
     */
   public $iban;

    /**
     * @var string
     */
   public $issuer_bank_id;

    /**
     * @var string
     */
    public $firstname;

    /**
     * @var string
     */
    public $lastname;

    /**
     * @var string
     */
    public $gender;
}