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
     * Return production api endpoint from GCP
     *
     * @return string $_apiEndpointProdGcp Production api endpoint from GPC
     */
    public function getApiEndpointGCPProd();

    /**
     * Return stage api endpoint from GCP
     *
     * @return string $_apiEndpointStageGcp Stage api endpoint from GPC
     */
    public function getApiEndpointGCPStage();

    /**
     * Return api endpoint from GCP based on API_ENV
     *
     * If API_ENV is equals to *stage*, we return value of API_ENDPOINT_GCP_STAGE
     * else we return value of API_ENDPOINT_GCP_PROD
     *
     * @return string API_ENDPOINT_GCP Final api endpoint from GPC
     */
    public function getApiEndpointGCP();

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
     * @return array with keys "host", "port", "user", "password"
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
     */
    public function setApiUsername($apiUsername);

    /**
     * Sets Merchant API Password
     *
     * @param string $apiPassword
     */
    public function setApiPassword($apiPassword);

    /**
     * Sets targeted environment
     *
     * @param string $apiEnv
     */
    public function setApiEnv($apiEnv);

    /**
     * Sets HTTP Accept header for requests
     * @param string $apiHTTPHeaderAccept
     */
    public function setApiHTTPHeaderAccept($apiHTTPHeaderAccept);

    /**
     * Sets proxy configuration
     *
     * @param array $proxy
     */
    public function setProxy($proxy);


    /**
     * Sets Main timeout value for cUrl calls
     *
     * @param int $curl_timeout
     */
    public function setCurlTimeout($curl_timeout);

    /**
     * Sets connect timeout value for cUrl calls
     *
     * @param int $curl_connect_timeout
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
     */
    public function setOverridePaymentProductSorting($overridePaymentProductSorting);
}
