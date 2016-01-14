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

use Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface;
use Hipay\Fullservice\HTTP\Client;
use Hipay\Fullservice\HTTP\Response\Response;
use Hipay\Fullservice\Exception\InvalidArgumentException;

/**
 * Abstract Client for send request
 *
 * @category    Hipay
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
abstract class ClientProvider implements Client{
	
	/**
	 * 
	 * @var ConfigurationInterface $configuration
	 */
	protected $_configuration;
	
	/**
	 *
	 * @var Client $httpClient
	 */
	protected $_httpClient;
	
	/**
	 * Contruct HTTP client with mandatories values
	 * @param ConfigurationInterface $configuration
	 */
	public function __construct(ConfigurationInterface $configuration){
		
		$this->_configuration = $configuration;
		
		/**
		 * Force http client instanciation
		 * This ensure the availability of http client object
		 */
		$this->createHttpClient();
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\Client::request()
	 */
	public function request($method, $endpoint, array $params = array()) {
		return $this->doRequest($method, $endpoint,$params);
	}
	
	/**
	 * @return ConfigurationInterface
	 */
	public function getConfiguration() {
		return $this->_configuration;
	}
	
	/**
	 * 
	 * @param ConfigurationInterface $configuration
	 */
	public function setConfiguration($configuration) {
		$this->_configuration = $configuration;
		return $this;
	}
	
	
	/**
	 * @return Client $_httpClient
	 */
	public function getHttpClient(){
		return $this->_httpClient;
	}
	
	/**
	 * Generic doRequest method
	 * You must to implement it in your provider
	 * 
	 * @param string $method HTTP method
	 * @param string $endpoint Endpoint
	 * @param array $params to send
	 * @throws RuntimeException
	 * @throws InvalidArgumentException
	 * @return Response
	 */
	abstract protected function doRequest($method, $endpoint, array $params = []);
	
	/**
	 * Create local http client object used in doRequest method
	 */
	abstract protected function createHttpClient();
	
	

	
}