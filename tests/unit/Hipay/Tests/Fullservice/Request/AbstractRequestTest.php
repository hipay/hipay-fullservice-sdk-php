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
use Hipay\Fullservice\Request\AbstractRequest;
/**
 * Model TEST request abstract.
 *
 * @category    Hipay
 * @package     Hipay\Tests
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class AbstractRequestTest extends TestCase {

	
    /**
     * @cover Hipay\Fullservice\Request\AbstractRequest::__construct
     */
    public function testCanBeConstruct(){
    
        $req = $this->getMockBuilder('Hipay\Fullservice\Request\AbstractRequest')->getMock();
    
        $this->assertInstanceOf(AbstractRequest::class, $req);
    
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