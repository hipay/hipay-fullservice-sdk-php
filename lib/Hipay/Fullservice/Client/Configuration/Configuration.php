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

use Hipay\Fullservice\Client\Configuration\ConfigurationInterface;

/**
 * Client configuration class.
 * this contains Hipay username, password, environment
 * and others utils configuration
 *
 * @category       Hipay
 * @package        Hipay_Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @api
 */
class Configuration implements ConfigurationInterface {
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\Configuration\ConfigurationInterface::getPassword()
	 */
	public function getPassword() {
		// TODO Auto-generated method stub
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\Configuration\ConfigurationInterface::getUsername()
	 */
	public function getUsername() {
		// TODO Auto-generated method stub
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\Configuration\ConfigurationInterface::getEnv()
	 */
	public function getEnv() {
		// TODO Auto-generated method stub
	}
}