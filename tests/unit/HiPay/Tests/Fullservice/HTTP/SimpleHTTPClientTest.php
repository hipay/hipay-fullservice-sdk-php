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
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php 
 * @api
 */
class SimpleHTTPClientTest extends TestCase {

	/**
	 * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::__construct()
	 * @uses  HiPay\Fullservice\HTTP\Configuration
	 * @expectedException TypeError
	 * @expectedExceptionMessage  Argument 1 passed to HiPay\Fullservice\HTTP\ClientProvider::__construct() must implement interface HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface, null given
	 */
	public function testCannotBeConstructFromInvalidArgument() {
	
		$client = new SimpleHTTPClient(null);

		
	}
	
	/**
	 * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::__construct
	 * @uses  HiPay\Fullservice\HTTP\Configuration
	 */
	public function testCanBeConstructUsingConfiguration(){
		
		$conf = new Configuration("username", "123456");
		$client = new SimpleHTTPClient($conf);
		$this->assertInstanceOf("HiPay\Fullservice\HTTP\SimpleHTTPClient", $client);
		
		return $client;
		
	}
	
	/**
	 * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::getConfiguration
	 * @depends testCanBeConstructUsingConfiguration
	 */
	public function testConfigurationCanBeRetrieved(ClientProvider $client){
		
		$this->assertInstanceOf("HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface", $client->getConfiguration());
		
	}
	
	/**
	 * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::setConfiguration
	 * @depends testCanBeConstructUsingConfiguration
	 */
	public function testConfigurationCanBeSetted(ClientProvider $client){
	
		$conf = new Configuration("username2", "654321");
		$client->setConfiguration($conf);
		
		$this->assertInstanceOf("HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface", $client->getConfiguration());
		$this->assertEquals("username2", $client->getConfiguration()->getApiUsername());
	
	}
	
	/**
	 * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::getHttpClient
	 * @depends testCanBeConstructUsingConfiguration
	 */
	public function testHttpClientCanBeRetrieved(ClientProvider $client){
	
		$this->assertNotEmpty($client->getHttpClient());
		$this->assertEquals(true,is_resource($client->getHttpClient()));
	
	}
	
	/**
	 * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::request
	 * @depends testCanBeConstructUsingConfiguration
	 * @expectedException TypeError
	 */
	public function testRequestCannotBeExcutedFromAllInvalidArguments(ClientProvider $client){
		
		$client->request('GETTED', "1234","foo",1234);
		
	}
	
	/**
	 * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::request
	 * @depends testCanBeConstructUsingConfiguration
	 * @expectedException HiPay\Fullservice\Exception\InvalidArgumentException
	 */
	//public function testRequestCannotBeExcutedFromRequiredInvalidArguments(ClientProvider $client){
	
		//$this->markTestSkipped(
		//		'HTTP method and Uri validator not implemented yet :-( '
		//		);
		
		//$client->request('GETTED', "1234");
	
	//}
	
	/**
	 * @cover HiPay\Fullservice\HTTP\SimpleHTTPClient::request
	 * @depends testCanBeConstructUsingConfiguration
	 * @expectedException HiPay\Fullservice\Exception\RuntimeException
	 */
	public function testRuntimeExecptionIsRaisedForNetworkFailure(ClientProvider $client){
	
		$client->request('GETTED', "1234");
	
	}
	

}