<?php
/*
 * Hipay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - Hipay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace Hipay\Tests\Fullservice\HTTP\Configuration;

use Hipay\Fullservice\HTTP\Configuration\Configuration;
use Hipay\Tests\TestCase;
/**
 * @category    Hipay
 * @package     Hipay\Tests
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class ConfigurationTest extends TestCase {
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::__construct
	 * @expectedException Hipay\Fullservice\Exception\InvalidArgumentException
	 */
	public function testCannotBeConstructUsingInvalidUsernameArgument(){
		
		$conf = new Configuration(34, "123456");
		
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::__construct
	 * @expectedException Hipay\Fullservice\Exception\InvalidArgumentException
	 */
	public function testCannotBeConstructUsingEmptyUsernameArgument(){
	
		$conf = new Configuration("", "123456");
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::__construct
	 * @expectedException Hipay\Fullservice\Exception\InvalidArgumentException
	 */
	public function testCannotBeConstructUsingInvalidPasswordArgument(){
	
		$conf = new Configuration("username", null);
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::__construct
	 * @expectedException Hipay\Fullservice\Exception\InvalidArgumentException
	 */
	public function testCannotBeConstructUsingEmptyPasswordArgument(){
	
		$conf = new Configuration("username", "");
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::__construct
	 * @expectedException Hipay\Fullservice\Exception\UnexpectedValueException
	 */
	public function testCannotBeConstructUsingInvalidApiEnvArgument(){
	
		$conf = new Configuration("username", "123456","prod");
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::__construct
	 * @expectedException Hipay\Fullservice\Exception\UnexpectedValueException
	 */
	public function testCannotBeConstructUsingInvalidHTTPHeaderAcceptArgument(){
	
		$conf = new Configuration("username", "123456",Configuration::API_ENV_PRODUCTION,'application/xml');
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::__construct
	 * @expectedException Hipay\Fullservice\Exception\UnexpectedValueException
	 */
	public function testCannotBeConstructUsingEmptyHTTPHeaderAcceptArgument(){
	
		$conf = new Configuration("username", "123456",Configuration::API_ENV_PRODUCTION,'');
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::__construct
	 */
	public function testCanBeConstructFromRequiredArguments(){
	
		$conf = new Configuration("username", "123456");
	
		$this->assertInstanceOf(Configuration::class, $conf);
	
		return $conf;
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::__construct
	 */
	public function testCanBeConstructFromApiEnvArguments(){
	
		$conf = new Configuration("username", "123456",Configuration::API_ENV_STAGE);
	
		$this->assertInstanceOf(Configuration::class, $conf);
	
		return $conf;
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::__construct
	 */
	public function testCanBeConstructFromAllArguments(){
	
		$conf = new Configuration("username", "123456",Configuration::API_ENV_PRODUCTION,'application/json');
		
		$this->assertInstanceOf(Configuration::class, $conf);
		
		return $conf;
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::getApiUsername
	 * @depends testCanBeConstructFromRequiredArguments
	 * @param Configuration $conf
	 */
	public function testApiUsernameCanBeRetrieved(Configuration $conf){
		
		$this->assertEquals('username',$conf->getApiUsername());
		
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::getApiPassword
	 * @depends testCanBeConstructFromRequiredArguments
	 * @param Configuration $conf
	 */
	public function testApiPassorwdCanBeRetrieved(Configuration $conf){
	
		$this->assertEquals('123456',$conf->getApiPassword());
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::getApiEnv
	 * @depends testCanBeConstructFromAllArguments
	 * @param Configuration $conf
	 */
	public function testApiEnvCanBeRetrieved(Configuration $conf){
	
		$this->assertEquals(Configuration::API_ENV_PRODUCTION,$conf->getApiEnv());
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::getApiHTTPHeaderAccept
	 * @depends testCanBeConstructFromAllArguments
	 * @param Configuration $conf
	 */
	public function testApiHTTPHeaderAcceptCanBeRetrieved(Configuration $conf){
	
		$this->assertEquals('application/json',$conf->getApiHTTPHeaderAccept());
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::getApiEndpointProd
	 * @depends testCanBeConstructFromAllArguments
	 * @param Configuration $conf
	 */
	public function testApiEndpointProdCanBeRetrieved(Configuration $conf){
		
		$this->assertEquals("https://secure-gateway.hipay-tpp.com/rest/v1/", $conf->getApiEndpointProd());
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::getApiEndpointStage
	 * @depends testCanBeConstructFromApiEnvArguments
	 * @param Configuration $conf
	 */
	public function testApiEndpointStageCanBeRetrieved(Configuration $conf){
	
		$this->assertEquals("https://stage-secure-gateway.hipay-tpp.com/rest/v1/", $conf->getApiEndpointStage());
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::getApiEndpoint
	 * @depends testCanBeConstructFromApiEnvArguments
	 * @param Configuration $conf
	 */
	public function testApiEndpointCanBeRetrieved(Configuration $conf){

		$this->assertEquals("https://stage-secure-gateway.hipay-tpp.com/rest/v1/", $conf->getApiEndpoint());
		$this->assertEquals(Configuration::API_ENV_STAGE, $conf->getApiEnv());
	}
	
	
} 