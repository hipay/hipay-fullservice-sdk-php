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
class ShippingIndicator
{
    /**
     * SHIP TO CARDHOLDER'S BILLING ADDRESS
     */
    public const SHIP_TO_CARDHOLDER_BILLING_ADDRESS = 1;

    /**
     * SHIP TO ANOTHER VERIFIED ADDRESS ON FILE WITH MERCHANT
     */
    public const SHIP_TO_VERIFIED_ADDRESS = 2;

    /**
     * SHIP TO ADDRESS THAT IS DIFFERENT THAN THE CARDHOLDER'S BILLING ADDRESS
     */
    public const SHIP_TO_DIFFERENT_ADDRESS = 3;

    /**
     * SHIP TO STORE / PICK UP AT LOCAL STOR
     */
    public const SHIP_TO_STORE = 4;

    /**
     * DIGITAL GOODS (includes online services, electronic gift cards and redemption codes)
     */
    public const DIGITAL_GOODS = 5;

    /**
     * TRAVEL AND EVENT TICKETS, NOT SHIPPED
     */
    public const DIGITAL_TRAVEL_EVENT_TICKETS = 6;

    /**
     * OTHER (Gaming, digital services not shipped, e-media subscriptions)
     */
    public const OTHER = 7;
}
