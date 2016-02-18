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
namespace HiPay\Fullservice\Gateway\Mapper;

use HiPay\Fullservice\Mapper\AbstractMapper;
use HiPay\Fullservice\Gateway\Model\HostedPaymentPage;

/**
 * Mapper for Hosted Payment Page Model Object
 *  
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class HostedPaymentPageMapper extends AbstractMapper {
	
	/**
	 * @var HostedPaymentPage $_modelObject Model object to populate
	 */
	protected $_modelObject;
    
    protected $_modelClassName;

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Mapper\AbstractMapper::mapResponseToModel()
     */
    protected function mapResponseToModel()
    {
        $source = $this->_getSource();
        $mid = isset($source['mid']) ? $source['mid'] : null;
        $forwardUrl = isset($source['forwardUrl']) ? $source['forwardUrl'] : null;
        $order = null;
        if(isset($source['order'])){
        	$om = new OrderMapper($source['order']);
        	$order = $om->getModelObjectMapped();
        }
        
        $cdata1 = isset($source['cdata1']) ? $source['cdata1'] : null;
        $cdata2 = isset($source['cdata2']) ? $source['cdata2'] : null;
        $cdata3 = isset($source['cdata3']) ? $source['cdata3'] : null;
        $cdata4 = isset($source['cdata4']) ? $source['cdata4'] : null;
        $cdata5 = isset($source['cdata5']) ? $source['cdata5'] : null;
        $cdata6 = isset($source['cdata6']) ? $source['cdata6'] : null;
        $cdata7 = isset($source['cdata7']) ? $source['cdata7'] : null;
        $cdata8 = isset($source['cdata8']) ? $source['cdata8'] : null;
        $cdata9 = isset($source['cdata9']) ? $source['cdata9'] : null;
        $cdata10 = isset($source['cdata10']) ? $source['cdata10'] : null;
        
        $this->_modelObject = new HostedPaymentPage($mid, 
        		$forwardUrl, 
        		$order,
        		$cdata1,
        		$cdata2,
        		$cdata3,
        		$cdata4,
        		$cdata5,
        		$cdata6,
        		$cdata7,
        		$cdata8,
        		$cdata9,
        		$cdata10
        		) ;
        
 			
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Mapper\AbstractMapper::validate()
     */
    protected function validate()
    {
        return $this;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Mapper\AbstractMapper::getModelClassName()
     */
    protected function getModelClassName()
    {
        return '\HiPay\Fullservice\Gateway\Model\HostedPaymentPage';
    }



}