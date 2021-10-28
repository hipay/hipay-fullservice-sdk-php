<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model\Request\ThreeDSTwo;

use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\PreviousAuthInfo;
use HiPay\TestCase\TestCase;

class PreviousAuthInfoTest extends TestCase
{
    public function testConstruct() {
        $previousAuthInfo = new PreviousAuthInfo();

        $this->assertInstanceOf(PreviousAuthInfo::class, $previousAuthInfo);

        return $previousAuthInfo;
    }

    /**
     * @var PreviousAuthInfo $previousAuthInfo
     * @depends testConstruct
     */
    public function testGetTransactionReference($previousAuthInfo)
    {
        $this->assertNull($previousAuthInfo->getTransactionReference());

        $previousAuthInfo->transaction_reference = "800000987283";

        $this->assertEquals("800000987283", $previousAuthInfo->getTransactionReference());
    }
}