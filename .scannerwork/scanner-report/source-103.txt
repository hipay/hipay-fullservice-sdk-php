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

namespace HiPay\Fullservice\Gateway\Request\Info;

use HiPay\Fullservice\Request\AbstractRequest;

/**
 * Order related shipping information
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
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
     * @var string $shipto_house_number House number for some payment method ( Per default the house number is in $shipto_streetaddress)
     * @comment This parameter is specific to the 3x and 4x Carte Bancaire payment products.
     */
    public $shipto_house_number;


    /**
     * @var string $shipto_streetaddress Street address to which the order is to be shipped.
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
     * @required
     * @length 2
     */
    public $shipto_country;

    /**
     * @var string $shipto_phone The customer's ship-to phone number.
     * @comment This parameter is specific to the 3x and 4x Carte Bancaire payment products.
     */
    public $shipto_phone;

    /**
     * @var string $shipto_msisdn The customer's ship-to mobile phone number.
     * @comment This parameter is specific to the 3x and 4x Carte Bancaire payment products.
     */
    public $shipto_msisdn;

    /**
     * @var string $shipto_gender
     * @comment This parameter is specific to the 3x and 4x Carte Bancaire payment products.
     * @values M|Male,F|Female,U|Unknown
     * @length 1
     *
     */
    public $shipto_gender;
}
