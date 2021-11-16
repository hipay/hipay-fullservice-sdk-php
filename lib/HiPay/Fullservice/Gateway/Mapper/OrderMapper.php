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

use HiPay\Fullservice\Gateway\Model\PersonalInformation;
use HiPay\Fullservice\Mapper\AbstractMapper;
use HiPay\Fullservice\Gateway\Model\Order;

/**
 * Mapper for Order Model Object
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class OrderMapper extends AbstractMapper
{
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
        $id = isset($source['id']) ? $source['id'] : null;
        $customerId = isset($source['customerId']) ? $source['customerId'] : null;
        $amount = isset($source['amount']) ? $source['amount'] : null;
        $tax = isset($source['tax']) ? $source['tax'] : null;
        $shipping = isset($source['shipping']) ? $source['shipping'] : null;
        $dateCreated = isset($source['dateCreated']) ? $source['dateCreated'] : null;
        $attempts = isset($source['attempts']) ? $source['attempts'] : null;
        $currency = isset($source['currency']) ? $source['currency'] : null;
        $decimals = isset($source['decimals']) ? $source['decimals'] : null;
        $gender = isset($source['gender']) ? $source['gender'] : null;
        $language = isset($source['language']) ? $source['language'] : null;

        $shippingAddress = null;
        if (isset($source['shippingAddress'])) {
            $pim = new PersonalInformationMapper($source['shippingAddress']);

            /** @var PersonalInformation $shippingAddress */
            $shippingAddress = $pim->getModelObjectMapped();
        }

        $this->_modelObject = new Order(
            $id,
            $customerId,
            $amount,
            $tax,
            $shipping,
            $dateCreated,
            $attempts,
            $currency,
            $decimals,
            $gender,
            $language,
            $shippingAddress
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
        return '\HiPay\Fullservice\Gateway\Model\Order';
    }
}
