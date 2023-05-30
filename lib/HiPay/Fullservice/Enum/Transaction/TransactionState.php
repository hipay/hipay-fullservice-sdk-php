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
 * Constant values of Transaction States
 *
 * Value must be a member of the following list:
 * - completed
 * - forwarding
 * - pending
 * - declined
 * - error
 *
 * For any others information, you can refer to the section *Transaction Workflow*
 * in HiPayTPP-GatewayAPI documentation
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class TransactionState extends AbstractEnum
{
    /**
     * @var string COMPLETED Transaction is completed
     */
    public const COMPLETED = 'completed';

    /**
     * @var string FORWARDING Transaction is forwarding action
     */
    public const FORWARDING = 'forwarding';

    /**
     * @var string PENDING Transaction is in pending process
     */
    public const PENDING = 'pending';

    /**
     * @var string DECLINED Transaction is declined
     */
    public const DECLINED = 'declined';

    /**
     * @var string ERROR an error occurred
     */
    public const ERROR = 'error';
}
