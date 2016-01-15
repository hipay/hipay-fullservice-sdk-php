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
namespace Hipay\Tests\Fullservice\Request;

use Hipay\Tests\TestCase;
use Hipay\Fullservice\Request\RequestSerializer;
use Hipay\Fullservice\Request\AbstractRequest;

/**
 *
 * @package Hipay\Tests
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class RequestSerializerTest extends TestCase
{
    
    
    /**
     * @cover Hipay\Fullservice\Request\RequestSerializer::__construct
     * @uses Hipay\Tests\Fullservice\Request\AbstractRequest
     */
    public function testCanBeConstructUsingAbstractRequest(){
    
        $req = $this->getMockBuilder('Hipay\Fullservice\Request\AbstractRequest')->getMock();
        $req->eci = '7';
        $req->orderId = '123456';
        $req->operation = 'Sale';
    
        $req->foo = array('bar'=>'foobar');
    
        $req->obj = new \stdClass();
        $req->obj->p1 = 'value1';
        
        $rs = new RequestSerializer($req);
        $this->assertInstanceOf(RequestSerializer::class, $rs);
    
        return $rs;
    }
    
    /**
     * @cover Hipay\Fullservice\Request\RequestSerializer::toArray
     * @depends testCanBeConstructUsingAbstractRequest
     */
    public function testRequestCanBeRetrieveToArray(RequestSerializer $rs){      
         
        $params = $rs->toArray();
        
        $this->assertInternalType('array', $params);
        
        $this->assertArrayHasKey('eci', $params);
        $this->assertEquals('7', $params['eci']);
        
        $this->assertArrayHasKey('orderId', $params);
        $this->assertEquals('123456', $params['orderId']);
        
        $this->assertArrayHasKey('operation', $params);
        $this->assertEquals('Sale', $params['operation']);
        
        return $params;
        
    }
    
    
    /**
     * @cover Hipay\Fullservice\Gateway\Request\RequestSerializer::toArray
     * @depends testRequestCanBeRetrieveToArray
     */
    public function testOnlyScalarParamsCanBeRetrieved($params){
    
        $this->assertArrayNotHasKey('foo', $params);
        $this->assertArrayNotHasKey('obj', $params);
    
    
    }
    
    /**
     * @cover Hipay\Fullservice\Gateway\Request\RequestSerializer::toJson
     * @depends testCanBeConstructUsingAbstractRequest
     */
    public function testRequestCanBeRetrieveToJson(RequestSerializer $rs){
        
        $array = json_decode($rs->toJson(),true);
        
        $this->assertNotNull($array);
        
    }
}