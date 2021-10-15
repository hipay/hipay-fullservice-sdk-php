<?php

namespace HiPay\Tests\Fullservice\Gateway\Mapper;

use HiPay\Fullservice\Enum\Transaction\Operation;
use HiPay\Fullservice\Gateway\Model\FraudScreening;
use HiPay\Fullservice\Gateway\Model\OperationResponse;
use HiPay\Fullservice\Gateway\Model\Order;
use HiPay\Fullservice\Gateway\Model\PaymentMethod;
use HiPay\Fullservice\Gateway\Model\ThreeDSecure;
use HiPay\Fullservice\Gateway\Model\Transaction;
use HiPay\Fullservice\Gateway\Mapper\TransactionMapper;
use HiPay\Tests\TestCase;

class TransactionMapperTest extends TestCase
{
    private $_transactionMapper;

    public function setUp(): void
    {
        $this->_transactionMapper = array(
            "state" => "completed",
            "reason" => "",
            "forwardUrl" => "",
            "test" => true,
            "mid" => "00001331069",
            "attemptId" => 2,
            "authorizationCode" => "test123",
            "transactionReference" => "800131273123",
            "referenceToPay" => "",
            "dateCreated" => "2021-10-13T07:37:55+0000",
            "dateUpdated" => "2021-10-13T07:38:01+0000",
            "dateAuthorized" => "2021-10-13T07:38:00+0000",
            "status" => "118",
            "message" => "Captured",
            "authorizedAmount" => 21.60,
            "capturedAmount" => 21.60,
            "refundedAmount" => 0.00,
            "creditedAmount" => 0.00,
            "decimals" => 2,
            "currency" => "EUR",
            "ipAddress" => "172.20.0.1",
            "ipCountry" => "",
            "deviceId" => "",
            "cdata1" => "",
            "cdata2" => "",
            "cdata3" => "",
            "cdata4" => "",
            "cdata5" => "",
            "cdata6" => "",
            "cdata7" => "",
            "cdata8" => "",
            "cdata9" => "",
            "cdata10" => "",
            "avsResult" => "",
            "cvcResult" => "",
            "eci" => 7,
            "paymentProduct" => "visa",
            "paymentMethod" => array (
                "token" => "d99ef51e45b3faa3c85bbf98c88417a894a32c572db430de15de4a28651e4ebd",
                "brand" => "VISA",
                "pan" => "448412******0029",
                "cardHolder" => "Jane Doe",
                "cardExpiryMonth" => "05",
                "cardExpiryYear" => "2024",
                "issuer" => "BNP PARIBAS",
                "country" => "FR",
            ),
            "threeDSecure" => array (
                "eci" => 6,
                "enrollmentStatus" => "N",
                "enrollmentMessage" => "Cardholder Not Enrolled",
                "authenticationStatus" => "",
                "authenticationMessage" => "",
                "authenticationToken" => "",
                "xid" => ""
            ),
            "TransactionMapper" => array (
                "scoring" => 0,
                "result" => "ACCEPTED",
                "review" => ""
            ),
            "order" => array  (
                "id" => "ORDER #123461",
                "dateCreated" => "2021-10-13T07:32:56+0000",
                "attempts" => 2,
                "amount" => 21.60,
                "shipping" => 0.00,
                "tax" => 3.60,
                "decimals" => 2,
                "currency" => "EUR",
                "customerId" => "",
                "language" => "en_US"
            ),
            "debitAgreement" => array (
                "id" =>"",
                "status" => "",
            ),
            "operation" => array (
                "type" => Operation::ACCEPT_CHALLENGE,
                "id" => "000001",
                "reference" => "000002",
                "amount" => 100,
                "currency" => "EUR"
            ),
            "customData" => array (),
            "basket" => array (),
            "fraudScreening" => array(
                "scoring" => 0,
                "result" => \HiPay\Fullservice\Enum\Transaction\FraudScreening::RESULT_ACCEPTED,
                "review" => \HiPay\Fullservice\Enum\Transaction\FraudScreening::REVIEW_ALLOWED
            )
        );
    }

    public function testConstruct()
    {
        $transactionMapper = new TransactionMapper(
            $this->_transactionMapper
        );

        $this->assertInstanceOf(TransactionMapper::class, $transactionMapper);

        return $transactionMapper;
    }

    /**
     * @var TransactionMapper $transactionMapper
     * @depends testConstruct
     */
    public function testMapResponseToModel($transactionMapper)
    {
        $transaction = $transactionMapper->getModelObjectMapped();

        $this->assertInstanceOf(Transaction::class, $transaction);
        $this->assertEquals($this->_transactionMapper['mid'], $transaction->getMid());
        $this->assertEquals($this->_transactionMapper['authorizationCode'], $transaction->getAuthorizationCode());
        $this->assertEquals($this->_transactionMapper['transactionReference'], $transaction->getTransactionReference());
        $this->assertEquals($this->_transactionMapper['dateCreated'], $transaction->getDateCreated());
        $this->assertEquals($this->_transactionMapper['dateUpdated'], $transaction->getDateUpdated());
        $this->assertEquals($this->_transactionMapper['dateAuthorized'], $transaction->getDateAuthorized());
        $this->assertEquals($this->_transactionMapper['status'], $transaction->getStatus());
        $this->assertEquals($this->_transactionMapper['state'], $transaction->getState());
        $this->assertEquals($this->_transactionMapper['message'], $transaction->getMessage());
        $this->assertEquals($this->_transactionMapper['authorizedAmount'], $transaction->getAuthorizedAmount());
        $this->assertEquals($this->_transactionMapper['capturedAmount'], $transaction->getCapturedAmount());
        $this->assertEquals($this->_transactionMapper['refundedAmount'], $transaction->getRefundedAmount());
        $this->assertEquals($this->_transactionMapper['decimals'], $transaction->getDecimals());
        $this->assertEquals($this->_transactionMapper['currency'], $transaction->getCurrency());
        $this->assertEquals($this->_transactionMapper['reason'], $transaction->getReason());
        $this->assertEquals($this->_transactionMapper['forwardUrl'], $transaction->getForwardUrl());
        $this->assertEquals($this->_transactionMapper['attemptId'], $transaction->getAttemptId());
        $this->assertEquals($this->_transactionMapper['referenceToPay'], $transaction->getReferenceToPay());
        $this->assertEquals($this->_transactionMapper['ipAddress'], $transaction->getIpAddress());
        $this->assertEquals($this->_transactionMapper['ipCountry'], $transaction->getIpCountry());
        $this->assertEquals($this->_transactionMapper['deviceId'], $transaction->getDeviceId());
        $this->assertEquals($this->_transactionMapper['avsResult'], $transaction->getAvsResult());
        $this->assertEquals($this->_transactionMapper['cvcResult'], $transaction->getCvcResult());
        $this->assertEquals($this->_transactionMapper['eci'], $transaction->getEci());
        $this->assertEquals($this->_transactionMapper['paymentProduct'], $transaction->getPaymentProduct());
        $this->assertEquals($this->_transactionMapper['debitAgreement'], $transaction->getDebitAgreement());
        $this->assertEquals($this->_transactionMapper['basket'], $transaction->getBasket());
        $this->assertEquals($this->_transactionMapper['customData'], $transaction->getCustomData());

        $this->assertInstanceOf(OperationResponse::class, $transaction->getOperation());
        $this->assertEquals($this->_transactionMapper['operation'], $transaction->getOperation()->toArray());

        $this->assertInstanceOf(FraudScreening::class, $transaction->getFraudScreening());
        $this->assertEquals($this->_transactionMapper['fraudScreening'], $transaction->getFraudScreening()->toArray());

        $this->assertInstanceOf(Order::class, $transaction->getOrder());
        $this->assertEquals($this->_transactionMapper['order'], $transaction->getOrder()->toArray());

        $this->assertInstanceOf(ThreeDSecure::class, $transaction->getThreeDSecure());
        $this->assertEquals($this->_transactionMapper['threeDSecure'], $transaction->getThreeDSecure()->toArray());

        $this->assertInstanceOf(PaymentMethod::class, $transaction->getPaymentMethod());
        $this->assertEquals($this->_transactionMapper['paymentMethod'], $transaction->getPaymentMethod()->toArray());
    }
}
