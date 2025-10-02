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
 * @copyright      Copyright (c) 2016 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */

namespace HiPay\Fullservice\Enum\Transaction;

use HiPay\Fullservice\Enum\AbstractEnum;

/**
 * Operation type constant values
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Operation extends AbstractEnum
{
    /**
     * @var string CAPTURE operation capture
     */
    public const CAPTURE = 'capture';

    /**
     * @var string REFUND operation refund
     */
    public const REFUND = 'refund';

    /**
     * @var string CANCEL operation cancel
     */
    public const CANCEL = 'cancel';

    /**
     * @var string CAPTURE operation acceptChallenge
     */
    public const ACCEPT_CHALLENGE = 'acceptChallenge';
    /**
     * @var string DENY_CHALLENGE operation denyChallenge
     */
    public const DENY_CHALLENGE = 'denyChallenge';
}
