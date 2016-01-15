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

/**
 * Client configuration interface.
 * 
 * This contains needed get methods.
 * Get methods are used by HTTP client to do authentication and know which endpoint to use
 * 
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 */
interface ConfigurationInterface {
	
    /**
     * @var string API_ENV_STAGE Stage environment. Useful for integration tests.
     */
	const API_ENV_STAGE = 'stage';
	
	/**
	 * 
	 * @var string API_ENV_PRODUCTION Production environment. Used in real payment process
	 */
	const API_ENV_PRODUCTION = 'production';
	
	
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
	 * Return Header Accept.
	 * @return string $_apiHTTPHeaderAccept Header Accept value (Default: application/json)
	 */
	public function getApiHTTPHeaderAccept();
	
	
	
}