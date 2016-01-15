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

/**
 * Fraud Screening model
 * 
 * Result of the fraud screening.
 * Include scoring and risk status
 * 
 * @see \Hipay\Fullservice\Enum\Transaction\FraudScreening
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class FraudScreening extends AbstractTransaction
{
    /**
     * @var int $_scoring Total score assigned to the transaction (main risk indicator).
     */
    private $_scoring;
    

    /**
     * Value must be a member of the following list:
     * - *pending*: rules were not checked.
     * - *accepted*: transaction accepted.
     * - *blocked*: transaction rejected due to system rules.
     * - *challenged*: transaction has been marked for review.
     * 
     * @var int $_result The overall result of risk assessment returned by the Payment Gateway
     * @see \Hipay\Fullservice\Enum\Transaction\FraudScreening
     */
    private $_result;
    

    /**
     * An empty value means no review is required.
     * Value must be a member of the following list:
     * - *pending*: a decision to release or cancel the transaction is pending.
     * - *allowed*: the transaction has been released for processing.
     * - *denied*: the transaction has been cancelled.
     * 
     * @var int $_review The decision made when the overall risk result returns challenged.
     * @see \Hipay\Fullservice\Enum\Transaction\FraudScreening
     */
    private $_review;
    
}