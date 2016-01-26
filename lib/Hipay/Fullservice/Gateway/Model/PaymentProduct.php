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
 * Payment product model
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PaymentProduct extends AbstractModel
{
    
    public function __construct($productCode,$brandName,$can3ds = false,$canRefund = false,$canRecurring = false ,$comment = ''){
        
        $this->_productCode = $productCode;
        $this->_brandName = $brandName;
        $this->_can3ds = $can3ds;
        $this->_canRefund = $canRefund;
        $this->_canRecurring = $canRecurring;
        $this->_comment = $comment;
        
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
     * @var $_canRecurring Payment product accept refunds
     */
    private $_canRecurring = false;
    
    /**
     * @var string $_comment A short brand description
     */
    private  $_comment = '';
    
}