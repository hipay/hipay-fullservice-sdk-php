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

use HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface;
use HiPay\Tests\TestCase;
/**
 * @category    HiPay
 * @package     HiPay\Tests
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class ConfigurationInterfaceTest extends TestCase {
	

	
	/**
	 * @covers HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::__construct
	 */
	public function testCanBeConstruct(){
	
		$conf = $this->getMockBuilder('HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	   
		$this->assertInstanceOf("HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface", $conf);
	
    	return $conf;
	}
	
	
	/**
	 * @covers HiPay\Fullservice\HTTP\Configuration\Configuration::getApiUsername
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiUsernameCanBeRetrieved(ConfigurationInterface $conf){
	    
	    $conf = $this->getMockBuilder('HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    $conf->method('getApiUsername')->willReturn('username');
	    
		$this->assertEquals('username',$conf->getApiUsername());
		
	}
	
	/**
	 * @covers HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiPassword
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiPassorwdCanBeRetrieved(ConfigurationInterface $conf){
	    $conf = $this->getMockBuilder('HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    $conf->method('getApiPassword')->willReturn('123456');
		$this->assertEquals('123456',$conf->getApiPassword());
	
	}
	
	/**
	 * @covers HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiEnv
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiEnvCanBeRetrieved(ConfigurationInterface $conf){
	    $conf = $this->getMockBuilder('HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    $conf->method('getApiEnv')->willReturn('stage');
		$this->assertEquals('stage',$conf->getApiEnv());
	
	}
	
	/**
	 * @covers HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiHTTPHeaderAccept
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiHTTPHeaderAcceptCanBeRetrieved(ConfigurationInterface $conf){
	    $conf = $this->getMockBuilder('HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    $conf->method('getApiHTTPHeaderAccept')->willReturn('application/json');
		$this->assertEquals('application/json',$conf->getApiHTTPHeaderAccept());
	
	}
	
	/**
	 * @covers HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiEndpointProd
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiEndpointProdCanBeRetrieved(ConfigurationInterface $conf){
	    $conf = $this->getMockBuilder('HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    $conf->method('getApiEndpointProd')->willReturn('https://secure-gateway.hipay-tpp.com/rest/v1/');
		$this->assertEquals("https://secure-gateway.hipay-tpp.com/rest/v1/", $conf->getApiEndpointProd());
	}
	
	/**
	 * @covers HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiEndpointStage
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiEndpointStageCanBeRetrieved(ConfigurationInterface $conf){
	    $conf = $this->getMockBuilder('HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    $conf->method('getApiEndpointStage')->willReturn('https://stage-secure-gateway.hipay-tpp.com/rest/v1/');
		$this->assertEquals("https://stage-secure-gateway.hipay-tpp.com/rest/v1/", $conf->getApiEndpointStage());
	}
	
	/**
	 * @covers HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiEndpoint
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiEndpointCanBeRetrieved(ConfigurationInterface $conf){
	    $conf = $this->getMockBuilder('HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    
	    $conf->method('getApiEnv')->willReturn('stage');
	    $conf->method('getApiEndpoint')->willReturn('https://stage-secure-gateway.hipay-tpp.com/rest/v1/');
	    
		$this->assertEquals("https://stage-secure-gateway.hipay-tpp.com/rest/v1/", $conf->getApiEndpoint());
		$this->assertEquals('stage', $conf->getApiEnv());
	}
	
	
} 