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

namespace Unit\HiPay\Tests\Fullservice\Request;

use HiPay\TestCase\TestCase;
use HiPay\Fullservice\Request\RequestSerializer;
use Unit\HiPay\Tests\Mock\MockComplexModel;

/**
 *
 * @package HiPay\Tests
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class RequestSerializerTest extends TestCase
{


    /**
     * @cover HiPay\Fullservice\Request\RequestSerializer::__construct
     * @uses \HiPay\Fullservice\Request\AbstractRequest
     */
    public function testCanBeConstructUsingAbstractRequest()
    {

        $req = $this->getMockBuilder('HiPay\Fullservice\Request\AbstractRequest')->getMock();
        $req->eci = '7';
        $req->orderId = '123456';
        $req->operation = 'Sale';

        $req->foo = array('bar' => 'foobar');

        $req->obj = new \stdClass();
        $req->obj->p1 = 'value1';

        $req->model = new MockComplexModel();

        $subRequest = $this->getMockBuilder('HiPay\Fullservice\Request\AbstractRequest')->getMock();

        $subRequest->firstname = "test";
        $subRequest->lastname = "test";

        $req->subRequest = $subRequest;

        $rs = new RequestSerializer($req);
        $this->assertInstanceOf("HiPay\Fullservice\Request\RequestSerializer", $rs);

        return $rs;
    }

    /**
     * @cover HiPay\Fullservice\Request\RequestSerializer::toArray
     * @depends testCanBeConstructUsingAbstractRequest
     */
    public function testRequestCanBeRetrieveToArray(RequestSerializer $rs)
    {

        $params = $rs->toArray();

        $this->assertArrayHasKey('eci', $params);
        $this->assertEquals('7', $params['eci']);

        $this->assertArrayHasKey('orderId', $params);
        $this->assertEquals('123456', $params['orderId']);

        $this->assertArrayHasKey('operation', $params);
        $this->assertEquals('Sale', $params['operation']);

        $this->assertArrayHasKey('firstname', $params);
        $this->assertEquals('test', $params['firstname']);

        $this->assertArrayHasKey('lastname', $params);
        $this->assertEquals('test', $params['lastname']);

        $stringExpected = preg_replace(
            "/\s+/",
            "",
            file_get_contents(dirname(__FILE__) . "/../../data/toJsonRequestSerializer.json")
        );

        $this->assertArrayHasKey('model', $params);
        $this->assertEquals($stringExpected, $params['model']);

        return $params;

    }


    /**
     * @cover HiPay\Fullservice\Gateway\Request\RequestSerializer::toArray
     * @depends testRequestCanBeRetrieveToArray
     */
    public function testOnlyScalarParamsCanBeRetrieved($params)
    {
        $this->assertArrayHasKey('foo', $params);
        $this->assertArrayNotHasKey('obj', $params);
    }

    /**
     * @cover HiPay\Fullservice\Gateway\Request\RequestSerializer::toJson
     * @depends testCanBeConstructUsingAbstractRequest
     */
    public function testRequestCanBeRetrieveToJson(RequestSerializer $rs)
    {

        $array = json_decode($rs->toJson(), true);

        $this->assertNotNull($array);
    }
}
