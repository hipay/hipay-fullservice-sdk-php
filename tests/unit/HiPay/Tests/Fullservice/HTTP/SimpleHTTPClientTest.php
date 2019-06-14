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

namespace HiPay\Tests\Fullservice\HTTP;

use HiPay\Tests\TestCase;
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
     * @expectedException TypeError
     * @expectedExceptionMessage  Argument 1 passed to HiPay\Fullservice\HTTP\ClientProvider::__construct() must implement interface HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface, null given
     */
    public function testCannotBeConstructFromInvalidArgument()
    {
        $client = new SimpleHTTPClient(null);
    }

    /**
     * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::__construct
     * @uses  \HiPay\Fullservice\HTTP\Configuration\Configuration
     */
    public function testCanBeConstructUsingConfiguration()
    {
        $conf = new Configuration("username", "123456");
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
        $conf = new Configuration("username2", "654321");
        $client->setConfiguration($conf);

        $this->assertInstanceOf(
            "HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface",
            $client->getConfiguration()
        );
        $this->assertEquals("username2", $client->getConfiguration()->getApiUsername());
    }

    /**
     * @depends testCanBeConstructUsingConfiguration
     */
    public function testHttpClientCanBeRetrieved(ClientProvider $client)
    {
        $this->assertNotEmpty($client->getHttpClient());
        $this->assertEquals(true, is_resource($client->getHttpClient()));
    }

    /**
     * @depends testCanBeConstructUsingConfiguration
     * @expectedException TypeError
     */
    public function testRequestCannotBeExecutedFromAllInvalidArguments(ClientProvider $client)
    {
        $client->request('GET', "1234", "foo", 1234);
    }

    /**
     * @depends testCanBeConstructUsingConfiguration
     * @expectedException InvalidArgumentException
     */
    public function testRequestCannotBeExecutedFromInvalidHTTPMethod(ClientProvider $client)
    {
        $client->request(123, "1234");
    }

    /**
     * @depends testCanBeConstructUsingConfiguration
     * @expectedException InvalidArgumentException
     */
    public function testRequestCannotBeExecutedFromInvalidEndpoint(ClientProvider $client)
    {
        $client->request('GET', 1324);
    }

    /**
     * @depends testCanBeConstructUsingConfiguration
     * @expectedException HiPay\Fullservice\Exception\InvalidArgumentException
     */
    public function testRequestCannotBeExecutedFromRequiredInvalidArguments(ClientProvider $client)
    {
        $this->markTestSkipped(
            'HTTP method and Uri validator not implemented yet :-( '
        );

        $client->request('GETTED', "1234");
    }

    /**
     * @expectedException HiPay\Fullservice\Exception\CurlException
     * @expectedExceptionMessage Could not resolve host
     */
    public function testCurlExceptionIsRaisedForNetworkFailure()
    {
        $mock = $this->createMock(Configuration::class);
        $mock->method('getApiEndpoint')->willReturn('http://domain.invalid');
        $client = new SimpleHTTPClient($mock);
        $client->request('GET', "/");
    }

    /**
     * http://www.mocky.io/v2/5b80129d3400005400dc0727 mocks an API error json response
     *
     * @expectedException HiPay\Fullservice\Exception\ApiErrorException
     * @expectedExceptionCode 123123123
     */
    public function testApiErrorExceptionIsRaisedForParsableHttpResponse()
    {
        $mock = $this->createMock(Configuration::class);
        $mock->method('getApiEndpoint')->willReturn('http://www.mocky.io');
        $client = new SimpleHTTPClient($mock);
        $client->request('GET', "/v2/5b80129d3400005400dc0727");
    }

    /**
     * http://www.mocky.io/v2/5b8013903400007700dc072b mocks a not parsable HTTP 500 error
     *
     * @expectedException HiPay\Fullservice\Exception\HttpErrorException
     * @expectedExceptionCode 500
     */
    public function testHttpErrorExceptionIsRaisedForNotParsableHttpResponse()
    {
        $mock = $this->createMock(Configuration::class);
        $mock->method('getApiEndpoint')->willReturn('http://www.mocky.io');
        $client = new SimpleHTTPClient($mock);
        $client->request('GET', "/v2/5b8013903400007700dc072b");
    }

    /**
     * http://www.mocky.io/v2/5d026cd63100002900ab2f83 mocks a HTTP 200
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
     * http://www.mocky.io/v2/5d026cd63100002900ab2f83 mocks a not parsable HTTP 500 error
     */
    public function testHttpSuccessApiRequest()
    {
        $mock = $this->createMock(Configuration::class);
        $mock->method('getApiEndpoint')->willReturn('http://www.mocky.io');
        $mock->method('getProxy')->willReturn(
            array(
                "host" => "http://hipay.com",
                "port" => "80",
                "user" => "user",
                "password" => "password"
            )
        );

        $client = new SimpleHTTPClient($mock);
        $response = $client->request(
            'POST',
            "/v2/5d026cd63100002900ab2f83",
            array()
        );
        $this->assertInstanceOf('\HiPay\Fullservice\HTTP\Response\AbstractResponse', $response);
    }
}
