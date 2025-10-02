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
 * @copyright      Copyright (c) 2019 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 */

namespace HiPay\Fullservice\HTTP;

/**
 * Client interface for construct and send request.
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
interface Client
{
    /**
     * Create and send an HTTP request.
     *
     * - $method must be a valid HTTP METHOD (POST,GET,PUT etc ...)
     * - $endpoint is only endpoint of wanted action.
     *   Ex. To query an order, you assign '/rest/v1/order' to $endpoint
     *   Base Url is already know by Configuration object used in constructor
     * - $params Array with key/value pairs of data to send
     * - $isVault If true, perform request on secure vault endpoint
     *
     * @param string $method HTTP method
     * @param string $endpoint Api Endpoint for this request. Base url is determined by Configuration Object
     * @param array<string, mixed> $params Request params to apply.
     * @param array<int, string> $additionalHeaders
     * @param bool $isVault If true, perform request on secure vault endpoint
     * @param bool $isData If true, perform request on HiPay data API
     *
     * @throws \HiPay\Fullservice\Exception\RuntimeException
     * @throws \HiPay\Fullservice\Exception\InvalidArgumentException
     * @return \HiPay\Fullservice\HTTP\Response\AbstractResponse
     */
    public function request($method, $endpoint, array $params = array(), array $additionalHeaders = array(), $isVault = false, $isData = false);
}
