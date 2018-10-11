<?php
/**
 * HiPay Fullservice SDK PHP
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Apache 2.0 Licence
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * @copyright      Copyright (c) 2016 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
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
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 */
abstract class AbstractModel implements ModelInterface, \JsonSerializable {
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \HiPay\Fullservice\Model\ModelInterface::toArray()
	 */
	public function toArray() {
		
		$array = array();
		
		$classRef = new \ReflectionClass(get_class($this));
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
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

	/**
	 *a
	 * {@inheritDoc}
	 *
	 * @see \HiPay\Fullservice\Model\ModelInterface::toJson()
	 */
	public function toJson() {
		return json_encode($this);
	}
}
