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
 * @copyright      Copyright (c) 2017 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */

namespace HiPay\Fullservice\Gateway\Request\Maintenance;

use HiPay\Fullservice\Gateway\Request\CommonRequest;

/**
 * Maintenance request class.
 * Base order information to send
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      Aymeric Berthelot <aberthelot@hipay.com>
 * @copyright   Copyright (c) 2017 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 * */
class MaintenanceRequest extends CommonRequest
{
    /**
     *  Operation type for maintenance request
     *
     * @var string
     */
    public $operation;


    /**
     *  Operation ID for maintenance
     *
     * @var string
     */
    public $operation_id;

    /**
     *  Amount of maintenance operation
     *
     * @var float|string
     */
    public $amount;
}
