<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo;


use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo\Payment;
use HiPay\TestCase\TestCase;

class PaymentTest extends TestCase
{
    public function testConstruct() {
        $payment = new Payment();

        $this->assertInstanceOf(Payment::class, $payment);

        return $payment;
    }

    /**
     * @var Payment $payment
     * @depends testConstruct
     */
    public function testGetEnrollmentDate($payment)
    {
        $this->assertNull($payment->getEnrollmentDate());

        $payment->enrollment_date = 20180507;

        $this->assertEquals(20180507, $payment->getEnrollmentDate());
    }
}