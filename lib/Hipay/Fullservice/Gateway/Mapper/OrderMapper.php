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
use Hipay\Fullservice\Gateway\Model\Order;

/**
 * Mapper for Order Model Object
 *  
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class OrderMapper extends AbstractMapper {
    
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
        $id = isset($source['id']) ? $source['id'] : null;
        $customerId = isset($source['customerId']) ? $source['customerId'] : null;
        $amount = isset($source['amount']) ? $source['amount'] : null;
        $tax = isset($source['tax']) ? $source['tax'] : null;
        $shipping = isset($source['shipping']) ? $source['shipping'] : null;
        $dateCreated = isset($source['dateCreated']) ? $source['dateCreated'] : null;
        $attempts = isset($source['attempts']) ? $source['attempts'] : null;
        $currency = isset($source['currency']) ? $source['currency'] : null;
        $decimals = isset($source['decimals']) ? $source['decimals'] : null;
        $gender = isset($source['gender']) ? $source['gender'] : null;
        $language = isset($source['language']) ? $source['language'] : null;
        $shippingAddress = null;
        if(isset($source['shippingAddress'])){
        	$pim = new PersonalInformationMapper($source['shippingAddress']);
        	$shippingAddress = $pim->getModelObjectMapped();
        }
        

        $this->_modelObject = new Order($id, $customerId, $amount, $tax, $shipping, $dateCreated, $attempts, $currency, $decimals, $gender, $language, $shippingAddress);
        
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
        return '\Hipay\Fullservice\Gateway\Model\Order';
    }



}