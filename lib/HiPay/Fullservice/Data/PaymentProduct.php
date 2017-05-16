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
namespace HiPay\Fullservice\Data;


/**
 * Payment product object
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PaymentProduct
{
    
    public function __construct($productCode,$brandName,$category,$can3ds = false,$canRefund = false,$canRecurring = false ,$comment = '',$basketRequired = false){
        
        $this->_productCode = $productCode;
        $this->_brandName = $brandName;
        $this->_category = $category;
        $this->_can3ds = $can3ds;
        $this->_canRefund = $canRefund;
        $this->_canRecurring = $canRecurring;
        $this->_comment = $comment;
        $this->_basketRequired = $basketRequired;
        
    }
    
    /**
     * @var string $_productCode Product code (cd,mastercard,visa etc ...)
     */
    private $_productCode;
    
    /**
     * @var string $_brandName Human readable value
     */
    private $_brandName;
    
    /**
     * @var bool $_can3ds If can process 3ds payment
     */
    private $_can3ds = false;
    
    /**
     * 
     * @var bool $_canRefund Payment product accept refunds
     */
    private $_canRefund = false;
    
    /**
     * 
     * @var bool $_canRecurring Payment product accept refunds
     */
    private $_canRecurring = false;
    
    /**
     * 
     * @var $_category Brand's category
     */
    private $_category;
    
    /**
     * @var string $_comment A short brand description
     */
    private  $_comment = '';

    /**
     * @var boolean Cart items is required for the payment method
     */
    private  $_basketRequired = false;


    /**
     * @return string
     */
	public function getProductCode() {
		return $this->_productCode;
	}

    /**
     * @return string
     */
	public function getBrandName() {
		return $this->_brandName;
	}

    /**
     * @return bool
     */
	public function getCan3ds() {
		return $this->_can3ds;
	}

    /**
     * @return bool
     */
	public function getCanRefund() {
		return $this->_canRefund;
	}

    /**
     * @return bool|Payment
     */
	public function getCanRecurring() {
		return $this->_canRecurring;
	}

    /**
     * @return string
     */
	public function getComment() {
		return $this->_comment;
	}

    /**
     * @return Brand
     */
	public function getCategory() {
		return $this->_category;
	}

    /**
     * @return bool
     */
    public function getBasketRequired()
    {
        return $this->_basketRequired;
    }


}