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

use Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface;
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
class ConfigurationInterfaceTest extends TestCase {
	

	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface::__construct
	 */
	public function testCanBeConstruct(){
	
		$conf = $this->getMockBuilder('Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	   
		$this->assertInstanceOf("Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface", $conf);
	
    	return $conf;
	}
	
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\Configuration::getApiUsername
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiUsernameCanBeRetrieved(ConfigurationInterface $conf){
	    
	    $conf = $this->getMockBuilder('Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    $conf->method('getApiUsername')->willReturn('username');
	    
		$this->assertEquals('username',$conf->getApiUsername());
		
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiPassword
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiPassorwdCanBeRetrieved(ConfigurationInterface $conf){
	    $conf = $this->getMockBuilder('Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    $conf->method('getApiPassword')->willReturn('123456');
		$this->assertEquals('123456',$conf->getApiPassword());
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiEnv
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiEnvCanBeRetrieved(ConfigurationInterface $conf){
	    $conf = $this->getMockBuilder('Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    $conf->method('getApiEnv')->willReturn('stage');
		$this->assertEquals('stage',$conf->getApiEnv());
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiHTTPHeaderAccept
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiHTTPHeaderAcceptCanBeRetrieved(ConfigurationInterface $conf){
	    $conf = $this->getMockBuilder('Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    $conf->method('getApiHTTPHeaderAccept')->willReturn('application/json');
		$this->assertEquals('application/json',$conf->getApiHTTPHeaderAccept());
	
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiEndpointProd
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiEndpointProdCanBeRetrieved(ConfigurationInterface $conf){
	    $conf = $this->getMockBuilder('Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    $conf->method('getApiEndpointProd')->willReturn('https://secure-gateway.hipay-tpp.com/rest/v1/');
		$this->assertEquals("https://secure-gateway.hipay-tpp.com/rest/v1/", $conf->getApiEndpointProd());
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiEndpointStage
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiEndpointStageCanBeRetrieved(ConfigurationInterface $conf){
	    $conf = $this->getMockBuilder('Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    $conf->method('getApiEndpointStage')->willReturn('https://stage-secure-gateway.hipay-tpp.com/rest/v1/');
		$this->assertEquals("https://stage-secure-gateway.hipay-tpp.com/rest/v1/", $conf->getApiEndpointStage());
	}
	
	/**
	 * @covers Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiEndpoint
	 * @depends testCanBeConstruct
	 * @param ConfigurationInterface $conf
	 */
	public function testApiEndpointCanBeRetrieved(ConfigurationInterface $conf){
	    $conf = $this->getMockBuilder('Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface')->getMock();
	    
	    $conf->method('getApiEnv')->willReturn('stage');
	    $conf->method('getApiEndpoint')->willReturn('https://stage-secure-gateway.hipay-tpp.com/rest/v1/');
	    
		$this->assertEquals("https://stage-secure-gateway.hipay-tpp.com/rest/v1/", $conf->getApiEndpoint());
		$this->assertEquals('stage', $conf->getApiEnv());
	}
	
	
} 