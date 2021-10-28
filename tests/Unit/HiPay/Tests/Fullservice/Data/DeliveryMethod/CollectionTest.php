<?php

namespace Unit\HiPay\Tests\Data\DeliveryMethod;

use HiPay\Fullservice\Data\DeliveryMethod\Collection;
use HiPay\TestCase\TestCase;

class CollectionTest extends TestCase
{
    public function testGetItems()
    {
        $collection = Collection::getItems();

        $this->assertCount(29, $collection);

        foreach ($collection as $item) {
            $this->assertInstanceOf("HiPay\Fullservice\Data\DeliveryMethod", $item);
        }
    }
}