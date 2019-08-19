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

namespace HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\MerchantRiskStatement;

use HiPay\Fullservice\Model\AbstractModel;

/**
 * Information about prepaid or gift cards/codes purchased
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class GiftCard extends AbstractModel
{
    /**
     * Total amount of gift cards purchased
     *
     * @var float $amount
     * @example 15.00
     */
    public $amount;

    /**
     * Total count of individual gift cards purchase
     *
     * @var integer $count
     * @example 0
     */
    public $count;

    /**
     * ISO 4217 three-digit currency code of the gift cards
     *
     * @var string $currency
     * @example EUR
     */
    public $currency;
}
