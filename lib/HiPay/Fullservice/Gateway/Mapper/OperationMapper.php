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
 */

namespace HiPay\Fullservice\Gateway\Mapper;

use HiPay\Fullservice\Mapper\AbstractMapper;
use HiPay\Fullservice\Gateway\Model\Operation;

/**
 * Mapper for Operation Model Object
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class OperationMapper extends AbstractMapper
{

    /**
     * @var Operation $_modelObject Model object to populate
     */
    protected $_modelObject;

    /**
     * @var string $_modelClassName
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
        $state = null;
        $message = isset($source['message']) ? $source['message'] : null;
        $authorizedAmount = isset($source['authorizedAmount']) ? $source['authorizedAmount'] : null;
        $capturedAmount = isset($source['capturedAmount']) ? $source['capturedAmount']: null;
        $refundedAmount = isset($source['refundedAmount']) ? $source['refundedAmount'] : null;
        $decimals = isset($source['decimals']) ? $source['decimals'] : null;
        $currency = isset($source['currency']) ? $source['currency'] : null;
        $operation = isset($source['operation']) ? $source['operation'] : null;

        $this->_modelObject = new Operation(
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
        return '\HiPay\Fullservice\Gateway\Model\Operation';
    }
}
