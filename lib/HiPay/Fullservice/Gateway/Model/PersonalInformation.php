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

namespace HiPay\Fullservice\Gateway\Model;

use HiPay\Fullservice\Model\AbstractModel;

/**
 * Customer's Personal Information Model
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PersonalInformation extends AbstractModel
{
    /**
     * PersonalInformation constructor.
     * @param string $firstname
     * @param string $lastname
     * @param string $streetAddress
     * @param string $locality
     * @param string $postalCode
     * @param string $country
     * @param string $msisdn
     * @param string $phone
     * @param string $phoneOperator
     * @param string $email
     */
    public function __construct(
        $firstname,
        $lastname,
        $streetAddress,
        $locality,
        $postalCode,
        $country,
        $msisdn,
        $phone,
        $phoneOperator,
        $email
    ) {
        $this->_firstname = $firstname;
        $this->_lastname = $lastname;
        $this->_streetAddress = $streetAddress;
        $this->_locality = $locality;
        $this->_postalCode = $postalCode;
        $this->_country = $country;
        $this->_msisdn = $msisdn;
        $this->_phone = $phone;
        $this->_phoneOperator = $phoneOperator;
        $this->_email = $email;
    }

    /**
     * @var string $_firstname Customer first name
     */
    protected $_firstname;

    /**
     * @var string $_lastname Customer last name
     */
    protected $_lastname;

    /**
     * @var string $_streetAddress Street Address
     */
    protected $_streetAddress;

    /**
     * @var string $_locality $locality
     */
    protected $_locality;

    /**
     * @var string $_postalCode zipcode
     */
    protected $_postalCode;

    /**
     * @var string $_country country
     */
    protected $_country;

    /**
     * @var string $_msisdn Msisdn
     */
    protected $_msisdn;

    /**
     * @var string $_phone Phone number
     */
    protected $_phone;

    /**
     * @var string $_phoneOperator Telecoms operator
     */
    protected $_phoneOperator;

    /**
     * @var string $_email Customer email
     */
    protected $_email;

    /**
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->_firstname;
    }

    /**
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->_lastname;
    }

    /**
     *
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->_streetAddress;
    }

    /**
     *
     * @return string
     */
    public function getLocality()
    {
        return $this->_locality;
    }

    /**
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->_postalCode;
    }

    /**
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->_country;
    }

    /**
     *
     * @return string
     */
    public function getMsisdn()
    {
        return $this->_msisdn;
    }

    /**
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     *
     * @return string
     */
    public function getPhoneOperator()
    {
        return $this->_phoneOperator;
    }

    /**
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }
}
