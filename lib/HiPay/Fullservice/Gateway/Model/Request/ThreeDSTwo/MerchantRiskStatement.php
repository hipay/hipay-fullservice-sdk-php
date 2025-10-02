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

namespace HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo;

use HiPay\Fullservice\Model\AbstractModel;
use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\MerchantRiskStatement\GiftCard;

/**
 * Merchant's statement about the transaction he wants to proceed
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class MerchantRiskStatement extends AbstractModel
{
    /**
     * Email address to which the goods needs to be sent to
     *
     * @var string $email_delivery_address
     * @example jane.doe@test.com
     */
    public $email_delivery_address;

    /**
     * Indicates when the goods are willing to be received by the customer
     *
     * @var integer $delivery_time_frame
     * @value DeliveryTimeFrame::ELECTRONIC_DELIVERY | DeliveryTimeFrame::SAME_DAY_SHIPPING |
     * DeliveryTimeFrame::OVERNIGHT_SHIPPING | DeliveryTimeFrame::TWO_DAY_OR_MORE_SHIPPING
     */
    public $delivery_time_frame;

    /**
     * Availability of the goods
     *
     * @var integer $purchase_indicator
     * @value PurchaseIndicator::MERCHANDISE_AVAILABLE | PurchaseIndicator::FUTURE_AVAILABILITY
     */
    public $purchase_indicator;

    /**
     * For a pre-ordered purchase, the expected date that the merchandise will be available.
     *
     * @var integer $pre_order_date
     * @example 20190925
     */
    public $pre_order_date;

    /**
     * Unicity of the order for the customer
     *
     * @var integer $reorder_indicator
     * @value ReorderIndicator::FIRST_TIME_ORDERED | ReorderIndicator::REORDERED
     */
    public $reorder_indicator;

    /**
     * Address to whom the goods are to be sent
     *
     * @var integer $shipping_indicator
     * @value ShippingIndicator::SHIP_TO_CARDHOLDER_BILLING_ADDRESS | ShippingIndicator::SHIP_TO_VERIFIED_ADDRESS
     * ShippingIndicator::SHIP_TO_DIFFERENT_ADDRESS | ShippingIndicator::SHIP_TO_STORE | ShippingIndicator::DIGITAL_GOODS
     * ShippingIndicator::DIGITAL_TRAVEL_EVENT_TICKETS | ShippingIndicator::OTHER
     */
    public $shipping_indicator;

    /**
     * Information on order making through a gift card
     *
     * @var GiftCard
     */
    public $gift_card;

    /**
     * @return string
     */
    public function getEmailDeliveryAddress()
    {
        return $this->email_delivery_address;
    }

    /**
     * @return int
     */
    public function getDeliveryTimeFrame()
    {
        return $this->delivery_time_frame;
    }

    /**
     * @return int
     */
    public function getPurchaseIndicator()
    {
        return $this->purchase_indicator;
    }

    /**
     * @return int
     */
    public function getPreOrderDate()
    {
        return $this->pre_order_date;
    }

    /**
     * @return int
     */
    public function getReorderIndicator()
    {
        return $this->reorder_indicator;
    }

    /**
     * @return int
     */
    public function getShippingIndicator()
    {
        return $this->shipping_indicator;
    }

    /**
     * @return GiftCard
     */
    public function getGiftCard()
    {
        return $this->gift_card;
    }
}
