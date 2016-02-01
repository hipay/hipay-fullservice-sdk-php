<?php
namespace Hipay\Tests\Fullservice\HTTP\Response;

use Hipay\Tests\TestCase;
use Hipay\Fullservice\HTTP\Response\Response;

/**
 * Test HTTP Response Object
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 */
class ResponseTest extends TestCase
{

    /**
     * @covers \Hipay\Fullservice\HTTP\Response\Response::__construct
     * @expectedException \Hipay\Fullservice\Exception\InvalidArgumentException
     */
    public function testCannotBeConstructFromNonStringValue(){        
        new Response(null,500,array());
    }

    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\Response::__construct
     * @expectedException \Hipay\Fullservice\Exception\InvalidArgumentException
     */
    public function testCannotBeConstructFromNonNumericValue(){
        new Response('some string','status 500',array());
    
    }
    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\Response::__construct
     * @expectedException PHPUnit_Framework_Error
	 * @expectedExceptionMessage Argument 3 passed to Hipay\Fullservice\HTTP\Response\Response::__construct() must be of the type array, string given
     */
    public function testCannotBeConstructFromNonArrayValue(){
        new Response('some string',500,'Content-Type: application/json');
    }
    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\Response::__construct
     */
    public function testObjectBanBeConstructFromNumericStatusCodeArgument(){
        $this->assertInstanceOf(Response::class, new Response('some string','500',array()));   
    }
    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\Response::__construct
     */
    public function testObjectBanBeConstructUsingValidArguments(){
        $response = new Response('some string',200,array());
        $this->assertInstanceOf(Response::class, $response);
        return $response;
    }
    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\Response::getStatusCode
     * @depends testObjectBanBeConstructUsingValidArguments
     */
    public function testCanRetrieveStatusCode(Response $response){                    
        $this->assertEquals(200, $response->getStatusCode());
    }
    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\Response::getBody
     * @depends testObjectBanBeConstructUsingValidArguments
     */
    public function testCanRetrieveBody(Response $response){
    
        $this->assertEquals('some string', $response->getBody());
    
    }
    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\Response::getHeaders
     * @depends testObjectBanBeConstructUsingValidArguments
     */
    public function testCanRetrieveHeaders(Response $response){
        
        $this->assertEquals(array(), $response->getHeaders());
    
    }
    

    /**
     * @covers \Hipay\Fullservice\HTTP\Response\Response::toArray
     * @depends testObjectBanBeConstructUsingValidArguments
     * @expectedException \Hipay\Fullservice\Exception\OutOfBoundsException
     */
    public function testToArrayCannotBeRetrievedFromInvalidHeaderKey(Response $response){
            
        $response->toArray();
    }
    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\Response::toArray
     * @expectedException \Hipay\Fullservice\Exception\UnexpectedValueException
     */
    public function testToArrayCannotBeRetrievedUsingInvalidContentTypeHeader(){
        
        $response = new Response('some string',200,array('Content-Type'=>array('application/xml')));
        $response->toArray();
    }
    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\Response::toArray
     * @expectedException \Hipay\Fullservice\Exception\UnexpectedValueException
     */
    public function testToArrayCannotBeRetrievedUsingInvalidJsonBody(){
    
        $response = new Response('some string',200,array('Content-Type'=>array('application/json; encoding=UTF-8')));
        $response->toArray();
    }
    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\Response::toArray
     */
    public function testCanBeConvertedJsonBodyToArrayAndRetrieveIt(){
        $response = new Response('{"foo":"bar"}',200,array('Content-Type'=>array('application/json; encoding=UTF-8')));

        $array = $response->toArray();
        $this->assertTrue(is_array($array));
        $this->assertArrayHasKey('foo', $array);
        $this->assertEquals('bar', $array['foo']);
        
    }
    
    
    
    
}