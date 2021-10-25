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
 */

namespace Unit\HiPay\Tests\Fullservice\Gateway\Client;

use HiPay\Fullservice\SecureVault\Model\PaymentCardToken;
use HiPay\TestCase\TestCase;
use HiPay\Fullservice\SecureVault\Client\SecureVaultClient;

/**
 * Client Test class for secure vault request send to TPP Fullservice.
 *
 * @category    HiPay
 * @package     HiPay\Tests
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class SecureVaultClientTest extends TestCase
{
    /**
     * @var \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_config;

    /**
     * @var \HiPay\Fullservice\HTTP\ClientProvider|\PHPUnit_Framework_MockObject_MockObject $_clientProvider
     */
    protected $_clientProvider;

    /**
     * @var \HiPay\Fullservice\HTTP\Response\abstractResponse|PHPUnit_Framework_MockObject_MockObject
     */
    protected $_response;

    protected function set_up()
    {
        $this->_config = $this->getMockBuilder('\HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface')
                              ->disableOriginalConstructor()
                              ->getMock();

        $this->_response = $this->getMockBuilder('\HiPay\Fullservice\HTTP\Response\AbstractResponse')
            ->disableOriginalConstructor()
            ->getMock();

        $this->_response->method('toArray')
                        ->willReturn(array(
                           "test" => "test"
                        ));

        $this->_clientProvider = $this->getMockBuilder('\HiPay\Fullservice\HTTP\ClientProvider')
                                      ->setConstructorArgs(array($this->_config))
                                      ->getMock();

        $this->_clientProvider->method('getHttpClient');
        $this->_clientProvider->method('createHttpClient');
        $this->_clientProvider->method('request')
                              ->willReturn($this->_response);
    }

    /**
     * @cover HiPay\Fullservice\SecureVault\Client\SecureVaultClient::__construct
     */
    public function testCanBeConstructUsingClientProvider()
    {
        $vault = new SecureVaultClient($this->_clientProvider);

        $this->assertInstanceOf(SecureVaultClient::class, $vault);

        return $vault;
    }

    /**
     * @param SecureVaultClient $vault
     * @depends testCanBeConstructUsingClientProvider
     */
    public function testRequestLookupToken($vault) {
        $token = $vault->requestLookupToken(1, '0');

        $this->assertInstanceOf(PaymentCardToken::class, $token);
    }
}
