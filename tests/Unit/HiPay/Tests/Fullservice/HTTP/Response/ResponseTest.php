<?php
namespace Unit\HiPay\Tests\Fullservice\HTTP\Response;

use HiPay\Fullservice\Exception\InvalidArgumentException;
use HiPay\Fullservice\Exception\OutOfBoundsException;
use HiPay\Fullservice\Exception\UnexpectedValueException;
use HiPay\TestCase\TestCase;
use HiPay\Fullservice\HTTP\Response\Response;

/**
 * Test HTTP Response Object
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 */
class ResponseTest extends TestCase
{

    /**
     * @covers \HiPay\Fullservice\HTTP\Response\Response::__construct
     */
    public function testCannotBeConstructFromNonStringValue()
    {
        $this->expectException(InvalidArgumentException::class);
        new Response(null, 500, array());
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Response\Response::__construct
     */
    public function testCannotBeConstructFromNonNumericValue()
    {
        $this->expectException(InvalidArgumentException::class);
        new Response('some string', 'status 500', array());
    }
    
    /**
     * @covers \HiPay\Fullservice\HTTP\Response\Response::__construct
     */
    public function testCannotBeConstructFromNonArrayValue()
    {
        $phpversion = explode('-', phpversion());
        $sdkServerEngineVersion = $phpversion[0];
        if (version_compare($sdkServerEngineVersion, '7.0.0', '<')) {
            $this->expectError();
        } else {
            $this->expectException(\TypeError::class);
        }

        new Response('some string', 500, 'Content-Type: application/json');
    }

    /**
     * @covers \HiPay\Fullservice\HTTP\Response\Response::__construct
     */
    public function testObjectBanBeConstructFromNumericStatusCodeArgument()
    {
        $this->assertInstanceOf("HiPay\Fullservice\HTTP\Response\Response", new Response('some string', '500', array()));
    }
    
    /**
     * @covers \HiPay\Fullservice\HTTP\Response\Response::__construct
     */
    public function testObjectBanBeConstructUsingValidArguments()
    {
        $response = new Response('some string', 200, array());
        $this->assertInstanceOf("HiPay\Fullservice\HTTP\Response\Response", $response);
        return $response;
    }
    
    /**
     * @covers \HiPay\Fullservice\HTTP\Response\Response::getStatusCode
     * @depends testObjectBanBeConstructUsingValidArguments
     */
    public function testCanRetrieveStatusCode(Response $response)
    {
        $this->assertEquals(200, $response->getStatusCode());
    }
    
    /**
     * @covers \HiPay\Fullservice\HTTP\Response\Response::getBody
     * @depends testObjectBanBeConstructUsingValidArguments
     */
    public function testCanRetrieveBody(Response $response)
    {
        $this->assertEquals('some string', $response->getBody());
    }
    
    /**
     * @covers \HiPay\Fullservice\HTTP\Response\Response::getHeaders
     * @depends testObjectBanBeConstructUsingValidArguments
     */
    public function testCanRetrieveHeaders(Response $response)
    {
        $this->assertEquals(array(), $response->getHeaders());
    }
    

    /**
     * @covers \HiPay\Fullservice\HTTP\Response\Response::toArray
     * @depends testObjectBanBeConstructUsingValidArguments
     */
    public function testToArrayCannotBeRetrievedFromInvalidHeaderKey(Response $response)
    {
        $this->expectException(OutOfBoundsException::class);
        $response->toArray();
    }
    
    /**
     * @covers \HiPay\Fullservice\HTTP\Response\Response::toArray
     */
    public function testToArrayCannotBeRetrievedUsingInvalidContentTypeHeader()
    {
        $response = new Response('some string', 200, array('Content-Type'=>array('application/xml')));
        $this->expectException(UnexpectedValueException::class);
        $response->toArray();
    }
    
    /**
     * @covers \HiPay\Fullservice\HTTP\Response\Response::toArray
     */
    public function testToArrayCannotBeRetrievedUsingInvalidJsonBody()
    {
        $response = new Response('some string', 200, array('Content-Type'=>array('application/json; encoding=UTF-8')));
        $this->expectException(UnexpectedValueException::class);
        $response->toArray();
    }
    
    /**
     * @covers \HiPay\Fullservice\HTTP\Response\Response::toArray
     */
    public function testCanBeConvertedJsonBodyToArrayAndRetrieveIt()
    {
        $response = new Response('{"foo":"bar"}', 200, array('Content-Type'=>array('application/json; encoding=UTF-8')));

        $array = $response->toArray();
        $this->assertTrue(is_array($array));
        $this->assertArrayHasKey('foo', $array);
        $this->assertEquals('bar', $array['foo']);
    }
}
