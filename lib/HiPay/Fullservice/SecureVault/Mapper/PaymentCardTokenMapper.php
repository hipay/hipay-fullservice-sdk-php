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
namespace HiPay\Fullservice\SecureVault\Mapper;

use HiPay\Fullservice\Mapper\AbstractMapper;
use HiPay\Fullservice\SecureVault\Model\PaymentCardToken;

/**
 * Mapper for Payment Card Token Model Object
 *  
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PaymentCardTokenMapper extends AbstractMapper {
	
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
        $brand = isset($source['brand']) ? $source['brand'] : null;
        $pan = isset($source['pan']) ? $source['pan'] : null;
        $cardHolder = isset($source['card_holder']) ? $source['card_holder'] : null;
        $cardExpiryMonth = isset($source['card_expiry_month']) ? $source['card_expiry_month'] : null;
        $cardExpiryYear = isset($source['card_expiry_year']) ? $source['card_expiry_year'] : null;
        $issuer = isset($source['issuer']) ? $source['issuer'] : null;
        $country = isset($source['country']) ? $source['country'] : null;
        $requestId =  isset($source['request_id']) ? $source['request_id'] : null;
        $domesticNetwork = isset($source['domestic_network']) ? $source['domestic_network'] : null;
        
        $this->_modelObject = new PaymentCardToken($token, $brand, $pan, $cardHolder, $cardExpiryMonth, $cardExpiryYear, $issuer, $country, $requestId, $domesticNetwork);
        
 			
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
        return '\HiPay\Fullservice\SecureVault\Model\PaymentCardToken';
    }



}