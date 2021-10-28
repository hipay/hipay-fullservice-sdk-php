<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model\Request\ThreeDSTwo\MerchantRiskStatement;

use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\MerchantRiskStatement\GiftCard;
use HiPay\TestCase\TestCase;

class GiftCardTest extends TestCase
{
    public function testConstruct() {
        $giftCard = new GiftCard();

        $this->assertInstanceOf(GiftCard::class, $giftCard);

        return $giftCard;
    }

    /**
     * @var GiftCard $giftCard
     * @depends testConstruct
     */
    public function testGetAmount($giftCard)
    {
        $this->assertNull($giftCard->getAmount());

        $giftCard->amount = 15.0;

        $this->assertEquals(15.0, $giftCard->getAmount());
    }

    /**
     * @var GiftCard $giftCard
     * @depends testConstruct
     */
    public function testGetCount($giftCard)
    {
        $this->assertNull($giftCard->getCount());

        $giftCard->count = 1;

        $this->assertEquals(1, $giftCard->getCount());
    }

    /**
     * @var GiftCard $giftCard
     * @depends testConstruct
     */
    public function testGetCurrency($giftCard)
    {
        $this->assertNull($giftCard->getCurrency());

        $giftCard->currency = "EUR";

        $this->assertEquals("EUR", $giftCard->getCurrency());
    }
}