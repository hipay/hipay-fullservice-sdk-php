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
 * Fraud Screening model
 *
 * Result of the fraud screening.
 * Include scoring and risk status
 *
 * @see \HiPay\Fullservice\Enum\Transaction\FraudScreening
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class FraudScreening extends AbstractModel
{
    /**
     * FraudScreening constructor.
     * @param int $scoring
     * @param int $result
     * @param int $review
     */
    public function __construct($scoring, $result, $review)
    {
        $this->_scoring = $scoring;
        $this->_result = $result;
        $this->_review = $review;
    }

    /**
     * @var int $_scoring Total score assigned to the transaction (main risk indicator).
     */
    protected $_scoring;

    /**
     * Value must be a member of the following list:
     * - *pending*: rules were not checked.
     * - *accepted*: transaction accepted.
     * - *blocked*: transaction rejected due to system rules.
     * - *challenged*: transaction has been marked for review.
     *
     * @var int $_result The overall result of risk assessment returned by the Payment Gateway
     * @see \HiPay\Fullservice\Enum\Transaction\FraudScreening
     */
    protected $_result;

    /**
     * An empty value means no review is required.
     * Value must be a member of the following list:
     * - *pending*: a decision to release or cancel the transaction is pending.
     * - *allowed*: the transaction has been released for processing.
     * - *denied*: the transaction has been cancelled.
     *
     * @var int $_review The decision made when the overall risk result returns challenged.
     * @see \HiPay\Fullservice\Enum\Transaction\FraudScreening
     */
    protected $_review;

    /**
     * @return int
     */
    public function getScoring()
    {
        return $this->_scoring;
    }

    /**
     * @return int
     */
    public function getResult()
    {
        return $this->_result;
    }

    /**
     * @return int
     */
    public function getReview()
    {
        return $this->_review;
    }
}
