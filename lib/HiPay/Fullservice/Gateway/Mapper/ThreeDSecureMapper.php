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

namespace HiPay\Fullservice\Gateway\Mapper;

use HiPay\Fullservice\Mapper\AbstractMapper;
use HiPay\Fullservice\Gateway\Model\ThreeDSecure;

/**
 * Mapper for 3D Secure Model Object
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class ThreeDSecureMapper extends AbstractMapper
{
    /**
     * @var ThreeDSecure $_modelObject Model object to populate
     */
    protected $_modelObject;

    /**
     * @var string $_modelClassName
     */
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
