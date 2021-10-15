<?php
/**
 * HiPay Fullservice SDK PHP
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Apache 2.0 Licence
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * @copyright      Copyright (c) 2016 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */

namespace HiPay\Tests\Fullservice\Gateway\Client;

use HiPay\Fullservice\Gateway\Client\GatewayClient;
use HiPay\Fullservice\Gateway\Model\Transaction;
use HiPay\Tests\TestCase;

/**
 * Client Test class for all request send to TPP Fullservice.
 *
 * @category    HiPay
 * @package     HiPay\Tests
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class GatewayClientTest extends TestCase
{

    /**
     *
     * @var \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_config;

    /**
     *
     * @var \HiPay\Fullservice\HTTP\ClientProvider|\PHPUnit_Framework_MockObject_MockObject $_clientProvider
     */
    protected $_clientProvider;

    /**
     *
     * @var \HiPay\Fullservice\HTTP\Response\abstractResponse|PHPUnit_Framework_MockObject_MockObject
     */
    protected $_response;


    protected function setUp(): void
    {
        $this->_config = $this->getMockBuilder('\HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $this->_clientProvider = $this->getMockBuilder('\HiPay\Fullservice\HTTP\ClientProvider')
            ->setConstructorArgs(array($this->_config))
            ->getMock();

        $this->_response = $this->getMockBuilder('\HiPay\Fullservice\HTTP\Response\AbstractResponse')
            ->disableOriginalConstructor()
            ->getMock();

    }

    /**
     * @cover HiPay\Fullservice\Gateway\Client\GatewayClient::__construct
     */
    public function testCanBeConstructUsingClientProvider()
    {

        $gateway = new GatewayClient($this->_clientProvider);

        $this->assertInstanceOf("HiPay\Fullservice\Gateway\Client\GatewayClient", $gateway);

        return $gateway;
    }

    /**
     * @cover HiPay\Fullservice\Gateway\Client\GatewayClient::requestrequestHostedPaymentPage
     * @dataProvider requestHostedPaymentPageDataProvider
     *
     */
    public function testCallRequestHostedPaymentPage($request, $response)
    {

        $this->_response->method('toArray')->willReturn($response);

        $this->_clientProvider
            ->method('request')
            ->willReturn($this->_response);

        $this->_clientProvider
            ->method('getConfiguration')
            ->willReturn($this->_config);

        $gateway = $this->getMockBuilder('\HiPay\Fullservice\Gateway\Client\GatewayClient')
            ->onlyMethods(array('_serializeRequestToArray'))
            ->setConstructorArgs(array($this->_clientProvider))
            ->getMock();

        $gateway->method('_serializeRequestToArray')->willReturn($request);

        $hpp = $this->getMockBuilder('\HiPay\Fullservice\Gateway\Request\Order\HostedPaymentPageRequest')->getMock();

        $model = $gateway->requestHostedPaymentPage($hpp);

        $this->assertInstanceOf('\HiPay\Fullservice\Gateway\Model\HostedPaymentPage', $model);

        $this->assertEquals(
            'https://stage-secure-gateway.allopass.com/payment/web/pay/9eb3c963-907a-42af-8bc3-0b30b6149779',
            $model->getForwardUrl()
        );

        $this->assertEquals('00001326593', $model->getMid());
        $this->assertInstanceOf('\HiPay\Fullservice\Gateway\Model\Order', $model->getOrder());
    }

    public function requestHostedPaymentPageDataProvider()
    {
        return array(
            array(
                array(
                    "orderid" => "200000173",
                    "description" => "Commande 200000173 example@test.com",
                    "long_description" => "",
                    "currency" => "EUR",
                    "amount" => "165",
                    "shipping" => "5.0000",
                    "tax" => "0.0000",
                    "cid" => "142",
                    "ipaddr" => "",
                    "http_accept" => "*/*",
                    "http_user_agent" => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36",
                    "language" => "fr_FR",
                    "authentication_indicator" => "0",
                    "accept_url" => "http://test.com/payment/accept/",
                    "decline_url" => "http://test.com/payment/decline/",
                    "pending_url" => "http://test.com/payment/pending/",
                    "exception_url" => "http://test.com/payment/exception/",
                    "cancel_url" => "http://test.com/payment/cancel/",
                    "email" => "example@foo.com",
                    "phone" => "0101010101",
                    "gender" => "U",
                    "firstname" => "John",
                    "lastname" => "Doe",
                    "recipientinfo" => "My Company",
                    "streetaddress" => "Business Open Space",
                    "streetaddress2" => "3 allée Champlain",
                    "city" => "Sevran",
                    "zipcode" => "93270",
                    "country" => "FR",
                    "shipto_firstname" => "John",
                    "shipto_lastname" => "Doe",
                    "shipto_recipientinfo" => "my company",
                    "shipto_streetaddress" => "Business Open Space",
                    "shipto_streetaddress2" => "3 allée Champlain",
                    "shipto_city" => "Sevran",
                    "shipto_zipcode" => "93270",
                    "shipto_country" => "FR",
                    "payment_product" => "cb",
                    "operation" => "Sale",
                    "css" => "",
                    "template" => "basic-js",
                    "display_selector" => "1",
                    "payment_product_list" => "visa,mastercard,maestro",
                    "payment_product_category_list" => "credit-card",
                ),
                array(
                    "forwardUrl" => "https://stage-secure-gateway.allopass.com/payment/web/pay/9eb3c963-907a-42af-8bc3-0b30b6149779",
                    "test" => true,
                    "mid" => "00001326593",
                    "order" => array(
                        "id" => "200000173",
                        "dateCreated" => "2016-01-12T15:20:43+0000",
                        "attempts" => "0",
                        "amount" => "165.00",
                        "shipping" => "5.00",
                        "tax" => "0.00",
                        "decimals" => "2",
                        "currency" => "EUR",
                        "customerId" => "142",
                        "language" => "fr_FR",
                        "email" => "example@test.com",
                    )
                )
            )
        );
    }

    /**
     * @dataProvider requestNewOrderDataProvider
     */
    public function testRequestNewOrder($request, $response)
    {
        $this->_response->method('toArray')->willReturn($response);

        $this->_clientProvider
            ->method('request')
            ->willReturn($this->_response);

        $this->_clientProvider
            ->method('getConfiguration')
            ->willReturn($this->_config);

        $gateway = $this->getMockBuilder('\HiPay\Fullservice\Gateway\Client\GatewayClient')
            ->onlyMethods(array('_serializeRequestToArray'))
            ->setConstructorArgs(array($this->_clientProvider))
            ->getMock();

        $gateway->method('_serializeRequestToArray')->willReturn($request);

        $orderRequest = $this->getMockBuilder('\HiPay\Fullservice\Gateway\Request\Order\OrderRequest')->getMock();
        $orderRequest->device_fingerprint = "I AM THE DEVICE";
        $orderRequest->url_accept = "http://test.com/payment/accept/";

        $transaction = $gateway->requestNewOrder($orderRequest);

        $this->assertInstanceOf('\HiPay\Fullservice\Gateway\Model\Transaction', $transaction);

        $this->assertEquals(
            '',
            $transaction->getForwardUrl()
        );

        $this->assertEquals('800131273123', $transaction->getTransactionReference());
        $this->assertInstanceOf('\HiPay\Fullservice\Gateway\Model\Order', $transaction->getOrder());
    }

    public function requestNewOrderDataProvider() {
        return array(
            array(
                array(
                    "orderid" => "200000173",
                    "description" => "Commande 200000173 example@test.com",
                    "long_description" => "",
                    "currency" => "EUR",
                    "amount" => "165",
                    "shipping" => "5.0000",
                    "tax" => "0.0000",
                    "cid" => "142",
                    "ipaddr" => "",
                    "http_accept" => "*/*",
                    "http_user_agent" => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36",
                    "language" => "fr_FR",
                    "authentication_indicator" => "0",
                    "accept_url" => "http://test.com/payment/accept/",
                    "url_accept" => "http://test.com/payment/accept/",
                    "decline_url" => "http://test.com/payment/decline/",
                    "pending_url" => "http://test.com/payment/pending/",
                    "exception_url" => "http://test.com/payment/exception/",
                    "cancel_url" => "http://test.com/payment/cancel/",
                    "email" => "example@foo.com",
                    "phone" => "0101010101",
                    "gender" => "U",
                    "firstname" => "John",
                    "lastname" => "Doe",
                    "recipientinfo" => "My Company",
                    "streetaddress" => "Business Open Space",
                    "streetaddress2" => "3 allée Champlain",
                    "city" => "Sevran",
                    "zipcode" => "93270",
                    "country" => "FR",
                    "shipto_firstname" => "John",
                    "shipto_lastname" => "Doe",
                    "shipto_recipientinfo" => "my company",
                    "shipto_streetaddress" => "Business Open Space",
                    "shipto_streetaddress2" => "3 allée Champlain",
                    "shipto_city" => "Sevran",
                    "shipto_zipcode" => "93270",
                    "shipto_country" => "FR",
                    "payment_product" => "cb",
                    "operation" => "Sale",
                    "css" => "",
                    "template" => "basic-js",
                    "display_selector" => "1",
                    "payment_product_list" => "visa,mastercard,maestro",
                    "payment_product_category_list" => "credit-card",
                    "device_fingerprint" => "I AM THE DEVICE",
                ),
                array(
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
                        "cardId" => "33e3ffbb-f69c-4f51-ba40-e87e8acc961b",
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
                    "fraudScreening" => array (
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
                        "language" => "en_US",
                        "email" => "jane.doe@unknow.com",
                    ),
                    "debitAgreement" => array (
                        "id" =>"",
                        "status" => "",
                    )
                )
            )
        );
    }
}