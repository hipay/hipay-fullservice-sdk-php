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

namespace HiPay\Fullservice\HTTP;

use HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface;
use HiPay\Fullservice\HTTP\Client;
use HiPay\Fullservice\HTTP\Response\AbstractResponse;
use HiPay\Fullservice\Exception\InvalidArgumentException;
use HiPay\Fullservice\HTTP\Configuration\Configuration;

/**
 * Abstract Client for send request
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
abstract class ClientProvider implements Client
{

    /**
     *
     * @var ConfigurationInterface $configuration Configuration object used for authentication and endpoints
     */
    protected $_configuration;

    /**
     *
     * @var object $httpClient Client used to execute HTTP request
     */
    protected $_httpClient;

    /**
     * Contruct HTTP client with Confuration Object
     * @param ConfigurationInterface $configuration
     * @see \HiPay\Fullservice\HTTP\Configuration\ConfigurationInterface
     * @throws \Exception
     */
    public function __construct(ConfigurationInterface $configuration)
    {

        $this->_configuration = $configuration;

        /*
         * Force http client instantiation
         * This ensure the availability of http client object
         */
        $this->createHttpClient();
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Client::request()
     */
    public function request($method, $endpoint, array $params = array())
    {
        return $this->doRequest($method, $endpoint, $params);
    }

    /**
     * @return ConfigurationInterface Current Configuration
     */
    public function getConfiguration()
    {
        return $this->_configuration;
    }

    /**
     * @param ConfigurationInterface $configuration
     * @return $this
     */
    public function setConfiguration($configuration)
    {
        $this->_configuration = $configuration;
        return $this;
    }


    /**
     * @return object $_httpClient Current HTTP client used
     */
    public function getHttpClient()
    {
        return $this->_httpClient;
    }

    /**
     * Generic doRequest method
     * You must to implement it in your provider
     *
     * @param string $method HTTP method
     * @param string $endpoint Endpoint
     * @param array $params Params to send
     *
     * @throws RuntimeException
     * @throws InvalidArgumentException
     * @return AbstractResponse
     */
    abstract protected function doRequest($method, $endpoint, array $params = array());

    /**
     * Create local http client object used in doRequest method
     * Called in contructor
     *
     * @throws \Exception
     */
    abstract protected function createHttpClient();
}
