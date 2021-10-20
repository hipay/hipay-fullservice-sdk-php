<?php

namespace HiPay\Tests\Fullservice\Gateway\Model;

use HiPay\Fullservice\Gateway\Model\PaymentMethod;
use HiPay\Tests\TestCase;

class PaymentMethodTest extends TestCase
{
    private $_paymentMethodData;

    public function setUp(): void
    {
        $this->_paymentMethodData = array(
            "token" => "d99ef51e45b3faa3c85bbf98c88417a894a32c572db430de15de4a28651e4ebd",
            "brand" => "VISA",
            "pan" => "4484120000000029",
            "cardHolder" => "Jane DOE",
            "cardExpiryMonth" => "05",
            "cardExpireYear" => "24",
            "issuer" => "BNP Paribas",
            "country" => "FRANCE"
        );
    }

    public function testConstruct()
    {
        $paymentMethod = new PaymentMethod(
            $this->_paymentMethodData["token"],
            $this->_paymentMethodData["brand"],
            $this->_paymentMethodData["pan"],
            $this->_paymentMethodData["cardHolder"],
            $this->_paymentMethodData["cardExpiryMonth"],
            $this->_paymentMethodData["cardExpireYear"],
            $this->_paymentMethodData["issuer"],
            $this->_paymentMethodData["country"]
        );

        $this->assertInstanceOf(PaymentMethod::class, $paymentMethod);

        return $paymentMethod;
    }

    /**
     * @var PaymentMethod $paymentMethod
     * @depends testConstruct
     */
    public function testGetToken($paymentMethod)
    {
        $this->assertEquals($this->_paymentMethodData["token"], $paymentMethod->getToken());
    }

    /**
     * @var PaymentMethod $paymentMethod
     * @depends testConstruct
     */
    public function testGetBrand($paymentMethod)
    {
        $this->assertEquals($this->_paymentMethodData["brand"], $paymentMethod->getBrand());
    }

    /**
     * @var PaymentMethod $paymentMethod
     * @depends testConstruct
     */
    public function testGetPan($paymentMethod)
    {
        $this->assertEquals($this->_paymentMethodData["pan"], $paymentMethod->getPan());
    }

    /**
     * @var PaymentMethod $paymentMethod
     * @depends testConstruct
     */
    public function testGetCardHolder($paymentMethod)
    {
        $this->assertEquals($this->_paymentMethodData["cardHolder"], $paymentMethod->getCardHolder());
    }

    /**
     * @var PaymentMethod $paymentMethod
     * @depends testConstruct
     */
    public function testGetCardExpiryMonth($paymentMethod)
    {
        $this->assertEquals($this->_paymentMethodData["cardExpiryMonth"], $paymentMethod->getCardExpiryMonth());
    }

    /**
     * @var PaymentMethod $paymentMethod
     * @depends testConstruct
     */
    public function testGetCardExpiryYear($paymentMethod)
    {
        $this->assertEquals($this->_paymentMethodData["cardExpireYear"], $paymentMethod->getCardExpiryYear());
    }

    /**
     * @var PaymentMethod $paymentMethod
     * @depends testConstruct
     */
    public function testGetIssuer($paymentMethod)
    {
        $this->assertEquals($this->_paymentMethodData["issuer"], $paymentMethod->getIssuer());
    }

    /**
     * @var PaymentMethod $paymentMethod
     * @depends testConstruct
     */
    public function testGetCountry($paymentMethod)
    {
        $this->assertEquals($this->_paymentMethodData["country"], $paymentMethod->getCountry());
    }
}
