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
namespace Hipay\Fullservice\Enum\Transaction;

use Hipay\Fullservice\Enum\AbstractEnum;

/**
 * The Address Verification Service (AVS) constant values
 * 
 * The Address Verification Service (AVS) is a system that allows ecommerce merchants to check a cardholder's billing address. 
 * AVS provides merchants with a key indicator that helps verify whether or not a transaction is valid.
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class AVSResult extends AbstractEnum
{
    /**
     * @var string NOT_APPLICABLE No AVS response was obtained (Default value empty).
     */
    const NOT_APPLICABLE = ' ';
    
    /**
     * @var string EXACT_MATCH  Street addresses and postal codes match.
     */
    const EXACT_MATCH = 'Y';
    
    /**
     * Either the request does not include the postal codes or postal codes are not verified 
     * due to incompatible formats.
     * 
     * @var string The street addresses match but the postal codes do not match.
     */
    const ADDRESS_MATCH = 'A';
    
    /**
     * Either the request does not include the street addresses or street addresses are not verified 
     * due to incompatible formats
     * 
     * @var string POSTCODE_MATCH The postal codes match but the street addresses do not match.
     */
    const POSTCODE_MATCH = 'P';
    
    /**
     * @var string NO_MATCH Neither the street addresses nor the postal codes match.
     */
    const NO_MATCH = 'N';
    
    /**
     * @var string NOT_COMPATIBLE Street addresses and postal codes not verified due to incompatible formats.
     */
    const NOT_COMPATIBLE = 'C';
    
    /**
     * @var string NOT_ALLOWED AVS data is invalid or AVS is not allowed for this card type
     */
    const NOT_ALLOWED = 'E';
    
    /**
     * @var string UNAVAILABLE Address information is unavailable for that account number, or the card issuer does not support AVS.
     */
    const UNAVAILABLE = 'U';
    
    /**
     * @var string RETRY Issuer authorization system is unavailable, try again later.
     */
    const RETRY = 'R';
    
    /**
     * @var string NOT_SUPPORTED Card issuer does not support AVS.
     */
    const NOT_SUPPORTED = 'S';
}