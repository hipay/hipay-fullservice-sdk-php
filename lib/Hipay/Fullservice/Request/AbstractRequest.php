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
namespace Hipay\Fullservice\Request;


/**
 * Model request abstract.
 * All request object sended by Gateway or Secure Vault client must implement it
 *
 * @category    Hipay
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
abstract class AbstractRequest implements RequestInterface{
	
	/**
	 *
	 * @var array
	 */
	protected $_params;
	
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Model\RequestInterface::getParams()
	 */
	public function getParams() {
		$this->prepareParams();
		return $this->_params;
	}
	
	/**
	 * Populate $_params array with data to send
	 * @return array $this->_params
	 */
	protected function prepareParams() {
		$properties = get_object_vars($this);
		foreach ($properties as $p=>$v)
			$this->_params[$p] = $v;
		
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Request\RequestInterface::getEndpoint()
	 */
	public function getEndpoint();
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Request\RequestInterface::getMethod()
	 */
	public function getMethod();


	
	



}