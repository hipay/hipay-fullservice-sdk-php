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
namespace HiPay\Fullservice\HTTP\Configuration;

/**
 * Client configuration interface.
 * 
 * This contains needed get methods.
 * Get methods are used by HTTP client to do authentication and know which endpoint to use
 * 
 * @package     HiPay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 */
interface ConfigurationInterface {
	
	
	/**
	 * Return merchant api username
	 * @return string Username for authentication
	 */
	public function getApiUsername();
	
	/**
	 * Return merchant api password
	 * @return string Password for authentication
	 */
	public function getApiPassword();
	
	/**
	 * Return API Environment
	 * @return string *stage* or *prodcution*
	 */
	public function getApiEnv();
	
	/**
	 * Return production api endpoint
	 * @return string $_apiEndpointProd Production api endpoint
	 */
	public function getApiEndpointProd();
	
	/**
	 * Return stage api endpoint
	 * @return string $_apiEndpointStage Stage api endpoint
	 */
	public function getApiEndpointStage();
	
	/**
	 * Return api endpoint based on API_ENV
	 * 
	 * If API_ENV is equals to *stage*, we return value of API_ENDPOINT_STAGE
	 * else we return value of API_ENDPOINT_PRODUCTION
	 * 
	 * @return string API_ENDPOINT Final api endpoint
	 */
	public function getApiEndpoint();
	
	/**
	 * Return production secure vault endpoint
	 * @return string $_secureVaultEndpointProd Production vault endpoint
	 */
	public function getSecureVaultEndpointProd();
	
	/**
	 * Return stage vault endpoint
	 * @return string $_secureVaultEndpointStage Stage vault endpoint
	 */
	public function getSecureVaultEndpointStage();
	
	/**
	 * Return vault endpoint based on API_ENV
	 *
	 * If API_ENV is equals to *stage*, we return value of SECURE_VAULT_ENDPOINT_STAGE
	 * else we return value of SECURE_VAULT_ENDPOINT_PRODUCTION
	 *
	 * @return string SECURE_VAULT_ENDPOINT Final vault endpoint
	 */
	public function getSecureVaultEndpoint();
	
	/**
	 * Return Header Accept.
	 * @return string $_apiHTTPHeaderAccept Header Accept value (Default: application/json)
	 */
	public function getApiHTTPHeaderAccept();
	
	
	
}