<?php

namespace HiPay\Fullservice\Gateway\Model;

use HiPay\Fullservice\Enum\Transaction\Operation as TransactionOperation;

/**
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Operation extends AbstractTransaction
{
    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Gateway\Model\AbstractTransaction::__construct()
     *
     * @param TransactionOperation $operation
     */
    public function __construct(
        $mid,
        $authorizationCode,
        $transactionReference,
        $dateCreated,
        $dateUpdated,
        $dateAuthorized,
        $status,
        $state,
        $message,
        $authorizedAmount,
        $capturedAmount,
        $refundedAmount,
        $decimals,
        $currency,
        $operation
    ) {
        parent::__construct(
            $mid,
            $authorizationCode,
            $transactionReference,
            $dateCreated,
            $dateUpdated,
            $dateAuthorized,
            $status,
            $state,
            $message,
            $authorizedAmount,
            $capturedAmount,
            $refundedAmount,
            $decimals,
            $currency
        );

        $this->_operation = $operation;
    }

    /**
     * @return TransactionOperation
     */
    public function getOperation()
    {
        return $this->_operation;
    }
}
