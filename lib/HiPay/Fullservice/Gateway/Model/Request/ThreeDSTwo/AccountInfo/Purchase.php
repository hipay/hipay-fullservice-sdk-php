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
 * Customer's purchase information
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Purchase extends AbstractModel
{
    /**
     * Number of purchases with the customer's account during the last six months.
     *
     * @var integer $count
     * @example 2
     */
    public $count;

    /**
     * Number of attempts to add a card into the customer's account in the last 24 hours.
     *
     * @var integer $card_stored_24h
     * @example 1
     */
    public $card_stored_24h;

    /**
     * Number of transactions (successful and abandoned) for this customer account across all payment accounts in the previous 24 hours.
     *
     * @var integer $payment_attempts_24h
     * @example 2
     */
    public $payment_attempts_24h;

    /**
     * Number of transactions (successful and abandoned) for this customer account across all payment accounts in the previous year.
     *
     * @var integer $payment_attempts_1y
     * @example 15
     */
    public $payment_attempts_1y;

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function getCardStored24h()
    {
        return $this->card_stored_24h;
    }

    /**
     * @return int
     */
    public function getPaymentAttempts24h()
    {
        return $this->payment_attempts_24h;
    }

    /**
     * @return int
     */
    public function getPaymentAttempts1y()
    {
        return $this->payment_attempts_1y;
    }
}
