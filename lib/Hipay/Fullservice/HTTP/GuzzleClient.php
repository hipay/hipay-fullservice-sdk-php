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

use GuzzleHttp\Client as HTTPClient;
use Hipay\Fullservice\HTTP\ClientProvider;
use Hipay\Fullservice\HTTP\Response\Response;
use Hipay\Fullservice\Exception\RuntimeException;
use Hipay\Fullservice\Exception\InvalidArgumentException;

/**
 * Guzzle provider
 *
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class GuzzleClient extends ClientProvider{
 
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\ClientProvider::doRequest()
	 */
	protected function doRequest($method, $endpoint, array $params = array()) {
		
		if(	empty($method) || !is_string($method)){
			throw new InvalidArgumentException("HTTP METHOD must a string and a valid HTTP METHOD Value");
		}
		
		//@TODO validate HTTP METHOD
		
		if(	empty($endpoint) || !is_string($endpoint)){
			throw new InvalidArgumentException("Endpoint must be a string and a valid api endpoint");
		}
		
		//@TODO validate uri format with regex
		
		$options = array();
		
		//Add credentials to options request
		$options['auth'] = array($this->getConfiguration()->getApiUsername(),$this->getConfiguration()->getApiPassword());
		
		/**
		 * Add headers needed
		 * Accept: application/json. For a json response
         * User Agent for remote informations
		 */
		$options['headers'] = array(
				'Accept'=>$this->getConfiguration()->getApiHTTPHeaderAccept(),
				'User-Agent'=> $_SERVER['HTTP_USER_AGENT'] ?: 'HipayFullservice/1.0 (SDK PHP)',
		);
		
		//Set params to send
		$options['form_params'] = $params;
		
		try {
			
			/**
			 * Send a new request
			 * $method can be any valid HTTP METHOD (GET, POST etc ...)
	         * $uri The url/endpoint to request
			 * $options Needed configuration
			 */
			$httpResponse = $this->getHttpClient()->request($method,$this->getConfiguration()->getApiEndpoint() . $endpoint,$options);
			
		} catch (\Exception $e) {
			
			throw new RuntimeException($e->getMessage(),$e->getCode(),$e);
			
		}
		
		
		//Return a simple response object
		return new Response((string)$httpResponse->getbody(), $httpResponse->getStatusCode(), $httpResponse->getHeaders() );
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\ClientProvider::createHttpClient()
	 */
	protected function createHttpClient() {
		$this->_httpClient = new HTTPClient();
	}


	
}