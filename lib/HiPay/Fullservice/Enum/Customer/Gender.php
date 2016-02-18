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
namespace HiPay\Fullservice\Enum\Customer;

use HiPay\Fullservice\Enum\AbstractEnum;

/**
 * # Customer gender constant values
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Gender extends AbstractEnum
{
    
    /**
     * @var string UNKNOWN  UNKNOWN gender
     */
    const UNKNOWN = 'U';
    
    /**
     * @var string MALE Male
     */
    const MALE = 'M';
    
    /**
     * @var string FEMALE Female
     */
    const FEMALE = 'F';
}