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

namespace Unit\HiPay\Tests\Fullservice\HTTP\Configuration;

use HiPay\Fullservice\Exception\InvalidArgumentException;
use HiPay\Fullservice\Exception\UnexpectedValueException;
use HiPay\Fullservice\HTTP\Configuration\Configuration;
use HiPay\TestCase\TestCase;
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
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCannotBeConstructUsingInvalidUsernameArgument()
    {
        $this->expectException(InvalidArgumentException::class);
        $conf = new Configuration(array('apiUsername' => 34, 'apiPassword' => "123456"));
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCannotBeConstructUsingEmptyUsernameArgument()
    {
        $this->expectException(InvalidArgumentException::class);
        $conf = new Configuration(array('apiUsername' => "", 'apiPassword' => "123456"));
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCannotBeConstructUsingInvalidPasswordArgument()
    {
        $this->expectException(InvalidArgumentException::class);
        $conf = new Configuration(array('apiUsername' => "username", 'apiPassword' => null));
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCannotBeConstructUsingEmptyPasswordArgument()
    {
        $this->expectException(InvalidArgumentException::class);
        $conf = new Configuration(array('apiUsername' => "username", 'apiPassword' => ""));
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCannotBeConstructUsingInvalidApiEnvArgument()
    {
        $this->expectException(UnexpectedValueException::class);
        $conf = new Configuration(array('apiUsername' => "username", 'apiPassword' => "123456", 'apiEnv' => "prod"));
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCannotBeConstructUsingInvalidHTTPHeaderAcceptArgument()
    {
        $this->expectException(UnexpectedValueException::class);
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_PRODUCTION,
                'apiHTTPHeaderAccept' => 'application/xml'
            )
        );
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCannotBeConstructUsingEmptyHTTPHeaderAcceptArgument()
    {
        $this->expectException(UnexpectedValueException::class);
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_PRODUCTION,
                'apiHTTPHeaderAccept' => ''
            )
        );
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCannotBeConstructUsingInvalidProxyArgument()
    {
        $this->expectException(UnexpectedValueException::class);
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_PRODUCTION,
                'apiHTTPHeaderAccept' => 'application/json',
                'proxy' => array("test" => "test")
            )
        );
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCannotBeConstructUsingInvalidHostedPageV2Argument()
    {
        $this->expectException(InvalidArgumentException::class);
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_PRODUCTION,
                'apiHTTPHeaderAccept' => 'application/json',
                'hostedPageV2' => 1
            )
        );
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCanBeConstructFromRequiredArguments()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );

        $this->assertInstanceOf("HiPay\Fullservice\HTTP\Configuration\Configuration", $conf);

        return $conf;
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCanBeConstructFromApiEnvArguments()
    {

        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_STAGE
            )
        );

        $this->assertInstanceOf("HiPay\Fullservice\HTTP\Configuration\Configuration", $conf);

        return $conf;
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__constructDirect
     */
    public function testCanBeConstructFromAllArguments()
    {
        set_error_handler(function ($errno, $errstr) {
            $this->assertEquals("This construction method is deprecated. Please use an array to create your configuration.", $errstr);
        });

        $conf = new Configuration(
            "username",
            "123456",
            Configuration::API_ENV_PRODUCTION,
            'application/json',
            array("host" => 'http://proxy.example.fr', "port" => "8080"),
            60,
            60
        );
    }

    /**
     * @covers HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCanBeConstructFromArray()
    {
        $arrayConf = array(
            "apiUsername" => "username",
            "apiPassword" => "123456",
            "apiEnv" => Configuration::API_ENV_PRODUCTION,
            "apiHTTPHeaderAccept" => 'application/json',
            "proxy" => array(
                "host" => 'http://proxy.example.fr',
                "port" => "8080",
                "user" => "test",
                "password" => "test"
            ),
            "timeout" => 60,
            "connect_timeout" => 60,
            "hostedPageV2" => true
        );

        $conf = new Configuration($arrayConf);

        $this->assertInstanceOf("HiPay\Fullservice\HTTP\Configuration\Configuration", $conf);
        $this->assertEquals($conf->getApiUsername(), "username");
        $this->assertEquals($conf->getApiPassword(), "123456");
        $this->assertEquals($conf->getApiEnv(), Configuration::API_ENV_PRODUCTION);
        $this->assertEquals($conf->getApiHTTPHeaderAccept(), "application/json");
        $this->assertEquals(
            $conf->getProxy(),
            array(
                "host" => 'http://proxy.example.fr',
                "port" => "8080",
                "user" => "test",
                "password" => "test"
            )
        );
        $this->assertEquals($conf->getCurlTimeout(), 60);
        $this->assertEquals($conf->getCurlConnectTimeout(), 60);
        $this->assertEquals($conf->isHostedPageV2(), true);

        return $conf;
    }

    /**
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getApiUsername
     * @depends testCanBeConstructFromRequiredArguments
     * @param Configuration $conf
     */
    public function testApiUsernameCanBeRetrieved(Configuration $conf)
    {
        $conf->setApiUsername("username");
        $this->assertEquals('username', $conf->getApiUsername());
    }

    /**
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getApiPassword
     * @depends testCanBeConstructFromRequiredArguments
     * @param Configuration $conf
     */
    public function testApiPassorwdCanBeRetrieved(Configuration $conf)
    {
        $conf->setApiPassword("123456");

        $this->assertEquals("123456", $conf->getApiPassword());
    }

    /**
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getApiEnv
     * @depends testCanBeConstructFromArray
     * @param Configuration $conf
     */
    public function testApiEnvCanBeRetrieved(Configuration $conf)
    {
        $this->assertEquals(Configuration::API_ENV_PRODUCTION, $conf->getApiEnv());
    }

    /**
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getApiHTTPHeaderAccept
     * @depends testCanBeConstructFromArray
     * @param Configuration $conf
     */
    public function testApiHTTPHeaderAcceptCanBeRetrieved(Configuration $conf)
    {
        $this->assertEquals('application/json', $conf->getApiHTTPHeaderAccept());
    }

    /**
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getApiEndpointProd
     * @depends testCanBeConstructFromArray
     * @param Configuration $conf
     */
    public function testApiEndpointProdCanBeRetrieved(Configuration $conf)
    {
        $this->assertEquals("https://secure-gateway.hipay-tpp.com/rest/", $conf->getApiEndpointProd());
        $this->assertEquals("https://api.hipay.com/", $conf->getApiEndpointV2Prod());
        $this->assertEquals("https://secure2-vault.hipay-tpp.com/rest/", $conf->getSecureVaultEndpointProd());
    }

    /**
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getApiEndpointStage
     * @depends testCanBeConstructFromApiEnvArguments
     * @param Configuration $conf
     */
    public function testApiEndpointStageCanBeRetrieved(Configuration $conf)
    {
        $this->assertEquals("https://stage-secure-gateway.hipay-tpp.com/rest/", $conf->getApiEndpointStage());
        $this->assertEquals("https://stage-api.hipay.com/", $conf->getApiEndpointV2Stage());
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
        $this->assertEquals("https://stage-secure-gateway.hipay-tpp.com/rest/", $conf->getApiEndpointV2());
        $this->assertEquals("https://stage-secure2-vault.hipay-tpp.com/rest/", $conf->getSecureVaultEndpoint());
        $this->assertEquals(Configuration::API_ENV_STAGE, $conf->getApiEnv());

        $conf->setHostedPageV2(true);

        $this->assertEquals("https://stage-api.hipay.com/", $conf->getApiEndpointV2());
    }

    /**
     * @covers  \HiPay\Fullservice\HTTP\Configuration\Configuration::getProxy
     * @depends testCanBeConstructFromArray
     * @param Configuration $conf
     */
    public function testProxyCanBeRetrieved(Configuration $conf)
    {
        $proxy = array("host" => "http://proxy.example.fr", "port" => "8080", "user" => "test", "password" => "test");

        $this->assertEquals($proxy, $conf->getProxy());
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCaBeConstructUsingCustomEnvironment()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_CUSTOM,
                'customApiURL' => "https://custom-api.hipay.com/"
            )
        );

        $this->assertEquals(Configuration::API_ENV_CUSTOM, $conf->getApiEnv());
        $this->assertEquals("https://custom-api.hipay.com/", $conf->getApiEndpoint());
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCaBeConstructUsingEmptyCustomEnvironment()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_CUSTOM
            )
        );

        $this->assertEquals(Configuration::API_ENV_CUSTOM, $conf->getApiEnv());
        $this->assertEquals(Configuration::API_ENDPOINT_STAGE, $conf->getApiEndpoint());
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Configuration\Configuration::__construct
     */
    public function testCaBeConstructUsingInvalidCustomEnvironment()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_CUSTOM,
                'customApiURL' => "hps://wrong-api.hipay.com/#wrong"
            )
        );

        $this->assertEquals(Configuration::API_ENV_CUSTOM, $conf->getApiEnv());
        $this->assertEquals(Configuration::API_ENDPOINT_STAGE, $conf->getApiEndpoint());
    }

    public function testCantBeConstructWithoutParams() {


        if (version_compare(phpversion(), '7.0.0', '<')) {
            set_error_handler(function ($errno, $errstr) {
                $this->assertEquals("Argument 1 passed to HiPay\Fullservice\Mapper\AbstractMapper::__construct() must be of the type array, null given", $errstr);
            });
        } else {
            $this->expectException(\ArgumentCountError::class);
        }

        new Configuration(); // @phpstan-ignore-line
    }

    /**
     * @depends testCanBeConstructFromRequiredArguments
     * @param Configuration $conf
     */
    public function testSetApiUsername($conf)
    {
        $conf->setApiUsername("test");

        $this->assertEquals("test", $conf->getApiUsername());
    }

    /**
     * @depends testCanBeConstructFromRequiredArguments
     * @param Configuration $conf
     */
    public function testSetApiPassword($conf)
    {
        $conf->setApiPassword("test");

        $this->assertEquals("test", $conf->getApiPassword());
    }

    public function testGetApiEndpointCustom()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_CUSTOM,
                'customApiURL' => "https://test.com/api"
            )
        );

        $this->assertEquals("https://test.com/api", $conf->getApiEndpoint());
    }

    public function testGetApiEndpointProduction()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_PRODUCTION
            )
        );

        $this->assertEquals(Configuration::API_ENDPOINT_PROD, $conf->getApiEndpoint());
    }

    public function testGetApiEndpointStage()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_STAGE
            )
        );

        $this->assertEquals(Configuration::API_ENDPOINT_STAGE, $conf->getApiEndpoint());
    }

    public function testSetApiEnv() {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_STAGE
            )
        );

        $this->assertEquals(Configuration::API_ENV_STAGE, $conf->getApiEnv());

        $conf->setApiEnv(Configuration::API_ENV_PRODUCTION);

        $this->assertEquals(Configuration::API_ENV_PRODUCTION, $conf->getApiEnv());
    }



    public function testGetApiEndpointV2FromV1()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_STAGE
            )
        );

        $this->assertEquals(Configuration::API_ENDPOINT_STAGE, $conf->getApiEndpointV2());
    }

    public function testGetApiEndpointV2Custom()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_CUSTOM,
                'customApiURL' => "https://test.com/api"
            )
        );

        $conf->setHostedPageV2(true);

        $this->assertEquals("https://test.com/api", $conf->getApiEndpointV2());
    }

    public function testGetApiEndpointV2Stage()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_STAGE
            )
        );

        $conf->setHostedPageV2(true);

        $this->assertEquals(Configuration::API_ENDPOINT_V2_STAGE, $conf->getApiEndpointV2());
    }

    public function testGetApiEndpointV2Production()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456",
                'apiEnv' => Configuration::API_ENV_PRODUCTION
            )
        );

        $conf->setHostedPageV2(true);

        $this->assertEquals(Configuration::API_ENDPOINT_V2_PROD, $conf->getApiEndpointV2());
    }

    public function testGetDataApiEndpointProd()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );
        $this->assertEquals(Configuration::DATA_API_ENDPOINT_PROD, $conf->getDataApiEndpointProd());
    }

    public function testGetDataApiEndpointStage()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );
        $this->assertEquals(Configuration::DATA_API_ENDPOINT_STAGE, $conf->getDataApiEndpointStage());
    }

    public function testGetDataApiEndpoint()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );

        $conf->setApiEnv(Configuration::API_ENV_STAGE);

        $this->assertEquals(Configuration::DATA_API_ENDPOINT_STAGE, $conf->getDataApiEndpoint());

        $conf->setApiEnv(Configuration::API_ENV_PRODUCTION);

        $this->assertEquals(Configuration::DATA_API_ENDPOINT_PROD, $conf->getDataApiEndpoint());
    }

    public function testGetDataApiHttpUserAgent()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );

        $this->assertEquals(Configuration::DATA_API_HTTP_USER_AGENT, $conf->getDataApiHttpUserAgent());
    }

    public function testGetSecureVaultEndpointProd()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );

        $this->assertEquals(Configuration::SECURE_VAULT_ENDPOINT_PROD, $conf->getSecureVaultEndpointProd());
    }

    public function testGetSecureVaultEndpointStage()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );

        $this->assertEquals(Configuration::SECURE_VAULT_ENDPOINT_STAGE, $conf->getSecureVaultEndpointStage());
    }

    public function testSetApiHTTPHeaderAccept()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );

        $this->assertEquals("application/json", $conf->getApiHTTPHeaderAccept());

        $conf->setApiHTTPHeaderAccept("text/html");

        $this->assertEquals("text/html", $conf->getApiHTTPHeaderAccept());
    }

    public function testSetProxy()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );

        $this->assertEquals(array(), $conf->getProxy());

        $proxy = array(
            "host" => "127.0.0.1",
            "port" => "25565",
            "user" => "user",
            "password" => "password"
        );

        $conf->setProxy($proxy);

        $this->assertEquals($proxy, $conf->getProxy());
    }

    public function testGetCurlTimeout()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );

        $this->assertEquals(60, $conf->getCurlTimeout());
    }

    public function testSetCurlTimeout()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );

        $this->assertEquals(60, $conf->getCurlTimeout());

        $conf->setCurlTimeout(1000);

        $this->assertEquals(1000, $conf->getCurlTimeout());
    }

    public function testGetCurlConnectTimeout()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );

        $this->assertEquals(60, $conf->getCurlTimeout());
    }

    public function testSetCurlConnectTimeout()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );

        $this->assertEquals(15, $conf->getCurlConnectTimeout());

        $conf->setCurlConnectTimeout(1000);

        $this->assertEquals(1000, $conf->getCurlConnectTimeout());
    }

    public function testIsOverridePaymentProductSorting()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );

        $this->assertEquals(true, $conf->isOverridePaymentProductSorting());
    }

    public function testSetOverridePaymentProductSorting()
    {
        $conf = new Configuration(
            array(
                'apiUsername' => "username",
                'apiPassword' => "123456"
            )
        );

        $this->assertEquals(true, $conf->isOverridePaymentProductSorting());

        $conf->setOverridePaymentProductSorting(false);

        $this->assertEquals(false, $conf->isOverridePaymentProductSorting());
    }


}
