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


use Hipay\Fullservice\HTTP\Response\AbstractResponse;
/**
 * Client interface for construct and send request.
 *
 * @category    Hipay
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
interface Client{

    /**
     * Create and send an HTTP request.
     *
     * @param string              $method  HTTP method
     * @param string $endpoint    Endpoint string. Base url is determined by Configuration Object
     * @param array               $params  Request params to apply.
     *
     * @return AbstractResponse
     * @throws Exception
     */
    public function request($method, $endpoint, array $params = []);

}