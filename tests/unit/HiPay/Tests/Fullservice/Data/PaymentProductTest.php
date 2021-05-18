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

namespace HiPay\Tests\Data;

use HiPay\Tests\TestCase;
use HiPay\Fullservice\Data\PaymentProduct;

/**
 *
 * @package HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2018 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PaymentProductTest extends TestCase
{

    public function testConstructFromArray()
    {
        $data = array(
            "productCode" => "aura",
            "brandName" => "Aura",
            "category" => "credit-card",
            "comment" => "Available only in BRL currency.",
            "can3ds" => 0,
            "canRecurring" => 0,
            "canManualCapture" => 1,
            "canManualCapturePartially" => 1,
            "canRefund" => 0,
            "canRefundPartially" => 0,
            "basketRequired" => 0,
            "currencies" => array("BRL"),
            "countries" => array("BR"),
            "checkoutFieldsMandatory" => array(),
        );

        $paymentProduct = new PaymentProduct($data);

        $this->assertEquals("aura", $paymentProduct->getProductCode());
        $this->assertEquals("Aura", $paymentProduct->getBrandName());
        $this->assertEquals("credit-card", $paymentProduct->getCategory());
        $this->assertEquals("Available only in BRL currency.", $paymentProduct->getComment());
        $this->assertFalse($paymentProduct->getCan3ds());
        $this->assertFalse($paymentProduct->getCanRecurring());
        $this->assertTrue($paymentProduct->getCanManualCapture());
        $this->assertTrue($paymentProduct->getCanManualCapturePartially());
        $this->assertFalse($paymentProduct->getCanRefund());
        $this->assertFalse($paymentProduct->getCanRefundPartially());
        $this->assertFalse($paymentProduct->getBasketRequired());
        $this->assertEquals(array("BRL"), $paymentProduct->getCurrencies());
        $this->assertEquals(array("BR"), $paymentProduct->getCountries());
        $this->assertEquals(array(), $paymentProduct->getCheckoutFieldsMandatory());
        $this->assertEquals(array(), $paymentProduct->getAdditionalFields());
    }

    public function testToArray()
    {
        $data = array(
            "productCode" => "aura",
            "brandName" => "Aura",
            "category" => "credit-card",
            "comment" => "Available only in BRL currency.",
            "can3ds" => 0,
            "canRecurring" => 0,
            "canManualCapture" => 1,
            "canManualCapturePartially" => 1,
            "canRefund" => 0,
            "canRefundPartially" => 0,
            "basketRequired" => 0,
            "currencies" => array("BRL"),
            "countries" => array("BR"),
            "checkoutFieldsMandatory" => Array(),
            "additionalFields" => Array(),
            "priority" => 99
        );

        $paymentProduct = new PaymentProduct($data);

        $this->assertEquals($paymentProduct->toArray(), $data);
    }
}
