<?php

namespace HiPay\Tests\Fullservice\Gateway\Model\Cart;

use HiPay\Fullservice\Gateway\Model\Cart\Cart;
use HiPay\Fullservice\Gateway\Model\Cart\Item;
use HiPay\Tests\TestCase;

class CartTest extends TestCase
{
    public function testConstruct()
    {
        $cart = new Cart();

        $this->assertEquals(array(), $cart->getAllItems());

        return $cart;
    }

    /**
     * @var Cart $cart
     * @depends testConstruct
     */
    public function testAddItem($cart)
    {
        $this->assertEmpty($cart->getAllItems());

        $item = new Item();

        $cart->addItem($item);

        $items = $cart->getAllItems();

        $this->assertCount(1, $items);

        $retrievedItem = $items[0];

        $this->assertInstanceOf(Item::class, $retrievedItem);
        $this->assertEquals($item->toArray(), $retrievedItem->toArray());
    }

    public function testToJson()
    {
        $cart = new Cart();

        $json = $cart->toJson();

        $expectedJson = array();
        $this->assertEquals($expectedJson, json_decode($json, true));

        $item = new Item();

        $cart->addItem($item);

        $json = $cart->toJson();

        $expectedJson = array(
            array(
                "product_reference" => "",
                "type" => "",
                "name" => "",
                "quantity" => "",
                "unit_price" => 0,
                "tax_rate" => 0,
                "discount" => 0,
                "total_amount" => 0,
                "discount_description" => "",
                "product_description" => ""
            )
        );

        $this->assertEquals($expectedJson, json_decode($json, true));

        $item = new Item();

        $cart->addItem($item);

        $json = $cart->toJson();

        $expectedJson = array(
            array(
                "product_reference" => "",
                "type" => "",
                "name" => "",
                "quantity" => "",
                "unit_price" => 0,
                "tax_rate" => 0,
                "discount" => 0,
                "total_amount" => 0,
                "discount_description" => "",
                "product_description" => ""
            ),
            array(
                "product_reference" => "",
                "type" => "",
                "name" => "",
                "quantity" => "",
                "unit_price" => 0,
                "tax_rate" => 0,
                "discount" => 0,
                "total_amount" => 0,
                "discount_description" => "",
                "product_description" => ""
            )
        );

        $this->assertEquals($expectedJson, json_decode($json, true));
    }
}