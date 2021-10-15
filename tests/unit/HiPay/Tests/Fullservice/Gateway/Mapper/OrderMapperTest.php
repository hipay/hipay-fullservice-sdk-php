<?php

namespace HiPay\Tests\Fullservice\Gateway\Mapper;

use HiPay\Fullservice\Enum\Customer\Gender;
use HiPay\Fullservice\Gateway\Mapper\OrderMapper;
use HiPay\Fullservice\Gateway\Model\Order;
use HiPay\Fullservice\Gateway\Model\PersonalInformation;
use HiPay\Tests\TestCase;

class OrderMapperTest extends TestCase
{
    private $_orderMapper;

    public function setUp(): void
    {
        $this->_orderMapper = array(
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
            "shippingAddress" => array(
                "firstname" => "Jane",
                "lastname" => "Doe",
                "streetAddress" => "56 avenue de la paix",
                "locality" => "Paris",
                "postalCode" => "75000",
                "country" => "FRANCE",
                "msisdn" => "000001",
                "phone" => "0123456789",
                "phoneOperator" => "Orange",
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
        $this->assertEquals($this->_orderMapper['customerId'], $order->getCustomerId());
        $this->assertEquals($this->_orderMapper['amount'], $order->getAmount());
        $this->assertEquals($this->_orderMapper['tax'], $order->getTax());
        $this->assertEquals($this->_orderMapper['shipping'], $order->getShipping());
        $this->assertEquals($this->_orderMapper['dateCreated'], $order->getDateCreated());
        $this->assertEquals($this->_orderMapper['attempts'], $order->getAttempts());
        $this->assertEquals($this->_orderMapper['currency'], $order->getCurrency());
        $this->assertEquals($this->_orderMapper['decimals'], $order->getDecimals());
        $this->assertEquals($this->_orderMapper['gender'], $order->getGender());
        $this->assertEquals($this->_orderMapper['language'], $order->getLanguage());

        $this->assertInstanceOf(PersonalInformation::class, $order->getShippingAddress());
        $this->assertEquals($this->_orderMapper['shippingAddress'], $order->getShippingAddress()->toArray());

    }
}
