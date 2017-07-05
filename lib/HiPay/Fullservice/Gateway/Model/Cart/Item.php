<?php
/**
 * HiPay Enterprise SDK PHP
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Apache 2.0 Licence
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * @copyright      Copyright (c) 2017 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */

namespace HiPay\Fullservice\Gateway\Model\Cart;


use HiPay\Fullservice\Enum\Cart\TypeItems;
use HiPay\Fullservice\Model\AbstractModel;

/**
 * Item model
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      Aymeric Berthelot <aberthelot@hipay.com>
 * @copyright   Copyright (c) 2017 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Item extends AbstractModel
{

    /**
     *  European article numbering
     *
     * @var string
     * @format EAN
     */
    private $_european_article_numbering;
    /**
     *  Internal Product Reference
     *
     * @var string $_product_reference
     */
    private $_product_reference;

    /**
     * The value must be a member of the following list:
     * - goods:
     * - discount:
     * - fees:
     *
     * @var string
     * @value good | discount | fees
     * @required
     *
     */
    private $_type;

    /**
     *  Product description
     *
     * @var string $_name
     *
     */
    private $_name;

    /**
     *  Product Quantity
     *
     * @var int $_quantity Must be positive
     */
    private $_quantity;

    /**
     * Product Unit Price
     *
     * @var float(12,3) $_unit_price
     */
    private $_unit_price;

    /**
     * Tax rate applied on product
     *
     * @var float $_tax_rate
     */
    private $_tax_rate;

    /**
     * Amount of discount applied to the line
     *
     * @var float(5,2) $_discount
     */
    private $_discount;

    /**
     * Total amount to the line
     *
     * @var float(12,3) $_discount
     */
    private $_total_amount;

    /**
     * Discount description
     *
     * @var string
     */
    private $_discount_description;

    /**
     *
     * @var string
     */
    private $_product_description;

    /**
     * Delivery Method
     *
     * @var string
     */
    private $_delivery_method;

    /**
     * Delivery Company
     *
     * @var string
     */
    private $_delivery_company;

    /**
     * Delivery Delay
     *
     * @var string
     */
    private $_delivery_delay;

    /**
     * Delivery Number
     *
     * @var string
     */
    private $_delivery_number;

    /**
     * Id Category
     *
     * @var int
     * @value 
     */
    private $_product_category;

    /**
     * Id Merchant from HiPay BO ( Only for Marketplace)
     *
     * @var string
     */
    private $_shop_id;

    /**
     * Item constructor
     *
     */
    public function __construct()
    {
        $this->_european_article_numbering = null;
        $this->_product_reference = "";
        $this->_type = "";
        $this->_name = "";
        $this->_quantity = "";
        $this->_unit_price = 0.00;
        $this->_tax_rate = 0.00;
        $this->_discount = 0.00;
        $this->_total_amount = 0.00;
        $this->_discount_description = "";
        $this->_product_description = "";
        $this->_delivery_method = null;
        $this->_delivery_company = null;
        $this->_delivery_delay = null;
        $this->_delivery_number = null;
        $this->_product_category = null;
        $this->_shop_id = null;
    }

    /**
     *  Hydrate an item with type Discount
     *
     * @param string $product_reference
     * @param string $name
     * @param float $unit_price
     * @param float $tax_rate
     * @param float $discount
     * @param string $discount_description
     * @param float $total_amount
     * @return \HiPay\Fullservice\Gateway\Model\Cart\Item
     */
    public static function buildItemTypeDiscount($product_reference,
                                                 $name,
                                                 $unit_price,
                                                 $tax_rate,
                                                 $discount,
                                                 $discount_description,
                                                 $total_amount)
    {
        return self::initInternalItem($product_reference,
            $name,
            1,
            $unit_price,
            $tax_rate,
            $discount,
            $total_amount,
            TypeItems::DISCOUNT,
            $discount_description);
    }

    /**
     *  Hydrate generic item
     *
     * @param string $product_reference
     * @param string $name
     * @param int $quantity
     * @param float $unit_price
     * @param float $tax_rate
     * @param float $discount
     * @param float $total_amount
     * @param string $discount_description
     * @param string $type
     * @return \HiPay\Fullservice\Gateway\Model\Cart\Item
     */
    private static function initInternalItem($product_reference,
                                             $name,
                                             $quantity,
                                             $unit_price,
                                             $tax_rate,
                                             $discount,
                                             $total_amount,
                                             $type,
                                             $discount_description = null)
    {
        $cartItem = new Item();
        $cartItem->setProductReference($product_reference)
            ->setName($name)
            ->setType($type)
            ->setQuantity($quantity)
            ->setUnitPrice($unit_price)
            ->setTaxRate($tax_rate)
            ->setDiscount($discount)
            ->setTotalAmount($total_amount);

        if ($type == TypeItems::DISCOUNT) {
            $cartItem->setDiscountDescription($discount_description);
        }

        return $cartItem;
    }

    /**
     *  Build an item of type Fees with quantity to 1
     *
     * @param string $product_reference
     * @param string $name
     * @param float $unit_price
     * @param float $tax_rate
     * @param float $discount
     * @param float $total_amount
     * @return \HiPay\Fullservice\Gateway\Model\Cart\Item
     */
    public static function buildItemTypeFees($product_reference,
                                             $name,
                                             $unit_price,
                                             $tax_rate,
                                             $discount,
                                             $total_amount)
    {
        return self::initInternalItem($product_reference,
            $name,
            1,
            $unit_price,
            $tax_rate,
            $discount,
            $total_amount,
            TypeItems::FEE
        );
    }

    /**
     * Item constructor.
     *
     * @param string $european_article_numbering
     * @param string $product_reference
     * @param string $type
     * @param string $name
     * @param int $quantity
     * @param float $unit_price
     * @param float $tax_rate
     * @param float $discount
     * @param float $total_amount
     * @param string $discount_description
     * @param string $product_description
     * @param string $delivery_method
     * @param string $delivery_company
     * @param int $delivery_delay
     * @param string $delivery_number
     * @param int $product_category
     * @param int $shop_id
     */
    public function __constructItem(
        $european_article_numbering,
        $product_reference,
        $type,
        $name,
        $quantity,
        $unit_price,
        $tax_rate,
        $discount,
        $total_amount,
        $discount_description,
        $product_description,
        $delivery_method,
        $delivery_company,
        $delivery_delay,
        $delivery_number,
        $product_category,
        $shop_id

    )
    {
        $this->_european_article_numbering = $european_article_numbering;
        $this->_product_reference = $product_reference;
        $this->_type = $type;
        $this->_name = $name;
        $this->_quantity = $quantity;
        $this->_unit_price = $unit_price;
        $this->_tax_rate = $tax_rate;
        $this->_discount = $discount;
        $this->_total_amount = $total_amount;
        $this->_discount_description = $discount_description;
        $this->_product_description = $product_description;
        $this->_delivery_method = $delivery_method;
        $this->_delivery_company = $delivery_company;
        $this->_delivery_delay = $delivery_delay;
        $this->_delivery_number = $delivery_number;
        $this->_product_category = $product_category;
        $this->_shop_id = $shop_id;
    }

    /**
     * @return string
     */
    public function getEuropeanArticleNumbering()
    {
        return $this->_european_article_numbering;
    }

    /**
     * @param string $european_article_numbering
     * @return Item
     */
    public function setEuropeanArticleNumbering($european_article_numbering)
    {
        $this->_european_article_numbering = $european_article_numbering;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductReference()
    {
        return $this->_product_reference;
    }

    /**
     * @param string $product_reference
     * @return Item
     *
     */
    public function setProductReference($product_reference)
    {
        $this->_product_reference = $product_reference;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param string $type
     * @return Item
     */
    public function setType($type)
    {
        $this->_type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     * @return Item
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }

    /**
     * @param int $quantity
     * @return Item
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->_unit_price;
    }

    /**
     * @param float $unit_price
     * @return Item
     */
    public function setUnitPrice($unit_price)
    {
        $this->_unit_price = $unit_price;
        return $this;
    }

    /**
     * @return float
     */
    public function getTaxRate()
    {
        return $this->_tax_rate;
    }

    /**
     * @param float $tax_rate
     * @return Item
     */
    public function setTaxRate($tax_rate)
    {
        $this->_tax_rate = $tax_rate;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount()
    {
        return $this->_discount;
    }

    /**
     * @param float $discount
     * @return Item
     */
    public function setDiscount($discount)
    {
        $this->_discount = $discount;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalAmount()
    {
        return $this->_total_amount;
    }

    /**
     * @param float(12.3) $total_amount
     * @return Item
     */
    public function setTotalAmount($total_amount)
    {
        $this->_total_amount = $total_amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getDiscountDescription()
    {
        return $this->_discount_description;
    }

    /**
     * @param string $discount_description
     * @return Item
     */
    public function setDiscountDescription($discount_description)
    {
        $this->_discount_description = $discount_description;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductDescription()
    {
        return $this->_product_description;
    }

    /**
     * @param string $product_description
     * @return Item
     */
    public function setProductDescription($product_description)
    {
        $this->_product_description = $product_description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryMethod()
    {
        return $this->_delivery_method;
    }

    /**
     * @param string $delivery_method
     * @return Item
     */
    public function setDeliveryMethod($delivery_method)
    {
        $this->_delivery_method = $delivery_method;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryCompany()
    {
        return $this->_delivery_company;
    }

    /**
     * @param string $delivery_company
     * @return Item
     */
    public function setDeliveryCompany($delivery_company)
    {
        $this->_delivery_company = $delivery_company;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryDelay()
    {
        return $this->_delivery_delay;
    }

    /**
     * @param string $delivery_delay
     * @return Item
     */
    public function setDeliveryDelay($delivery_delay)
    {
        $this->_delivery_delay = $delivery_delay;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryNumber()
    {
        return $this->_delivery_number;
    }

    /**
     * @param string $delivery_number
     * @return Item
     */
    public function setDeliveryNumber($delivery_number)
    {
        $this->_delivery_number = $delivery_number;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductCategory()
    {
        return $this->_product_category;
    }

    /**
     * @param string $product_category
     * @return Item
     */
    public function setProductCategory($product_category)
    {
        $this->_product_category = $product_category;
        return $this;
    }

    /**
     * @return string
     */
    public function getShopId()
    {
        return $this->_shop_id;
    }

    /**
     * @param string $shop_id
     * @return Item
     */
    public function setShopId($shop_id)
    {
        $this->_shop_id = $shop_id;
        return $this;
    }

    /**
     * Object to Array
     *
     * @return array Hashed array with key/value pairs (property/value)
     */
    public function toArray()
    {
        $params = array();
        $this->prepareParams($this, $params);
        return $params;
    }

    /**
     * Populate $_params array with data to send to the gateaway
     *
     * @param Item
     * @param array $params Passed by reference
     *
     */
    protected function prepareParams($object, &$params)
    {
        $properties = get_object_vars($object);
        foreach ($properties as $p => $v) {
            if (is_scalar($v)) {
                $params[substr($p, 1)] = $v;
            }
        }
    }
}