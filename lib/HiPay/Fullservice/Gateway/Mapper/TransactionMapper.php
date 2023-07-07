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

use HiPay\Fullservice\Gateway\Model\FraudScreening;
use HiPay\Fullservice\Gateway\Model\Operation;
use HiPay\Fullservice\Gateway\Model\OperationResponse;
use HiPay\Fullservice\Gateway\Model\Order;
use HiPay\Fullservice\Gateway\Model\PaymentMethod;
use HiPay\Fullservice\Gateway\Model\ThreeDSecure;
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

    /**
     * @var string
     */
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
        $mid = isset($source['mid']) ? $source['mid'] : null;
        $authorizationCode = isset($source['authorizationCode']) ? $source['authorizationCode'] : null;
        $transactionReference = isset($source['transactionReference']) ? $source['transactionReference'] : null;
        $dateCreated = isset($source['dateCreated']) ? $source['dateCreated'] : null;
        $dateUpdated = isset($source['dateUpdated']) ? $source['dateUpdated'] : null;
        $dateAuthorized = isset($source['dateAuthorized']) ? $source['dateAuthorized'] : null;
        $status = isset($source['status']) ? ((int)$source['status']) : null;
        $state = isset($source['state']) ? $source['state'] : null;
        $message = isset($source['message']) ? $source['message'] : null;
        $authorizedAmount = isset($source['authorizedAmount']) ? $source['authorizedAmount'] : null;
        $capturedAmount = isset($source['capturedAmount']) ? $source['capturedAmount'] : null;
        $refundedAmount = isset($source['refundedAmount']) ? $source['refundedAmount'] : null;
        $decimals = isset($source['decimals']) ? $source['decimals'] : null;
        $currency = isset($source['currency']) ? $source['currency'] : null;
        $reason = isset($source['reason']) ? $source['reason'] : null;
        $forwardUrl = isset($source['forwardUrl']) ? $source['forwardUrl'] : null;
        $attemptId = isset($source['attemptId']) ? $source['attemptId'] : null;
        $ipAddress = isset($source['ipAddress']) ? $source['ipAddress'] : null;
        $ipCountry = isset($source['ipCountry']) ? $source['ipCountry'] : null;
        $deviceId = isset($source['deviceId']) ? $source['deviceId'] : null;
        $avsResult = isset($source['avsResult']) ? $source['avsResult'] : null;
        $cvcResult = isset($source['cvcResult']) ? $source['cvcResult'] : null;
        $eci = isset($source['eci']) ? $source['eci'] : null;
        $paymentProduct = isset($source['paymentProduct']) ? $source['paymentProduct'] : null;

        /**
         * @var PaymentMethod $paymentMethod
         */
        $paymentMethod = null;
        if (isset($source['paymentMethod']) && is_array($source['paymentMethod'])) {
            $pmm = new PaymentMethodMapper($source['paymentMethod']);

            /** @var PaymentMethod $paymentMethod */
            $paymentMethod = $pmm->getModelObjectMapped();
        }

        /**
         * @var ThreeDSecure $threeDSecure
         */
        $threeDSecure = null;
        if (isset($source['threeDSecure']) && is_array($source['threeDSecure'])) {
            $tdsm = new ThreeDSecureMapper($source['threeDSecure']);

            /** @var ThreeDSecure $threeDSecure */
            $threeDSecure = $tdsm->getModelObjectMapped();
        }

        /**
         * @var FraudScreening $fraudScreening
         */
        $fraudScreening = null;
        if (isset($source['fraudScreening']) && is_array($source['fraudScreening'])) {
            $fsm = new FraudScreeningMapper($source['fraudScreening']);

            /** @var FraudScreening $fraudScreening */
            $fraudScreening = $fsm->getModelObjectMapped();
        }

        /**
         * @var Order $order
         */
        $order = null;
        if (isset($source['order'])) {
            $om = new OrderMapper($source['order']);

            /** @var Order $order */
            $order = $om->getModelObjectMapped();
        }

        $operation = null;
        if (isset($source['operation'])) {
            $orm = new OperationResponseMapper($source['operation']);

            /** @var OperationResponse $operation */
            $operation = $orm->getModelObjectMapped();
        }

        $debitAgreement = isset($source['debitAgreement']) ? $source['debitAgreement'] : null;

        $basket = isset($source['basket']) ? $source['basket'] : null;

        $customData = isset($source['customData']) ? $source['customData'] : null;

        $referenceToPay = isset($source['referenceToPay']) ? json_encode($source['referenceToPay']) : null;
        if (!$referenceToPay) {
            $referenceToPay = isset($source['paymentReference']) ? json_encode($source['paymentReference']) : null;
        }

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
            $fraudScreening,
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
