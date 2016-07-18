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
use HiPay\Fullservice\HTTP\ClientProvider;
use HiPay\Fullservice\HTTP\Configuration\Configuration;
/**
 * Abstract Client Test class
 *
 * @category    HiPay
 * @package     HiPay\Tests
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class ClientProviderTest extends TestCase{
	
    protected $_abstractName = 'HiPay\Fullservice\HTTP\ClientProvider';
    
	/**
	 * @cover HiPay\Fullservice\HTTP\ClientProvider::__construct
	 * @expectedException PHPUnit_Framework_Error
	 * @expectedExceptionMessage  Argument 1 passed to HiPay\Fullservice\HTTP\ClientProvider::__construct() must implement interface HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface, none given
	 */
	public function testCannotBeConstructUsingNoArgument(){
	    
	    $mock = $this->getAbstractMock($this->_abstractName);
	    
	    // now call the constructor
	    $this->getClassConstructor($this->_abstractName)->invoke($mock);
	    
	}
	
	/**
	 * @cover HiPay\Fullservice\HTTP\ClientProvider::__construct
	 * @expectedException PHPUnit_Framework_Error
	 * @expectedExceptionMessage  Argument 1 passed to HiPay\Fullservice\HTTP\ClientProvider::__construct() must implement interface HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface, null given
	 */
	public function testCannotBeConstructUsingInvalidArgument(){	    
	    
       $mock = $this->getAbstractMock($this->_abstractName);
	    
	    // now call the constructor
	    $this->getClassConstructor($this->_abstractName)->invoke($mock,null);
		  
	}
	
	
	/**
	 * @cover HiPay\Fullservice\HTTP\ClientProvider::__construct
	 * @uses  HiPay\Fullservice\HTTP\Configuration
	 */
	public function testCanBeConstructUsingConfiguration(){
	   $mock = $this->getAbstractMock($this->_abstractName);
	   
	   $conf = new Configuration("username", "123456");

       $this->getClassConstructor($this->_abstractName)->invoke($mock,$conf);
       
	   $this->assertInstanceOf("HiPay\Fullservice\HTTP\ClientProvider", $mock);
	
	   return $mock;
	
	}
	
	
	/**
	 * @cover HiPay\Fullservice\HTTP\ClientProvider::getConfiguration
	 * @depends testCanBeConstructUsingConfiguration
	 */
	public function testConfigurationCanBeRetrieved(ClientProvider $client){
	
	    $this->assertInstanceOf("HiPay\Fullservice\HTTP\Configuration\Configuration", $client->getConfiguration());
	
	}
	
	/**
	 * @cover HiPay\Fullservice\HTTP\ClientProvider::setConfiguration
	 * @depends testCanBeConstructUsingConfiguration
	 */
	public function testConfigurationCanBeSetted(ClientProvider $client){
	    
	    $conf = new Configuration("username2", "654321");
	    $client->setConfiguration($conf);
	
	    $this->assertInstanceOf("HiPay\Fullservice\HTTP\Configuration\Configuration", $client->getConfiguration());
	    $this->assertEquals("username2", $client->getConfiguration()->getApiUsername());
	
	}
	
	
	
	/**
	 * @cover HiPay\Fullservice\HTTP\ClientProvider::getHttpClient
	 * @depends testCanBeConstructUsingConfiguration
	 */
	public function testHttpClientCanBeRetrieved(ClientProvider $client){
	       

	    $client->expects($this->once())
	    	       ->method('getHttpClient')
	       	       ->will($this->returnValue(null));
	    
	    $this->assertNull($client->getHttpClient());
	
	}
	
}