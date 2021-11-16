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

namespace HiPay\Fullservice\HTTP\Configuration;

/**
 * Client configuration interface.
 *
 * This contains needed get methods.
 * Get methods are used by HTTP client to do authentication and know which endpoint to use
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
interface ConfigurationInterface
{
    /**
     * Return merchant api username
     *
     * @return string Username for authentication
     */
    public function getApiUsername();

    /**
     * Return merchant api password
     *
     * @return string Password for authentication
     */
    public function getApiPassword();

    /**
     * Return API Environment
     *
     * @return string *stage* or *production*
     */
    public function getApiEnv();

    /**
     * Return production api endpoint
     *
     * @return string $_apiEndpointProd Production api endpoint
     */
    public function getApiEndpointProd();

    /**
     * Return stage api endpoint
     *
     * @return string $_apiEndpointStage Stage api endpoint
     */
    public function getApiEndpointStage();

    /**
     * Return api endpoint based on API_ENV
     *
     * If API_ENV is equals to *stage*, we return value of API_ENDPOINT_STAGE
     * else we return value of API_ENDPOINT_PROD
     *
     * @return string API_ENDPOINT Final api endpoint
     */
    public function getApiEndpoint();

    /**
     * Return production api endpoint v2
     *
     * @return string $_apiEndpointProdV2 Production api endpoint
     */
    public function getApiEndpointV2Prod();

    /**
     * Return stage api endpoint v2
     *
     * @return string $_apiEndpointStageV2 Stage api endpoint
     */
    public function getApiEndpointV2Stage();

    /**
     * Return api endpoint v2 based on API_ENV
     *
     * If API_ENV is equals to *stage*, we return value of API_ENDPOINT_V2_STAGE
     * else we return value of API_ENDPOINT_V2_PROD
     *
     * @return string API_ENDPOINT_V2 Final api endpoint from GPC
     */
    public function getApiEndpointV2();

    /**
     * Return production data api endpoint
     *
     * @return string $_dataApiEndpointProd Production data api endpoint
     */
    public function getDataApiEndpointProd();

    /**
     * Return stage data api endpoint
     *
     * @return string $_dataApiEndpointStage Stage data api endpoint
     */
    public function getDataApiEndpointStage();

    /**
     * Return data api endpoint based on API_ENV
     *
     * If API_ENV is equals to *stage*, we return value of DATA_API_ENDPOINT_STAGE
     * else we return value of DATA_API_ENDPOINT_PRODUCTION
     *
     * @return string DATA_API_ENDPOINT Final data api endpoint
     */
    public function getDataApiEndpoint();

    /**
     * Returns user agent used for data api
     *
     * @return string DATA_API_HTTP_USER_AGENT User agent for data API
     */
    public function getDataApiHttpUserAgent();

    /**
     * Return production secure vault endpoint
     *
     * @return string $_secureVaultEndpointProd Production vault endpoint
     */
    public function getSecureVaultEndpointProd();

    /**
     * Return stage vault endpoint
     *
     * @return string $_secureVaultEndpointStage Stage vault endpoint
     */
    public function getSecureVaultEndpointStage();

    /**
     * Return vault endpoint based on API_ENV
     *
     * If API_ENV is equals to *stage*, we return value of SECURE_VAULT_ENDPOINT_STAGE
     * else we return value of SECURE_VAULT_ENDPOINT_PRODUCTION
     *
     * @return string SECURE_VAULT_ENDPOINT Final vault endpoint
     */
    public function getSecureVaultEndpoint();

    /**
     * Return Header Accept.
     *
     * @return string $_apiHTTPHeaderAccept Header Accept value (Default: application/json)
     */
    public function getApiHTTPHeaderAccept();

    /**
     * Return proxy configuration
     *
     * @return array<string, mixed> with keys "host", "port", "user", "password"
     */
    public function getProxy();

    /**
     * Return Curl timeout configuration
     *
     * @return int
     */
    public function getCurlTimeout();

    /**
     * Return Curl connect timeout configuration
     *
     * @return int
     */
    public function getCurlConnectTimeout();

    /**
     * Sets Merchant API Username
     *
     * @param string $apiUsername
     * @return void
     */
    public function setApiUsername($apiUsername);

    /**
     * Sets Merchant API Password
     *
     * @param string $apiPassword
     * @return void
     */
    public function setApiPassword($apiPassword);

    /**
     * Sets targeted environment
     *
     * @param string $apiEnv
     * @return void
     */
    public function setApiEnv($apiEnv);

    /**
     * Sets HTTP Accept header for requests
     * @param string $apiHTTPHeaderAccept
     * @return void
     */
    public function setApiHTTPHeaderAccept($apiHTTPHeaderAccept);

    /**
     * Sets proxy configuration
     *
     * @param array<string, mixed> $proxy
     * @return void
     */
    public function setProxy($proxy);


    /**
     * Sets Main timeout value for cUrl calls
     *
     * @param int $curl_timeout
     * @return void
     */
    public function setCurlTimeout($curl_timeout);

    /**
     * Sets connect timeout value for cUrl calls
     *
     * @param int $curl_connect_timeout
     * @return void
     */
    public function setCurlConnectTimeout($curl_connect_timeout);

    /**
     * Returns override sorting payment products parameter
     *
     * @return bool
     */
    public function isOverridePaymentProductSorting();

    /**
     * Sets override sorting payment products parameter
     *
     * @param bool $overridePaymentProductSorting
     * @return void
     */
    public function setOverridePaymentProductSorting($overridePaymentProductSorting);

    /**
     * Returns hostedpage v2 parameter
     *
     * @return bool
     */
    public function isHostedPageV2();

    /**
     * Sets hostedpage v2 parameter
     *
     * @param bool $hostedPageV2
     * @return void
     */
    public function setHostedPageV2($hostedPageV2);
}
