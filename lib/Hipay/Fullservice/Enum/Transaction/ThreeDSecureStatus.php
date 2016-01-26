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
 * # 3D secure constant values
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class ThreeDSecureStatus extends AbstractEnum
{
    /*
     * ***************************************
     *      Enrollement constants values
     * ***************************************
     */
    
    /**
     * @var string ENROLLMENT_UNKNOWN Default value
     */
    const ENROLLMENT_UNKNOWN = ' ';
    
    /**
     * Card is enrolled in the 3-D Secure program and the payer is eligible for authentication processing.
     * 
     * @var string ENROLLMENT_AUTHENTICATION_AVAILABLE Card is enrolled in the 3-D Secure program
     */
    const ENROLLMENT_AUTHENTICATION_AVAILABLE = 'Y';
    
    /**
     * **Chargeback Liability Shift**: 
     * If the cardholder later disputes the purchase, 
     * the issuer may not submit a chargeback to the merchant.
     * 
     * @var string ENROLLMENT_CARD_HOLDER_NOT_ENROLLED Card is not enrolled in 3-D Secure program.
     */
    const ENROLLMENT_CARD_HOLDER_NOT_ENROLLED = 'N';
    
    /**
     * Merchants can choose to accept the card nonetheless 
     * and proceed the purchase as non-authenticated when submitting the authorization. 
     * 
     * **Chargeback Liability Shift**: 
     * The Acquirer/Merchant retains liability if the cardholder later disputes making the purchase.
     * 
     * @var string ENROLLMENT_UNABLE_TO_AUTHENTICATE The card associations were unable to verify if the cardholder is enrolled in the 3- D Secure program.
     */
    const ENROLLMENT_UNABLE_TO_AUTHENTICATE = 'U';
    
    /**
     * **Chargeback Liability Shift**: 
     * The card can be accepted for authorization processing, 
     * yet the merchant may not claim a liability shift on this transaction in case of a dispute with the cardholder.
     * 
     * @var string ENROLLMENT_OTHER_ERROR An error occurred during the enrollment verification process.
     */
    const ENROLLMENT_OTHER_ERROR = 'E';
    
    /*
     * ***************************************
     *    Authentication constants values
     * ***************************************
     */
    
    /**
     * @var string AUTHENTICATION_UNKNOWN default status
     */
    const AUTHENTICATION_UNKNOWN = ' ';
    
    /**
     * The Issuer has authenticated the cardholder by verifying the identity information or password.
     * 
     * @var string AUTHENTICATION_SUCCESSFUL Cardholder was successfully authenticated.
     */
    const AUTHENTICATION_SUCCESSFUL = 'Y';
    
    /**
     * Authentication could not be performed but a proof of authentication attempt was provided.
     * 
     * @var string AUTHENTICATION_ATTEMPTED Authentication Attempted
     */
    const AUTHENTICATION_ATTEMPTED = 'A';
    
    /**
     * The Issuer is not able to complete the authentication request due to a technical error or other problem.
     * 
     * Possible reasons include:
     * - Invalid type of card such as a Commercial Card or any anonymous Prepaid Card.
     * - Unable to establish an SSL session with cardholder browser. 
     * 
     * @var string AUTHENTICATION_COULD_NOT_PERFORMED The Issuer is not able to complete the authentication request
     */
    const AUTHENTICATION_COULD_NOT_PERFORMED = 'U';
    
    /**
     * The cardholder did not complete authentication and the card should not be accepted for payment.
     * 
     * The following are reasons to fail an authentication:
     * - Cardholder fails to correctly enter the authentication information.
     * - Cardholder cancels the authentication process.
     * 
     * An authentication failure may be a possible indication of a fraudulent user.
     * **Authorization request should not be submitted.**
     * 
     * @var string AUTHENTICATION_FAILED Authentication failed and the card should not be accepted for payment
     */
    const AUTHENTICATION_FAILED = 'N';
    
    /**
     * Note: **Authorization request should not be submitted.**
     * 
     * @var string AUTHENTICATION_OTHER An error occurred during the authentication process.
     */
    const AUTHENTICATION_OTHER = 'E';
    
    
    
}