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

use HiPay\Fullservice\Model\AbstractModel;

/**
 * Cart model for "basket" parameter for an OrderRequest
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      Aymeric Berthelot <aberthelot@hipay.com>
 * @copyright   Copyright (c) 2017 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Cart extends AbstractModel
{
    /**
     *  List of items
     *
     * @var array<Item> HiPay\Fullservice\Gateway\Model\CartCategories\Item
     */
    protected $_items;

    /**
     * Cart model constructor.
     */
    public function __construct()
    {
        $this->_items = array();
    }

    /**
     *  Add an item ( Fee, Good , Discount) into the cart
     *
     * @param Item $item
     * @return void
     */
    public function addItem($item)
    {
        $this->_items[] = $item;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Model\ModelInterface::toJson()
     */
    public function toJson()
    {
        $cart = array();
        foreach ($this->_items as $item) {
            $cart[] = $item->toArray();
        }
        return json_encode($cart);
    }

    /**
     *  Return all items present in Cart
     *
     * @return array<Item>
     */
    public function getAllItems()
    {
        return $this->_items;
    }
}
