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
namespace HiPay\Fullservice\SecureVault\Client;

use HiPay\Fullservice\HTTP\ClientProvider;
use HiPay\Fullservice\Request\RequestSerializer;
use HiPay\Fullservice\Request\AbstractRequest;
use HiPay\Fullservice\SecureVault\Request\GenerateTokenRequest;
use HiPay\Fullservice\SecureVault\Mapper\PaymentCardTokenMapper;
use HiPay\Fullservice\SecureVault\Request\UpdateTokenRequest;

/**
 * Client interface for vault request send to TPP Fullservice.
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class SecureVaultClient implements SecureVaultClientInterface{
	
    
	/**
	 * 
	 * @var string ENDPOINT_GENERATE_TOKEN endpoint to create a new vault token
	 */
    const ENDPOINT_GENERATE_TOKEN = 'token/create';
    
    /**
     *
     * @var string METHOD_GENERATE_TOKEN http method to create a new vault token
     */
    const METHOD_GENERATE_TOKEN = 'POST';
    
    /**
     *
     * @var string ENDPOINT_UPDATE_TOKEN endpoint to update vault data
     */
    const ENDPOINT_UPDATE_TOKEN = 'token/update';
    
    /**
     *
     * @var string METHOD_UPDATE_TOKEN http method to update vault data
     */
    const METHOD_UPDATE_TOKEN = 'POST';
    
    /**
     *
     * @var string ENDPOINT_LOOKUP_TOKEN endpoint to get vault information by token
     */
    const ENDPOINT_LOOKUP_TOKEN = 'token/{token}';
    
    /**
     *
     * @var string METHOD_LOOKUP_TOKEN http method to get vault information by token
     */
    const METHOD_LOOKUP_TOKEN = 'GET';
	
	/**
	 * @var ClientProvider $_clientProvider HTTP client provider
	 */
	protected $_clientProvider;
	
	/**
	 * Construct secure vault client with an HTTP client 
	 * @param ClientProvider $clientProvider
	 */
	public function __construct(ClientProvider $clientProvider) {
		$this->_clientProvider = $clientProvider;
	}

	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \HiPay\Fullservice\SecureVault\Client\SecureVaultClientInterface::requestGenerateToken()
	 */
	public function requestGenerateToken(GenerateTokenRequest $generateTokenRequest) {
		
		//Get params array from serializer
		$params = $this->_serializeRequestToArray($generateTokenRequest);
		
		//send request
		$response = $this->getClientProvider()->request(self::METHOD_GENERATE_TOKEN,self::ENDPOINT_GENERATE_TOKEN,$params);
		
		//Transform response to Transaction Model with OrderMapper
		$pctMapper = new PaymentCardTokenMapper($response->toArray());
		$cardToken = $pctMapper->getModelObjectMapped();
		
		return $cardToken;
		
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \HiPay\Fullservice\SecureVault\Client\SecureVaultClientInterface::requestUpdateToken()
	 */
	public function requestUpdateToken(UpdateTokenRequest $updateTokenRequest) {
	
		//Get params array from serializer
		$params = $this->_serializeRequestToArray($updateTokenRequest);
	
		//send request
		$response = $this->getClientProvider()->request(self::METHOD_UPDATE_TOKEN,self::ENDPOINT_UPDATE_TOKEN,$params);
	
		//Transform response to Transaction Model with OrderMapper
		$pctMapper = new PaymentCardTokenMapper($response->toArray());
		$cardToken = $pctMapper->getModelObjectMapped();
	
		return $cardToken;
	
	}
	
	
	
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \HiPay\Fullservice\SecureVault\Client\SecureVaultClientInterface::requestLookupToken()
	 */
	public function requestLookupToken($token,$requestId) {
	
		$payload = array('token'=>$token,
						'request_id'=>$requestId
		);
		
		$response = $this->getClientProvider()
							->request(self::METHOD_LOOKUP_TOKEN,
									str_replace('{token}',$token,self::ENDPOINT_LOOKUP_TOKEN),
									$payload);
		
		$pctMapper = new PaymentCardTokenMapper($response->toArray());
		return $pctMapper->getModelObjectMapped();
		
	}

	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \HiPay\Fullservice\Gateway\Client\GatewayClientInterface::getClientProvider()
	 */
	public function getClientProvider() {
		return $this->_clientProvider;
	}
	
	/**
	 * Serialize to array an object request
	 * @param AbstractRequest $request
	 * @return array
	 */
	protected function _serializeRequestToArray(AbstractRequest $request){
		$serializer = new RequestSerializer($request);
		return $serializer->toArray();
	}



	
}