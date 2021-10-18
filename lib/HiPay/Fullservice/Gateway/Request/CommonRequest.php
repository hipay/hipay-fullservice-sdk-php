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
 * @copyright      Copyright (c) 2017 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 */

namespace HiPay\Fullservice\Gateway\Request;

use HiPay\Fullservice\Request\AbstractRequest;

/**
 * Common param between Order and Maintenance Request
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      Aymeric Berthelot <aberthelot@hipay.com>
 * @copyright   Copyright (c) 2017 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class CommonRequest extends AbstractRequest
{

    /**
     * You can use these parameters to submit custom values you wish to show in HiPay back office transaction details,
     * receive back in the API response messages, in the notifications or to activate specific FPS rules.
     *
     * Accept JSON encoded string or PHP array
     * Example: {"shipping_method":"click and collect", "first_order":"0", "products_list":"First product, Second product, Third product"}
     * Alternative Ex: ["shipping_method" => "click and collect", "first_order" => "0"]
     *
     * @var array<string, mixed>|string $custom_data Custom data (JSON).
     */
    public $custom_data;

    /**
     * Technical parameter to track the source of request. For example the version of your CMS.
     *
     * Accept JSON encoded string or PHP array
     * Eg. {"source":"CMS","brand":"magento","brand_version":"1.9.2.3","integration_version":"1.5.0"}
     * Alternative Ex. ["source" => "CMS", "brand" => "magento", "brand_version" => "1.9.2.3"]
     *
     * @var array<string, mixed>|string $source (JSON).
     */
    public $source;

    /**
     * Technical parameter to send the user cart on the Request
     *
     * See and use the class \HiPay\Fullservice\Gateway\Model\Cart\Cart and \HiPay\Fullservice\Gateway\Model\Cart\Item
     *
     * @var \HiPay\Fullservice\Gateway\Model\Cart\Cart|string $basket
     * @format Cart|JSON
     */
    public $basket;
}
