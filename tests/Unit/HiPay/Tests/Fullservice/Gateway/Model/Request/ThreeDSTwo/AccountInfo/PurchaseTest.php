<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo;


use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo\Purchase;
use HiPay\TestCase\TestCase;

class PurchaseTest extends TestCase
{
    public function testConstruct() {
        $purchase = new Purchase();

        $this->assertInstanceOf(Purchase::class, $purchase);

        return $purchase;
    }

    /**
     * @var Purchase $purchase
     * @depends testConstruct
     */
    public function testGetCount($purchase)
    {
        $this->assertNull($purchase->getCount());

        $purchase->count = 1;

        $this->assertEquals(1, $purchase->getCount());
    }

    /**
     * @var Purchase $purchase
     * @depends testConstruct
     */
    public function testGetCardStore24h($purchase)
    {
        $this->assertNull($purchase->getCardStored24h());

        $purchase->card_stored_24h = 1;

        $this->assertEquals(1, $purchase->getCardStored24h());
    }

    /**
     * @var Purchase $purchase
     * @depends testConstruct
     */
    public function testGetPaymentAttempts24h($purchase)
    {
        $this->assertNull($purchase->getPaymentAttempts24h());

        $purchase->payment_attempts_24h = 1;

        $this->assertEquals(1, $purchase->getPaymentAttempts24h());
    }

    /**
     * @var Purchase $purchase
     * @depends testConstruct
     */
public function testGetPaymentAttemps1y($purchase)
    {
        $this->assertNull($purchase->getPaymentAttempts1y());

        $purchase->payment_attempts_1y = 1;

        $this->assertEquals(1, $purchase->getPaymentAttempts1y());
    }
}