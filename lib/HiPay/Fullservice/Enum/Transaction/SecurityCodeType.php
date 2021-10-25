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
 * # Security Code Type constant values
 *
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class SecurityCodeType extends AbstractEnum
{
    /**
     * @var string NONE no security code. Ex.: Maestro
     */
    public const NONE = 'none';

    /**
     * @var string NOT_APPLICABLE Security code not applicable. Ex.: CMC (for domestic networks or specific issuer payment products, we don't know if there's a security code as it depends on the card scheme)
     */
    public const NOT_APPLICABLE = 'not_applicable';

    /**
     * @var string CVV Type CVV. EX.: Visa, MasterCard
     */
    public const CVV = 'cvv';

    /**
     * @var string CID Type cid. Ex.: American Express
     */
    public const CID = 'cid';
}
