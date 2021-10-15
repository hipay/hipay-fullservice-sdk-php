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
use HiPay\Fullservice\Request\AbstractRequest;

/**
 * Model TEST request abstract.
 *
 * @category    HiPay
 * @package     HiPay\Tests
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class AbstractRequestTest extends TestCase
{


    /**
     * @cover HiPay\Fullservice\Request\AbstractRequest::__construct
     */
    public function testCanBeConstruct()
    {

        $req = $this->getMockBuilder('HiPay\Fullservice\Request\AbstractRequest')->getMock();

        $this->assertInstanceOf("HiPay\Fullservice\Request\AbstractRequest", $req);

        return $req;
    }

    /**
     * @depends testCanBeConstruct
     */
    public function testPropertiesCanBeSetted(AbstractRequest $req)
    {

        $req->eci = '7';
        $req->orderId = '123456';
        $req->operation = 'Sale';

        $req->foo = array('bar' => 'foobar');

        $req->obj = new \stdClass();
        $req->obj->p1 = 'value1';

        $this->assertEquals('7', $req->eci);
        $this->assertEquals('123456', $req->orderId);
        $this->assertEquals('Sale', $req->operation);

        $this->assertEquals(array('bar' => 'foobar'), $req->foo);
        $toCompare = new \stdClass();
        $toCompare->p1 = 'value1';
        $this->assertEquals($toCompare, $req->obj);

        return $req;
    }


}
