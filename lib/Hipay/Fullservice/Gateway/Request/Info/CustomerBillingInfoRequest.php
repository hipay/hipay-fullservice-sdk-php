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
 * Order related billing informations
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class CustomerBillingInfoRequest extends AbstractRequest
{
    /**
     * @var string
     * @type email
     * @required
     * @desc The customer's e-mail address.
     */
    public $email;
    
    /**
     * @var string
     * @type phone
     * @desc The customer's phone number.
     */
    public $phone;
    
    /**
     * @var string
     * @type date
     * @format yyyyMMdd
     * @length 8
     * @desc Birth date of the customer (YYYYMMDD).
     * For fraud detection reasons.
     */
    public $birthdate;
    
    /**
     * @var string
     * @type options
     * @values M|Male,F|Female,U|Unknow
     * @length 1
     * @desc Gender of the customer (M=male,F=female, U=unknown).
     */
    public $gender;
    
    /**
     * @var string
     * @required
     * @desc The customer's first name.
     */
    public $firstname;
    
    /**
     * @var string
     * @required
     * @desc The customer's last name.
     */
    public $lastname;
    
    /**
     * @var string
     * @desc Additional information about the customer
     * @example Quality or function, company name, department, etc...
     */
    public $recipientinfo;
    
    /**
     * @var string
     * @desc Street address of the customer
     */
    public $streetaddress;
    
    /**
     * @var string
     * @desc Additional address information of the customer
     * @example building, floor, flat, etc...
     */
    public $streetaddress2;
    
    
    /**
     * @var string
     * @desc The customer's city.
     */
    public $city;
    
    /**
     * @var string
     * @desc The USA state or the Canada state of the customer making the purchase.
     * Send this information only if the address country of the customer is US (USA) or CA (Canada).
     */
    public $state;
    
    /**
     * @var string
     * @desc The zip or postal code of the customer.
     */
    public $zipcode;
    
    /**
     * @var string
     * @type country
     * @required
     * @length 2
     * @desc The country code of the customer
     * This two-letter country code complies with ISO 3166-1 (alpha 2).
     */
    public $country;
    
}