<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Mapper;

use HiPay\Fullservice\Enum\Transaction\Operation;
use HiPay\Fullservice\Gateway\Model\FraudScreening;
use HiPay\Fullservice\Gateway\Model\OperationResponse;
use HiPay\Fullservice\Gateway\Model\Order;
use HiPay\Fullservice\Gateway\Model\PaymentMethod;
use HiPay\Fullservice\Gateway\Model\ThreeDSecure;
use HiPay\Fullservice\Gateway\Model\Transaction;
use HiPay\Fullservice\Gateway\Mapper\TransactionMapper;
use HiPay\TestCase\TestCase;

class TransactionMapperTest extends TestCase
{
    private $_transactionMapper;

    public function setUp(): void
    {
        $this->_transactionMapper = array(
            "state" => "completed",
            "reason" => "",
            "forward_url" => "",
            "test" => true,
            "mid" => "00001331069",
            "attempt_id" => 2,
            "authorization_code" => "test123",
            "transaction_reference" => "800131273123",
            "reference_to_pay" => "",
            "date_created" => "2021-10-13T07:37:55+0000",
            "date_updated" => "2021-10-13T07:38:01+0000",
            "date_authorized" => "2021-10-13T07:38:00+0000",
            "status" => "118",
            "message" => "Captured",
            "authorized_amount" => 21.60,
            "captured_amount" => 21.60,
            "refunded_amount" => 0.00,
            "credited_amount" => 0.00,
            "decimals" => 2,
            "currency" => "EUR",
            "ip_address" => "172.20.0.1",
            "ip_country" => "",
            "device_id" => "",
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
            "avs_result" => "",
            "cvc_result" => "",
            "eci" => 7,
            "payment_product" => "visa",
            "payment_method" => array (
                "token" => "d99ef51e45b3faa3c85bbf98c88417a894a32c572db430de15de4a28651e4ebd",
                "brand" => "VISA",
                "pan" => "448412******0029",
                "card_holder" => "Jane Doe",
                "card_expiry_month" => "05",
                "card_expiry_year" => "2024",
                "issuer" => "BNP PARIBAS",
                "country" => "FR",
            ),
            "three_d_secure" => array (
                "eci" => 6,
                "enrollment_status" => "N",
                "enrollment_message" => "Cardholder Not Enrolled",
                "authentication_status" => "",
                "authentication_message" => "",
                "authentication_token" => "",
                "xid" => ""
            ),
            "transaction_mapper" => array (
                "scoring" => 0,
                "result" => "ACCEPTED",
                "review" => ""
            ),
            "order" => array  (
                "id" => "ORDER #123461",
                "date_created" => "2021-10-13T07:32:56+0000",
                "attempts" => 2,
                "amount" => 21.60,
                "shipping" => 0.00,
                "tax" => 3.60,
                "decimals" => 2,
                "currency" => "EUR",
                "customer_id" => "",
                "language" => "en_US"
            ),
            "debit_agreement" => array (
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
            "custom_data" => array (),
            "basket" => array (),
            "fraud_screening" => array(
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
        $this->assertEquals($this->_transactionMapper['authorization_code'], $transaction->getAuthorizationCode());
        $this->assertEquals($this->_transactionMapper['transaction_reference'], $transaction->getTransactionReference());
        $this->assertEquals($this->_transactionMapper['date_created'], $transaction->getDateCreated());
        $this->assertEquals($this->_transactionMapper['date_updated'], $transaction->getDateUpdated());
        $this->assertEquals($this->_transactionMapper['date_authorized'], $transaction->getDateAuthorized());
        $this->assertEquals($this->_transactionMapper['status'], $transaction->getStatus());
        $this->assertEquals($this->_transactionMapper['state'], $transaction->getState());
        $this->assertEquals($this->_transactionMapper['message'], $transaction->getMessage());
        $this->assertEquals($this->_transactionMapper['authorized_amount'], $transaction->getAuthorizedAmount());
        $this->assertEquals($this->_transactionMapper['captured_amount'], $transaction->getCapturedAmount());
        $this->assertEquals($this->_transactionMapper['refunded_amount'], $transaction->getRefundedAmount());
        $this->assertEquals($this->_transactionMapper['decimals'], $transaction->getDecimals());
        $this->assertEquals($this->_transactionMapper['currency'], $transaction->getCurrency());
        $this->assertEquals($this->_transactionMapper['reason'], $transaction->getReason());
        $this->assertEquals($this->_transactionMapper['forward_url'], $transaction->getForwardUrl());
        $this->assertEquals($this->_transactionMapper['attempt_id'], $transaction->getAttemptId());
        $this->assertEquals($this->_transactionMapper['reference_to_pay'], $transaction->getReferenceToPay());
        $this->assertEquals($this->_transactionMapper['ip_address'], $transaction->getIpAddress());
        $this->assertEquals($this->_transactionMapper['ip_country'], $transaction->getIpCountry());
        $this->assertEquals($this->_transactionMapper['device_id'], $transaction->getDeviceId());
        $this->assertEquals($this->_transactionMapper['avs_result'], $transaction->getAvsResult());
        $this->assertEquals($this->_transactionMapper['cvc_result'], $transaction->getCvcResult());
        $this->assertEquals($this->_transactionMapper['eci'], $transaction->getEci());
        $this->assertEquals($this->_transactionMapper['payment_product'], $transaction->getPaymentProduct());
        $this->assertEquals($this->_transactionMapper['debit_agreement'], $transaction->getDebitAgreement());
        $this->assertEquals($this->_transactionMapper['basket'], $transaction->getBasket());
        $this->assertEquals($this->_transactionMapper['custom_data'], $transaction->getCustomData());

        $this->assertInstanceOf(OperationResponse::class, $transaction->getOperation());
        $this->assertEquals($this->_transactionMapper['operation'], $transaction->getOperation()->toArray());

        $this->assertInstanceOf(FraudScreening::class, $transaction->getFraudScreening());
        $this->assertEquals($this->_transactionMapper['fraud_screening'], $transaction->getFraudScreening()->toArray());

        $this->assertInstanceOf(Order::class, $transaction->getOrder());
        $this->assertEquals($this->_transactionMapper['order'], $transaction->getOrder()->toArray());

        $this->assertInstanceOf(ThreeDSecure::class, $transaction->getThreeDSecure());
        $this->assertEquals($this->_transactionMapper['three_d_secure'], $transaction->getThreeDSecure()->toArray());

        $this->assertInstanceOf(PaymentMethod::class, $transaction->getPaymentMethod());
        $this->assertEquals($this->_transactionMapper['payment_method'], $transaction->getPaymentMethod()->toArray());
    }
}
