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
namespace HiPay\Fullservice\Gateway\Client;

use HiPay\Fullservice\Gateway\Model\Transaction;
use HiPay\Fullservice\Gateway\Request\Order\OrderRequest;
use HiPay\Fullservice\HTTP\ClientProvider;
use HiPay\Fullservice\Gateway\Request\Order\HostedPaymentPageRequest;
use HiPay\Fullservice\Gateway\Model\HostedPaymentPage;
use HiPay\Fullservice\Gateway\Model\Operation;


/**
 * Client interface for all request send to TPP Fullservice.
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
interface GatewayClientInterface {

	/**
	 * Request a new order
	 * @param OrderRequest $orderRequest
	 * @return Transaction $transaction
	 */
	public function requestNewOrder(OrderRequest $orderRequest);
	
    /**
     * Request Maintenance operation on a transaction
     * Because this api call is simple, we don't use an object request as method parameter
     * 
     * @param string $operationType (capture,refund,cancel,acceptChallenge and denyChallenge)
     * @param float $amount Amount to process
     * @param string $transactionReference Transaction ID related to customer order
     * @return Operation
     */
	public function requestMaintenanceOperation($operationType,$amount,$transactionReference);

    
	/**
	 * Request Hosted Payment Page
	 * @param HostedPaymentPageRequest $hppRequest
	 * @return HostedPaymentPage $hpp
	 */
	public function requestHostedPaymentPage(HostedPaymentPageRequest $hppRequest);
    
	/**
	 * Get Transaction information
	 * 
	 * @param string $operationType
	 * @param float $amount
	 * @param string $transactionReference
	 * @return Operation Operation Model
	 */
	public function requestTransactionInformation();
	
	/**
	 * Return current HTTP client provider
	 * @return ClientProvider The current client provider
	 */
	public function getClientProvider();

}
