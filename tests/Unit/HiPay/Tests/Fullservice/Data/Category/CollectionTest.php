<?php

namespace Unit\HiPay\Tests\Data\Category;

use HiPay\Fullservice\Data\Category\Collection;
use HiPay\TestCase\TestCase;

class CollectionTest extends TestCase
{
    public function testGetItems()
    {
        $collection = Collection::getItems();

        $this->assertCount(24, $collection);

        foreach ($collection as $item) {
            $this->assertInstanceOf("HiPay\Fullservice\Data\Category", $item);
        }
    }
}