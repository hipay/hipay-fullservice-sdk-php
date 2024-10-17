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
 * Available Payment Product Model
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class AvailablePaymentProduct extends AbstractModel
{
    /**
     *
     * @param string $id
     * @param string $code
     * @param string $description
     * @param string $customerDescription
     * @param string $paymentProductCategoryCode
     * @param bool   $tokenizable
     * @param array<string, mixed>  $options
     */
    public function __construct(
        $id,
        $code,
        $description,
        $customerDescription,
        $paymentProductCategoryCode,
        $tokenizable,
        $options
    ) {
        $this->_id = $id;
        $this->_code = $code;
        $this->_description = $description;
        $this->_customerDescription = $customerDescription;
        $this->_paymentProductCategoryCode = $paymentProductCategoryCode;
        $this->_tokenizable = $tokenizable;
        $this->_options = $options;
    }

    /**
     * @var string $_id Payment product ID
     */
    protected $_id;

    /**
     * @var string $_code Payment product code
     */
    protected $_code;

    /**
     * @var string $_description Payment product description
     */
    protected $_description;

    /**
     * @var string $_customerDescription Customer-facing description
     */
    protected $_customerDescription;

    /**
     * @var string $_paymentProductCategoryCode Payment product category code
     */
    protected $_paymentProductCategoryCode;

    /**
     * @var bool $_tokenizable Whether the payment product is tokenizable
     */
    protected $_tokenizable;

    /**
     * @var array<string, mixed> $_options Additional options for the payment product
     */
    protected $_options;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @return string
     */
    public function getCustomerDescription()
    {
        return $this->_customerDescription;
    }

    /**
     * @return string
     */
    public function getPaymentProductCategoryCode()
    {
        return $this->_paymentProductCategoryCode;
    }

    /**
     * @return bool
     */
    public function isTokenizable()
    {
        return $this->_tokenizable;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getOptions()
    {
        return $this->_options;
    }
}
