<?php
/**
 * HiPay Enterprise SDK PHP
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Apache 2.0 Licence
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * @copyright      Copyright (c) 2019 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */

namespace HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo;

use HiPay\Fullservice\Model\AbstractModel;

/**
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class BrowserInfo extends AbstractModel
{
    public $ipaddr;
    public $http_accept;
    public $http_user_agent;
    public $java_enabled;
    public $javascript_enabled;
    public $language;
    public $color_depth;
    public $screen_height;
    public $screen_width;
    public $timezone;
    public $device_fingerprint;
}
