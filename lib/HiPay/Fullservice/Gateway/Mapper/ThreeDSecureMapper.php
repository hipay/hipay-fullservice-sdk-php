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
use HiPay\Fullservice\Gateway\Model\ThreeDSecure;

/**
 * Mapper for 3D Secure Model Object
 *  
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class ThreeDSecureMapper extends AbstractMapper {
	
	/**
	 * @var ThreeDSecure $_modelObject Model object to populate
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
        $eci = isset($source['eci']) ? $source['eci'] : null;
        $enrollmentStatus = isset($source['enrollmentStatus']) ? $source['enrollmentStatus'] : null;
        $enrollmentMessage = isset($source['enrollmentMessage']) ? $source['enrollmentMessage'] : null;
        $authenticationStatus = isset($source['authenticationStatus']) ? $source['authenticationStatus'] : null;
        $authenticationMessage = isset($source['authenticationMessage']) ? $source['authenticationMessage'] : null;
        $authenticationToken = isset($source['authenticationToken']) ? $source['authenticationToken'] : null;
        $xid = isset($source['xid']) ? $source['xid'] : null;
        
        $this->_modelObject = new ThreeDSecure($eci, $enrollmentStatus, $enrollmentMessage, $authenticationStatus, $authenticationMessage, $authenticationToken, $xid);
        
 			
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
        return '\HiPay\Fullservice\Gateway\Model\ThreeDSecure';
    }



}