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
 * # Fraud screening constant values
 * 
 * Constants result: The overall result of risk assessment returned by the Payment Gateway.
 * Constants review: The decision made when the overall risk result returns challenged.
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class FraudScreening extends AbstractEnum
{
    /*
     * ***************************************
     *      RESULT_ constants values
     * ***************************************
     */
    
    /**
     * @var string RESULT_UNKNOWN Unknown result
     */
    const RESULT_UNKNOWN = 'unknown';

    /**
     * @var string RESULT_PENDING Rules were not checked.
     */
    const RESULT_PENDING = 'pending';
    
    /**
     * @var string RESULT_ACCEPTED Transaction accepted.
     */
    const RESULT_ACCEPTED = 'accepted';

    /**
     * @var string RESULT_BLOCKED transaction rejected due to system rules.
     */
    const RESULT_BLOCKED = 'blocked';

    /**
     * @var string RESULT_CHALLENGED transaction has been marked for review.
     */
    const RESULT_CHALLENGED = 'challenged';
    
    
    /*
     * ***************************************
     *      REVIEW_ constants values
     * ***************************************
     */

    /**
     * @var string REVIEW_NONE No value
     */
    const REVIEW_NONE = 'none';
    
    /**
     * @var string REVIEW_PENDING A decision to release or cancel the transaction is pending.
     */
    const REVIEW_PENDING = 'pending';

    /**
     * @var string REVIEW_ALLOWED The transaction has been released for processing.
     */
    const REVIEW_ALLOWED = 'allowed';

    /**
     * @var string REVIEW_DENIED The transaction has been cancelled.
     */
    const REVIEW_DENIED = 'denied';
    
   
}