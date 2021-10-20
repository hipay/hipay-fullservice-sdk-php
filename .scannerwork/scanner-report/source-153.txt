<?php
/**
 * HiPay Enterprise SDK PHP
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Apache 2.0 Licence
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * @copyright      Copyright (c) 2019 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */

namespace HiPay\Fullservice\Enum\ThreeDSTwo;

/**
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class DeliveryTimeFrame
{
    /**
     * ELECTRONIC DELIVERY
     */
    const ELECTRONIC_DELIVERY = 1;

    /**
     * SAME DAY SHIPPING
     */
    const SAME_DAY_SHIPPING = 2;

    /**
     * OVERNIGHT SHIPPING
     */
    const OVERNIGHT_SHIPPING = 3;

    /**
     * TWO DAY OR MORE SHIPPING
     */
    const TWO_DAY_OR_MORE_SHIPPING = 4;
}
