<?php

namespace HiPay\Fullservice\Helper;

class Convert {
	
	
	static function toCamelCase($string){
		return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $string))));
	}
	
	static function arrayKeysToCamelCase($array){
		$newArray = array();
		foreach ($array as $key => $value) {
			if (is_array($value) && !self::_isSimpleSequentialArray($value)) {
				$value = self::arrayKeysToCamelCase($value);
			}
			
			//Don't process, if not underscore is present
			if(strpos($key,"_") < 1){
				$newArray[$key] = $value;
				continue;
			}
			
			$key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
			$newArray[$key] = $value;
		}
		return $newArray;
	}
	
	static function toUndescored($string){
		return strtolower(preg_replace('/(.)([A-Z])/', "$1_$2", $string));
	}
	
	/**
	 * Check if the array is a simple(one dimensional and not nested) and a sequential(non-associative) array
	 *
	 * @param array $data
	 * @return bool
	 */
	protected static function _isSimpleSequentialArray(array $data)
	{
		foreach ($data as $key => $value) {
			if (is_string($key) || is_array($value)) {
				return false;
			}
		}
		return true;
	}
	
}