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
use HiPay\Fullservice\Helper\MerchantPromotionCalculator;

/**
 *
 * @package HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class MerchantPromotionCalculatorTest extends TestCase
{
    public function testCalculate()
    {
        $this->assertEquals("3x0001", MerchantPromotionCalculator::calculate("3xcb", 150.00));
        $this->assertEquals("4x0003", MerchantPromotionCalculator::calculate("4xcb-no-fees", 1500));
        $this->assertEquals("4x0002", MerchantPromotionCalculator::calculate("4xcb", 400));
        $this->assertEquals(null, MerchantPromotionCalculator::calculate("3xcb", 30.00));
        $this->assertEquals(null, MerchantPromotionCalculator::calculate("cb", 2000.00));
    }
}
