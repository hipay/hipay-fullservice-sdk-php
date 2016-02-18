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
use Hipay\Fullservice\Gateway\Request\Order\OrderRequest;

/**
 *
 * @package Hipay\Tests
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class OrderRequestTest extends TestCase
{
    
    /**
     * @cover Hipay\Fullservice\Gateway\Request\OrderRequest::__construct
     */
    public function testCanBeConstruct(){
        
        $o = new OrderRequest();
        
        $this->assertInstanceOf("Hipay\Fullservice\Gateway\Request\Order\OrderRequest", $o);
        
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
        
        $this->assertAttributeEquals('7', 'eci', $o);
        $this->assertAttributeEquals('123456', 'orderId', $o);
        $this->assertAttributeEquals('Sale', 'operation', $o);
        
        $this->assertAttributeEquals(array('bar'=>'foobar'),'foo', $o);
        $toCompare = new \stdClass();
        $toCompare->p1 = 'value1';
        $this->assertAttributeEquals($toCompare,'obj', $o);
        
        return $o;
    }
    
    
}