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

use HiPay\Fullservice\HTTP\ClientProvider;
use HiPay\Fullservice\Exception\InvalidArgumentException;
use HiPay\Fullservice\Exception\RuntimeException;
use HiPay\Fullservice\HTTP\Response\Response;


/**
 * Simple HTTP client
 *
 * @package     HiPay\Fullservice
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class SimpleHTTPClient extends ClientProvider
{

    /**
     * {@inheritDoc}
     * @see \HiPay\Fullservice\HTTP\ClientProvider::doRequest()
     */
    protected function doRequest($method, $endpoint, array $params = array(), $isVault = false)
    {
        if (empty($method) || !is_string($method)) {
            throw new InvalidArgumentException("HTTP METHOD must a string and a valid HTTP METHOD Value");
        }

        if (empty($endpoint) || !is_string($endpoint)) {
            throw new InvalidArgumentException("Endpoint must be a string and a valid api endpoint");
        }

        $credentials = $this->getConfiguration()->getApiUsername() . ':' . $this->getConfiguration()->getApiPassword();

        $url = $this->getConfiguration()->getApiEndpoint();
        if ($isVault) {
            $url = $this->getConfiguration()->getSecureVaultEndpoint();
        }
        $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'HiPayFullservice/1.0 (SDK PHP)';
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
        );

        // add post parameters
        if (strtolower($method) == 'post') {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = http_build_query($params);
        } else {
            $options[CURLOPT_POST] = false;
        }

        $proxyConfiguration = $this->getConfiguration()->getProxy();

        if (!empty($proxyConfiguration)) {
            $options[CURLOPT_PROXY] = $proxyConfiguration["host"];
            $options[CURLOPT_PROXYPORT] = $proxyConfiguration["port"];
            $options[CURLOPT_PROXYUSERPWD] = $proxyConfiguration["user"] . ":" . $proxyConfiguration["password"];
        }

        try {

            /**
             * Send a new request
             * $method can be any valid HTTP METHOD (GET, POST etc ...)
             * $uri The url/endpoint to request
             * $options Needed configuration
             */
            foreach ($options as $option => $value) {
                curl_setopt($this->_httpClient, $option, $value);
            }

            // execute the given cURL session
            if (false === ($result = curl_exec($this->_httpClient))) {
                throw new RuntimeException(curl_error($this->_httpClient), curl_errno($this->_httpClient));
            }

            //$header_size = curl_getinfo($this->_httpClient, CURLINFO_HEADER_SIZE);
            //$header = substr($result, 0, $header_size); @TODO transform headers to array
            $body = $result; //substr($result, $header_size);

            $status = (int)curl_getinfo($this->_httpClient, CURLINFO_HTTP_CODE);
            $httpResponse = json_decode($body);

            if (floor($status / 100) != 2) {
                $message = $body;
                $code = $status;
                if (is_object($httpResponse)) {
                    $message = $httpResponse->message;
                    $code = $httpResponse->code;
                }
                throw new RuntimeException($message, $code);
            }

        } catch (\Exception $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode(), $e);
        }

        //Return a simple response object
        return new Response((string)$body, $status, array('Content-Type' => array('application/json; encoding=UTF-8')));
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\ClientProvider::createHttpClient()
     */
    protected function createHttpClient()
    {
        $this->_httpClient = curl_init();
    }

}
