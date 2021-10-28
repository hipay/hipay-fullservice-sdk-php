<?php

namespace Unit\HiPay\Tests\Data\DeliveryMethod;

use HiPay\Fullservice\Data\DeliveryMethod;
use HiPay\TestCase\TestCase;

class CollectionModeShippingTest extends TestCase
{
    public function testGetItems()
    {
        $collection = DeliveryMethod\CollectionModeShipping::getItems();

        $this->assertArrayHasKey("mode", $collection);
        $this->assertCount(5, $collection["mode"]);

        $this->assertArrayHasKey("shipping", $collection);
        $this->assertCount(6, $collection["shipping"]);

        foreach ($collection["mode"] as $mode) {
            $this->assertInstanceOf("HiPay\Fullservice\Data\DeliveryMethodAttribute", $mode);
        }

        foreach ($collection["shipping"] as $shipping) {
            $this->assertInstanceOf("HiPay\Fullservice\Data\DeliveryMethodAttribute", $shipping);
        }
    }
}