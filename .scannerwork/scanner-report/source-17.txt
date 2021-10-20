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
 * Delivery Method attribute object
 *
 * @package HiPay\Fullservice
 * @author Etienne landais <elandais@hipay.com>
 * @copyright Copyright (c) 2017 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class DeliveryMethodAttribute
{
    const DEFAULT_LANG_ISO_CODE = "EN";

    /**
     * code
     *
     * @var string $_code Mode
     * @value STORE|CARRIER|RELAYPOINT|ELECTRONIC|TRAVEL|STANDARD|EXPRESS|PRIORITY24H|PRIORITY2H|PRIORITY1H|INSTANT
     */
    private $_code;

    /**
     * Display name
     *
     * @var array<string, string> $_displayName
     */
    private $_displayName;

    /**
     * DeliveryMode constructor.
     *
     * @param string $code
     * @param array<string, string> $displayName
     */
    public function __construct($code, $displayName)
    {
        $this->_code = $code;
        $this->_displayName = $displayName;
    }

    /**
     * @param string $langIsoCode
     * @return mixed
     */
    public function getDisplayName($langIsoCode = DeliveryMethodAttribute::DEFAULT_LANG_ISO_CODE)
    {
        if (isset($this->_displayName[$langIsoCode])) {
            return $this->_displayName[$langIsoCode];
        }

        return $this->_displayName[DeliveryMethodAttribute::DEFAULT_LANG_ISO_CODE];
    }

    /**
     * @param array<string, string> $displayName
     * @return void
     */
    public function setDisplayName($displayName)
    {
        $this->_displayName = $displayName;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @param string $code
     * @return void
     */
    public function setCode($code)
    {
        $this->_code = $code;
    }
}
