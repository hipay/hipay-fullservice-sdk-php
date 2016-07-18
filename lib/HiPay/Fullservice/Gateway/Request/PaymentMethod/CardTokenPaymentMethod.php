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
 * Card Token Payment Method
 * Data related to payment with token system
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class CardTokenPaymentMethod extends AbstractRequest
{
    /**
     * For further details about the card token and its integration,  refer to the HiPay TPP - Tokenization
     * 
     * @var string $cardtoken Card token. 
     * @length 40
     * @required
     */
    public $cardtoken;
    
    /**
     * Electronic Commerce Indicator (ECI)
     * 
     * The ECI indicates the security level at which the payment information is processed etween the cardholder and merchant.  
     * Possible values:
     * - 1 = MO/TO (Card Not Present)
     * - 2 = MO/TO Is Recurring
     * - 7 = E-commerce with SSL/TLS Encryption 
     * - 9 = Recurring E-commerce
     * 
     * A default ECI value can be set in the preferences page. 
     * An ECI value sent along in the transaction will overwrite the default ECI value.
     * 
     * @var int $eci Electronic Commerce Indicator (ECI)
     * @length 1
     * @type options
     * @values 1|MO/TO (Card Not Present),2|MO/TO Is Recurring,7|,E-commerce with SSL/TLS Encryption,9|Recurring E-commerce
     */
    public $eci;
    
    
    /**
     * Indicates if the 3-D Secure authentication should be performed.
     * 
     * Possible values:  
     * - 0 = Bypass 3-D Secure authentication
     * - 1 = 3-D Secure authentication if available
     * - 2 = 3-D Secure authentication mandatory
     * 
     * @var int $authentication_indicator  Indicator value (0,1,2)
     * @length 1
     * @type options
     * @values 0|Bypass 3-D Secure authentication,1|3-D Secure authentication if available,2|3-D Secure authentication mandatory
     */
    public $authentication_indicator;
}