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
 * Browser Information
 *
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
    /**
     * Customer's IP address
     *
     * @var string $ipaddr
     * @example 127.0.0.1
     */
    public $ipaddr;

    /**
     * This element should contain the exact content of the HTTP Accept header as sent to the merchant from the customer's browser
     *
     * @var string $http_accept
     * @example "application/json"
     */
    public $http_accept;

    /**
     * This element should contain the exact content of the HTTP User-Agent header as sent to the merchant from the customer's browser
     *
     * @var string $http_user_agent
     * @example "Mozilla/4.0"
     */
    public $http_user_agent;

    /**
     * Boolean that represents the ability of the cardholder browser to execute Java.
     *
     * @var boolean $java_enabled
     * @example true
     */
    public $java_enabled;

    /**
     * Boolean that represents the ability of the cardholder browser to execute JavaScript.
     *
     * @var boolean $javascript_enabled
     * @example true
     */
    public $javascript_enabled;

    /**
     * Value representing the browser language as defined in IETF BCP47.
     *
     * @var string $language
     * @example fr
     */
    public $language;

    /**
     * Value representing the bit depth of the colour palette for displaying images, in bits per pixel.
     *
     * @var integer $color_depth
     * @example 24
     */
    public $color_depth;

    /**
     * Total height of the Cardholder’s screen in pixels
     *
     * @var integer $screen_height
     * @example 1980
     */
    public $screen_height;

    /**
     * Total width of the cardholder’s screen in pixels.
     *
     * @var integer $screen_width
     * @example 1080
     */
    public $screen_width;

    /**
     * Time-zone offset in minutes between UTC and the Cardholder browser local time.
     *
     * @var string $timezone
     */
    public $timezone;

    /**
     * @return string
     */
    public function getIpaddr()
    {
        return $this->ipaddr;
    }

    /**
     * @return string
     */
    public function getHttpAccept()
    {
        return $this->http_accept;
    }

    /**
     * @return string
     */
    public function getHttpUserAgent()
    {
        return $this->http_user_agent;
    }

    /**
     * @return bool
     */
    public function isJavaEnabled()
    {
        return $this->java_enabled;
    }

    /**
     * @return bool
     */
    public function isJavascriptEnabled()
    {
        return $this->javascript_enabled;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return int
     */
    public function getColorDepth()
    {
        return $this->color_depth;
    }

    /**
     * @return int
     */
    public function getScreenHeight()
    {
        return $this->screen_height;
    }

    /**
     * @return int
     */
    public function getScreenWidth()
    {
        return $this->screen_width;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

}
