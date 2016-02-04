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
namespace Hipay\Fullservice\Gateway\Model;

use Hipay\Fullservice\Model\AbstractModel;

/**
 * Hosted Page Payment Model
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class HostedPaymentPage extends AbstractModel
{
	/**
	 * 
	 * @param string $mid
	 * @param string $forwardUrl
	 * @param Order|null $order
	 * @param string $cdata1
	 * @param string $cdata2
	 * @param string $cdata3
	 * @param string $cdata4
	 * @param string $cdata5
	 * @param string $cdata6
	 * @param string $cdata7
	 * @param string $cdata8
	 * @param string $cdata9
	 * @param string $cdata10
	 */
	public function __construct($mid,
								$forwardUrl,
								$order,
								$cdata1 = "",
								$cdata2 = "",
								$cdata3 = "",
								$cdata4 = "",
								$cdata5 = "",
								$cdata6 = "",
								$cdata7 = "",
								$cdata8 = "",
								$cdata9 = "",
								$cdata10 = ""
			){
		
				$this->_mid = $mid;
				$this->_forwardUrl = $forwardUrl;
				$this->_order = $order;
				
				$this->_cdata1 = $cdata1;
				$this->_cdata2 = $cdata2;
				$this->_cdata3 = $cdata3;
				$this->_cdata4 = $cdata4;
				$this->_cdata5 = $cdata5;
				$this->_cdata6 = $cdata6;
				$this->_cdata7 = $cdata7;
				$this->_cdata8 = $cdata8;
				$this->_cdata9 = $cdata9;
				$this->_cdata10 = $cdata10;
		
	}
	
	/**
	 * 
	 * @var \Hipay\Fullservice\Model\Order $_order
	 */
	private $_order;
	
	/**
	 * @var string $_forwardUrl Merchant must redirect the customer's browser to this URL.
	 * @type url
	 */
	private $_forwardUrl;
	
	/**
	 * @var string $_mid Your merchant account number
	 */
	private $_mid;
	
	/**
	 * Custom sended data
	 *
	 * @var string $_cdata1 Custom data 1.
	 * @var string $_cdata2 Custom data 2.
	 * @var string $_cdata3 Custom data 3.
	 * @var string $_cdata4 Custom data 4.
	 * @var string $_cdata5 Custom data 5.
	 * @var string $_cdata6 Custom data 6.
	 * @var string $_cdata7 Custom data 7.
	 * @var string $_cdata8 Custom data 8.
	 * @var string $_cdata9 Custom data 9.
	 * @var string $_cdata10 Custom data 10.
	 */
	private $_cdata1,$_cdata2,$_cdata3,$_cdata4,$_cdata5,$_cdata6,$_cdata7,$_cdata8,$_cdata9,$_cdata10;
	
	/**
	 *
	 * @return the Order
	 */
	public function getOrder() {
		return $this->_order;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getForwardUrl() {
		return $this->_forwardUrl;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getMid() {
		return $this->_mid;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCdata1() {
		return $this->_cdata1;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCdata2() {
		return $this->_cdata2;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCdata3() {
		return $this->_cdata3;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCdata4() {
		return $this->_cdata4;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCdata5() {
		return $this->_cdata5;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCdata6() {
		return $this->_cdata6;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCdata7() {
		return $this->_cdata7;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCdata8() {
		return $this->_cdata8;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCdata9() {
		return $this->_cdata9;
	}
	
	/**
	 *
	 * @return the string
	 */
	public function getCdata10() {
		return $this->_cdata10;
	}
	
    
    
}