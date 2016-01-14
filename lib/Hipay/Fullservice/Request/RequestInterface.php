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
namespace Hipay\Fullservice\Request;

/**
 * Model request interface.
 * All request object sended by Gateway or Secure Vault client must implement it
 *
 * @category    Hipay
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
interface RequestInterface{
	
	
	/**
	 * Returns data to send
	 * @return array
	 */
	public function getParams();
	
	/**
	 * Return HTTP method for current request
	 * @return string http method
	 */
	public function getMethod();
	
	/**
	 * Return Request enpoint
	 * @return string Request Endpoint
	 */
	public function getEndpoint();
	
}