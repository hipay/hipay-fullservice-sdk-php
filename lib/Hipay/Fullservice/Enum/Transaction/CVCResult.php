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
 * # The Card Verification Code (CVC) constant values
 * 
 * The CVC is available on the following credit and debit cards: 
 * - Visa (Card Verification Value CVV2) 
 * - MasterCard (Card Validation Code CVC2)
 * - Maestro, Diners Club, Discover (Card Identification Number CID)
 * - American Express (Card Identification Number CID).
 * 
 * ## Procedure
 * When the acquirer enables you to perform a CVC check, a result code (returned along with the response to authorization request) informs you on the CVC check status.
 * You evaluate the CVC result code that you received with the transaction authorization, 
 * and you take appropriate action based on all transaction characteristics.
 * 
 * ## Warning
 * **Only a few acquirers return specific CVC check results.**
 * **For most acquirers, the CVC is assumed to be correct if the transaction is successfully authorized.**
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class CVCResult extends AbstractEnum
{
    /**
     * @var string NOT_APPLICABLE NoCVC check was not possible.
     */
    const NOT_APPLICABLE = ' ';
    
    /**
     * @var string MATCH  CVC match.
     */
    const MATCH = 'M';
    
    /**
     * @var string NO_MATCH CVC does not match.
     */
    const NO_MATCH = 'N';
    
    /**
     * @var string NOT_PROCESSED CVC request not processed.
     */
    const NOT_PROCESSED = 'P';
    
    /**
     * @var string MISSING CVC should be on the card, but the cardholder has reported that it isn't.
     */
    const MISSING = 'S';
    
    /**
     * @var string NOT_SUPPORTED Card issuer does not support CVC.
     */
    const NOT_SUPPORTED = 'U';
}