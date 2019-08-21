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

namespace HiPay\Tests\Fullservice\HTTP\Configuration;

use HiPay\Fullservice\HTTP\Configuration\Configuration;
use HiPay\Tests\TestCase;
use PHPUnit\Framework\Error\Deprecated;

/**
 * @category    HiPay
 * @package     HiPay\Tests
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class ConfigurationTest extends TestCase
{

    /**
     * @covers HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     * @expectedException HiPay\Fullservice\Exception\InvalidArgumentException
     */
    public function testCannotBeConstructUsingInvalidUsernameArgument()
    {

        $conf = new Configuration(array('apiUsername' => 34, 'apiPassword' => "123456"));


    }

    /**
     * @covers HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     * @expectedException HiPay\Fullservice\Exception\InvalidArgumentException
     */
    public function testCannotBeConstructUsingEmptyUsernameArgument()
    {

        $conf = new Configuration(array('apiUsername' => "", 'apiPassword' => "123456"));

    }

    /**
     * @covers HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     * @expectedException HiPay\Fullservice\Exception\InvalidArgumentException
     */
    public function testCannotBeConstructUsingInvalidPasswordArgument()
    {

        $conf = new Configuration(array('apiUsername' => "username", 'apiPassword' => null));

    }

    /**
     * @covers HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     * @expectedException HiPay\Fullservice\Exception\InvalidArgumentException
     */
    public function testCannotBeConstructUsingEmptyPasswordArgument()
    {

        $conf = new Configuration(array('apiUsername' => "username", 'apiPassword' => ""));

    }

    /**
     * @covers HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     * @expectedException HiPay\Fullservice\Exception\UnexpectedValueException
     */
    public function testCannotBeConstructUsingInvalidApiEnvArgument()
    {

        $conf = new Configuration(array('apiUsername' => "username", 'apiPassword' => "123456", 'apiEnv' => "prod"));

    }

    /**
     * @covers HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     * @expectedException HiPay\Fullservice\Exception\UnexpectedValueException
     */
    public function testCannotBeConstructUsingInvalidHTTPHeaderAcceptArgument()
    {

        $conf = new Configuration(
            array('apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_PRODUCTION,
                'apiHTTPHeaderAccept' => 'application/xml'
            ));

    }

    /**
     * @covers HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     * @expectedException HiPay\Fullservice\Exception\UnexpectedValueException
     */
    public function testCannotBeConstructUsingEmptyHTTPHeaderAcceptArgument()
    {

        $conf = new Configuration(
            array('apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_PRODUCTION,
                'apiHTTPHeaderAccept' => ''
            ));

    }

    /**
     * @covers HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCanBeConstructFromRequiredArguments()
    {

        $conf = new Configuration(
            array('apiUsername' => "username",
                'apiPassword' => "123456"
            ));

        $this->assertInstanceOf("HiPay\Fullservice\HTTP\Configuration\Configuration", $conf);

        return $conf;
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCanBeConstructFromApiEnvArguments()
    {
        $conf = new Configuration("username", "123456", Configuration::API_ENV_STAGE);

        $this->assertInstanceOf("HiPay\Fullservice\HTTP\Configuration\Configuration", $conf);

        return $conf;
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCanBeConstructFromAllArguments()
    {
        $conf = new Configuration(
            "username",
            "123456",
            Configuration::API_ENV_PRODUCTION,
            'application/json',
            array("host" => "test", "port" => "test", "user" => "test", "password" => "test")
        );

        $this->assertInstanceOf("HiPay\Fullservice\HTTP\Configuration\Configuration", $conf);

        return $conf;
    }

    /**
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getApiUsername
     * @depends testCanBeConstructFromRequiredArguments
     * @param Configuration $conf
     */
    public function testApiUsernameCanBeRetrieved(Configuration $conf)
    {
        $this->assertEquals('username', $conf->getApiUsername());
    }

    /**
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getApiPassword
     * @depends testCanBeConstructFromRequiredArguments
     * @param Configuration $conf
     */
    public function testApiPassorwdCanBeRetrieved(Configuration $conf)
    {
        $this->assertEquals('123456', $conf->getApiPassword());
    }

    /**
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getApiEnv
     * @depends testCanBeConstructFromAllArguments
     * @param Configuration $conf
     */
    public function testApiEnvCanBeRetrieved(Configuration $conf)
    {
        $this->assertEquals(Configuration::API_ENV_PRODUCTION, $conf->getApiEnv());
    }

    /**
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getApiHTTPHeaderAccept
     * @depends testCanBeConstructFromAllArguments
     * @param Configuration $conf
     */
    public function testApiHTTPHeaderAcceptCanBeRetrieved(Configuration $conf)
    {
        $this->assertEquals('application/json', $conf->getApiHTTPHeaderAccept());
    }

    /**
     * @depends testCanBeConstructFromAllArguments
     * @param Configuration $conf
     */
    public function testApiEndpointProdCanBeRetrieved(Configuration $conf)
    {
        $this->assertEquals("https://secure-gateway.hipay-tpp.com/rest/", $conf->getApiEndpointProd());
        $this->assertEquals("https://secure2-vault.hipay-tpp.com/rest/", $conf->getSecureVaultEndpointProd());
    }

    /**
     * @depends testCanBeConstructFromApiEnvArguments
     * @param Configuration $conf
     */
    public function testApiEndpointStageCanBeRetrieved(Configuration $conf)
    {
        $this->assertEquals("https://stage-secure-gateway.hipay-tpp.com/rest/", $conf->getApiEndpointStage());
        $this->assertEquals("https://stage-secure2-vault.hipay-tpp.com/rest/", $conf->getSecureVaultEndpointStage());
    }

    /**
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getApiEndpoint
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getSecureVaultEndpoint
     * @depends testCanBeConstructFromApiEnvArguments
     * @param Configuration $conf
     */
    public function testApiEndpointCanBeRetrieved(Configuration $conf)
    {
        $this->assertEquals("https://stage-secure-gateway.hipay-tpp.com/rest/", $conf->getApiEndpoint());
        $this->assertEquals("https://stage-secure2-vault.hipay-tpp.com/rest/", $conf->getSecureVaultEndpoint());
        $this->assertEquals(Configuration::API_ENV_STAGE, $conf->getApiEnv());
    }

    /**
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getProxy
     * @depends testCanBeConstructFromAllArguments
     * @param Configuration $conf
     */
    public function testProxyCanBeRetrieved(Configuration $conf)
    {
        $proxy = array("host" => "test", "port" => "test", "user" => "test", "password" => "test");

        $this->assertEquals($proxy, $conf->getProxy());
    }
}
