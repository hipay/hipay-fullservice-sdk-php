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
 *
 */

namespace HiPay\Fullservice\HTTP;

use HiPay\Fullservice\Exception\ApiErrorException;
use HiPay\Fullservice\Exception\CurlException;
use HiPay\Fullservice\Exception\HttpErrorException;
use HiPay\Fullservice\Exception\InvalidArgumentException;
use HiPay\Fullservice\Gateway\Client\GatewayClient;
use HiPay\Fullservice\HTTP\Response\AbstractResponse;
use HiPay\Fullservice\HTTP\Response\Response;

/**
 * Simple HTTP client
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class SimpleHTTPClient extends ClientProvider
{
    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\ClientProvider::doRequest()
     *
     * @param string $method
     * @param string $endpoint
     * @param array<string, mixed> $params
     * @param bool $isVault
     * @param bool $isData
     * @return AbstractResponse
     */
    protected function doRequest($method, $endpoint, array $params = array(), $isVault = false, $isData = false)
    {
        if (empty($method) || !is_string($method)) {
            throw new InvalidArgumentException("HTTP METHOD must a string and a valid HTTP METHOD Value");
        } elseif (!$this->validateHttpMethod($method)) {
            throw new InvalidArgumentException("HTTP METHOD \"$method\" doesn't exist");
        }

        if (empty($endpoint) || !is_string($endpoint)) {
            throw new InvalidArgumentException("Endpoint must be a string and a valid api endpoint");
        }

        $credentials = $this->getConfiguration()->getApiUsername() . ':' . $this->getConfiguration()->getApiPassword();

        if ($endpoint === GatewayClient::ENDPOINT_HOSTED_PAYMENT_PAGE) {
            $url = $this->getConfiguration()->getApiEndpointV2();
        } else {
            $url = $this->getConfiguration()->getApiEndpoint();
        }

        $timeout = $this->getConfiguration()->getCurlTimeout();
        $connectTimeout = $this->getConfiguration()->getCurlConnectTimeout();

        if ($isVault) {
            $url = $this->getConfiguration()->getSecureVaultEndpoint();
        }


        $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'HiPayFullservice/1.0 (SDK PHP)';

        // Handling data API configuration
        if ($isData) {
            $url = $this->getConfiguration()->getDataApiEndpoint();
            $timeout = 3;
            $connectTimeout = 3;
            $userAgent = $this->getConfiguration()->getDataApiHttpUserAgent();
        }

        $finalUrl = $url . $endpoint;

        // set appropriate options
        $options = array(
            CURLOPT_URL => $finalUrl,
            CURLOPT_USERPWD => $credentials,
            CURLOPT_HTTPHEADER => array(
                'Accept: ' . $this->getConfiguration()->getApiHTTPHeaderAccept(),
                'User-Agent: ' . $userAgent
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FAILONERROR => false,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_CONNECTTIMEOUT => $connectTimeout,
        );

        if ($isData) {
            $options[CURLOPT_HTTPHEADER][] = 'X-Who-Api: ' . $this->getConfiguration()->getDataApiHttpUserAgent();
            unset($options[CURLOPT_USERPWD]);
        }

        // add post parameters
        if (strtolower($method) == 'post') {
            $options[CURLOPT_POST] = true;
            if ($isData) {
                $options[CURLOPT_HTTPHEADER][] = 'Content-Type: application/json';
                $options[CURLOPT_POSTFIELDS] = json_encode($params);
            } else {
                $options[CURLOPT_POSTFIELDS] = http_build_query($params);
            }
        } else {
            $options[CURLOPT_POST] = false;
        }

        $proxyConfiguration = $this->getConfiguration()->getProxy();

        if (!empty($proxyConfiguration)) {
            $options[CURLOPT_PROXY] = $proxyConfiguration["host"];
            $options[CURLOPT_PROXYPORT] = $proxyConfiguration["port"];
            $options[CURLOPT_PROXYUSERPWD] = $proxyConfiguration["user"] . ":" . $proxyConfiguration["password"];
        }

        /**
         * Send a new request
         * $method can be any valid HTTP METHOD (GET, POST etc ...)
         * $uri The url/endpoint to request
         * $options Needed configuration
         */
        foreach ($options as $option => $value) {
            curl_setopt($this->_httpClient, $option, $value);
        }

        /**
         * @var string|false $result
         */
        $result = curl_exec($this->_httpClient);

        // execute the given cURL session
        if (($result === false) && !$isData) {
            throw new CurlException(curl_error($this->_httpClient), curl_errno($this->_httpClient));
        }

        $status = (int)curl_getinfo($this->_httpClient, CURLINFO_HTTP_CODE);

        if (floor($status / 100) != 2 && !$isData) {
            $httpResponse = json_decode($result);

            if (is_object($httpResponse) && isset($httpResponse->message, $httpResponse->code)) {
                $description = (isset($httpResponse->description)) ? $httpResponse->description : "";
                throw new ApiErrorException($httpResponse->message, $httpResponse->code, $description);
            } else {
                throw new HttpErrorException($result, $status);
            }
        }

        //Return a simple response object
        return new Response((string)$result, $status, array('Content-Type' => array('application/json; encoding=UTF-8')));
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\ClientProvider::createHttpClient()
     *
     * @return void
     */
    protected function createHttpClient()
    {
        $this->_httpClient = curl_init();
    }
}
