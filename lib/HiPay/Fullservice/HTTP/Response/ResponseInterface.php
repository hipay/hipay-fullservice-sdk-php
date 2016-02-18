<?php
/*
 * HiPay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - HiPay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace HiPay\Fullservice\HTTP\Response;

use HiPay\Fullservice\Exception\OutOfBoundsException;
use HiPay\Fullservice\Exception\UnexpectedValueException;
/**
 * Simple Object Response Data
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 */
interface ResponseInterface {
	
	/**
	 * Get returned status code
	 * @return int HTTP status code
	 */
	public function getStatusCode();
	
	/**
	 * Get raw body
	 * @return string Json or Xml format
	 */
	public function getBody();
	
	/**
	 * Get response headers
	 * @return array All response headers
	 */
	public function getHeaders();
	
	/**
	 * Test if response body is JSON format
	 * If it is, we return an array result of json_decode function
	 * 
	 * @throws OutOfBoundsException Invalid Key in response header
	 * @throws UnexpectedValueException Missing value or json_decode not work
	 * @return array Array return by json_decode
	 */
	public function toArray();
	
}