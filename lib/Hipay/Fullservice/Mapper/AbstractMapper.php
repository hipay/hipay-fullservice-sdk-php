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
namespace Hipay\Fullservice\Mapper;

use Hipay\Fullservice\Mapper\MapperInterface;
use Hipay\Fullservice\Request\AbstractRequest;
use Hipay\Fullservice\Exception\LogicException;
use Hipay\Fullservice\Validator\AbstractValidator;

/**
 * Abstract Mapper
 * Apply validation on fields to publish
 * and publish the to called format
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
abstract class AbstractMapper implements MapperInterface, \JsonSerializable{
	

	/**
	 * Determine if object request is valid
	 * @var bool
	 */
	protected $_isValid;
	
	/**
	 * Hashed array where  the key is a field to treat 
	 * and value is a validator to apply
	 * @var array $_mapping
	 */
	protected $_mapping = null;
	
	/**
	 * 
	 * @var AbstractRequest $_requestObject
	 */
	private $_requestObject = null;
	
	/**
	 * Validator object
	 * @var AbstractValidator $_validator
	 */
	private $_validator = null;
	
	/**
	 * Contruct Mapper with request object and validator.
	 * Mapper can return object request to json or array format
	 * Field to validate and export are defined in $_mapping array
	 * 
	 * @param AbstractRequest $requestObject
	 * @param AbstractValidator $validator
	 * @throws LogicException
	 * @return \Hipay\Fullservice\Mapper\AbstractMapper
	 */
	public function __construct(AbstractRequest $requestObject,AbstractValidator $validator){
		
		$this->_requestObject = $requestObject;
		$this->_validator = $validator;
		
		if(is_null($this->getMapping()) || (is_array($this->getMapping()) && count($this->getMapping()) < 1)){
			throw new LogicException("Mapping property must be an array with data. You must to populate it.");
		}
		
		return $this;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see JsonSerializable::jsonSerialize()
	 */
	public function jsonSerialize() {
		return $this->toArray();
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see MapperInterface::toArray()
	 */
	public function toArray(){
		
		//Validate data
		$this->validate();
		
		//@TODO Filter some data
		$this->filter();
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see MapperInterface::getRequestObject()
	 */
	public function getRequestObject(){
		return $this->_requestObject();
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see MapperInterface::getMapping()
	 */
	public function getMapping(){
		return $this->_mapping;
	}
	
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see MapperInterface::isValid()
	 */
	public function isValid(){
		$this->validate();
		return $this->_isValid;
	}

	/**
	 * Validate data based on properties mapping
	 * @return MapperInterface $this
	 * @throws \Exception
	 */
	protected function validate(){
		$this->_validator->validate();
	}
	
	/**
	 * Fitler protected data
	 * @return MapperInterface $this
	 * @throws \Exception
	 */
	protected function filter();
	
	
}