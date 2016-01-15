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
namespace Hipay\Fullservice\Gateway\Client;

use Hipay\Fullservice\HTTP\ClientProvider;
use Hipay\Fullservice\Gateway\Model\Transaction;
use Hipay\Fullservice\Request\RequestSerializer;
use Hipay\Fullservice\Gateway\Request\Order\OrderRequest;
/**
 * Client class for all request send to TPP Fullservice.
 *
 * @category    Hipay
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class GatewayClient implements GatewayClientInterface{
	
    
    const ENDPOINT_NEW_ORDER = '/rest/v1/order';
    const METHOD_NEW_ORDER = 'POST';
	
	/**
	 * @var ClientProvider $_clientProvider HTTP client provider
	 */
	protected $_clientProvider;
	
	
	
	
	/**
	 * Construct gateway client with an HTTP client 
	 * @param ClientProvider $clientProvider
	 */
	public function __construct(ClientProvider $clientProvider) {
		$this->_clientProvider = $clientProvider;
	}

	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Gateway\Client\GatewayClientInterface::requestNewOrder()
	 */
	public function requestNewOrder(OrderRequest $orderRequest) {
		
		//Instanciate serializer object
		$serializer = new RequestSerializer($orderRequest);
		
		//Get params array from serializer
		$params = $serializer->toArray();
		//send request
		$response = $this->getClientProvider()->request(self::METHOD_NEW_ORDER,self::ENDPOINT_NEW_ORDER,$params);
		
		//Transform response to Transaction Model
		$transaction = new Transaction($response->getBody());
		
		return $transaction;
		
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Gateway\Client\GatewayClientInterface::requestHostedPaymentPage()
	 */
	public function requestHostedPaymentPage() {
		// TODO: Auto-generated method stub
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Gateway\Client\GatewayClientInterface::requestMaintenanceTransaction()
	 */
	public function requestMaintenanceTransaction() {
		// TODO: Auto-generated method stub
	}
	
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Gateway\Client\GatewayClientInterface::requestTransactionInformation()
	 */
	public function requestTransactionInformation() {
		// TODO: Auto-generated method stub
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Gateway\Client\GatewayClientInterface::getClientProvider()
	 */
	public function getClientProvider() {
		return $this->_clientProvider;
	}



	
}