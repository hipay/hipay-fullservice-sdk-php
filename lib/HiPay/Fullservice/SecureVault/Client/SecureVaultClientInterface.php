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

namespace HiPay\Fullservice\SecureVault\Client;

/**
 * Client interface for vault request send to TPP Fullservice.
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
interface SecureVaultClientInterface
{
    /**
     * Request lookup for a token
     * @param string $token
     * @param string $requestId
     * @return \HiPay\Fullservice\SecureVault\Model\PaymentCardToken Information about token updated
     */
    public function requestLookupToken($token, $requestId = '0');

    /**
     * Return current HTTP client provider
     * @return \HiPay\Fullservice\HTTP\ClientProvider The current client provider
     */
    public function getClientProvider();
}
