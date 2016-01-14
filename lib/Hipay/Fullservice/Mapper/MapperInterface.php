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

use Hipay\Fullservice\Request\AbstractRequest;
/**
 * Mapper Interface
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
interface MapperInterface {
	
	/**
	 * Return all mapping value
	 * Validate and filter methods must called first
	 * @return array
	 * @throws \Exception
	 */
	public function toArray();
	
	/**
	 * Return if object request if valid or not
	 * @return bool
	 */
	public function isValid();
	
	/**
	 * Return request object
	 * Validation and mapping are applied on this object
	 * @return AbstractRequest $requestObject
	 */
	public function getRequestObject();
	
	/**
	 * Return a hashed array with key is field to treat
	 * and value is validator to apply
	 * @retur array
	 */
	public function getMapping();
	
}