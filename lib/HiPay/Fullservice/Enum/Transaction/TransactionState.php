<?php
/*
 * HiPay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - HiPay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
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
 * For any others informations, you can refer to the section *Transaction Workflow*
 * in HiPayTPP-GatewayAPI documentation 
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class TransactionState extends AbstractEnum
{
    /**
     * @var string COMPLETED Transaction is completed
     */
    const COMPLETED = 'completed';
    
    /**
     * @var string FORWARDING Transaction is forwarding action
     */
    const FORWARDING = 'forwarding';
    
    /**
     * @var string PENDING Transaction is in pending process
     */
    const PENDING = 'pending';
    
    /**
     * @var string DECLINED Transaction is declined
     */
    const DECLINED = 'declined';
    
    /**
     * @var string ERROR an error occured
     */
    const ERROR = 'error';
}