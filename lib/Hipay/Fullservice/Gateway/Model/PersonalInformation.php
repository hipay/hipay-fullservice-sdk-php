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
 * Customer's Personnal Informations Model
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class PersonalInformation extends AbstractModel
{
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
    
    
}