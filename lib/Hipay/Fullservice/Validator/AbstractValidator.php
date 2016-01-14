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
namespace Hipay\Fullservice\Validator;

use Hipay\Fullservice\Mapper\AbstractMapper;
/**
 * Validator Abstract
 * Apply validation on fields to publish
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
abstract class AbstractValidator {
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see ValidatorInterface::validate()
	 */
	public function validate(AbstractMapper $mapper){
		$this->doValidate($mapper);
	}
	
	/**
	 * Validate request object.
	 * Validation is based on mapping property of object $mapper
	 * And Values to validate are retrieved from getRequestObject
	 * @param AbstractMapper $mapper
	 */
	protected function doValidate(AbstractMapper $mapper);
	
}