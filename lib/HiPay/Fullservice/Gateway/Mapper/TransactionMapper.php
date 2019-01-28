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

namespace HiPay\Fullservice\Gateway\Mapper;

use HiPay\Fullservice\Gateway\Model\Transaction;
use HiPay\Fullservice\Mapper\AbstractMapper;

/**
 * Mapper for Transaction Model Object
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class TransactionMapper extends AbstractMapper
{

    /**
     * @var Transaction $_modelObject Model object to populate
     */
    protected $_modelObject;

    protected $_modelClassName;

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Mapper\AbstractMapper::mapResponseToModel()
     */
    protected function mapResponseToModel()
    {
        $source = $this->_getSource();
        $mid = $source['mid'] ?: null;
        $authorizationCode = $source['authorizationCode'] ?: null;
        $transactionReference = $source['transactionReference'] ?: null;
        $dateCreated = $source['dateCreated'] ?: null;
        $dateUpdated = $source['dateUpdated'] ?: null;
        $dateAuthorized = $source['dateAuthorized'] ?: null;
        $status = ((int)$source['status']) ?: null;
        $state = $source['state'] ?: null;
        $message = $source['message'] ?: null;
        $authorizedAmount = $source['authorizedAmount'] ?: null;
        $capturedAmount = $source['capturedAmount'] ?: null;
        $refundedAmount = $source['refundedAmount'] ?: null;
        $decimals = $source['decimals'] ?: null;
        $currency = $source['currency'] ?: null;
        $reason = isset($source['reason']) ? $source['reason'] : null;
        $forwardUrl = isset($source['forwardUrl']) ? $source['forwardUrl'] : null;
        $attemptId = $source['attemptId'] ?: null;
        $referenceToPay = isset($source['referenceToPay']) ? $source['referenceToPay'] : null;
        $ipAddress = $source['ipAddress'] ?: null;
        $ipCountry = $source['ipCountry'] ?: null;
        $deviceId = isset($source['deviceId']) ? $source['deviceId'] : null;
        $avsResult = isset($source['avsResult']) ? $source['avsResult'] : null;
        $cvcResult = isset($source['cvcResult']) ? $source['cvcResult'] : null;
        $eci = $source['eci'] ?: null;
        $paymentProduct = $source['paymentProduct'] ?: null;

        $paymentMethod = null;
        if (isset($source['paymentMethod']) && is_array($source['paymentMethod'])) {
            $pmm = new PaymentMethodMapper($source['paymentMethod']);
            $paymentMethod = $pmm->getModelObjectMapped();
        }

        $threeDSecure = null;
        if (isset($source['threeDSecure']) && is_array($source['threeDSecure'])) {
            $tdsm = new ThreeDSecureMapper($source['threeDSecure']);
            $threeDSecure = $tdsm->getModelObjectMapped();
        }

        $fraudScreenig = null;
        if (isset($source['fraudScreening']) && is_array($source['fraudScreening'])) {
            $fsm = new FraudScreeningMapper($source['fraudScreening']);
            $fraudScreenig = $fsm->getModelObjectMapped();
        }

        $order = null;
        if (isset($source['order'])) {
            $om = new OrderMapper($source['order']);
            $order = $om->getModelObjectMapped();
        }

        $operation = null;
        if (isset($source['operation'])) {
            $orm = new OperationResponseMapper($source['operation']);
            $operation = $orm->getModelObjectMapped();
        }

        $debitAgreement = isset($source['debitAgreement']) ? $source['debitAgreement'] : null;

        $basket = isset($source['basket']) ? $source['basket'] : null;

        $customData = isset($source['customData']) ? $source['customData'] : null;

        $this->_modelObject = new Transaction(
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
            $reason,
            $forwardUrl,
            $attemptId,
            $referenceToPay,
            $ipAddress,
            $ipCountry,
            $deviceId,
            $avsResult,
            $cvcResult,
            $eci,
            $paymentProduct,
            $paymentMethod,
            $threeDSecure,
            $fraudScreenig,
            $order,
            $debitAgreement,
            $basket,
            $operation,
            $customData
        );


    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Mapper\AbstractMapper::validate()
     */
    protected function validate()
    {
        return $this;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Mapper\AbstractMapper::getModelClassName()
     */
    protected function getModelClassName()
    {
        return '\HiPay\Fullservice\Gateway\Model\Transaction';
    }

}
