<?php
/**
 * HiPay Enterprise SDK Prestashop
 *
 * 2017 HiPay
 *
 * NOTICE OF LICENSE
 *
 * @author    HiPay <support.tpp@hipay.com>
 * @copyright 2018 HiPay
 * @license   https://github.com/hipay/hipay-enterprise-sdk-prestashop/blob/master/LICENSE.md
 */

namespace HiPay\Tests\Fullservice\Model;

use HiPay\Tests\TestCase;
use HiPay\Tests\Mock\MockComplexModel;
use HiPay\Tests\Mock\MockSimpleModel;

/**
 *
 * @package HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2018 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class AbstractModelTest extends TestCase
{

    protected $abstractName = 'HiPay\Fullservice\Model\AbstractModel';

    public function testToArrayComplex()
    {
        $mock = new MockComplexModel();

        $expectedValues = array(
            "intAttribute" => 1,
            "stringAttribute" => "test",
            "arrayAttribute" => array("test", "test"),
            "serializableObject" => new MockSimpleModel(true)
        );

        $this->assertEquals($expectedValues, $mock->toArray());
    }

    public function testToArraySimple()
    {
        $mock = new MockSimpleModel();

        $expectedValues = array(
            "intAttribute" => 1,
            "stringAttribute" => "",
            "arrayAttribute" => array("test", "test"),
            "objectAttribute" => null
        );

        $this->assertEquals($expectedValues, $mock->toArray());
    }

    public function testJsonSerializeComplex()
    {
        $mock = new MockComplexModel();

        $expectedValues = array(
            "intAttribute" => 1,
            "stringAttribute" => "test",
            "arrayAttribute" => array("test", "test"),
            "serializableObject" => new MockSimpleModel(true)
        );

        $this->assertEquals($expectedValues, $mock->jsonSerialize());
    }

    public function testJsonSerializeSimple()
    {
        $mock = new MockSimpleModel();

        $expectedValues = array(
            "intAttribute" => 1,
            "arrayAttribute" => array("test", "test"),
            "objectAttribute" => null
        );

        $this->assertEquals($expectedValues, $mock->jsonSerialize());
    }

    public function testToJson()
    {
        $stringExpected = preg_replace("/\s+/", "", file_get_contents(dirname(__FILE__) . "/../../data/toJson.json"));

        $mock = new MockComplexModel();

        $this->assertEquals($stringExpected, $mock->toJson());
    }
}
