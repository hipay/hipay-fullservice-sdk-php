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

namespace Unit\HiPay\Tests\Fullservice\HTTP;

use HiPay\Fullservice\Exception\ApiErrorException;
use HiPay\Fullservice\Exception\CurlException;
use HiPay\Fullservice\Exception\HttpErrorException;
use HiPay\Fullservice\Exception\InvalidArgumentException;
use HiPay\TestCase\TestCase;
use HiPay\Fullservice\HTTP\SimpleHTTPClient;
use HiPay\Fullservice\HTTP\ClientProvider;
use HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface;
use HiPay\Fullservice\HTTP\Configuration\Configuration;

/**
 *
 * @package     HiPay\Fullservice
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class SimpleHTTPClientTest extends TestCase
{

    /**
     * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::__construct()
     * @uses  \HiPay\Fullservice\HTTP\Configuration\Configuration
     */
    public function testCannotBeConstructFromInvalidArgument()
    {
        $phpversion = explode('-', phpversion());
        $sdkServerEngineVersion = $phpversion[0];

        if (version_compare($sdkServerEngineVersion, '7.0.0', '<')) {
            $this->expectError();
        } else {
            $this->expectException(\TypeError::class);

            $phpversion = explode('-', phpversion());
            $sdkServerEngineVersion = $phpversion[0];

            if (version_compare($sdkServerEngineVersion, '8.0.0', '<')) {
                $this->expectExceptionMessage("Argument 1 passed to HiPay\Fullservice\HTTP\ClientProvider::__construct() must implement interface HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface, null given");
            } else {
                $this->expectExceptionMessage('HiPay\Fullservice\HTTP\ClientProvider::__construct(): Argument #1 ($configuration) must be of type HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface, null given, called in ' . __FILE__ . ' on line 59');
            }
        }

        $client = new SimpleHTTPClient(null);
    }

    /**
     * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::__construct
     * @uses  \HiPay\Fullservice\HTTP\Configuration\Configuration
     */
    public function testCanBeConstructUsingConfiguration()
    {
        $conf = new Configuration(array('apiUsername' => "username", 'apiPassword' => "123456"));
        $client = new SimpleHTTPClient($conf);
        $this->assertInstanceOf("HiPay\Fullservice\HTTP\SimpleHTTPClient", $client);

        return $client;
    }

    /**
     * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::getConfiguration
     * @depends testCanBeConstructUsingConfiguration
     */
    public function testConfigurationCanBeRetrieved(ClientProvider $client)
    {
        $this->assertInstanceOf(
            "HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface",
            $client->getConfiguration()
        );
    }

    /**
     * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::setConfiguration
     * @depends testCanBeConstructUsingConfiguration
     */
    public function testConfigurationCanBeSetted(ClientProvider $client)
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username2",
                'apiPassword' => "654321"
            ));

        $client->setConfiguration($conf);

        $this->assertInstanceOf(
            "HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface",
            $client->getConfiguration()
        );
        $this->assertEquals("username2", $client->getConfiguration()->getApiUsername());
    }

    /**
     * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::getHttpClient
     * @depends testCanBeConstructUsingConfiguration
     */
    public function testHttpClientCanBeRetrieved(ClientProvider $client)
    {
        $this->assertNotEmpty($client->getHttpClient());

        $phpversion = explode('-', phpversion());
        $sdkServerEngineVersion = $phpversion[0];

        if (version_compare($sdkServerEngineVersion, '8.0.0', '<')) {
            $this->assertEquals(true, is_resource($client->getHttpClient()));
        } else {
            $this->assertInstanceOf(\CurlHandle::class, $client->getHttpClient());
        }
    }

    /**
     * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::request
     * @depends testCanBeConstructUsingConfiguration
     */
    public function testRequestCannotBeExcutedFromAllInvalidArguments(ClientProvider $client)
    {
        $phpversion = explode('-', phpversion());
        $sdkServerEngineVersion = $phpversion[0];
        if (version_compare($sdkServerEngineVersion, '7.0.0', '<')) {
            $this->expectError();
        } else {
            $this->expectException(\TypeError::class);
        }

        $client->request('GETTED', "1234", "foo", 1234);
    }

    /**
     * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::request
     * @depends testCanBeConstructUsingConfiguration
     */
    public function testRequestCannotBeExecutedFromRequiredInvalidMethod(ClientProvider $client)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("HTTP METHOD \"GETTED\" doesn't exist");
        $client->request('GETTED', "1234");
    }

    /**
     * @depends testCanBeConstructUsingConfiguration
     */
    public function testRequestCannotBeExecutedFromInvalidHTTPMethod(ClientProvider $client)
    {
        $this->expectException(InvalidArgumentException::class);
        $client->request(123, "1234");
    }

    /**
     * @depends testCanBeConstructUsingConfiguration
     */
    public function testRequestCannotBeExecutedFromInvalidEndpoint(ClientProvider $client)
    {
        $this->expectException(InvalidArgumentException::class);
        $client->request('GET', 1324);
    }

    /**
     * @depends testCanBeConstructUsingConfiguration
     */
    public function testRequestCanBeExecutedWithProxy(ClientProvider $client)
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'proxy' => array(
                    'host' => "127.0.0.1",
                    'port' => 25565,
                    'user' => "jDoe",
                    'password' => "1234"
                )
            )
        );

        $client->setConfiguration($conf);

        $this->expectException(CurlException::class);
        $this->expectExceptionMessage('Failed to connect to 127.0.0.1 port 25565: Connection refused');

        $client->request('GET', "/");
    }

    /**
     */
    public function testCurlExceptionIsRaisedForNetworkFailure()
    {
        $mock = $this->createMock(Configuration::class);
        $mock->method('getApiEndpoint')->willReturn('http://domain.invalid');
        $client = new SimpleHTTPClient($mock);
        $this->expectException(CurlException::class);
        $this->expectExceptionMessage("Could not resolve host");
        $client->request('GET', "/");
    }

    /**
     * https://www.mocky.io/v2/5b80129d3400005400dc0727 mocks an API error json response
     *
     */
    public function testApiErrorExceptionIsRaisedForParsableHttpResponse()
    {
        $mock = $this->createMock(Configuration::class);
        $mock->method('getApiEndpoint')->willReturn('http://www.mocky.io');
        $client = new SimpleHTTPClient($mock);
        $this->expectException(ApiErrorException::class);
        $this->expectExceptionCode(123123123);
        $client->request('GET', "/v2/5b80129d3400005400dc0727");
    }

    /**
     * https://www.mocky.io/v2/5b8013903400007700dc072b mocks a not parsable HTTP 500 error
     *
     */
    public function testHttpErrorExceptionIsRaisedForNotParsableHttpResponse()
    {
        $mock = $this->createMock(Configuration::class);
        $mock->method('getApiEndpoint')->willReturn('http://www.mocky.io');
        $client = new SimpleHTTPClient($mock);
        $this->expectException(HttpErrorException::class);
        $this->expectExceptionCode(500);
        $client->request('GET', "/v2/5b8013903400007700dc072b");
    }

    /**
     * https://www.mocky.io/v2/5d026cd63100002900ab2f83 mocks a HTTP 200
     */
    public function testHttpSuccessVaultRequest()
    {
        $mock = $this->createMock(Configuration::class);
        $mock->method('getSecureVaultEndpoint')->willReturn('http://www.mocky.io');
        $client = new SimpleHTTPClient($mock);
        $response = $client->request('GET', "/v2/5d026cd63100002900ab2f83", array(), true);
        $this->assertInstanceOf('\HiPay\Fullservice\HTTP\Response\AbstractResponse', $response);
    }

    /**
     * https://www.mocky.io/v2/5d026cd63100002900ab2f83 mocks a not parsable HTTP 500 error
     */
    public function testHttpSuccessApiRequest()
    {
        $mock = $this->createMock(Configuration::class);
        $mock->method('getApiEndpoint')->willReturn('http://www.mocky.io');

        $client = new SimpleHTTPClient($mock);
        $response = $client->request(
            'POST',
            "/v2/5d026cd63100002900ab2f83",
            array()
        );
        $this->assertInstanceOf('\HiPay\Fullservice\HTTP\Response\AbstractResponse', $response);
    }
}
