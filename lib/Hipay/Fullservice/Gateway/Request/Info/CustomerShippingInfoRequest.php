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
namespace Hipay\Fullservice\Gateway\Request\Info;

use Hipay\Fullservice\Request\AbstractRequest;

/**
 * Order related shipping informations
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class CustomerShippingInfoRequest extends AbstractRequest
{
      
    /**
     * @var string
     * @required
     * @desc The first name of the order recipient.
     */
    public $shipto_firstname;
    
    /**
     * @var string
     * @required
     * @desc The last name of the order recipient.
     */
    public $shipto_lastname;
    
    /**
     * @var string
     * @desc Additional information about the order recipient
     * @example Quality or function, company name, department, etc...
     */
    public $shipto_recipientinfo;
    
    /**
     * @var string
     * @desc Street address to which the order is to be shipped.
     */
    public $shipto_streetaddress;
    
    /**
     * @var string
     * @desc Additional address information to which the order is to be shipped
     * @example building, floor, flat, etc...
     */
    public $shipto_streetaddress2;
    
    
    /**
     * @var string
     * @desc The city to which the order is to be shipped.
     */
    public $shipto_city;
    
    /**
     * @var string
     * @desc The USA state or the Canada state to which the order is being shipped.
     * Send this information only if the address country of the customer is US (USA) or CA (Canada).
     */
    public $shipto_state;
    
    /**
     * @var string
     * @desc The zip or postal code to which the order is being shipped.
     */
    public $shipto_zipcode;
    
    /**
     * @var string
     * @type country
     * @required
     * @length 2
     * @desc The country code to which the order is being shipped.
     * This two-letter country code complies with ISO 3166-1 (alpha 2).
     */
    public $shipto_country;
    
}