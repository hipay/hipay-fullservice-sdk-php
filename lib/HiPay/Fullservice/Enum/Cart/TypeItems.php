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

namespace HiPay\Fullservice\Enum\Cart;

use HiPay\Fullservice\Enum\AbstractEnum;

/**
 * Type items for params Basket
 *
 * @package HiPay\Fullservice
 * @author Aymeric Berthelot <aberthelot@hipay.com>
 * @copyright Copyright (c) 2017 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class TypeItems extends AbstractEnum
{
    /**
     *  Type for an article item
     *
     * @var string GOOD
     */
    public const GOOD = 'good';

    /**
     *  Type for an discount item
     *
     * @var string DISCOUNT
     */
    public const DISCOUNT = 'discount';

    /**
     *  Type for an shipping item
     *
     * @var string FEE
     */
    public const FEE = 'fee';
}
