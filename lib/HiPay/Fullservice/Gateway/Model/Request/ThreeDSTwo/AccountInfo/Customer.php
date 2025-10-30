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
 */

namespace HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo;

use HiPay\Fullservice\Model\AbstractModel;

/**
 * Customer's account information
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Customer extends AbstractModel
{
    /**
     * Customer's last change on his account (YYYYMMDD)
     *
     * @var integer $account_change
     * @example 20180507
     */
    public $account_change;

    /**
     * Date when the customer created his account on the merchant's website (YYYYMMDD)
     *
     * @var integer $opening_account_date
     * @example 20180507
     */
    public $opening_account_date;

    /**
     * Date when the customer made a password change on his account (YYYYMMDD)
     *
     * @var integer $password_change
     * @example 20180507
     */
    public $password_change;

    /**
     * @return int
     */
    public function getAccountChange()
    {
        return $this->account_change;
    }

    /**
     * @return int
     */
    public function getOpeningAccountDate()
    {
        return $this->opening_account_date;
    }

    /**
     * @return int
     */
    public function getPasswordChange()
    {
        return $this->password_change;
    }
}
