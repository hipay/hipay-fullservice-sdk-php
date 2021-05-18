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

namespace HiPay\Tests\Helper;

use HiPay\Tests\TestCase;
use HiPay\Fullservice\Helper\Convert;

/**
 *
 * @package HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class ConvertTest extends TestCase
{
    public function testToCamelCase()
    {
        $this->assertEquals("testSnakeCaseString1", Convert::toCamelCase("test_snake_case_string_1"));
        $this->assertEquals("testSnakeCase2", Convert::toCamelCase("test_snake case 2"));
        $this->assertEquals("testSnakeCase3", Convert::toCamelCase("TEST_SNAKE CASE   3"));
    }

    public function testToUnderscored()
    {
        $this->assertEquals("test_snake_case_string_1", Convert::toUnderscored("testSnakeCaseString1"));
        $this->assertEquals("testSnakeCase2", Convert::toCamelCase("test_snake case 2"));
        $this->assertEquals("testSnakeCase3", Convert::toCamelCase("TEST_SNAKE CASE   3"));
    }

    public function testArrayKeysToCamelCase()
    {
        $arraySnakeCase = array(
            "first_key" => array(
                "first_sub_key" => "test",
                "second_sub_key" => "test"
            ),
            "second_key" => array(
                array(1, 2, 3),
                array(1, 2, 3)
            ),
            "third" => "test"
        );

        $arrayCamelCase = Convert::arrayKeysToCamelCase($arraySnakeCase);

        $this->assertArrayHasKey("firstKey", $arrayCamelCase);
        $this->assertArrayHasKey("secondKey", $arrayCamelCase);
        $this->assertArrayHasKey("firstSubKey", $arrayCamelCase["firstKey"]);
        $this->assertArrayHasKey("secondSubKey", $arrayCamelCase["firstKey"]);
    }
}
