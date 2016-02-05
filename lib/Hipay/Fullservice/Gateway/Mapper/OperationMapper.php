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
use Hipay\Fullservice\Gateway\Model\Operation;

/**
 * Mapper for Operation Model Object
 *  
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class OperationMapper extends AbstractMapper {
	
	/**
	 * @var Operation $_modelObject Model object to populate
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
        $mid = $source['mid'] ?: null;
        $authorizationCode = $source['authorizationCode'] ?: null;
        $transactionReference = $source['transactionReference'] ?: null;
        $dateCreated = $source['dateCreated'] ?: null;
        $dateUpdated = $source['dateUpdated'] ?: null;
        $dateAuthorized = $source['dateAuthorized'] ?: null;
        $status = ((int)$source['status']) ?: null;
        $state = null;
        $message = $source['message'] ?: null;
        $authorizedAmount = $source['authorizedAmount'] ?: null;
        $capturedAmount = $source['capturedAmount'] ?: null;
        $refundedAmount = $source['refundedAmount'] ?: null;
        $decimals = $source['decimals'] ?: null;
        $currency = $source['currency'] ?: null;
        $reason =  null;       
        $operation = isset($source['operation']) ? $source['operation'] : null;;
        
        $this->_modelObject = new Operation(
        		$mid, 
        		$authorizationCode, 
        		$transactionReference, 
        		$dateCreated, 
        		$dateUpdated, 
        		$dateAuthorized, 
        		$status, 
        		$state, 
        		$message,
        		$authorizedAmount, 
        		$capturedAmount, 
        		$refundedAmount, 
        		$decimals, 
        		$currency, 
        		$reason, 
        		$operation
        		);

        
 			
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
        return '\Hipay\Fullservice\Gateway\Model\Operation';
    }



}