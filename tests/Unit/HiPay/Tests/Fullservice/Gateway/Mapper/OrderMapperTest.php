<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Mapper;

use HiPay\Fullservice\Enum\Customer\Gender;
use HiPay\Fullservice\Gateway\Mapper\OrderMapper;
use HiPay\Fullservice\Gateway\Model\Order;
use HiPay\Fullservice\Gateway\Model\PersonalInformation;
use HiPay\TestCase\TestCase;

class OrderMapperTest extends TestCase
{
    private $_orderMapper;

    public function setUp(): void
    {
        $this->_orderMapper = array(
            "id" => "000001",
            "customer_id" => "000002",
            "amount" => "100",
            "tax" => "20",
            "shipping" => "10",
            "date_created" => "2021-07-06",
            "attempts" => 1,
            "currency" => "EUR",
            "decimals" => 2,
            "gender" => Gender::FEMALE,
            "language" => "FR",
            "shipping_address" => array(
                "firstname" => "Jane",
                "lastname" => "Doe",
                "street_address" => "56 avenue de la paix",
                "locality" => "Paris",
                "postal_code" => "75000",
                "country" => "FRANCE",
                "msisdn" => "000001",
                "phone" => "0123456789",
                "phone_operator" => "Orange",
                "email" => "jane.doe@test.com",
            )
        );
    }

    public function testConstruct()
    {
        $orderMapper = new OrderMapper(
            $this->_orderMapper
        );

        $this->assertInstanceOf(OrderMapper::class, $orderMapper);

        return $orderMapper;
    }

    /**
     * @var OrderMapper $orderMapper
     * @depends testConstruct
     */
    public function testMapResponseToModel($orderMapper)
    {
        $order = $orderMapper->getModelObjectMapped();

        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals($this->_orderMapper['id'], $order->getId());
        $this->assertEquals($this->_orderMapper['customer_id'], $order->getCustomerId());
        $this->assertEquals($this->_orderMapper['amount'], $order->getAmount());
        $this->assertEquals($this->_orderMapper['tax'], $order->getTax());
        $this->assertEquals($this->_orderMapper['shipping'], $order->getShipping());
        $this->assertEquals($this->_orderMapper['date_created'], $order->getDateCreated());
        $this->assertEquals($this->_orderMapper['attempts'], $order->getAttempts());
        $this->assertEquals($this->_orderMapper['currency'], $order->getCurrency());
        $this->assertEquals($this->_orderMapper['decimals'], $order->getDecimals());
        $this->assertEquals($this->_orderMapper['gender'], $order->getGender());
        $this->assertEquals($this->_orderMapper['language'], $order->getLanguage());

        $this->assertInstanceOf(PersonalInformation::class, $order->getShippingAddress());
        $this->assertEquals($this->_orderMapper['shipping_address'], $order->getShippingAddress()->toArray());

    }
}
