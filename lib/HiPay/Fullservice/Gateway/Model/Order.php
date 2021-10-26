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
 * Order Model
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Order extends AbstractModel
{
    /**
     * Order constructor.
     * @param string $id
     * @param string $customerId
     * @param float $amount
     * @param float $tax
     * @param float $shipping
     * @param string $dateCreated
     * @param int $attempts
     * @param string $currency
     * @param int $decimals
     * @param string $gender
     * @param string $language
     * @param PersonalInformation|null $shippingAddress
     */
    public function __construct(
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
    ) {
        $this->_id = $id;
        $this->_customerId = $customerId;
        $this->_amount = $amount;
        $this->_tax = $tax;
        $this->_shipping = $shipping;
        $this->_dateCreated = $dateCreated;
        $this->_attempts = $attempts;
        $this->_currency = $currency;
        $this->_decimals = $decimals;
        $this->_gender = $gender;
        $this->_language = $language;
        $this->_shippingAddress = $shippingAddress;
    }

    /**
     *
     * @var string $_id Order ID
     */
    protected $_id;

    /**
     *
     * @var string $_dateCreated Created date
     */
    protected $_dateCreated;

    /**
     *
     * @var int $_attempts Indicates how many payment attempts have been made for this order
     */
    protected $_attempts;

    /**
     *
     * @var float $_amount The total order amount
     */
    protected $_amount;

    /**
     *
     * @var float $_shipping The order shipping fee.
     */
    protected $_shipping;

    /**
     *
     * @var float $_tax The order tax fee.
     */
    protected $_tax;

    /**
     *
     * @var int $_decimals Decimal precision of the order amount
     */
    protected $_decimals;

    /**
     *
     * @var string $_currency This three-character currency code complies with ISO 4217.
     */
    protected $_currency;

    /**
     *
     * @var string $_customerId Unique identifier of the customer as provided by Merchant
     */
    protected $_customerId;

    /**
     *
     * @var string $_language Language code of the customer.
     */
    protected $_language;

    /**
     *
     * @var string $_gender Gender code
     * @see \HiPay\Fullservice\Enum\Customer\Gender
     */
    protected $_gender;

    /**
     *
     * @var PersonalInformation|null $_shippingAddress Customer Shipping address information
     */
    protected $_shippingAddress;

    /**
     *
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     *
     * @return string
     */
    public function getDateCreated()
    {
        return $this->_dateCreated;
    }

    /**
     * @return int
     */
    public function getAttempts()
    {
        return $this->_attempts;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->_amount;
    }

    /**
     * @return float
     */
    public function getShipping()
    {
        return $this->_shipping;
    }

    /**
     * @return float
     */
    public function getTax()
    {
        return $this->_tax;
    }

    /**
     * @return int
     */
    public function getDecimals()
    {
        return $this->_decimals;
    }

    /**
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->_currency;
    }

    /**
     *
     * @return string
     */
    public function getCustomerId()
    {
        return $this->_customerId;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->_language;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @return PersonalInformation|null
     */
    public function getShippingAddress()
    {
        return $this->_shippingAddress;
    }
}
