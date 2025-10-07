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

use HiPay\Fullservice\Gateway\Model\OperationResponse;
use HiPay\Fullservice\Mapper\AbstractMapper;

/**
 * Mapper for Operation Response Model Object
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2017 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class OperationResponseMapper extends AbstractMapper
{
    /**
     * @var OperationResponse $_modelObject Model object to populate
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
        $type = isset($source['type']) ? $source['type'] : null;
        $id = isset($source['id']) ? $source['id'] : null;
        $reference = isset($source['reference']) ? $source['reference'] : null;
        $amount = isset($source['amount']) ? $source['amount'] : null;
        $currency = isset($source['currency']) ? $source['currency'] : null;
        $dateAuthorized = isset($source['date']) ? $source['date'] : null;

        $this->_modelObject = new OperationResponse(
            $type,
            $id,
            $reference,
            $amount,
            $currency,
            $dateAuthorized
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
        return '\HiPay\Fullservice\Gateway\Model\OperationResponse';
    }
}
