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

namespace HiPay\Tests\Fullservice\Request;

use HiPay\Tests\TestCase;
use HiPay\Fullservice\Gateway\Request\Order\OrderRequest;

/**
 *
 * @package HiPay\Tests
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class OrderRequestTest extends TestCase
{
    
    /**
     * @cover HiPay\Fullservice\Gateway\Request\OrderRequest::__construct
     */
    public function testCanBeConstruct(){
        
        $o = new OrderRequest();
        
        $this->assertInstanceOf("HiPay\Fullservice\Gateway\Request\Order\OrderRequest", $o);
        
        return $o;
    }
    
    /**
     * @depends testCanBeConstruct
     */
    public function testPropertiesCanBeSetted(OrderRequest $o){
        
        $o->eci = '7';
        $o->orderId = '123456';
        $o->operation = 'Sale';
        
        $o->foo = array('bar'=>'foobar');
        
        $o->obj = new \stdClass();
        $o->obj->p1 = 'value1';
        
        $this->assertEquals('7', $o->eci);
        $this->assertEquals('123456', $o->orderId);
        $this->assertEquals('Sale', $o->operation);
        
        $this->assertEquals(array('bar'=>'foobar'), $o->foo);
        $toCompare = new \stdClass();
        $toCompare->p1 = 'value1';
        $this->assertEquals($toCompare, $o->obj);
        
        return $o;
    }
    
    
}