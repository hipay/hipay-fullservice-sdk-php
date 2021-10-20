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

use HiPay\Fullservice\Gateway\Request\Order\HostedPaymentPageRequest;
use HiPay\Tests\TestCase;

/**
 *
 * @package HiPay\Tests
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class HostedPaymentPageRequestTest extends TestCase
{

    /**
     * @cover HiPay\Fullservice\Gateway\Request\Order\HostedPaymentPageRequest::__construct
     * @return HostedPaymentPageRequest
     */
    public function testCanBeConstruct(){

        $o = new HostedPaymentPageRequest();

        $this->assertInstanceOf("HiPay\Fullservice\Gateway\Request\Order\HostedPaymentPageRequest", $o);

        return $o;
    }

    /**
     * @depends testCanBeConstruct
     * @param HostedPaymentPageRequest $o
     * @return HostedPaymentPageRequest
     */
    public function testPropertiesCanBeSetted(HostedPaymentPageRequest $o){

        $o->payment_product_list = 'visa,cb,mastercard,american-express';
        $o->payment_product_category_list = 'debit-card';
        $o->operation = 'Sale';

        $o->css = 'THIS_IS_A_CSS';
        $o->template = 'basic_js';
        $o->display_selector = "1";
        $o->time_limit_to_pay = "1000";
        $o->multi_use = "1";

        $o->foo = array('bar'=>'foobar');

        $o->obj = new \stdClass();
        $o->obj->p1 = 'value1';

        $this->assertEquals('visa,cb,mastercard,american-express', $o->payment_product_list);
        $this->assertEquals('debit-card', $o->payment_product_category_list);
        $this->assertEquals('Sale', $o->operation);

        $this->assertEquals('THIS_IS_A_CSS', $o->css);
        $this->assertEquals('basic_js', $o->template);
        $this->assertEquals('1', $o->display_selector);
        $this->assertEquals('1000', $o->time_limit_to_pay);
        $this->assertEquals('1', $o->multi_use);

        $this->assertEquals(array('bar'=>'foobar'), $o->foo);
        $toCompare = new \stdClass();
        $toCompare->p1 = 'value1';
        $this->assertEquals($toCompare, $o->obj);

        return $o;
    }

    /**
     * @depends testCanBeConstruct
     * @param HostedPaymentPageRequest $o
     * @return HostedPaymentPageRequest
     */
    public function testProductListCanBeSorted(HostedPaymentPageRequest $o){

        $o->payment_product_list = 'mastercard, american-express,cb ,paypal, azerty,bcmc,visa';

        $o->reorderPaymentProductList();

        $this->assertEquals('cb,visa,mastercard,paypal,american-express,bcmc,azerty', $o->payment_product_list);

        return $o;
    }
}