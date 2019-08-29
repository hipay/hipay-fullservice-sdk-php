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
     * @var string DATA_API_ENDPOINT_PROD Data API Endpoint for production
     */
    const DATA_API_ENDPOINT_PROD = "https://data.hipay.com/";

    /**
     * @var string DATA_API_ENDPOINT_STAGE Data API Endpoint for test
     */
    const DATA_API_ENDPOINT_STAGE = "https://stage-data.hipay.com/";

    /**
     * @var string DATA_API_HTTP_USER_AGENT custom user agent for the data API
     */
    const DATA_API_HTTP_USER_AGENT = 'sdk-php-hipay';

    /**
     * @var string API_ENV_STAGE Stage environment. Useful for integration tests.
     */
    const API_ENV_STAGE = 'stage';

    /**
     * @var string API_ENV_PRODUCTION Production environment. Used in real payment process
     */
    const API_ENV_PRODUCTION = 'production';
    /**
     * @var string[] $_validHTPPHeaders Allowed HTTP header Accept's values
     */
    protected $_validHTPPHeaders = array("application/json");
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
     * @var array Allowed proxy array key's values
     */
    private $validProxyKeys = array("host", "port", "user", "password");

    /**
     * @var int Timeout value for curl calls
     */
    private $curl_timeout = 15;

    /**
     * @var int Timeout value for curl connection
     */
    private $curl_connect_timeout = 15;

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
     * @param array $params Needs to be an array with the following values : apiUsername, apiPassword, [apiEnv], [apiHTTPHeaderAccept], [proxy], [timeout], [connect_timeout]
     */
    public function __construct($params)
    {
        $args = func_get_args();
        $nArgs = func_num_args();
        if ($nArgs > 0) {
            if ($nArgs >= 2 && $nArgs <= 7) {
                $params = call_user_func_array(array($this, "__constructDirect"), $args);
            }
        } else {
            throw new InvalidArgumentException("Constructor must be called with at least apiUsername and apiPassword parameters");
        }

        if (empty($params['apiUsername']) || !is_string($params['apiUsername'])) {
            throw new InvalidArgumentException("Api username can't be empty and must be a string");
        }

        if (empty($params['apiPassword']) || !is_string($params['apiPassword'])) {
            throw new InvalidArgumentException("Api password can't be empty and must be a string");
        }

        $this->_apiUsername = $params['apiUsername'];
        $this->_apiPassword = $params['apiPassword'];

        if (isset($params['apiEnv']) && !is_null($params['apiEnv'])) {
            if ($params['apiEnv'] !== self::API_ENV_PRODUCTION && $params['apiEnv'] !== self::API_ENV_STAGE) {
                throw new UnexpectedValueException(
                    "Api environment must be a string value between 'stage' or 'production'"
                );
            } else {
                $this->_apiEnv = $params['apiEnv'];
            }
        }


        if (isset($params['apiHTTPHeaderAccept']) && !is_null($params['apiHTTPHeaderAccept'])) {

            if (!in_array($params['apiHTTPHeaderAccept'], $this->_validHTPPHeaders)) {
                throw new UnexpectedValueException(
                    sprintf(
                        "Api HTTP Header Accept should be one of these values: %s",
                        implode(",", $this->_validHTPPHeaders)
                    )
                );
            }

            $this->_apiHTTPHeaderAccept = $params['apiHTTPHeaderAccept'];
        }

        if (isset($params['proxy']) && !is_null($params['proxy'])) {
            if (!is_array($params['proxy']) || !empty(array_diff(array_keys($params['proxy']), $this->validProxyKeys))) {
                throw new UnexpectedValueException(
                    sprintf(
                        "Proxy config array keys should be: %s",
                        implode(",", $this->validProxyKeys)
                    )
                );
            } else {
                $this->proxy = $params['proxy'];
            }
        }

        if (isset($params['timeout']) && !is_null($params['timeout'])) {
            if (!is_integer($params['timeout']) || $params['timeout'] < 0) {
                throw new InvalidArgumentException("Curl timeout can't be empty and must be a positive integer");
            } else {
                $this->curl_timeout = $params['timeout'];
            }
        }

        if (isset($params['connect_timeout']) && !is_null($params['connect_timeout'])) {
            if (!is_integer($params['connect_timeout']) || $params['connect_timeout'] < 0) {
                throw new InvalidArgumentException("Curl connect timeout can't be empty and must be a positive integer");
            } else {
                $this->curl_connect_timeout = $params['connect_timeout'];
            }
        }
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
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::setApiPassword()
     */
    public function setApiPassword(string $apiPassword)
    {
        $this->_apiPassword = $apiPassword;
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
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::setApiUsername()
     */
    public function setApiUsername(string $apiUsername)
    {
        $this->_apiUsername = $apiUsername;
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
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiEnv()
     */
    public function getApiEnv()
    {
        return $this->_apiEnv;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::setApiEnv()
     */
    public function setApiEnv(string $apiEnv)
    {
        $this->_apiEnv = $apiEnv;
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
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getDataApiEndpointProd()
     */
    public function getDataApiEndpointProd()
    {
        return self::DATA_API_ENDPOINT_PROD;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getDataApiEndpointStage()
     */
    public function getDataApiEndpointStage()
    {
        return self::DATA_API_ENDPOINT_STAGE;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getDataApiEndpoint()
     */
    public function getDataApiEndpoint()
    {
        return $this->getApiEnv() === self::API_ENV_PRODUCTION ?
            $this->getDataApiEndpointProd() : $this->getDataApiEndpointStage();
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getDataApiHttpUserAgent()
     */
    public function getDataApiHttpUserAgent()
    {
        return self::DATA_API_HTTP_USER_AGENT;
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
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getApiHTTPHeaderAccept()
     */
    public function getApiHTTPHeaderAccept()
    {
        return $this->_apiHTTPHeaderAccept;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::setApiHTTPHeaderAccept()
     */
    public function setApiHTTPHeaderAccept(string $apiHTTPHeaderAccept)
    {
        $this->_apiHTTPHeaderAccept = $apiHTTPHeaderAccept;
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

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::setProxy()
     */
    public function setProxy(array $proxy)
    {
        $this->proxy = $proxy;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getCurlTimeout()
     */
    public function getCurlTimeout()
    {
        return $this->curl_timeout;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::setCurlTimeout()
     */
    public function setCurlTimeout(int $curl_timeout)
    {
        $this->curl_timeout = $curl_timeout;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::getCurlConnectTimeout()
     */
    public function getCurlConnectTimeout()
    {
        return $this->curl_connect_timeout;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface::setCurlConnectTimeout()
     */
    public function setCurlConnectTimeout(int $curl_connect_timeout)
    {
        $this->curl_connect_timeout = $curl_connect_timeout;
    }

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
     * @param int $timeout Timeout value for curl calls.
     * @param int $connect_timeout Timeout value for curl connection.
     * @throws InvalidArgumentException
     * @throws UnexpectedValueException
     * @see \HiPay\Fullservice\HTTP\ClientProvider::__construct Used for http client configuration (credentials,env etc ...)
     * @see \HiPay\Fullservice\HTTP\Configuration\Configuration::__constructFromArray()
     * @deprecated
     * @return array The well formatted array to construct Configuration
     */
    private function __constructDirect(
        $apiUsername,
        $apiPassword,
        $apiEnv = self::API_ENV_STAGE,
        $apiHTTPHeaderAccept = null,
        $proxy = array(),
        $timeout = 15,
        $connect_timeout = 15
    )
    {
        trigger_error("This construction method is deprecated. Please use an array to create your configuration.", E_USER_DEPRECATED);

        return array(
            "apiUsername" => $apiUsername,
            "apiPassword" => $apiPassword,
            "apiEnv" => $apiEnv,
            "apiHTTPHeaderAccept" => $apiHTTPHeaderAccept,
            "proxy" => $proxy,
            "timeout" => $timeout,
            "connect_timeout" => $connect_timeout
        );
    }
}
