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

namespace HiPay\Fullservice\Enum\Transaction;

use HiPay\Fullservice\Enum\AbstractEnum;

/**
 * Enumeration for Transaction statues
 *
 * List of possible statues returned by Fullservice API
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class TransactionStatus extends AbstractEnum
{
    /**
     * @var int UNKNOWN Unknown status
     */
    public const UNKNOWN = 0;

    /**
     *
     * @var int CREATED The payment attempt was created.
     */
    public const CREATED = 101;

    /**
     * Card is enrolled in the 3-D Secure program
     * The merchant has to forward the cardholder to the authentication pages of the card issuer.
     *
     * @var int CARD_HOLDER_ENROLLED Card is enrolled in the 3-D Secure program
     */
    public const CARD_HOLDER_ENROLLED = 103;

    /**
     *
     * @var int CARD_HOLDER_NOT_ENROLLED Card is not enrolled in 3-D Secure program.
     */
    public const CARD_HOLDER_NOT_ENROLLED = 104;

    /**
     *
     * @var int UNABLE_TO_AUTHENTICATE Unable to complete the authentication request.
     */
    public const UNABLE_TO_AUTHENTICATE = 105;

    /**
     *
     * @var int CARD_HOLDER_AUTHENTICATED Cardholder was successfully authenticated in the 3-D Secure program.
     */
    public const CARD_HOLDER_AUTHENTICATED = 106;

    /**
     * The Merchant has attempted to authenticate the cardholder in the 3-D Secure program
     * and either the Issuer or cardholder is not enrolled
     *
     * @var int AUTHENTICATION_ATTEMPTED the Issuer or cardholder is not enrolled
     */
    public const AUTHENTICATION_ATTEMPTED = 107;

    /**
     * @var int COULD_NOT_AUTHENTICATE The Issuer is not able to complete the authentication request
     */
    public const COULD_NOT_AUTHENTICATE = 108;

    /**
     * AUTHORIZATION_ request should not be submitted
     * An authentication failure may be a possible indication of a fraudulent user.
     * @var int AUTHENTICATION_FAILED Cardholder authentication failed.
     */
    public const AUTHENTICATION_FAILED = 109;

    /**
     * @var int BLOCKED The transaction has been rejected for reasons of suspected fraud.
     */
    public const BLOCKED = 110;

    /**
     * After reviewing the fraud screening result, the merchant decided to decline the payment.
     * @var int DENIED Merchant denied the payment attempt.
     */
    public const DENIED = 111;

    /**
     * @var int AUTHORIZED_AND_PENDING The payment was challenged by the fraud rule set and is pending
     */
    public const AUTHORIZED_AND_PENDING = 112;

    /**
     * The refusal reasons can be : an exceeded credit limit,
     * an incorrect expiry date, insufficient balance,
     * or many other depending on the selected payment method
     *
     * @var int REFUSED The financial institution refused to authorize the payment.
     */
    public const REFUSED = 113;

    /**
     * This happens when no CAPTURE request is submitted for an authorized payment typically within 7 days after authorization.
     *
     * Note : Depending on the customer's issuing bank,
     * the authorization validity period may last from 1-5 days
     * for a debit card and up to 30 days for a credit card.
     *
     * @var int EXPIRED The validity period of the payment authorization has expired.
     */
    public const EXPIRED = 114;

    /**
     * You can only cancel payments with status "Authorized" and that have not yet reached the status "CAPTURED".
     * In the case of a credit card payment, cancelling the transaction consists in voiding the authorization.
     * @var int CANCELLED Merchant cancelled the payment attempt.
     */
    public const CANCELLED = 115;

    /**
     * In the case of a credit card payment,
     * funds are "held" and deducted from the customer's credit limit (or bank balance, in the case of a debit card) but are not yet transferred to the merchant.
     * In the case of bank transfers and some other payment methods,
     * the payment immediately obtains the status "CAPTURED" after being set to "Authorized".
     * @var int AUTHORIZED The financial institution has approved the payment
     */
    public const AUTHORIZED = 116;

    /**
     * @var int CAPTURE_REQUESTED A capture request has been sent to the financial institution.
     */
    public const CAPTURE_REQUESTED = 117;

    /**
     * The funds will be transferred to HiPay TPP before being settled to your bank account.
     * Authorized payments can be captured as long as the authorization has not expired.
     * Some payment methods, like bank transfers or direct debits,
     * reach the "Captured" status straight away after being authorized.
     *
     * @var int CAPTURED The financial institution has processed the payment.
     */
    public const CAPTURED = 118;

    /**
     * If only part of the order can be shipped, it is allowed to capture an amount equal to the shipped part of the order.
     * This is called a partial capture.
     *
     * Note : Remember! As all credit card companies dictate,
     * it is not allowed for a merchant to capture a payment before shipping has completed.
     * Merchant should start shipping the order once the status "Authorized" is reached!
     *
     *
     * @var int PARTIALLY_CAPTURED The financial institution has processed part of the payment
     */
    public const PARTIALLY_CAPTURED = 119;

    /**
     * A payment with the status "Collected" is ready to be paid out.
     * HiPay TPP either will transfer the amount to your bank account within the next few days (depends on your settlement frequency),
     * or the amount is already transferred to your bank account.
     *
     * @var int COLLECTED The funds have been made available for remittance to the merchant
     */
    public const COLLECTED = 120;

    /**
     * @var int PARTIALLY_COLLECTED A part of the transaction has been collected.
     */
    public const PARTIALLY_COLLECTED = 121;

    /**
     * Funds have been debited or credited from your merchant account at HiPay.
     *
     * @var int SETTLED The financial operations linked to this transaction are closed
     */
    public const SETTLED = 122;

    /**
     * @var int PARTIALLY_SETTLED A part of the financial operations linked to this transaction is closed.
     */
    public const PARTIALLY_SETTLED = 123;

    /**
     * @var int REFUND_REQUESTED A refund request has been sent to the financial institution
     */
    public const REFUND_REQUESTED = 124;

    /**
     * A payment obtains the status "Refunded"
     * when the financial institution processed the refund and the amount has been transferred to the shopper's account.
     * The amount will be deducted from the next total amount, to be paid out to the merchant.
     * @var int REFUNDED The payment was refunded.
     */
    public const REFUNDED = 125;

    /**
     * @var int PARTIALLY_REFUNDED A part of the transaction has been refunded.
     */
    public const PARTIALLY_REFUNDED = 126;

    /**
     * For instance, the cardholder contacts his credit card company and denies having made the transaction.
     * The credit card company then revokes the already captured payment.
     * Please note the legal difference between the shopper (who ordered the goods) and the cardholder (who owns the credit card and ends up paying for the order).
     * In general, charge backs only occurs incidentally.
     * When they do, a contact with the shopper can often solve the situation.
     * Occasionally it is an indication of credit card fraud.
     *
     * @var int CHARGED_BACK The cardholder reversed a capture processed by their bank or credit card company.
     */
    public const CHARGED_BACK = 129;

    /**
     * @var int DEBITED The acquirer has informed us that a debit linked to the transaction is going to be applied.
     */
    public const DEBITED = 131;

    /**
     * @var int PARTIALLY_DEBITED The acquirer has informed us that a partial debit linked to the transaction is going to be applied.
     */
    public const PARTIALLY_DEBITED = 132;

    /**
     * The payment method used requires authentication,
     * authentication request was send and system is waiting for a customers’ action.
     *
     * @var int AUTHENTICATION_REQUESTED  Authentication in progress
     */
    public const AUTHENTICATION_REQUESTED = 140;

    /**
     * @var int AUTHENTICATED The payment method used requires authentication and it was successful.
     */
    public const AUTHENTICATED = 141;

    /**
     * The request was sent and the system is waiting for the financial institution approval.
     *
     * @var int AUTHORIZATION_REQUESTED The payment method used requires an authorization request.
     */
    public const AUTHORIZATION_REQUESTED = 142;

    /**
     * @var int ACQUIRER_FOUND The acquirer payment route has been found.
     */
    public const ACQUIRER_FOUND = 150;

    /**
     * @var int ACQUIRER_NOT_FOUND The acquirer payment route has not been found.
     */
    public const ACQUIRER_NOT_FOUND = 151;

    /**
     * @var int CARD_HOLDER_ENROLLMENT_UNKNOWN Unable to verify if the card is enrolled in the 3-D Secure program.
     */
    public const CARD_HOLDER_ENROLLMENT_UNKNOWN = 160;

    /**
     * @var int RISK_ACCEPTED The payment has been accepted by the fraud rule set.
     */
    public const RISK_ACCEPTED = 161;

    /**
     * @var int AUTHORIZATION_REFUSED The authorization was refused by the financial institution
     */
    public const AUTHORIZATION_REFUSED = 163;

    /**
     * @var int REFUND_REFUSED The refund operation was refused by the financial institution
     */
    public const REFUND_REFUSED = 165;

    /**
     * @var int CAPTURE_REFUSED The capture was refused by the financial institution.
     */
    public const CAPTURE_REFUSED = 173;

    /**
     * @var int AUTHORIZATION_CANCELLATION_REQUESTED The payment is authorized but merchant requested it's cancellation.
     */
    public const AUTHORIZATION_CANCELLATION_REQUESTED = 175;

    /**
     * @var int PENDING_PAYMENT The transaction request was submitted to the acquirer but response is not yet available
     */
    public const PENDING_PAYMENT = 200;
}
