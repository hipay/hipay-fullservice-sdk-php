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

/**
 * Model Interface
 * 
 * Created for futhers features.
 * Not used for the moment but implemented
 * 
 * @package     HiPay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 */
interface ModelInterface {
	
	/**
	 * Return Json representation of public attributes
	 * @return string Json representation
	 */
	public function toJson();
	
	/**
	 * Return public attributes accessible by getter in ARRAY format
	 * @return array public attributes array
	 */
	public function toArray();
	
}