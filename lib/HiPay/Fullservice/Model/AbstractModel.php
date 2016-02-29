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
namespace HiPay\Fullservice\Model;

use HiPay\Fullservice\Model\ModelInterface;

/**
 * Model abstract class
 * 
 * Created for futhers features.
 * Not used for the moment but extended
 * 
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 */
abstract class AbstractModel implements ModelInterface {
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \HiPay\Fullservice\Model\ModelInterface::toArray()
	 */
	public function toArray() {
		
		$array = array();
		
		$classRef = new \ReflectionClass(__CLASS__);
		foreach ($classRef->getMethods() as $method) {
			if (substr($method->name, 0, 3) == 'get') {
				//clean key name
				$key = lcfirst(substr($method->name, 3));
				
				//Call getter to get the value
				$array[$key] = $method->invoke($this);
			}
		}
		
		return $array;
		
		
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \HiPay\Fullservice\Model\ModelInterface::toJson()
	 */
	public function toJson() {
		return json_encode($this->toArray());
	}


	
}