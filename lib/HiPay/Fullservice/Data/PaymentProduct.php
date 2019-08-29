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

namespace HiPay\Fullservice\Data;

/**
 * Payment product object
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PaymentProduct
{
    /**
     * @var string $productCode Product code (cd,mastercard,visa etc ...)
     */
    private $productCode;

    /**
     * @var string $brandName Human readable value
     */
    private $brandName;

    /**
     * @var string $category Brand's category
     */
    private $category;

    /**
     * @var string $comment A short brand description
     */
    private $comment = '';

    /**
     * @var bool $can3ds If can process 3ds payment
     */
    private $can3ds = false;

    /**
     * @var bool $canRecurring Payment product accept refunds
     */
    private $canRecurring = false;

    /**
     * @var bool $canManualCapture Payment product accept manual capture
     */
    private $canManualCapture = false;

    /**
     * @var bool $canManualCapturePartially Payment product accept partial manual capture
     */
    private $canManualCapturePartially = false;

    /**
     * @var bool $canRefund Payment product accept refunds
     */
    private $canRefund = false;

    /**
     * @var bool $canRefundPartially Payment product accept partial refunds
     */
    private $canRefundPartially = false;

    /**
     * @var boolean Cart items is required for the payment method
     */
    private $basketRequired = false;

    /**
     * @var array $currencies currencies accepted by the payment method, no restriction if empty
     */
    private $currencies = array();

    /**
     * @var array $countries countries accepted by the payment method, no restriction if empty
     */
    private $countries = array();

    /**
     * @var array $checkoutFieldsMandatory mandatory information to provide when requesting a new transaction
     */
    private $checkoutFieldsMandatory = array();

    /**
     * @var array $additionalFields information about payment method specific fields, no specific fields if empty
     */
    private $additionalFields = array();

    /**
     * PaymentProduct constructor.
     *
     * @param array $paymentProductData
     */
    public function __construct($paymentProductData)
    {
        foreach ($paymentProductData as $key => $data) {
            if (property_exists($this, $key)) {
                $this->{$key} = $data;
            }
        }
    }

    /**
     * @return string
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @return string
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * @return bool
     */
    public function getCan3ds()
    {
        return (bool)$this->can3ds;
    }

    /**
     * @return bool
     */
    public function getCanRefund()
    {
        return (bool)$this->canRefund;
    }

    /**
     * @return bool
     */
    public function getCanRecurring()
    {
        return (bool)$this->canRecurring;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return bool
     */
    public function getBasketRequired()
    {
        return (bool)$this->basketRequired;
    }

    /**
     * @return bool
     */
    public function getCanManualCapture()
    {
        return (bool)$this->canManualCapture;
    }

    /**
     * @return bool
     */
    public function getCanManualCapturePartially()
    {
        return (bool)$this->canManualCapturePartially;
    }

    /**
     * @return bool
     */
    public function getCanRefundPartially()
    {
        return (bool)$this->canRefundPartially;
    }

    /**
     * @return array
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * @return array
     */
    public function getCountries()
    {
        return $this->countries;
    }

    /**
     * @return array
     */
    public function getCheckoutFieldsMandatory()
    {
        return $this->checkoutFieldsMandatory;
    }

    /**
     * @return array
     */
    public function getAdditionalFields()
    {
        return $this->additionalFields;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
}
