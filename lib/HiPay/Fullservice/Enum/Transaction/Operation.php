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
 * # Operation type constant values
 * 
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Operation extends AbstractEnum
{
    
    /**
     * @var string CAPTURE operation capture
     */
    const CAPTURE = 'capture';
    
    /**
     * @var string REFUND operation refund
     */
    const REFUND = 'refund';
    
    /**
     * @var string CANCEL operation cancel
     */
    const CANCEL = 'cancel';
    
    /**
     * @var string CAPTURE operation acceptChallenge
     */
    const ACCEPT_CHALLENGE = 'acceptChallenge';
    /**
     * @var string DENY_CHALLENGE operation denyChallenge
     */
    const DENY_CHALLENGE = 'denyChallenge';

    
    
   
}