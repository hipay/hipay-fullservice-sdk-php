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
 *
 */

namespace HiPay\Fullservice\Gateway\Request\Info;

use HiPay\Fullservice\Request\AbstractRequest;

/**
 * Delivery shipping information
 *
 * Specific for ONEY FACILY PAY
 *
 * @package HiPay\Fullservice
 * @author Aymeric Berthelot <aberthelot@hipay.com>
 * @copyright Copyright (c) 2017 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class DeliveryShippingInfoRequest extends AbstractRequest
{
    /**
     * Estimated date for the delivery
     *
     * @var string $delivery_date
     * @format YYYY-MM-DD
     * @required Only for ONEY FACILY PAY
     *
     */
    public $delivery_date;

    /**
     * Delivery Method from HiPay\Fullservice\Data\DeliveryMethod\Collection
     * Eg "{"mode":"STORE","shipping":"STANDARD"}'"
     *
     * @var string $delivery_method
     * @format JSON
     * @required Only for ONEY FACILY PAY
     */
    public $delivery_method;
}
