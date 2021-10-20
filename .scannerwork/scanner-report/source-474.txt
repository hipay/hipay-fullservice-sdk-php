<?php

namespace Hipay\FullService\Data;

use HiPay\Fullservice\Data\DeliveryMethod;
use HiPay\Tests\TestCase;

class DeliveryMethodTest extends TestCase
{
    public function testConstruct()
    {
        $deliveryMethod = new DeliveryMethod(
            1,
            "STORE",
            "STANDARD"
        );

        $this->assertInstanceOf(DeliveryMethod::class, $deliveryMethod);

        return $deliveryMethod;
    }

    /**
     * @param DeliveryMethod $deliveryMethod
     * @depends testConstruct
     */
    public function testGetCode($deliveryMethod)
    {
        $deliveryMethod->setCode(1);
        $code = $deliveryMethod->getCode();

        $this->assertEquals(1, $code);
    }

    /**
     * @param DeliveryMethod $deliveryMethod
     * @depends testConstruct
     */
    public function testSetCode($deliveryMethod)
    {
        $deliveryMethod->setCode(2);
        $shipping = $deliveryMethod->getCode();

        $this->assertEquals(2, $shipping);
    }

    /**
     * @param DeliveryMethod $deliveryMethod
     * @depends testConstruct
     */
    public function testGetMode($deliveryMethod)
    {
        $deliveryMethod->setMode("STORE");

        $mode = $deliveryMethod->getMode();

        $this->assertEquals("STORE", $mode);
    }

    /**
     * @param DeliveryMethod $deliveryMethod
     * @depends testConstruct
     */
    public function testSetMode($deliveryMethod)
    {
        $deliveryMethod->setMode("CARRIER");
        $shipping = $deliveryMethod->getMode();

        $this->assertEquals("CARRIER", $shipping);
    }

    /**
     * @param DeliveryMethod $deliveryMethod
     * @depends testConstruct
     */
    public function testGetShipping($deliveryMethod)
    {
        $deliveryMethod->setShipping("STANDARD");

        $shipping = $deliveryMethod->getShipping();

        $this->assertEquals("STANDARD", $shipping);
    }

    /**
     * @param DeliveryMethod $deliveryMethod
     * @depends testConstruct
     */
    public function testSetShipping($deliveryMethod)
    {
        $deliveryMethod->setShipping("EXPRESS");
        $shipping = $deliveryMethod->getShipping();

        $this->assertEquals("EXPRESS", $shipping);
    }
}