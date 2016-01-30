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
namespace Hipay\Tests\Fullservice\HTTP;


use Hipay\Tests\TestCase;
use Hipay\Fullservice\HTTP\ClientProvider;
use Hipay\Fullservice\HTTP\Configuration\Configuration;
/**
 * Abstract Client Test class
 *
 * @category    Hipay
 * @package     Hipay\Tests
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class ClientProviderTest extends TestCase{
	
    protected $_abstractName = 'Hipay\Fullservice\HTTP\ClientProvider';
    
	/**
	 * @cover Hipay\Fullservice\HTTP\ClientProvider::__construct
	 * @expectedException PHPUnit_Framework_Error
	 * @expectedExceptionMessage  Argument 1 passed to Hipay\Fullservice\HTTP\ClientProvider::__construct() must implement interface Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface, none given
	 */
	public function testCannotBeConstructUsingNoArgument(){
	    
	    $mock = $this->getAbstractMock($this->_abstractName);
	    
	    // now call the constructor
	    $this->getClassConstructor($this->_abstractName)->invoke($mock);
	    
	}
	
	/**
	 * @cover Hipay\Fullservice\HTTP\ClientProvider::__construct
	 * @expectedException PHPUnit_Framework_Error
	 * @expectedExceptionMessage  Argument 1 passed to Hipay\Fullservice\HTTP\ClientProvider::__construct() must implement interface Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface, null given
	 */
	public function testCannotBeConstructUsingInvalidArgument(){	    
	    
       $mock = $this->getAbstractMock($this->_abstractName);
	    
	    // now call the constructor
	    $this->getClassConstructor($this->_abstractName)->invoke($mock,null);
		  
	}
	
	
	/**
	 * @cover Hipay\Fullservice\HTTP\ClientProvider::__construct
	 * @uses  Hipay\Fullservice\HTTP\Configuration
	 */
	public function testCanBeConstructUsingConfiguration(){
	   $mock = $this->getAbstractMock($this->_abstractName);
	   
	   $conf = new Configuration("username", "123456");

       $this->getClassConstructor($this->_abstractName)->invoke($mock,$conf);
       
	   $this->assertInstanceOf(ClientProvider::class, $mock);
	
	   return $mock;
	
	}
	
	
	/**
	 * @cover Hipay\Fullservice\HTTP\ClientProvider::getConfiguration
	 * @depends testCanBeConstructUsingConfiguration
	 */
	public function testConfigurationCanBeRetrieved(ClientProvider $client){
	
	    $this->assertInstanceOf(Configuration::class, $client->getConfiguration());
	
	}
	
	/**
	 * @cover Hipay\Fullservice\HTTP\ClientProvider::setConfiguration
	 * @depends testCanBeConstructUsingConfiguration
	 */
	public function testConfigurationCanBeSetted(ClientProvider $client){
	    
	    $conf = new Configuration("username2", "654321");
	    $client->setConfiguration($conf);
	
	    $this->assertInstanceOf(Configuration::class, $client->getConfiguration());
	    $this->assertEquals("username2", $client->getConfiguration()->getApiUsername());
	
	}
	
	
	
	/**
	 * @cover Hipay\Fullservice\HTTP\ClientProvider::getHttpClient
	 * @depends testCanBeConstructUsingConfiguration
	 */
	public function testHttpClientCanBeRetrieved(ClientProvider $client){
	       

	    $client->expects($this->once())
	    	       ->method('getHttpClient')
	       	       ->will($this->returnValue(null));
	    
	    $this->assertNull($client->getHttpClient());
	
	}
	
}