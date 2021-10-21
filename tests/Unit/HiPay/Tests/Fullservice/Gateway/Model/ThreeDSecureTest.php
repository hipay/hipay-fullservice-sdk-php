<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model;

use HiPay\Fullservice\Enum\Transaction\ThreeDSecureStatus;
use HiPay\Fullservice\Gateway\Model\ThreeDSecure;
use HiPay\TestCase\TestCase;

class ThreeDSecureTest extends TestCase
{
    private $_threeDSecureData;

    public function setUp(): void
    {
        $this->_threeDSecureData = array(
            "eci" => "000001",
            "enrollmentStatus" => ThreeDSecureStatus::ENROLLMENT_AUTHENTICATION_AVAILABLE,
            "enrollmentMessage" => "Enrollment",
            "authenticationStatus" => ThreeDSecureStatus::AUTHENTICATION_ATTEMPTED,
            "authenticationMessage" => "Authentication",
            "authenticationToken" => "Token",
            "xid" => "xid"
        );
    }

    public function testConstruct() {
        $threeDSecure = new ThreeDSecure(
            $this->_threeDSecureData["eci"],
            $this->_threeDSecureData["enrollmentStatus"],
            $this->_threeDSecureData["enrollmentMessage"],
            $this->_threeDSecureData["authenticationStatus"],
            $this->_threeDSecureData["authenticationMessage"],
            $this->_threeDSecureData["authenticationToken"],
            $this->_threeDSecureData["xid"]
        );

        $this->assertInstanceOf(ThreeDSecure::class, $threeDSecure);

        return $threeDSecure;
    }

    /**
     * @var ThreeDSecure $threeDSecure
     * @depends testConstruct
     */
    public function testGetEci($threeDSecure)
    {
        $this->assertEquals($this->_threeDSecureData['eci'], $threeDSecure->getEci());
    }

    /**
     * @var ThreeDSecure $threeDSecure
     * @depends testConstruct
     */
    public function testGetEnrollmentStatus($threeDSecure)
    {
        $this->assertEquals($this->_threeDSecureData['enrollmentStatus'], $threeDSecure->getEnrollmentStatus());
    }

    /**
     * @var ThreeDSecure $threeDSecure
     * @depends testConstruct
     */
    public function testGetEnrollmentMessage($threeDSecure)
    {
        $this->assertEquals($this->_threeDSecureData['enrollmentMessage'], $threeDSecure->getEnrollmentMessage());
    }

    /**
     * @var ThreeDSecure $threeDSecure
     * @depends testConstruct
     */
    public function testGetAuthenticationStatus($threeDSecure)
    {
        $this->assertEquals($this->_threeDSecureData['authenticationStatus'], $threeDSecure->getAuthenticationStatus());
    }

    /**
     * @var ThreeDSecure $threeDSecure
     * @depends testConstruct
     */
    public function testGetAuthenticationMessage($threeDSecure)
    {
        $this->assertEquals($this->_threeDSecureData['authenticationMessage'], $threeDSecure->getAuthenticationMessage());
    }

    /**
     * @var ThreeDSecure $threeDSecure
     * @depends testConstruct
     */
    public function testGetAuthenticationToken($threeDSecure)
    {
        $this->assertEquals($this->_threeDSecureData['authenticationToken'], $threeDSecure->getAuthenticationToken());
    }

    /**
     * @var ThreeDSecure $threeDSecure
     * @depends testConstruct
     */
    public function testGetXid($threeDSecure)
    {
        $this->assertEquals($this->_threeDSecureData['xid'], $threeDSecure->getXid());
    }
}
