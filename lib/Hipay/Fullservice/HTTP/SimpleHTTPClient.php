<?php
/*
 * Hipay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - Hipay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace Hipay\Fullservice\HTTP;

use Hipay\Fullservice\HTTP\ClientProvider;
use Hipay\Fullservice\Exception\InvalidArgumentException;
use Hipay\Fullservice\Exception\RuntimeException;


/**
 * Simple HTTP client
 * 
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php 
 * @api
 */
class SimpleHTTPClient extends ClientProvider {

	/**
	 * {@inheritDoc}
	 * @see \Hipay\Fullservice\HTTP\ClientProvider::doRequest()
	 */
	protected function doRequest( $method, $endpoint,array $params=array() ){ 
		if(	empty($method) || !is_string($method)){
			throw new InvalidArgumentException("HTTP METHOD must a string and a valid HTTP METHOD Value");
		}
		
		if(	empty($endpoint) || !is_string($endpoint)){
			throw new InvalidArgumentException("Endpoint must be a string and a valid api endpoint");
		}
		
		$credentials = $this->getConfiguration()->getApiUsername() . ':' . $this->getConfiguration()->getApiPassword();
		
		
		// set appropriate options
		$options = array(
				 CURLOPT_URL => $this->getConfiguration()->getApiEndpoint() . $endpoint,
				 CURLOPT_USERPWD => $credentials,
				 CURLOPT_HTTPHEADER => array('Accept'=>$this->getConfiguration()->getApiHTTPHeaderAccept(),'User-Agent'=> isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'HipayFullservice/1.0 (SDK PHP)'),
				 CURLOPT_RETURNTRANSFER => true,
				 CURLOPT_FAILONERROR => false,
				 CURLOPT_HEADER => true,
				 CURLOPT_POST => (strtolower($method) == 'post') ?: false,
				 CURLOPT_POSTFIELDS => http_build_query($params) );
		
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
			
			$header_size = curl_getinfo($this->_httpClient, CURLINFO_HEADER_SIZE);
			//$header = substr($result, 0, $header_size); @TODO transform headers to array
			$body = substr($result, $header_size);
					
			$status = (int)curl_getinfo($this->_httpClient, CURLINFO_HTTP_CODE);
			$httpResponse = json_decode($body);
				
			if (floor($status/100) != 2) {
				throw new RuntimeException($httpResponse->message, $httpResponse->code);
			}

			
		} catch (\Exception $e) {
			
			throw new RuntimeException($e->getMessage(),$e->getCode(),$e);
			
		}
		
		
		//Return a simple response object
		return new Response((string)$result, $status, array('Content-Type'=>array('application/json; encoding=UTF-8')));
	}

	/**
	 * {@inheritDoc}
	 * @see \Hipay\Fullservice\HTTP\ClientProvider::createHttpClient()
	 */
	protected 
	function createHttpClient() {
		$this->_httpClient = curl_init();
	}


}