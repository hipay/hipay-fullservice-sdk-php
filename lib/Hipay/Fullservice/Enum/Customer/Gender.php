<?php
/*
 * Hipay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - Hipay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace Hipay\Fullservice\Enum\Customer;

use Hipay\Fullservice\Enum\AbstractEnum;

/**
 * # Customer gender constant values
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
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