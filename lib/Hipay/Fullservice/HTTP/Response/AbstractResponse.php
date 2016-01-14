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
namespace Hipay\Fullservice\HTTP\Response;

use Hipay\Fullservice\HTTP\Response\ResponseInterface;
use Hipay\Fullservice\Exception\InvalidArgumentException;

/**
 *
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
abstract class AbstractResponse implements ResponseInterface {
	
	
	private $_body;
	
	private $_statusCode;
	
	private $_responseHeaders;
	
	/**
	 * Construct a simple response object
	 * @param string $body
	 * @param int $statusCode
	 * @param array $responseHeaders
	 * @throws InvalidArgumentException
	 */
	public function __construct($body,$statusCode,array $responseHeaders = array()){
		
		if(!is_string($body)){
			throw new InvalidArgumentException("Body must be a string");			
		}
		
		if(!is_numeric($statusCode)){
			throw new InvalidArgumentException("Status Code must be a numeric value");
		}
		
		if(!is_array($responseHeaders)){
			throw new InvalidArgumentException("Response headers must be an array");
		}
		
		
		$this->_body = $body;
		$this->_statusCode = $statusCode;
		$this->_responseHeaders = $responseHeaders;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\HTTP\Response\ResponseInterface::getStatusCode()
	 */
	public function getStatusCode() {
		return $this->_statusCode;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\HTTP\Response\ResponseInterface::getBody()
	 */
	public function getBody() {
		$this->_body;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\HTTP\Response\ResponseInterface::getResponseHeaders()
	 */
	public function getResponseHeaders() {
		$this->_responseHeaders;
	}
}