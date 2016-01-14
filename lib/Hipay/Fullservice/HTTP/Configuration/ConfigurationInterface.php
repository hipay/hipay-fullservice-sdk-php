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
 * this contains Hipay username, password, environment
 * and others utils configuration
 * 
 * @category    Hipay
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
interface ConfigurationInterface {
	
	const API_ENV_STAGE = 'stage';
	const API_ENV_PRODUCTION = 'production';
	
	
	/**
	 * Get merchant api username
	 * @return string
	 */
	public function getApiUsername();
	
	/**
	 * Get merchant api password
	 * @return string
	 */
	public function getApiPassword();
	
	/**
	 * Get API Environment (Stage or Production)
	 * @return string
	 */
	public function getApiEnv();
	
	/**
	 * Return production api endpoint
	 * @return string $_apiEndpointProd prod api endpoint
	 */
	public function getApiEndpointProd();
	
	/**
	 * Return stage api endpoint
	 * @return string $_apiEndpointStage stage api endpoint
	 */
	public function getApiEndpointStage();
	
	/**
	 * Return api endpoint based on API_ENV
	 * @return string API_ENDPOINT api endpoint
	 */
	public function getApiEndpoint();
	
	/**
	 * Return Header Accept value. Default: application/json
	 * @return string $_apiHTTPHeaderAccept 
	 */
	public function getApiHTTPHeaderAccept();
	
	
	
}