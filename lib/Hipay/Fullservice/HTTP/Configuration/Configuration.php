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
namespace Hipay\Fullservice\HTTP\Configuration;

use Hipay\Fullservice\HTTP\Configuration\ConfigurationInterface;
use Hipay\Fullservice\Exception\InvalidArgumentException;
use Hipay\Fullservice\Exception\UnexpectedValueException;

/**
 * Client configuration class.
 * 
 * This contains Hipay username, password, environment
 * and others utils configuration.
 *
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 */
class Configuration implements ConfigurationInterface {
	
	/**
	 * @var string $_apiUsername API Username provided by Hipay
	 */
	private $_apiUsername;
	
	/**
	 * @var string $_apiPassword API Password provided by Hipay
	 */
	private $_apiPassword;
	
	/**
	 * @var string $_apiEnv API Environment can be *stage* or *production* 
	 */
	private $_apiEnv = self::API_ENV_STAGE;
	
	/**
	 *
	 * @var string $_apiEndpointStage API Endpoint for test
	 */
	private $_apiEndpointStage = 'https://stage-secure-gateway.hipay-tpp.com/rest/v1/';
	
	/**
	 *
	 * @var string $_apiEndpointProd API Endpoint for production
	 */
	private $_apiEndpointProd = 'https://secure-gateway.hipay-tpp.com/rest/v1/';
	
	/**
	 * @var string $_apiHTTPHeaderAccept HTTP header Accept's value
	 */
	private $_apiHTTPHeaderAccept = 'application/json';
	
	/**
	 * @var string[] $_validHTPPHeaders Allowed HTTP header Accept's values
	 */
	protected $_validHTPPHeaders = array("application/json");
	
	/**
	 * Contruct configuration object.
	 * 
	 * Configuration Object is used by HTTP client.
	 * It must be instanciate with Hipay Fullservice TPP, Process Environment.
	 * Optionaly, you can change the header HTTP *Accept* by another one on this:
	 * - `application/json` (Default one)
	 * - `application/xml` Return XML response. If you use this header, you must implement your Mapper Classes
	 * - `application/json, application/xml;q=0.8, {@*}*;q=0.5` Accept 2 formats. If you use this header, you must implement your Mapper Classes
	 * 
	 * @param string $apiUsername Merchant API Username
	 * @param string $apiPassword Merchant API Password
	 * @param string $apiEnv API environment. Value between 'stage' or 'production'
	 * @param string $apiHTTPHeaderAccept HTTP header Accept's value. default: application/json  
	 * @throws InvalidArgumentException
	 * @throws UnexpectedValueException
	 * @see Hipay\Fullservice\HTTP\ClientProvider::__construct Used for http client configuration (credentials,env etc ...)
	 */
	public function __construct($apiUsername,$apiPassword,$apiEnv = self::API_ENV_STAGE,$apiHTTPHeaderAccept = null){
	
		if(empty($apiUsername) || !is_string($apiUsername)){
			throw new InvalidArgumentException("Api username can't be emtpy and must be a string");
		}
	
		if(empty($apiPassword) || !is_string($apiPassword)){
			throw new InvalidArgumentException("Api password can't be emtpy and must be a string");
		}
	
		if($apiEnv !== self::API_ENV_PRODUCTION && $apiEnv !== self::API_ENV_STAGE){
			throw new UnexpectedValueException("Api environment must be a string value between 'stage' or 'production'");
		}
	
		$this->_apiUsername = $apiUsername;
		$this->_apiPassword = $apiPassword;
		$this->_apiEnv = $apiEnv;
	
		if(!is_null($apiHTTPHeaderAccept)){
			
			if(!in_array($apiHTTPHeaderAccept,$this->_validHTPPHeaders)){
				throw new UnexpectedValueException(sprintf("Api HTTP Header Accept should be one of these values: %s",implode(",", $this->_validHTPPHeaders)));
			}
			
			$this->_apiHTTPHeaderAccept = $apiHTTPHeaderAccept;
		}
	
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\Configuration\ConfigurationInterface::getApiPassword()
	 */
	public function getApiPassword() {
		return $this->_apiPassword;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\Configuration\ConfigurationInterface::getApiUsername()
	 */
	public function getApiUsername() {
		return $this->_apiUsername;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\Configuration\ConfigurationInterface::getApiEnv()
	 */
	public function getApiEnv() {
		return $this->_apiEnv;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\Configuration\ConfigurationInterface::getApiEndpointProd()
	 */
	public function getApiEndpointProd() {
		return $this->_apiEndpointProd;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\Configuration\ConfigurationInterface::getApiEndpointStage()
	 */
	public function getApiEndpointStage() {
		return $this->_apiEndpointStage;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\Configuration\ConfigurationInterface::getApiEndpoint()
	 */
	public function getApiEndpoint() {
		return $this->getApiEnv() === self::API_ENV_PRODUCTION ? $this->getApiEndpointProd() : $this->getApiEndpointStage();
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\Configuration\ConfigurationInterface::getApiHTTPHeaderAccept()
	 */
	public function getApiHTTPHeaderAccept() {
		return $this->_apiHTTPHeaderAccept;
	}
}