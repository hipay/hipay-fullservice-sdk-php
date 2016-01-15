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
 * Order Model
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Order extends AbstractModel
{
    /**
     * 
     * @var string $_id Order ID
     */
    private $_id;
    
    /**
     * 
     * @var string $_dateCreated Created date
     */
    private $_dateCreated;
    
    /**
     * 
     * @var int $_attempts Indicates how many payment attempts have been made for this order
     */
    private $_attempts;
    
    /**
     * 
     * @var float $_amount The total order amount
     */
    private $_amount;
    
    /**
     * 
     * @var float $_shipping The order shipping fee.
     */
    private $_shipping;
    
    /**
     * 
     * @var float $_tax The order tax fee.
     */
    private $_tax;
    
    /**
     * 
     * @var int $_decimals Decimal precision of the order amount
     */
    private $_decimals;
    
    /**
     * 
     * @var string $_currency This three-character currency code complies with ISO 4217.
     */
    private $_currency;
    
    /**
     * 
     * @var string $_customerId Unique identifier of the customer as provided by Merchant
     */
    private $_customerId;
    
    /**
     * 
     * @var string $_language Language code of the customer.
     */
    private $_language;
    
    /**
     * 
     * @var string $_gender Gender code
     * @see \Hipay\Fullservice\Enum\Customer\Gender
     */
    private $_gender;
    
    /**
     * 
     * @var PersonalInformation $_shippingAddress Customer Shipping address informations
     */
    private $_shippingAddress;
    
    
}