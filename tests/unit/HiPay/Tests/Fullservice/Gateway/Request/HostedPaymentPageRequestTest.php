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

        $this->assertAttributeEquals('visa,cb,mastercard,american-express', 'payment_product_list', $o);
        $this->assertAttributeEquals('debit-card', 'payment_product_category_list', $o);
        $this->assertAttributeEquals('Sale', 'operation', $o);

        $this->assertAttributeEquals('THIS_IS_A_CSS', 'css', $o);
        $this->assertAttributeEquals('basic_js', 'template', $o);
        $this->assertAttributeEquals('1', 'display_selector', $o);
        $this->assertAttributeEquals('1000', 'time_limit_to_pay', $o);
        $this->assertAttributeEquals('1', 'multi_use', $o);

        $this->assertAttributeEquals(array('bar'=>'foobar'),'foo', $o);
        $toCompare = new \stdClass();
        $toCompare->p1 = 'value1';
        $this->assertAttributeEquals($toCompare,'obj', $o);

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

        $this->assertAttributeEquals('cb,visa,mastercard,paypal,american-express,bcmc,azerty', 'payment_product_list', $o);

        return $o;
    }
}