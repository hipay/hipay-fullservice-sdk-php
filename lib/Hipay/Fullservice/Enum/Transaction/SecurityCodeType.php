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
namespace Hipay\Fullservice\Enum\Transaction;

use Hipay\Fullservice\Enum\AbstractEnum;

/**
 * # Security Code Type constant values
 * 
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class SecurityCodeType extends AbstractEnum
{
    
    /**
     * @var string NONE no security code. Ex.: Maestro
     */
    const NONE = 'none';

    /**
     * @var string NOT_APPLICABLE Security code not applicable. Ex.: CMC (for domestic networks or specific issuer payment products, we don't know if there's a security code as it depends on the card scheme)
     */
    const NOT_APPLICABLE = 'not_applicable';
    
    /**
     * @var string CVV Type CVV. EX.: Visa, MasterCard
     */
    const CVV = 'cvv';

    /**
     * @var string CID Type cid. Ex.: American Express
     */
    const CID = 'cid';

    
   
}