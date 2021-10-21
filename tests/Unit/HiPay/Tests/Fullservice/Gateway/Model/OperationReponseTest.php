<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model;

use HiPay\Fullservice\Gateway\Model\OperationResponse;
use HiPay\TestCase\TestCase;

class OperationResponseTest extends TestCase
{
    private $_operationResponse;

    public function setUp(): void
    {
        $this->_operationResponse = array(
            "type" => "capture",
            "id" => "000001",
            "reference" => "000002",
            "amount" => 100,
            "currency" => "EUR",
            "dateAuthorized" => "2021-06-07"
        );
    }

    public function testConstruct()
    {
        $operationResponse = new OperationResponse(
            $this->_operationResponse["type"],
            $this->_operationResponse["id"],
            $this->_operationResponse["reference"],
            $this->_operationResponse["amount"],
            $this->_operationResponse["currency"],
            $this->_operationResponse["dateAuthorized"]
        );

        $this->assertInstanceOf(OperationResponse::class, $operationResponse);

        return $operationResponse;
    }

    /**
     * @var OperationResponse $operationResponse
     * @depends testConstruct
     */
    public function testGetType($operationResponse)
    {
        $operationResponse->setType($this->_operationResponse["type"]);

        $this->assertEquals($this->_operationResponse["type"], $operationResponse->getType());
    }

    /**
     * @var OperationResponse $operationResponse
     * @depends testConstruct
     */
    public function testSetType($operationResponse)
    {
        $operationResponse->setType("refund");

        $this->assertEquals("refund", $operationResponse->getType());
    }

    /**
     * @var OperationResponse $operationResponse
     * @depends testConstruct
     */
    public function testGetId($operationResponse)
    {
        $operationResponse->setId($this->_operationResponse["id"]);

        $this->assertEquals($this->_operationResponse["id"], $operationResponse->getId());
    }

    /**
     * @var OperationResponse $operationResponse
     * @depends testConstruct
     */
    public function testSetId($operationResponse)
    {
        $operationResponse->setId("000003");

        $this->assertEquals("000003", $operationResponse->getId());
    }

    /**
     * @var OperationResponse $operationResponse
     * @depends testConstruct
     */
    public function testGetReference($operationResponse)
    {
        $operationResponse->setReference($this->_operationResponse["reference"]);

        $this->assertEquals($this->_operationResponse["reference"], $operationResponse->getReference());
    }

    /**
     * @var OperationResponse $operationResponse
     * @depends testConstruct
     */
    public function testSetReference($operationResponse)
    {
        $operationResponse->setReference("000004");

        $this->assertEquals("000004", $operationResponse->getReference());
    }

    /**
     * @var OperationResponse $operationResponse
     * @depends testConstruct
     */
    public function testGetAmount($operationResponse)
    {
        $operationResponse->setAmount($this->_operationResponse["amount"]);

        $this->assertEquals($this->_operationResponse["amount"], $operationResponse->getAmount());
    }

    /**
     * @var OperationResponse $operationResponse
     * @depends testConstruct
     */
    public function testSetAmount($operationResponse)
    {
        $operationResponse->setAmount(200);

        $this->assertEquals(200, $operationResponse->getAmount());
    }

    /**
     * @var OperationResponse $operationResponse
     * @depends testConstruct
     */
    public function testGetCurrency($operationResponse)
    {
        $operationResponse->setCurrency($this->_operationResponse["currency"]);

        $this->assertEquals($this->_operationResponse["currency"], $operationResponse->getCurrency());
    }

    /**
     * @var OperationResponse $operationResponse
     * @depends testConstruct
     */
    public function testSetCurrency($operationResponse)
    {
        $operationResponse->setCurrency("USD");

        $this->assertEquals("USD", $operationResponse->getCurrency());
    }

    /**
     * @var OperationResponse $operationResponse
     * @depends testConstruct
     */
    public function testGetDateAuthorized($operationResponse)
    {
        $operationResponse->setDateAuthorized($this->_operationResponse["dateAuthorized"]);

        $this->assertEquals($this->_operationResponse["dateAuthorized"], $operationResponse->getDateAuthorized());
    }

    /**
     * @var OperationResponse $operationResponse
     * @depends testConstruct
     */
    public function testSetDateAuthorized($operationResponse)
    {
        $operationResponse->setDateAuthorized("2021-04-07");

        $this->assertEquals("2021-04-07", $operationResponse->getDateAuthorized());
    }
}
