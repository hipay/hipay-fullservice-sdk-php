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

use HiPay\Fullservice\Exception\InvalidArgumentException;
use HiPay\Fullservice\Exception\UnexpectedValueException;

/**
 * Client configuration class.
 *
 * This contains HiPay username, password, environment
 * and others utils configuration.
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @var string SECURE_VAULT_ENDPOINT_PROD Secure Vault Endpoint for production
     */
    const SECURE_VAULT_ENDPOINT_PROD = "https://secure2-vault.hipay-tpp.com/rest/";

    /**
     * @var string SECURE_VAULT_ENDPOINT_STAGE Secure Vault Endpoint for test
     */
    const SECURE_VAULT_ENDPOINT_STAGE = "https://stage-secure2-vault.hipay-tpp.com/rest/";

    /**
     * @var string API_ENDPOINT_PROD API Endpoint for production
     */
    const API_ENDPOINT_PROD = "https://secure-gateway.hipay-tpp.com/rest/";

    /**
     * @var string API_ENDPOINT_STAGE API Endpoint for test
     */
    const API_ENDPOINT_STAGE = "https://stage-secure-gateway.hipay-tpp.com/rest/";

    /**
     * @var string API_ENV_STAGE Stage environment. Useful for integration tests.
     */
    const API_ENV_STAGE = 'stage';

    /**
     * @var string API_ENV_PRODUCTION Production environment. Used in real payment process
     */
    const API_ENV_PRODUCTION = 'production';

    /**
     * @var string $_apiUsername API Username provided by HiPay
     */
    private $_apiUsername;

    /**
     * @var string $_apiPassword API Password provided by HiPay
     */
    private $_apiPassword;

    /**
     * @var string $_apiEnv API Environment can be *stage* or *production*
     */
    private $_apiEnv = self::API_ENV_STAGE;

    /**
     * @var string $_apiHTTPHeaderAccept HTTP header Accept's value
     */
    private $_apiHTTPHeaderAccept = 'application/json';

    /**
     * @var array proxy configuration
     */
    private $proxy = array();

    /**
     * @var string[] $_validHTPPHeaders Allowed HTTP header Accept's values
     */
    protected $_validHTPPHeaders = array("application/json");

    /**
     * @var array Allowed proxy array key's values
     */
    private $validProxyKeys = array("host", "port", "user", "password");

    /**
     * Construct configuration object.
     *
     * Configuration Object is used by HTTP client.
     * It must be instantiate with HiPay Fullservice TPP, Process Environment.
     * Optionally, you can change the header HTTP *Accept* by another one on this:
     * - `application/json` (Default one)
     * - `application/xml` Return XML response. If you use this header, you must implement your Mapper Classes
     * - `application/json, application/xml;q=0.8, {@*}*;q=0.5` Accept 2 formats. If you use this header, you must implement your Mapper Classes
     *
     * @param string $apiUsername Merchant API Username
     * @param string $apiPassword Merchant API Password
     * @param string $apiEnv API environment. Value between 'stage' or 'production'
     * @param string $apiHTTPHeaderAccept HTTP header Accept's value.
     * @param array $proxy proxy configuration.
     * @throws InvalidArgumentException
     * @throws UnexpectedValueException
     * @see \HiPay\Fullservice\HTTP\ClientProvider::__construct Used for http client configuration (credentials,env etc ...)
     */
    public function __construct(
        $apiUsername,
        $apiPassword,
        $apiEnv = self::API_ENV_STAGE,
        $apiHTTPHeaderAccept = null,
        $proxy = array()
    ) {
        if (empty($apiUsername) || !is_string($apiUsername)) {
            throw new InvalidArgumentException("Api username can't be empty and must be a string");
        }

        if (empty($apiPassword) || !is_string($apiPassword)) {
            throw new InvalidArgumentException("Api password can't be empty and must be a string");
        }

        if ($apiEnv !== self::API_ENV_PRODUCTION && $apiEnv !== self::API_ENV_STAGE) {
            throw new UnexpectedValueException(
                "Api environment must be a string value between 'stage' or 'production'"
            );
        }

        $this->_apiUsername = $apiUsername;
        $this->_apiPassword = $apiPassword;
        $this->_apiEnv = $apiEnv;

        if (!is_null($apiHTTPHeaderAccept)) {
            if (!in_array($apiHTTPHeaderAccept, $this->_validHTPPHeaders)) {
                throw new UnexpectedValueException(
                    sprintf(
                        "Api HTTP Header Accept should be one of these values: %s",
                        implode(",", $this->_validHTPPHeaders)
                    )
                );
            }

            $this->_apiHTTPHeaderAccept = $apiHTTPHeaderAccept;
        }

        if (!empty($proxy) && !empty(array_diff(array_keys($proxy), $this->validProxyKeys))) {
            throw new UnexpectedValueException(
                sprintf(
                    "Proxy config array keys should be: %s",
                    implode(",", $this->validProxyKeys)
                )
            );
        }

        $this->proxy = $proxy;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiPassword()
     */
    public function getApiPassword()
    {
        return $this->_apiPassword;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiUsername()
     */
    public function getApiUsername()
    {
        return $this->_apiUsername;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiEnv()
     */
    public function getApiEnv()
    {
        return $this->_apiEnv;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiEndpointProd()
     */
    public function getApiEndpointProd()
    {
        return self::API_ENDPOINT_PROD;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiEndpointStage()
     */
    public function getApiEndpointStage()
    {
        return self::API_ENDPOINT_STAGE;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiEndpoint()
     */
    public function getApiEndpoint()
    {
        return $this->getApiEnv() === self::API_ENV_PRODUCTION ?
            $this->getApiEndpointProd() : $this->getApiEndpointStage();
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getSecureVaultEndpointProd()
     */
    public function getSecureVaultEndpointProd()
    {
        return self::SECURE_VAULT_ENDPOINT_PROD;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getSecureVaultEndpointStage()
     */
    public function getSecureVaultEndpointStage()
    {
        return self::SECURE_VAULT_ENDPOINT_STAGE;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getSecureVaultEndpoint()
     */
    public function getSecureVaultEndpoint()
    {
        return $this->getApiEnv() === self::API_ENV_PRODUCTION ?
            $this->getSecureVaultEndpointProd() : $this->getSecureVaultEndpointStage();
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiHTTPHeaderAccept()
     */
    public function getApiHTTPHeaderAccept()
    {
        return $this->_apiHTTPHeaderAccept;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getProxy()
     */
    public function getProxy()
    {
        return $this->proxy;
    }
}
