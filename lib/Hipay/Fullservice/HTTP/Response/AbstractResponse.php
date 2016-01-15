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
 * Simple Object Response Data
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 */
abstract class AbstractResponse implements ResponseInterface {
	
	/**
	 * Response returned by http request to TPP
	 * 
	 * It's a string in json or xml format.
	 * In basic usage, it's Json format by default
	 * 
	 * @var string $_body Json or XML
	 */
	private $_body;
	
	/**
	 * HTTP staus code
	 * @var string $_statusCode Status code (200, 404 etc ...)
	 */
	private $_statusCode;
	
	/**
	 * All response headers
	 * @var array $_responseHeaders
	 */
	private $_responseHeaders;
	
	/**
	 * Construct a simple response object
	 * 
	 * @param string $body HTTP response (XML or Json)
	 * @param int $statusCode HTTP status code
	 * @param array $responseHeaders All response headers
	 * @throws InvalidArgumentException
	 * @see Hipay\Fullservice\HTTP\ClientProvider::doRequest Type of return value.
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