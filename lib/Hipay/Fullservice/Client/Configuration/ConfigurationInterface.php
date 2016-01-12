<?php
/**
 * Hipay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace Hipay\Fullservice\Client\Configuration;

/**
 * Client configuration interface.
 * this contains Hipay username, password, environment
 * and others utils configuration
 *
 * @category       Hipay
 * @package        Hipay_Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @api
 */
interface ConfigurationInterface {
	
	/**
	 * 
	 * @var string $username
	 */
	private $username;
	
	/**
	 * @var string $password
	 */
	private $password;
	
	/**
	 * @var string $password
	 */
	private $env;
	
	/**
	 * Get merchant username
	 * @return string
	 */
	public function getUsername();
	
	/**
	 * Get merchant pasword
	 * @return string
	 */
	public function getPassword();
	
	/**
	 * Get Environment (Test or Prod)
	 * @return string
	 */
	public function getEnv();
	
}