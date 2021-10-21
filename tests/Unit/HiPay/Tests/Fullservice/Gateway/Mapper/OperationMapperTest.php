<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Mapper;

use HiPay\Fullservice\Enum\Transaction\TransactionState;
use HiPay\Fullservice\Enum\Transaction\TransactionStatus;
use HiPay\Fullservice\Gateway\Mapper\OperationMapper;
use HiPay\Fullservice\Gateway\Model\Operation;
use HiPay\TestCase\TestCase;

class OperationMapperTest extends TestCase
{
    private $_operationMapper;

    public function setUp(): void
    {
        $this->_operationMapper = array(
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
        $operationMapper = new OperationMapper(
            $this->_operationMapper
        );

        $this->assertInstanceOf(OperationMapper::class, $operationMapper);

        return $operationMapper;
    }

    /**
     * @var OperationMapper $operationMapper
     * @depends testConstruct
     */
    public function testMapResponseToModel($operationMapper)
    {
        $operation = $operationMapper->getModelObjectMapped();

        $this->assertInstanceOf(Operation::class, $operation);
        $this->assertEquals($this->_operationMapper['mid'], $operation->getMid());
        $this->assertEquals($this->_operationMapper['authorizationCode'], $operation->getAuthorizationCode());
        $this->assertEquals($this->_operationMapper['transactionReference'], $operation->getTransactionReference());
        $this->assertEquals($this->_operationMapper['dateCreated'], $operation->getDateCreated());
        $this->assertEquals($this->_operationMapper['dateUpdated'], $operation->getDateUpdated());
        $this->assertEquals($this->_operationMapper['dateAuthorized'], $operation->getDateAuthorized());
        $this->assertEquals($this->_operationMapper['status'], $operation->getStatus());
        $this->assertNull($operation->getState());
        $this->assertEquals($this->_operationMapper['message'], $operation->getMessage());
        $this->assertEquals($this->_operationMapper['authorizedAmount'], $operation->getAuthorizedAmount());
        $this->assertEquals($this->_operationMapper['capturedAmount'], $operation->getCapturedAmount());
        $this->assertEquals($this->_operationMapper['refundedAmount'], $operation->getRefundedAmount());
        $this->assertEquals($this->_operationMapper['decimals'], $operation->getDecimals());
        $this->assertEquals($this->_operationMapper['currency'], $operation->getCurrency());
        $this->assertEquals($this->_operationMapper['operation'], $operation->getOperation());

    }
}
