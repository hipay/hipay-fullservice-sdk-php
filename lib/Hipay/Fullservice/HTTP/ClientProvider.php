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
use Hipay\Fullservice\HTTP\Response\AbstractResponse;
use Hipay\Fullservice\Exception\InvalidArgumentException;
use Hipay\Fullservice\HTTP\Configuration\Configuration;

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
	 * @var ConfigurationInterface $configuration Configuration object used for authentication and endpoints
	 */
	protected $_configuration;
	
	/**
	 *
	 * @var object $httpClient Client used to execute HTTP request
	 */
	protected $_httpClient;
	
	/**
	 * Contruct HTTP client with Confuration Onject
	 * 
	 * @param ConfigurationInterface $configuration Configuration object
	 * @see \Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface
	 */
	public function __construct(ConfigurationInterface $configuration){
		
		$this->_configuration = $configuration;
		
		/*
		 * Force http client instanciation
		 * This ensure the availability of http client object
		 */
		$this->createHttpClient();
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\HTTP\Client::request()
	 */
	public function request($method, $endpoint, array $params = array()) {
		return $this->doRequest($method, $endpoint,$params);
	}
	
	/**
	 * @return ConfigurationInterface Current Configuration
	 */
	public function getConfiguration() {
		return $this->_configuration;
	}
	
	/** 
	 * @param ConfigurationInterface $configuration
	 * @return $this
	 */
	public function setConfiguration($configuration) {
		$this->_configuration = $configuration;
		return $this;
	}
	
	
	/**
	 * @return object $_httpClient Current HTTP client used
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
	 * @param array $params Params to send
	 * 
	 * @throws RuntimeException
	 * @throws InvalidArgumentException
     * @return AbstractResponse
	 */
	abstract protected function doRequest($method, $endpoint, array $params = []);
	
	/**
	 * Create local http client object used in doRequest method
	 * Called in contructor
	 * 
	 *  @throws \Exception
	 */
	abstract protected function createHttpClient();
	
	

	
}