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
namespace HiPay\Fullservice\Gateway\Request\Order;


/**
 * Payment Page request class.
 * Based on HiPay\Fullservice\Gateway\Request\Order\OrderRequest
 * 
 * @see \HiPay\Fullservice\Gateway\Request\Order\OrderRequest
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 * */
class HostedPaymentPageRequest extends OrderRequest {
    
   
    public $payment_product_list;
    
    public $payment_product_category_list;
    
    public $css;
    
    public $template;
    
    public $display_selector;
    
}