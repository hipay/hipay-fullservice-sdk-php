<?php
/*
 * HiPay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - HiPay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace HiPay\Fullservice\Gateway\Request\PaymentMethod;

use HiPay\Fullservice\Request\AbstractRequest;

/**
 * Qiwi Wallet Payment Method
 * Data related to payment with qiwi wallet system
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class QiwiWalletPaymentMethod extends AbstractRequest
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