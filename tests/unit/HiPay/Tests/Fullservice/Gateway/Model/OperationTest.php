<?php

namespace HiPay\Tests\Fullservice\Gateway\Model;

use HiPay\Fullservice\Enum\Transaction\TransactionState;
use HiPay\Fullservice\Enum\Transaction\TransactionStatus;
use HiPay\Fullservice\Gateway\Model\Operation;
use HiPay\Tests\TestCase;

class OperationTest extends TestCase
{
    private $_operation;

    public function setUp(): void
    {
        $this->_operation = array(
            "mid" => "capture",
            "authorizationCode" => "000001",
            "transactionReference" => "000002",
            "dateCreated" => "2021-06-07",
            "dateUpdated" => "2021-06-07",
            "dateAuthorized" => "2021-06-07",
            "status" => TransactionStatus::AUTHENTICATION_ATTEMPTED,
            "state" => TransactionState::COMPLETED,
            "message" => "Message",
            "authorizedAmount" => 100,
            "capturedAmount" => 100,
            "refundedAmount" => 0,
            "decimals" => 2,
            "currency" => "EUR",
            "operation" => "capture"
        );
    }

    public function testConstruct()
    {
        $operation = new Operation(
            $this->_operation["mid"],
            $this->_operation["authorizationCode"],
            $this->_operation["transactionReference"],
            $this->_operation["dateCreated"],
            $this->_operation["dateUpdated"],
            $this->_operation["dateAuthorized"],
            $this->_operation["status"],
            $this->_operation["status"],
            $this->_operation["message"],
            $this->_operation["authorizedAmount"],
            $this->_operation["capturedAmount"],
            $this->_operation["refundedAmount"],
            $this->_operation["decimals"],
            $this->_operation["currency"],
            $this->_operation["operation"]
        );

        $this->assertInstanceOf(Operation::class, $operation);

        return $operation;
    }

    /**
     * @var Operation $operation
     * @depends testConstruct
     */
    public function testGetOperation($operation)
    {
        $this->assertEquals($this->_operation["operation"], $operation->getOperation());
    }
}
