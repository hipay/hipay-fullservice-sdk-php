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
namespace HiPay\Fullservice\Gateway\Model;

use HiPay\Fullservice\Model\AbstractModel;

/**
 * Hosted Page Payment Model
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
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
								$order
			){
		
				$this->_mid = $mid;
				$this->_forwardUrl = $forwardUrl;
				$this->_order = $order;
	}
	
	/**
	 * 
	 * @var \HiPay\Fullservice\Model\Order $_order
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
	 *
	 * @return Order
	 */
	public function getOrder() {
		return $this->_order;
	}

	/**
	 *
	 * @return string
	 */
	public function getForwardUrl() {
		return $this->_forwardUrl;
	}

	/**
	 *
	 * @return string
	 */
	public function getMid() {
		return $this->_mid;
	}

}
