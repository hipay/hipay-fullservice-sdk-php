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

use HiPay\Fullservice\Gateway\Model\AvailablePaymentProduct;
use HiPay\Fullservice\Mapper\AbstractMapper;

/**
 * Mapper for Available Payment Product Model Object
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class AvailablePaymentProductMapper extends AbstractMapper
{
    /**
     * @var string $_modelClassName
     */
    protected $_modelClassName;

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Mapper\AbstractMapper::mapResponseToModel()
     */
    protected function mapResponseToModel()
    {
        $source = $this->_getSource();
        $id = isset($source['id']) ? $source['id'] : null;
        $code = isset($source['code']) ? $source['code'] : null;
        $description = isset($source['description']) ? $source['description'] : null;
        $customerDescription = isset($source['customer_description']) ? $source['customer_description'] : null;
        $paymentProductCategoryCode = isset($source['payment_product_category_code']) ? $source['payment_product_category_code'] : null;
        $tokenizable = isset($source['tokenizable']) ? $source['tokenizable'] : false;
        $options = isset($source['options']) ? $source['options'] : [];

        $this->_modelObject = new AvailablePaymentProduct(
            $id,
            $code,
            $description,
            $customerDescription,
            $paymentProductCategoryCode,
            $tokenizable,
            $options
        );
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Mapper\AbstractMapper::validate()
     */
    protected function validate()
    {
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Mapper\AbstractMapper::getModelClassName()
     */
    protected function getModelClassName()
    {
        return '\HiPay\Fullservice\Gateway\Model\AvailablePaymentProduct';
    }
}
