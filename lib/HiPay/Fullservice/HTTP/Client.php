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
namespace HiPay\Fullservice\HTTP;


use HiPay\Fullservice\HTTP\Response\AbstractResponse;
/**
 * Client interface for construct and send request.
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 */
interface Client{

    /**
     * Create and send an HTTP request.
     *
     * - $method must be a valid HTTP METHOD (POST,GET,PUT etc ...)
     * - $endpoint is only enpoint of wanted action.
     *   Ex. To query an order, you assign '/rest/v1/order' to $endpoint
     *   Base Url is already know by Configuration object used in constructor
     * - $params Array with key/value pairs of data to send
     *
     * @param string $method  HTTP method
     * @param string $endpoint Api Endpoint for this request. Base url is determined by Configuration Object
     * @param array  $params  Request params to apply.
     *
	 * @throws RuntimeException
	 * @throws InvalidArgumentException
     * @return AbstractResponse
     */
    public function request($method, $endpoint, array $params = array());

}