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
namespace HiPay\Fullservice\Helper;

/**
 *  Class Signature validator
 *  
 * For the URL notification, the signature is sent on the HTTP header under the “HTTP_X_ALLOPASS_SIGNATURE” parameter
 * To check this point, we concatenate the passphrase with the POST content of the query.
 * 
 * For each redirection page (accept page, decline page, etc.) the signature is sent under the “hash” parameter
 * To check this point, you must concatenate the parameters, the values of each and the passphrase under the following conditions:
 * a) The parameter must be predefined.
 * b) The value can’t be empty.
 * c) The parameter must be sorted in alphabetical order.
 * 
 *
 * @package     HiPay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php 
 * @api
 */
class Signature {
	
	/**
	 * @param string $secretPassphrase
	 * @return bool 
	 */
	static public function isValidHttpSignature($secretPassphrase)
	{
		$computedSignature = sha1 ( static::getStringToCompute($secretPassphrase) );
	
		if ($computedSignature == static::getSignature()) {
			return true;
		} 
		
		return false;
	}
	
	static protected function isRedirection(){
		return isset($_GET ['hash']);
	}
	
	static protected function getSignature(){
		if(static::isRedirection()){			
			return $_GET['hash'];
		}
		else{
			return $_SERVER['HTTP_X_ALLOPASS_SIGNATURE'];
		}
	}
	
	static protected function getParameters(){
		$params = $_GET;
		unset($params['hash']);
		ksort ( $params );
		return $params;
	}
	
	static protected function getRawPostData(){
		return file_get_contents("php://input");
	}
	
	static protected function getStringToCompute($secretPassphrase){
		$string2compute = "";
		if(static::isRedirection()){

			foreach ( static::getParameters() as $name => $value ) {
				if (strlen ( $value ) > 0) {
					$string2compute .= $name . $value . $secretPassphrase;
				}
			}
		}
		else{

			$string2compute = static::getRawPostData() . $secretPassphrase;
		}
		
		return $string2compute;
	}
}