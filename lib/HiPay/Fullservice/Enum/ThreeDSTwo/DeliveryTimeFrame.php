<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/06/19
 * Time: 16:15
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
