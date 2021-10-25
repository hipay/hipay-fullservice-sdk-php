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
 * Order related billing information
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class CustomerBillingInfoRequest extends AbstractRequest
{
    /**
     * @var string $email The customer's e-mail address.
     * @required
     */
    public $email;

    /**
     * @var string $phone The customer's phone number.
     */
    public $phone;

    /**
     * @var string $birthdate Birth date of the customer (YYYYMMDD). For fraud detection reasons.
     * @format yyyyMMdd
     * @length 8
     */
    public $birthdate;

    /**
     * @var string $gender Gender of the customer (M=male,F=female, U=unknown).
     * @values M|Male,F|Female,U|Unknown
     * @length 1
     */
    public $gender;

    /**
     * @var string $firstname The customer's first name.
     * @required
     */
    public $firstname;

    /**
     * @var string $lastname The customer's last name.
     * @required
     */
    public $lastname;

    /**
     * @var string $recipientinfo Additional information about the customer. Quality or function, company name, department, etc...
     */
    public $recipientinfo;

    /**
     * @var string $streetaddress Street address of the customer
     * @desc
     */
    public $streetaddress;

    /**
     * @var string $streetaddress2 Additional address information of the customer (building, floor, flat, etc...).
     */
    public $streetaddress2;


    /**
     * @var string $city The customer's city.
     */
    public $city;

    /**
     * Send this information only if the address country of the customer is US (USA) or CA (Canada).
     *
     * @var string $state The USA state or the Canada state of the customer making the purchase.
     */
    public $state;

    /**
     * @var string $zipcode The zip or postal code of the customer.
     */
    public $zipcode;

    /**
     * @var string $country The country code of the customer. This two-letter country code complies with ISO 3166-1 (alpha 2).
     * @required
     * @length 2
     */
    public $country;
}
