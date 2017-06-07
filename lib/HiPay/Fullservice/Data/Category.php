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
 * Category object
 *
 * @package HiPay\Fullservice
 * @author Aymeric Berthelot <aberthelot@hipay.com>
 * @copyright Copyright (c) 2017 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Category {

    CONST DEFAULT_LANG_ISO_CODE = "EN";

    /**
     * @var int $_code Technical code
     */
    private $_code;

    /**
     * @var string $_name Human readable value
     */
    private $_name;

    /**
     * @var array $_locals translations
     */
    private $_locals;

    /**
     * Category constructor.
     *
     * @param $code
     * @param $name
     */
    public function __construct($code, $name, $locals) {

        $this->_code = $code;
        $this->_name = $name;
        $this->_locals = $locals;
    }

    /**
     * @return int
     */
    public function getCode() {
        return $this->_code;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->_name;
    }

    /**
     * @return string
     */
    public function getLocal($langIsoCode = DeliveryMethodAttribute::DEFAULT_LANG_ISO_CODE) {

        if (isset($this->_locals[$langIsoCode])) {
            return $this->_locals[$langIsoCode];
        }

        return $this->_locals[Category::DEFAULT_LANG_ISO_CODE];
    }

    /**
     * @param array $locals
     */
    public function setLocals($locals) {
        $this->_locals = $locals;
    }

}
