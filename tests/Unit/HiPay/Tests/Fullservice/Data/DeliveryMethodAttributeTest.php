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

namespace Unit\HiPay\Tests\Data\PaymentProduct;

use HiPay\TestCase\TestCase;
use HiPay\Fullservice\Data\DeliveryMethodAttribute;

/**
 *
 * @package HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class DeliveryMethodAttributeTest extends TestCase
{

    public function testConstruct()
    {
        $deliveryMethodAttribute = new DeliveryMethodAttribute(
            "Test",
            array(
                "FR" => "TEST_FR",
                "EN" => "TEST_EN"
            )
        );

        $this->assertInstanceOf(DeliveryMethodAttribute::class, $deliveryMethodAttribute);


        return $deliveryMethodAttribute;
    }

    /**
     * @param DeliveryMethodAttribute $deliveryMethodAttribute
     * @depends testConstruct
     */
    public function testGetDisplayName($deliveryMethodAttribute)
    {
        $deliveryMethodAttribute->setDisplayName(
            array(
                "FR" => "TEST_FR",
                "EN" => "TEST_EN"
            )
        );

        $this->assertEquals("TEST_EN", $deliveryMethodAttribute->getDisplayName());
        $this->assertEquals("TEST_FR", $deliveryMethodAttribute->getDisplayName("FR"));
        $this->assertEquals("TEST_EN", $deliveryMethodAttribute->getDisplayName("IT"));
    }

    /**
     * @param DeliveryMethodAttribute $deliveryMethodAttribute
     * @depends testConstruct
     */
    public function testGettersAndSetters($deliveryMethodAttribute)
    {
        $this->assertEquals("Test", $deliveryMethodAttribute->getCode());

        $deliveryMethodAttribute->setCode("Test2");
        $this->assertEquals("Test2", $deliveryMethodAttribute->getCode());

        $deliveryMethodAttribute->setDisplayName(
            array(
                "FR" => "TEST2_FR",
                "EN" => "TEST2_EN"
            )
        );
        $this->assertEquals("TEST2_EN", $deliveryMethodAttribute->getDisplayName());
    }
}
