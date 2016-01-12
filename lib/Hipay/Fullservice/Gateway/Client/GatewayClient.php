<?php
/**
 * Hipay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace Hipay\Fullservice\Gateway\Client;

use Hipay\Fullservice\Client\Client;
use Hipay\Fullservice\Client\ClientProvider;
use Hipay\Fullservice\Client\Configuration\Configuration;
/**
 * Client class for all request send to TPP Fullservice.
 *
 * @category       Hipay
 * @package        Hipay_Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @api
 */
class GatewayClient implements GatewayClientInterface{
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Gateway\Client\GatewayClientInterface::__construct()
	 */
	public function __construct(ClientProvider $clientProvider, Configuration $configuration) {
		// TODO: Auto-generated method stub
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
	 * @see \Hipay\Fullservice\Gateway\Client\GatewayClientInterface::requestNewOrder()
	 */
	public function requestNewOrder(OrderRequest $orderRequest) {
		
		//Execute Mapper
		//send request
		$this->_clientProvider->request($method, $uri,$options);
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