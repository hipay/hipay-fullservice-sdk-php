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
namespace HiPay\Fullservice\Gateway\Request\Info;

use HiPay\Fullservice\Request\AbstractRequest;

/**
 * Order related shipping informations
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class CustomerShippingInfoRequest extends AbstractRequest
{
      
    /**
     * @var string $shipto_firstname The first name of the order recipient.
     * @required
     */
    public $shipto_firstname;
    
    /**
     * @var string $shipto_lastname The last name of the order recipient.
     * @required
     */
    public $shipto_lastname;
    
    /**
     * @var string $shipto_recipientinfo Additional information about the order recipient (Quality or function, company name, department, etc...).
     */
    public $shipto_recipientinfo;
    
    /**
     * @var string $shipto_streetaddress  Street address to which the order is to be shipped.
     */
    public $shipto_streetaddress;
    
    /**
     * @var string $shipto_streetaddress2 Additional address information to which the order is to be shipped (building, floor, flat, etc...).
     */
    public $shipto_streetaddress2;
    
    
    /**
     * @var string $shipto_city The city to which the order is to be shipped.
     */
    public $shipto_city;
    
    /**
     * Send this information only if the address country of the customer is US (USA) or CA (Canada).
     * 
     * @var string $shipto_state The USA state or the Canada state to which the order is being shipped.
     */
    public $shipto_state;
    
    /**
     * @var string $shipto_zipcode The zip or postal code to which the order is being shipped.
     */
    public $shipto_zipcode;
    
    /**
     * @var string $shipto_country The country code to which the order is being shipped. This two-letter country code complies with ISO 3166-1 (alpha 2).
     * @type country
     * @required
     * @length 2
     */
    public $shipto_country;
    
}