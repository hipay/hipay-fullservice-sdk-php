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
use HiPay\Fullservice\Gateway\Model\PaymentMethod;

/**
 * Mapper for Payment Method Model Object
 *  
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PaymentMethodMapper extends AbstractMapper {
	
	/**
	 * @var PaymentMethod $_modelObject Model object to populate
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
        $token = isset($source['token']) ? $source['token'] : null;
        $cardId = isset($source['cardId']) ? $source['cardId'] : null;
        $brand = isset($source['brand']) ? $source['brand'] : null;
        $pan = isset($source['pan']) ? $source['pan'] : null;
        $cardHolder = isset($source['cardHolder']) ? $source['cardHolder'] : null;
        $cardExpiryMonth = isset($source['cardExpiryMonth']) ? $source['cardExpiryMonth'] : null;
        $cardExpiryYear = isset($source['cardExpiryYear']) ? $source['cardExpiryYear'] : null;
        $issuer = isset($source['issuer']) ? $source['issuer'] : null;
        $country = isset($source['country']) ? $source['country'] : null;
        
        $this->_modelObject = new PaymentMethod($token,$cardId, $brand, $pan, $cardHolder, $cardExpiryMonth, $cardExpiryYear, $issuer, $country);
        
 			
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
        return '\HiPay\Fullservice\Gateway\Model\PaymentMethod';
    }



}
