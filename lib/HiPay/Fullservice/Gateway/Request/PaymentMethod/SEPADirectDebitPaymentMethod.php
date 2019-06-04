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
class SEPADirectDebitPaymentMethod extends IssuerBankIDPaymentMethod
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
     * Issuer Iban
     *
     * @var string
     */
    public $iban;

    /**
     *  Issuer Firstname
     *
     * @var string
     */
    public $firstname;

    /**
     * Issuer Lastname
     *
     * @var string
     */
    public $lastname;

    /**
     * Issuer gender
     *
     * @var string
     * @length 1
     * @values M|Male,F|Female,U|Unknown see HiPay\Fullservice\Enum\AbstractEnum\Gender
     */
    public $gender;
}
