<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo;


use HiPay\Fullservice\Enum\ThreeDSTwo\NameIndicator;
use HiPay\Fullservice\Enum\ThreeDSTwo\SuspiciousActivity;
use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo\Shipping;
use HiPay\TestCase\TestCase;

class ShippingTest extends TestCase
{
    public function testConstruct() {
        $shipping = new Shipping();

        $this->assertInstanceOf(Shipping::class, $shipping);

        return $shipping;
    }

    /**
     * @var Shipping $shipping
     * @depends testConstruct
     */
    public function testGetShippingUsedDate($shipping)
    {
        $this->assertNull($shipping->getShippingUsedDate());

        $shipping->shipping_used_date = 20180507;

        $this->assertEquals(20180507, $shipping->getShippingUsedDate());
    }

    /**
     * @var Shipping $shipping
     * @depends testConstruct
     */
    public function testGetNameIndicator($shipping)
    {
        $this->assertNull($shipping->getNameIndicator());

        $shipping->name_indicator = NameIndicator::DIFFERENT;

        $this->assertEquals(NameIndicator::DIFFERENT, $shipping->getNameIndicator());
    }

    /**
     * @var Shipping $shipping
     * @depends testConstruct
     */
    public function testGetSuspiciousActivity($shipping)
    {
        $this->assertNull($shipping->getSuspiciousActivity());

        $shipping->suspicious_activity = SuspiciousActivity::NO_SUSPICIOUS_ACTIVITY;

        $this->assertEquals(SuspiciousActivity::NO_SUSPICIOUS_ACTIVITY, $shipping->getSuspiciousActivity());
    }
}