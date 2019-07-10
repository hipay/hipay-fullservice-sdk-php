<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/06/19
 * Time: 16:15
 */

namespace HiPay\Fullservice\Enum\ThreeDSTwo;

/**
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class NameIndicator
{
    /**
     * Account name identical to shipping Name
     */
    const IDENTICAL = 1;

    /**
     * Account name different than shipping Name
     */
    const DIFFERENT = 2;
}
