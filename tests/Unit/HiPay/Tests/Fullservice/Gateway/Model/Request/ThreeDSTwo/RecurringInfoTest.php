<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model\Request\ThreeDSTwo;

use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\RecurringInfo;
use HiPay\TestCase\TestCase;

class RecurringInfoTest extends TestCase
{
    public function testConstruct() {
        $recurringInfo = new RecurringInfo();

        $this->assertInstanceOf(RecurringInfo::class, $recurringInfo);

        return $recurringInfo;
    }

    /**
     * @var RecurringInfo $recurringInfo
     * @depends testConstruct
     */
    public function testGetExpirationDate($recurringInfo)
    {
        $this->assertNull($recurringInfo->getExpirationDate());

        $recurringInfo->expiration_date = 20180507;

        $this->assertEquals(20180507, $recurringInfo->getExpirationDate());
    }

    /**
     * @var RecurringInfo $recurringInfo
     * @depends testConstruct
     */
    public function testGetFrequency($recurringInfo)
    {
        $this->assertNull($recurringInfo->getFrequency());

        $recurringInfo->frequency = 31;

        $this->assertEquals(31, $recurringInfo->getFrequency());
    }
}