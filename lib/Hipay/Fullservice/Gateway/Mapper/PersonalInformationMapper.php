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
use Hipay\Fullservice\Gateway\Model\PersonalInformation;

/**
 * Mapper for Personal Informations Model Object
 *  
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PersonalInformationMapper extends AbstractMapper {
    
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
        $firstname = $source['firstname'] ?: null;
        $lastname = $source['lastname'] ?: null;
        $streetAddress = $source['streetAddress'] ?: null;
        $locality = $source['locality'] ?: null;
        $postalCode = $source['postalCode'] ?: null;
        $country = $source['country'] ?: null;
        $msisdn = $source['msisdn'] ?: null;
        $phone = $source['phone'] ?: null;
        $phoneOperator = $source['phoneOperator'] ?: null;
        $email = $source['email'] ?: null;

        $this->_modelObject = new PersonalInformation($firstname, $lastname, $streetAddress, $locality, $postalCode, $country, $msisdn, $phone, $phoneOperator, $email);
        
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
        return '\Hipay\Fullservice\Gateway\Model\PersonalInformation';
    }



}