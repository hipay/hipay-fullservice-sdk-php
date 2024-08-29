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
 * @copyright      Copyright (c) 2019 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */

namespace Unit\HiPay\Tests\Fullservice\Gateway\PIDataClient;

use HiPay\Fullservice\Gateway\Model\HostedPaymentPage;
use HiPay\Fullservice\Gateway\Model\Transaction;
use HiPay\Fullservice\Gateway\PIDataClient\PIDataClient;
use HiPay\Fullservice\Gateway\Request\Order\HostedPaymentPageRequest;
use HiPay\Fullservice\Gateway\Request\Order\OrderRequest;
use HiPay\Fullservice\HTTP\Configuration\Configuration;
use HiPay\Fullservice\HTTP\SimpleHTTPClient;
use HiPay\TestCase\TestCase;


/**
 * Client Test class for all request send to Hipay's Data API.
 *
 * @category    HiPay
 * @package     HiPay\Tests
 * @author      Jean-Baptiste Louvet <jlouvet@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PIDataClientTest extends TestCase
{
    /**
     * @var \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_config;

    /**
     *
     * @var \HiPay\Fullservice\HTTP\ClientProvider|\PHPUnit_Framework_MockObject_MockObject $_clientProvider
     */
    protected $_clientProvider;

    protected function set_up()
    {
        $this->_config = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_STAGE
            ));
        $this->_clientProvider = new SimpleHTTPClient($this->_config);
    }

    /**
     * @cover HiPay\Fullservice\Gateway\PIDataClient\PIDataClient::__construct
     */
    public function testCanBeConstructUsingClientProvider()
    {
        $dataClient = new PIDataClient($this->_clientProvider);

        $this->assertInstanceOf("HiPay\Fullservice\Gateway\PIDataClient\PIDataClient", $dataClient);

        return $dataClient;
    }

    /**
     * @cover HiPay\Fullservice\Gateway\PIDataClient\PIDataClient::getDataId
     * @depends testCanBeConstructUsingClientProvider
     * @param PIDataClient $dataClient
     */
    public function testGetPredefinedDataId(PIDataClient $dataClient)
    {
        $expectedDataId = uniqid();

        $dataId = $dataClient->getDataId($expectedDataId);

        $this->assertEquals($expectedDataId, $dataId);
    }

    /**
     * @cover HiPay\Fullservice\Gateway\PIDataClient\PIDataClient::getDataId
     * @depends testCanBeConstructUsingClientProvider
     * @param PIDataClient $dataClient
     * @return string
     */
    public function testGetEmptyDataId(PIDataClient $dataClient)
    {
        $uuidFormat = '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/';

        $dataId = $dataClient->getDataId();

        $this->assertMatchesRegularExpression($uuidFormat, $dataId);

        return $dataId;
    }

    /**
     * @cover HiPay\Fullservice\Gateway\PIDataClient\PIDataClient::getOrderData
     * @depends testCanBeConstructUsingClientProvider
     * @depends testGetEmptyDataId
     */
    public function testGetOrderData(PIDataClient $dataClient, $dataId)
    {
        $domainName = "i-am-the-domain-name.com";
        $_SERVER['HTTP_HOST'] = "www." . $domainName . ":8085";

        $sourceData = array(
            "brand" => "phpunit_test",
            "brand_version" => "5.6.7",
            "integration_version" => "1.2.3"
        );

        $orderRequest = new OrderRequest();
        $orderRequest->amount = 152;
        $orderRequest->currency = "EUR";
        $orderRequest->orderid = "10052";
        $orderRequest->payment_product = "visa";
        $orderRequest->source = json_encode($sourceData);
        $orderRequest->one_click = 1;

        $transaction = new Transaction(null, null, "456118", null,
            null, null, 118, null, null, null,
            null, null, null, null, null, null,
            null, null, null, null, null, null,
            null, null, null, null, null, null,
            null, null, null, null, null);

        $composerData = json_decode(file_get_contents(__DIR__ . "/../../../../../../../composer.json"));

        $phpversion = explode('-', phpversion());
        $sdkServerEngineVersion = $phpversion[0];

        $testParams = array(
            "id" => $dataId,
            "amount" => $orderRequest->amount,
            "currency" => $orderRequest->currency,
            "order_id" => $orderRequest->orderid,
            "payment_method" => $orderRequest->payment_product,
            "components" => array(
                "cms" => $sourceData['brand'],
                "cms_version" => $sourceData['brand_version'],
                "cms_module_version" => $sourceData['integration_version'],
                "sdk_server" => "php",
                "sdk_server_version" => $composerData->version,
                "sdk_server_engine_version" => $sdkServerEngineVersion,
            ),
            "event" => "request",
            "transaction_id" => $transaction->getTransactionReference(),
            "status" => $transaction->getStatus(),
            "domain" => $domainName,
            "one_click" => boolval($orderRequest->one_click)
        );

        $params = $dataClient->getOrderData($dataId, $orderRequest, $transaction);


        $this->assertTrue(!empty($params['monitoring']['date_request']));
        $this->assertTrue(!empty($params['monitoring']['date_response']));

        $this->assertSame(152.0,$params['amount']);
        $this->assertSame(456118,$params['transaction_id']);

        $phpversion = explode('-', phpversion());
        $sdkServerEngineVersion = $phpversion[0];

        if (version_compare($sdkServerEngineVersion, '7.3.0', '<')) {
            $this->assertRegExp('/[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}:[0-9]{2}.[0-9]{3}Z/', $params['monitoring']['date_request']);
            $this->assertRegExp('/[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}:[0-9]{2}.[0-9]{3}Z/', $params['monitoring']['date_response']);
        } else {
            $this->assertMatchesRegularExpression('/[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}:[0-9]{2}.[0-9]{3}Z/', $params['monitoring']['date_request']);
            $this->assertMatchesRegularExpression('/[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}:[0-9]{2}.[0-9]{3}Z/', $params['monitoring']['date_response']);
        }

        unset($params['monitoring']);

        $this->assertEquals($testParams, $params);
    }

    /**
     * @cover HiPay\Fullservice\Gateway\PIDataClient\PIDataClient::getHPaymentData
     * @depends testCanBeConstructUsingClientProvider
     * @depends testGetEmptyDataId
     */
    public function testGetHPaymentData(PIDataClient $dataClient, $dataId)
    {
        $domainName = "i-am-the-domain-name.com";
        $_SERVER['HTTP_HOST'] = "www." . $domainName . ":8085";

        $sourceData = array(
            "brand" => "phpunit_test",
            "brand_version" => "5.6.7",
            "integration_version" => "1.2.3"
        );

        $hostedPaymentPageRequest = new HostedPaymentPageRequest();
        $hostedPaymentPageRequest->amount = 152;
        $hostedPaymentPageRequest->currency = "EUR";
        $hostedPaymentPageRequest->orderid = "10052";
        $hostedPaymentPageRequest->source = json_encode($sourceData);
        $hostedPaymentPageRequest->payment_product_list = 'visa,mastercard,maestro';
        $hostedPaymentPageRequest->template = 'test_template';

        $transaction = new HostedPaymentPage(null, null, null);

        $composerData = json_decode(file_get_contents(__DIR__ . "/../../../../../../../composer.json"));

        $phpversion = explode('-', phpversion());
        $sdkServerEngineVersion = $phpversion[0];

        $testParams = array(
            "id" => $dataId,
            "amount" => $hostedPaymentPageRequest->amount,
            "currency" => $hostedPaymentPageRequest->currency,
            "order_id" => $hostedPaymentPageRequest->orderid,
            "payment_method" => $hostedPaymentPageRequest->payment_product_list,
            "components" => array(
                "cms" => $sourceData['brand'],
                "cms_version" => $sourceData['brand_version'],
                "cms_module_version" => $sourceData['integration_version'],
                "sdk_server" => "php",
                "sdk_server_version" => $composerData->version,
                "sdk_server_engine_version" => $sdkServerEngineVersion,
                "template" => $hostedPaymentPageRequest->template
            ),
            "event" => "initHpayment",
            "domain" => $domainName
        );


        $params = $dataClient->getHPaymentData($dataId, $hostedPaymentPageRequest, $transaction);
        $this->assertTrue(!empty($params['monitoring']['date_request']));
        $this->assertTrue(!empty($params['monitoring']['date_response']));

        $phpversion = explode('-', phpversion());
        $sdkServerEngineVersion = $phpversion[0];

        if (version_compare($sdkServerEngineVersion, '7.3.0', '<')) {
            $this->assertRegExp('/[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}:[0-9]{2}.[0-9]{3}Z/', $params['monitoring']['date_request']);
            $this->assertRegExp('/[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}:[0-9]{2}.[0-9]{3}Z/', $params['monitoring']['date_response']);
        } else {
            $this->assertMatchesRegularExpression('/[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}:[0-9]{2}.[0-9]{3}Z/', $params['monitoring']['date_request']);
            $this->assertMatchesRegularExpression('/[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}:[0-9]{2}.[0-9]{3}Z/', $params['monitoring']['date_response']);
        }

        unset($params['monitoring']);

        $this->assertEquals($testParams, $params);
    }
}