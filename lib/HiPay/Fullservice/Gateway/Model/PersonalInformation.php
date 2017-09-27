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
 * Customer's Personnal Informations Model
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class PersonalInformation extends AbstractModel
{
	
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
			){
		
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
    private $_firstname;
    
    /**
     * @var string $_lastname Customer last name
     */
    private $_lastname;
    
    /**
     * @var string $_streetAddress Street Address
     */
    private $_streetAddress;
    
    /**
     * @var string $_locality $locality
     */
    private $_locality;
    
    /**
     * @var string $_postalCode zipcode
     */
    private $_postalCode;
    
    /**
     * @var string $_country country
     */
    private $_country;
    
    /**
     * @var string $_msisdn Msisdn
     */
    private $_msisdn;
    
    /**
     * @var string $_phone Phone number
     */
    private $_phone;
    
    /**
     * @var string $_phoneOperator Telecom operator
     */
    private $_phoneOperator;
    
    /**
     * @var string $_email Customer email
     */
    private $_email;
	
	/**
	 *
	 * @return the string
	 */
	public function getFirstname() {
		return $this->_firstname;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getLastname() {
		return $this->_lastname;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getStreetAddress() {
		return $this->_streetAddress;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getLocality() {
		return $this->_locality;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getPostalCode() {
		return $this->_postalCode;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCountry() {
		return $this->_country;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getMsisdn() {
		return $this->_msisdn;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getPhone() {
		return $this->_phone;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getPhoneOperator() {
		return $this->_phoneOperator;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getEmail() {
		return $this->_email;
	}
	
    
    
}