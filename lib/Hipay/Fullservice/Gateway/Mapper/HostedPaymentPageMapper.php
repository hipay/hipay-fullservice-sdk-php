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
namespace Hipay\Fullservice\Gateway\Mapper;

use Hipay\Fullservice\Mapper\AbstractMapper;
use Hipay\Fullservice\Gateway\Model\HostedPaymentPage;

/**
 * Mapper for Hosted Payment Page Model Object
 *  
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class HostedPaymentPage extends AbstractMapper {
	
	/**
	 * @var HostedPaymentPage $_modelObject Model object to populate
	 */
	protected $_modelObject;
    
    protected $_modelClassName;

    /**
     *
     * {@inheritDoc}
     *
     * @see \Hipay\Fullservice\Mapper\AbstractMapper::mapResponseToModel()
     */
    protected function mapResponseToModel()
    {
        $source = $this->_getSource();
        $mid = isset($source['mid']) ?: null;
        $forwardUrl = isset($source['forwardUrl']) ?: null;
        $order = isset($source['order']) ? new OrderMapper($source['order']) : null;
        $cdata1 = isset($source['cdata1']) ?: null;
        $cdata2 = isset($source['cdata2']) ?: null;
        $cdata3 = isset($source['cdata3']) ?: null;
        $cdata4 = isset($source['cdata4']) ?: null;
        $cdata5 = isset($source['cdata5']) ?: null;
        $cdata6 = isset($source['cdata6']) ?: null;
        $cdata7 = isset($source['cdata7']) ?: null;
        $cdata8 = isset($source['cdata8']) ?: null;
        $cdata9 = isset($source['cdata9']) ?: null;
        $cdata10 = isset($source['cdata10']) ?: null;
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
     * @see \Hipay\Fullservice\Mapper\AbstractMapper::validate()
     */
    protected function validate()
    {
        return $this;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Hipay\Fullservice\Mapper\AbstractMapper::getModelClassName()
     */
    protected function getModelClassName()
    {
        return '\Hipay\Fullservice\Gateway\Model\HostedPaymentPage';
    }



}