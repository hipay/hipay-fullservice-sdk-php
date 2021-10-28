<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model;

use HiPay\Fullservice\Enum\Customer\Gender;
use HiPay\Fullservice\Gateway\Model\Order;
use HiPay\TestCase\TestCase;

class OrderTest extends TestCase
{
    private $_order;

    public function set_up()
{
        $this->_order = array(
            "id" => "000001",
            "customerId" => "000002",
            "amount" => "100",
            "tax" => "20",
            "shipping" => "10",
            "dateCreated" => "2021-07-06",
            "attempts" => 1,
            "currency" => "EUR",
            "decimals" => 2,
            "gender" => Gender::FEMALE,
            "language" => "FR",
            "shippingAddress" => "56 avenue de la paix, 75000 Paris"
        );
    }

    public function testConstruct()
    {
        $order = new Order(
            $this->_order["id"],
            $this->_order["customerId"],
            $this->_order["amount"],
            $this->_order["tax"],
            $this->_order["shipping"],
            $this->_order["dateCreated"],
            $this->_order["attempts"],
            $this->_order["currency"],
            $this->_order["decimals"],
            $this->_order["gender"],
            $this->_order["language"],
            $this->_order["shippingAddress"]
        );

        $this->assertInstanceOf(Order::class, $order);

        return $order;
    }

    /**
     * @var Order $order
     * @depends testConstruct
     */
    public function testGetId($order)
    {
        $this->assertEquals($this->_order["id"], $order->getId());
    }

    /**
     * @var Order $order
     * @depends testConstruct
     */
    public function testGetCustomId($order)
    {
        $this->assertEquals($this->_order["customerId"], $order->getCustomerId());
    }

    /**
     * @var Order $order
     * @depends testConstruct
     */
    public function testGetAmount($order)
    {
        $this->assertEquals($this->_order["amount"], $order->getAmount());
    }

    /**
     * @var Order $order
     * @depends testConstruct
     */
    public function testGetTax($order)
    {
        $this->assertEquals($this->_order["tax"], $order->getTax());
    }

    /**
     * @var Order $order
     * @depends testConstruct
     */
    public function testGetShipping($order)
    {
        $this->assertEquals($this->_order["shipping"], $order->getShipping());
    }

    /**
     * @var Order $order
     * @depends testConstruct
     */
    public function testGetDateCreated($order)
    {
        $this->assertEquals($this->_order["dateCreated"], $order->getDateCreated());
    }

    /**
     * @var Order $order
     * @depends testConstruct
     */
    public function testGetAttempts($order)
    {
        $this->assertEquals($this->_order["attempts"], $order->getAttempts());
    }

    /**
     * @var Order $order
     * @depends testConstruct
     */
    public function testGetCurrency($order)
    {
        $this->assertEquals($this->_order["currency"], $order->getCurrency());
    }

    /**
     * @var Order $order
     * @depends testConstruct
     */
    public function testGetDecimals($order)
    {
        $this->assertEquals($this->_order["decimals"], $order->getDecimals());
    }

    /**
     * @var Order $order
     * @depends testConstruct
     */
    public function testGetGender($order)
    {
        $this->assertEquals($this->_order["gender"], $order->getGender());
    }

    /**
     * @var Order $order
     * @depends testConstruct
     */
    public function testGetLanguage($order)
    {
        $this->assertEquals($this->_order["language"], $order->getLanguage());
    }

    /**
     * @var Order $order
     * @depends testConstruct
     */
    public function testGetShippingAddress($order)
    {
        $this->assertEquals($this->_order["shippingAddress"], $order->getShippingAddress());
    }
}
