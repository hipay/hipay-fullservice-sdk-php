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
 * # Fraud screening constant values
 *
 * Constants result: The overall result of risk assessment returned by the Payment Gateway.
 * Constants review: The decision made when the overall risk result returns challenged.
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
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
    public const RESULT_UNKNOWN = 'unknown';

    /**
     * @var string RESULT_PENDING Rules were not checked.
     */
    public const RESULT_PENDING = 'pending';

    /**
     * @var string RESULT_ACCEPTED Transaction accepted.
     */
    public const RESULT_ACCEPTED = 'accepted';

    /**
     * @var string RESULT_BLOCKED transaction rejected due to system rules.
     */
    public const RESULT_BLOCKED = 'blocked';

    /**
     * @var string RESULT_CHALLENGED transaction has been marked for review.
     */
    public const RESULT_CHALLENGED = 'challenged';


    /*
     * ***************************************
     *      REVIEW_ constants values
     * ***************************************
     */

    /**
     * @var string REVIEW_NONE No value
     */
    public const REVIEW_NONE = 'none';

    /**
     * @var string REVIEW_PENDING A decision to release or cancel the transaction is pending.
     */
    public const REVIEW_PENDING = 'pending';

    /**
     * @var string REVIEW_ALLOWED The transaction has been released for processing.
     */
    public const REVIEW_ALLOWED = 'allowed';

    /**
     * @var string REVIEW_DENIED The transaction has been cancelled.
     */
    public const REVIEW_DENIED = 'denied';
}
