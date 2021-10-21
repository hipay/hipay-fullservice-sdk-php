<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model;

use HiPay\Fullservice\Data\PaymentProduct;
use HiPay\Fullservice\Enum\Cart\TypeItems;
use HiPay\Fullservice\Enum\Customer\Gender;
use HiPay\Fullservice\Enum\Transaction\AVSResult;
use HiPay\Fullservice\Enum\Transaction\CVCResult;
use HiPay\Fullservice\Enum\Transaction\ECI;
use HiPay\Fullservice\Enum\Transaction\TransactionState;
use HiPay\Fullservice\Enum\Transaction\TransactionStatus;
use HiPay\Fullservice\Gateway\Model\FraudScreening;
use HiPay\Fullservice\Gateway\Model\OperationResponse;
use HiPay\Fullservice\Gateway\Model\Order;
use HiPay\Fullservice\Gateway\Model\PaymentMethod;
use HiPay\Fullservice\Gateway\Model\ThreeDSecure;
use HiPay\Fullservice\Gateway\Model\Transaction;
use HiPay\TestCase\TestCase;

class TransactionTest extends TestCase
{
    private $_transactionData;

    public function setUp(): void
    {
        $paymentProduct = new PaymentProduct(array());

        $paymentMethod = new PaymentMethod(
            "d99ef51e45b3faa3c85bbf98c88417a894a32c572db430de15de4a28651e4ebd",
            "VISA",
            "4484120000000029",
            "Jane Doe",
            "05",
            "2024",
            "BNP Paribas",
            "France"
        );

        $threeDSecure = new ThreeDSecure(
            "000006",
            "000007",
            "000008",
            "000009",
            "000010",
            "000011",
            "000012"
        );

        $fraudScreening = new FraudScreening(
            0,
            \HiPay\Fullservice\Enum\Transaction\FraudScreening::RESULT_ACCEPTED,
            \HiPay\Fullservice\Enum\Transaction\FraudScreening::RESULT_ACCEPTED
        );

        $order = new Order(
            "0000013",
            "0000014",
            50,
            20,
            2,
            "2021-06-07",
            1,
            "EUR",
            2,
            Gender::FEMALE,
            "FR",
            "56 avenue de la paix, 75000 Paris"

        );

        $debitAgreement = array();

        $operation = new OperationResponse(
            "capture",
            "0000015",
            "0000016",
            20,
            "EUR",
            "2021-06-07"
        );

        $this->_transactionData = array(
            "mid" => "000001",
            "authorizationCode" => "1234",
            "transactionReference" => "000002",
            "dateCreated" => "2020-05-01T11:22:00Z",
            "dateUpdated" => "2020-05-02T11:22:00Z",
            "dateAuthorized" => "2020-05-03T11:22:00Z",
            "status" => TransactionStatus::ACQUIRER_FOUND,
            "state" => TransactionState::COMPLETED,
            "message" => "Transaction message",
            "authorizedAmount" => 20.0,
            "capturedAmount" => 20.0,
            "refundedAmount" => 0.0,
            "decimals" => 2,
            "currency" => "EUR",
            "reason" => "DU",
            "forwardUrl" => "https://test.com/forward-url/",
            "attemptId" => "000003",
            "referenceToPay" => "000004",
            "ipAddress" => "127.0.0.1",
            "ipCountry" => "FRANCE",
            "deviceId" => "000005",
            "avsResult" => AVSResult::ADDRESS_MATCH,
            "cvcResult" => CVCResult::MATCH,
            "eci" => ECI::INSTALLMENT_PAYMENT,
            "paymentProduct" => $paymentProduct,
            "paymentMethod" => $paymentMethod,
            "threeDScreening" => $threeDSecure,
            "fraudScreening" => $fraudScreening,
            "order" => $order,
            "debitAgreement" => $debitAgreement,
            "basket" => null,
            "operation" => $operation,
            "customData" => null
        );

    }

    public function testConstruct()
    {

        $transaction = new Transaction(
            $this->_transactionData["mid"],
            $this->_transactionData["authorizationCode"],
            $this->_transactionData["transactionReference"],
            $this->_transactionData["dateCreated"],
            $this->_transactionData["dateUpdated"],
            $this->_transactionData["dateAuthorized"],
            $this->_transactionData["status"],
            $this->_transactionData["state"],
            $this->_transactionData["message"],
            $this->_transactionData["authorizedAmount"],
            $this->_transactionData["capturedAmount"],
            $this->_transactionData["refundedAmount"],
            $this->_transactionData["decimals"],
            $this->_transactionData["currency"],
            $this->_transactionData["reason"],
            $this->_transactionData["forwardUrl"],
            $this->_transactionData["attemptId"],
            $this->_transactionData["referenceToPay"],
            $this->_transactionData["ipAddress"],
            $this->_transactionData["ipCountry"],
            $this->_transactionData["deviceId"],
            $this->_transactionData["avsResult"],
            $this->_transactionData["cvcResult"],
            $this->_transactionData["eci"],
            $this->_transactionData["paymentProduct"],
            $this->_transactionData["paymentMethod"],
            $this->_transactionData["threeDScreening"],
            $this->_transactionData["fraudScreening"],
            $this->_transactionData["order"],
            $this->_transactionData["debitAgreement"],
            $this->_transactionData["basket"],
            $this->_transactionData["operation"],
            $this->_transactionData["customData"]
        );

        $this->assertInstanceOf(Transaction::class, $transaction);

        return $transaction;
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetCustomData($transaction)
    {
        $this->assertNull($transaction->getCustomData());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetTransactionReference($transaction)
    {
        $this->assertEquals($this->_transactionData['transactionReference'], $transaction->getTransactionReference());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetReason($transaction)
    {
        $this->assertEquals($this->_transactionData['reason'], $transaction->getReason());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetForwardUrl($transaction)
    {
        $this->assertEquals($this->_transactionData['forwardUrl'], $transaction->getForwardUrl());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetAttemptId($transaction)
    {
        $this->assertEquals($this->_transactionData['attemptId'], $transaction->getAttemptId());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetReferenceToPay($transaction)
    {
        $this->assertEquals($this->_transactionData['referenceToPay'], $transaction->getReferenceToPay());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetIpAddress($transaction)
    {
        $this->assertEquals($this->_transactionData['ipAddress'], $transaction->getIpAddress());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetIpCountry($transaction)
    {
        $this->assertEquals($this->_transactionData['ipCountry'], $transaction->getIpCountry());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetDeviceId($transaction)
    {
        $this->assertEquals($this->_transactionData['deviceId'], $transaction->getDeviceId());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetAvsResult($transaction)
    {
        $this->assertEquals($this->_transactionData['avsResult'], $transaction->getAvsResult());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetCvcResult($transaction)
    {
        $this->assertEquals($this->_transactionData['cvcResult'], $transaction->getCvcResult());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetEci($transaction)
    {
        $this->assertEquals($this->_transactionData['eci'], $transaction->getEci());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetPaymentProduct($transaction)
    {
        $this->assertEquals($this->_transactionData['paymentProduct'], $transaction->getPaymentProduct());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetPaymentMethod($transaction)
    {
        $this->assertEquals($this->_transactionData['paymentMethod'], $transaction->getPaymentMethod());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetThreeDSecure($transaction)
    {
        $this->assertEquals($this->_transactionData['threeDScreening'], $transaction->getThreeDSecure());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetFraudScreening($transaction)
    {
        $this->assertEquals($this->_transactionData['fraudScreening'], $transaction->getFraudScreening());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetOrder($transaction)
    {
        $this->assertEquals($this->_transactionData['order'], $transaction->getOrder());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetDebitAgreement($transaction)
    {
        $this->assertEquals($this->_transactionData['debitAgreement'], $transaction->getDebitAgreement());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetOperation($transaction)
    {
        $this->assertEquals($this->_transactionData['operation'], $transaction->getOperation());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetBasket($transaction)
    {
        $this->assertNull($transaction->getBasket());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetMid($transaction)
    {
        $this->assertEquals($this->_transactionData['mid'], $transaction->getMid());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetAuthorizationCode($transaction)
    {
        $this->assertEquals($this->_transactionData['authorizationCode'], $transaction->getAuthorizationCode());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetDateCreated($transaction)
    {
        $this->assertEquals($this->_transactionData['dateCreated'], $transaction->getDateCreated());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetDateUpdated($transaction)
    {
        $this->assertEquals($this->_transactionData['dateUpdated'], $transaction->getDateUpdated());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetDateAuthorized($transaction)
    {
        $this->assertEquals($this->_transactionData['dateAuthorized'], $transaction->getDateAuthorized());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetState($transaction)
    {
        $this->assertEquals($this->_transactionData['state'], $transaction->getState());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetMessage($transaction)
    {
        $this->assertEquals($this->_transactionData['message'], $transaction->getMessage());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetAuthorizedAmount($transaction)
    {
        $this->assertEquals($this->_transactionData['authorizedAmount'], $transaction->getAuthorizedAmount());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetCapturedAmount($transaction)
    {
        $this->assertEquals($this->_transactionData['capturedAmount'], $transaction->getCapturedAmount());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetRefundedAmount($transaction)
    {
        $this->assertEquals($this->_transactionData['refundedAmount'], $transaction->getRefundedAmount());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetDecimals($transaction)
    {
        $this->assertEquals($this->_transactionData['decimals'], $transaction->getDecimals());
    }

    /**
     * @var Transaction $transaction
     * @depends testConstruct
     */
    public function testGetCurrency($transaction)
    {
        $this->assertEquals($this->_transactionData['currency'], $transaction->getCurrency());
    }
}