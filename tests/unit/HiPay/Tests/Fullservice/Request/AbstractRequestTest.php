<?php
/*
 * HiPay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - HiPay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace HiPay\Tests\Fullservice\Request;


use HiPay\Tests\TestCase;
use HiPay\Fullservice\Request\AbstractRequest;
/**
 * Model TEST request abstract.
 *
 * @category    HiPay
 * @package     HiPay\Tests
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class AbstractRequestTest extends TestCase {

	
    /**
     * @cover HiPay\Fullservice\Request\AbstractRequest::__construct
     */
    public function testCanBeConstruct(){
    
        $req = $this->getMockBuilder('HiPay\Fullservice\Request\AbstractRequest')->getMock();
    
        $this->assertInstanceOf("HiPay\Fullservice\Request\AbstractRequest", $req);
    
        return $req;
    }
    
    /**
     * @depends testCanBeConstruct
     */
    public function testPropertiesCanBeSetted(AbstractRequest $req){
    
        $req->eci = '7';
        $req->orderId = '123456';
        $req->operation = 'Sale';
    
        $req->foo = array('bar'=>'foobar');
    
        $req->obj = new \stdClass();
        $req->obj->p1 = 'value1';
    
        $this->assertAttributeEquals('7', 'eci', $req);
        $this->assertAttributeEquals('123456', 'orderId', $req);
        $this->assertAttributeEquals('Sale', 'operation', $req);
    
        $this->assertAttributeEquals(array('bar'=>'foobar'),'foo', $req);
        $toCompare = new \stdClass();
        $toCompare->p1 = 'value1';
        $this->assertAttributeEquals($toCompare,'obj', $req);
    
        return $req;
    }


}