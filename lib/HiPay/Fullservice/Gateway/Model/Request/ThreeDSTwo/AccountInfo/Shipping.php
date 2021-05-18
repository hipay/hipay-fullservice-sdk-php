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

namespace HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo;

use HiPay\Fullservice\Model\AbstractModel;

/**
 * Customer's shipping information
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Shipping extends AbstractModel
{
    /**
     * Date when the shipping address used for this transaction was first used
     *
     * @var integer $shipping_used_date
     * @example 20180507
     */
    public $shipping_used_date;

    /**
     * Indicates if the Cardholder Name on the account is identical to the shipping Name used for this transaction.
     *
     * @var integer $name_indicator
     * @value NameIndicator::IDENTICAL | NameIndicator::DIFFERENT
     */
    public $name_indicator;

    /**
     * Indicates whether the merchant has experienced suspicious activity (including previous fraud) on the cardholder account.
     *
     * @var integer $suspicious_activity
     * @value SuspiciousActivity::NO_SUSPICIOUS_ACTIVITY | SuspiciousActivity::SUSPICIOUS_ACTIVITY
     */
    public $suspicious_activity;

    /**
     * @return int
     */
    public function getShippingUsedDate()
    {
        return $this->shipping_used_date;
    }

    /**
     * @return int
     */
    public function getNameIndicator()
    {
        return $this->name_indicator;
    }

    /**
     * @return int
     */
    public function getSuspiciousActivity()
    {
        return $this->suspicious_activity;
    }
}
