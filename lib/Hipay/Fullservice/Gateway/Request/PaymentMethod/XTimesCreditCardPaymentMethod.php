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
 * 3X,4X,3X no fees and 4X no fees creditcard Payment Method
 * Data related to payment with split payment system
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class XTimesCreditCardPaymentMethod extends AbstractRequest
{
   /**
    * @var string
    * @required
    * @type options
    * @values M|Male,F|Female,U|Unknow
    * @length 1
    * @desc Gender of the ship-to customer. (M=male,F=female, U=unknown).
    * 
    */ 
   public $shipto_gender;
   
   /**
    * @var string
    * @required
    * @type phone
    * @desc The customer's ship-to phone number.
    */
   public $shipto_phone;
   
   /**
    * @var string
    * @required
    * @type phone
    * @desc The customer's ship-to mobile phone number
    */
   public $shipto_msisdn;
   
   /**
    * @var string
    * @type list
    * @desc Order category list
    */
   public $order_category_code;
   
   /**
    * @var string
    * @type date
    * @format yyyy-mm-dd
    * @desc Estimated delivery date.
    */
   public $delivery_date;
   
   /**
    * @var string
    * @type options
    * $value STORE24H,CARRIER,CARRIER24H,RELAYPOINT,RELAYPOINT24H
    * @desc Delivery method 
    */
   public $delivery_method;
   
   /**
    * @var string
    * @desc Carrier Description
    */
   public $carrier_description;
   
   
}