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

use HiPay\Fullservice\HTTP\Response\ResponseInterface;
use HiPay\Fullservice\Exception\InvalidArgumentException;
use HiPay\Fullservice\Exception\UnexpectedValueException;
use HiPay\Fullservice\Exception\OutOfBoundsException;

/**
 * Simple Object Response Data
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
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
	 * @var array $_headers
	 */
	private $_headers;
	
	/**
	 * Construct a simple response object
	 * 
	 * @param string $body HTTP response (XML or Json)
	 * @param int $statusCode HTTP status code
	 * @param array $headers All response headers
	 * @throws InvalidArgumentException
	 * @see HiPay\Fullservice\HTTP\ClientProvider::doRequest Type of return value.
	 */
	public function __construct($body,$statusCode,array $headers){
		
		if(!is_string($body)){
			throw new InvalidArgumentException("Body must be a string");			
		}
		
		if(!is_numeric($statusCode)){
			throw new InvalidArgumentException("Status Code must be a numeric value");
		}
		
		if(!is_array($headers)){
			throw new InvalidArgumentException("Response headers must be an array");
		}
		
		
		$this->_body = $body;
		$this->_statusCode = $statusCode;
		$this->_headers = $headers;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \HiPay\Fullservice\HTTP\Response\ResponseInterface::getStatusCode()
	 */
	public function getStatusCode() {
		return $this->_statusCode;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \HiPay\Fullservice\HTTP\Response\ResponseInterface::getBody()
	 */
	public function getBody() {
		return $this->_body;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \HiPay\Fullservice\HTTP\Response\ResponseInterface::getHeaders()
	 */
	public function getHeaders() {
		return $this->_headers;
	}

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Response\ResponseInterface::toArray()
     */
    public function toArray()
    {

        $headers = $this->getHeaders();
        //Check if Content-Type key exist
        //And throw an Exception if not
        if(!isset($headers['Content-Type'])){
            throw new OutOfBoundsException("Content-Type key not exist on response headers array");
        }
        
        //Check if Content-Type header is 'application/json'
        //And throw an exception if not
        if(!in_array('application/json; encoding=UTF-8', $headers['Content-Type']) ){
            $message = sprintf("Content-Type header is not valid. Expected 'application/json; encoding=UTF-8' but found '%s'",implode(",", $headers['Content-Type']));
            throw new UnexpectedValueException($message);
        }
        
        
        //Set response body to json_decode
        //Set true to $assoc param because it's more logic to loop on an array
        //instead an object
        $responseArray = json_decode($this->getBody(),true);
        
        // We Can't return a diffent value of array
        // So,we throw an exception
        if(is_null($responseArray) || !is_array($responseArray)){
            throw new UnexpectedValueException("Unable to convert json response to a valid array.");
        }
	    
	    return $responseArray;
    }
}