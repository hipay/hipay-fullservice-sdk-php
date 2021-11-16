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

namespace HiPay\Fullservice\Data;

/**
 * Delivery Method object
 *
 * @package HiPay\Fullservice
 * @author Aymeric Berthelot <aberthelot@hipay.com>
 * @copyright Copyright (c) 2017 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class DeliveryMethod
{
    /**
     * Internal code
     *
     * @var int $_code
     * @value
     */
    private $_code;

    /**
     * Mode of Shipping
     *
     * @var string $_mode Mode
     * @value STORE|CARRIER|RELAYPOINT|ELECTRONIC|TRAVEL
     */
    private $_mode;

    /**
     * Type of Shipping
     *
     * @var string $_shipping Code
     */
    private $_shipping;

    /**
     * DeliveryMethod constructor.
     *
     * @param int $code
     * @param string $mode
     * @param string $shipping
     */
    public function __construct($code, $mode, $shipping)
    {
        $this->_code = $code;
        $this->_mode = $mode;
        $this->_shipping = $shipping;
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->_mode;
    }

    /**
     * @param string $mode
     * @return void
     */
    public function setMode($mode)
    {
        $this->_mode = $mode;
    }

    /**
     * @return string
     */
    public function getShipping()
    {
        return $this->_shipping;
    }

    /**
     * @param string $shipping
     * @return void
     */
    public function setShipping($shipping)
    {
        $this->_shipping = $shipping;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @param int $code
     * @return void
     */
    public function setCode($code)
    {
        $this->_code = $code;
    }
}
