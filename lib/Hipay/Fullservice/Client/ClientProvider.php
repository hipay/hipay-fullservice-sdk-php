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
namespace Hipay\Fullservice\Client;

use Psr\Http\Message\RequestInterface;
/**
 * Abstract Client for construct and send request
 *
 * @category       Hipay
 * @package        Hipay_Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @api
 */
abstract class ClientProvider implements Client{
	
	protected $configuration;
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\Client::request()
	 */
	public function request($method, $uri, array $options = array()) {
		return $this->doRequest($method, $uri,$options);
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\Client::send()
	 */
	public function send(RequestInterface $request, array $options = array()) {
		return $this->doSend($request,$options);
	}

	
	/**
	 * Generic doRequest method
	 * You must to implement it in your provider
	 * 
	 * @param string $method
	 * @param string $uri
	 * @param array $options
	 */
	abstract protected function doRequest($method, $uri, array $options = []);
	
	/**
	 * Generic send Request Method
	 * 
	 * @param RequestInterface $request
	 * @param array $options
	 */
	abstract protected function doSend(RequestInterface $request, array $options = array());
	
}