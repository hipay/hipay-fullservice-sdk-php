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
namespace HiPay\Fullservice\Enum\Customer;

use HiPay\Fullservice\Enum\AbstractEnum;

/**
 * # Customer gender constant values
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
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