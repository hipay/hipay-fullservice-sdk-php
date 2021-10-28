<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model\Request\ThreeDSTwo;

use HiPay\Fullservice\Enum\ThreeDSTwo\DeliveryTimeFrame;
use HiPay\Fullservice\Enum\ThreeDSTwo\PurchaseIndicator;
use HiPay\Fullservice\Enum\ThreeDSTwo\ReorderIndicator;
use HiPay\Fullservice\Enum\ThreeDSTwo\ShippingIndicator;
use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\MerchantRiskStatement;
use HiPay\TestCase\TestCase;

class MerchantRiskStatementTest extends TestCase
{
    public function testConstruct() {
        $merchantRiskStatement = new MerchantRiskStatement();

        $this->assertInstanceOf(MerchantRiskStatement::class, $merchantRiskStatement);

        return $merchantRiskStatement;
    }

    /**
     * @var MerchantRiskStatement $merchantRiskStatement
     * @depends testConstruct
     */
    public function testGetEmailDeliveryAdress($merchantRiskStatement)
    {
        $this->assertNull($merchantRiskStatement->getEmailDeliveryAddress());

        $merchantRiskStatement->email_delivery_address = "jane.doe@test.com";

        $this->assertEquals("jane.doe@test.com", $merchantRiskStatement->getEmailDeliveryAddress());
    }

    /**
     * @var MerchantRiskStatement $merchantRiskStatement
     * @depends testConstruct
     */
    public function testGetDeliveryTimeFrame($merchantRiskStatement)
    {
        $this->assertNull($merchantRiskStatement->getDeliveryTimeFrame());

        $merchantRiskStatement->delivery_time_frame = DeliveryTimeFrame::ELECTRONIC_DELIVERY;

        $this->assertEquals(DeliveryTimeFrame::ELECTRONIC_DELIVERY, $merchantRiskStatement->getDeliveryTimeFrame());
    }

    /**
     * @var MerchantRiskStatement $merchantRiskStatement
     * @depends testConstruct
     */
    public function testGetPurchaseIndicator($merchantRiskStatement)
    {
        $this->assertNull($merchantRiskStatement->getPurchaseIndicator());

        $merchantRiskStatement->purchase_indicator = PurchaseIndicator::FUTURE_AVAILABILITY;

        $this->assertEquals(PurchaseIndicator::FUTURE_AVAILABILITY, $merchantRiskStatement->getPurchaseIndicator());
    }

    /**
     * @var MerchantRiskStatement $merchantRiskStatement
     * @depends testConstruct
     */
    public function testGetPreOrderDate($merchantRiskStatement)
    {
        $this->assertNull($merchantRiskStatement->getPreOrderDate());

        $merchantRiskStatement->pre_order_date = 20190925;

        $this->assertEquals(20190925, $merchantRiskStatement->getPreOrderDate());
    }

    /**
     * @var MerchantRiskStatement $merchantRiskStatement
     * @depends testConstruct
     */
    public function testGetReorderIndicator($merchantRiskStatement)
    {
        $this->assertNull($merchantRiskStatement->getReorderIndicator());

        $merchantRiskStatement->reorder_indicator= ReorderIndicator::FIRST_TIME_ORDERED;

        $this->assertEquals(ReorderIndicator::FIRST_TIME_ORDERED, $merchantRiskStatement->getReorderIndicator());
    }

    /**
     * @var MerchantRiskStatement $merchantRiskStatement
     * @depends testConstruct
     */
    public function testGetShippingIndicator($merchantRiskStatement)
    {
        $this->assertNull($merchantRiskStatement->getShippingIndicator());

        $merchantRiskStatement->shipping_indicator= ShippingIndicator::DIGITAL_GOODS;

        $this->assertEquals(ShippingIndicator::DIGITAL_GOODS, $merchantRiskStatement->getShippingIndicator());
    }

    /**
     * @var MerchantRiskStatement $merchantRiskStatement
     * @depends testConstruct
     */
    public function testGetGiftCart($merchantRiskStatement)
    {
        $this->assertNull($merchantRiskStatement->getGiftCard());

        $giftCard = new MerchantRiskStatement\GiftCard();

        $merchantRiskStatement->gift_card = $giftCard;

        $retrievedGiftCard = $merchantRiskStatement->getGiftCard();

        $this->assertInstanceOf(MerchantRiskStatement\GiftCard::class, $retrievedGiftCard);
        $this->assertEquals($giftCard, $retrievedGiftCard);
    }
}