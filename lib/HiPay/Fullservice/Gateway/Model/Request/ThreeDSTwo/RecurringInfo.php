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

/**
 * Information on recurring transaction
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class RecurringInfo extends AbstractModel
{
    /**
     * Date after which no further authorisations shall be performed
     *
     * @var integer $expiration_date
     * @example 20180507
     */
    public $expiration_date;

    /**
     * Indicates the minimum number of days between authorisations.
     *
     * @var integer
     * @example 31
     */
    public $frequency;

    /**
     * @return int
     */
    public function getExpirationDate()
    {
        return $this->expiration_date;
    }

    /**
     * @return int
     */
    public function getFrequency()
    {
        return $this->frequency;
    }
}
