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
namespace Hipay\Fullservice\Gateway\Model;

use Hipay\Fullservice\Model\AbstractModel;
/**
 * Payment method model
 * 
 * Informations about payment method (Card expiry, issuer, country etc ...)
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PaymentMethod extends AbstractModel
{
    /**
     * @var string $_token
     */
    private $_token;
    
    /**
     * @var string $_brand
     */
    private $_brand;
    
    /**
     * @var string $_pan
     */
    private $_pan;
    
    /**
     * @var string $_cardHolder
     */
    private $_cardHolder;
    
    /**
     * @var string $_cardExpiryMonth
     */
    private $_cardExpiryMonth;
    
    /**
     * @var string $_cardExpiryYear
     */
    private $_cardExpiryYear;
    
    /**
     * @var string $_issuer
     */
    private $_issuer;
    
    /**
     * @var string $_country
     */
    private $_country;
}