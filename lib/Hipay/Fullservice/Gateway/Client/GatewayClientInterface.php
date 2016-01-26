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

use Hipay\Fullservice\Gateway\Model\Transaction;
use Hipay\Fullservice\Gateway\Request\Order\OrderRequest;
use Hipay\Fullservice\HTTP\ClientProvider;


/**
 * Client interface for all request send to TPP Fullservice.
 *
 * @category    Hipay
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
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
     * Request Maintenance transaction
     */
	public function requestMaintenanceTransaction();
    
	/**
	 * Request Hosted Payment Page
	 */
	public function requestHostedPaymentPage();
    
	/**
	 * Get Transaction information
	 */
	public function requestTransactionInformation();
	
	/**
	 * Return current HTTP client provider
	 * @return ClientProvider The current client provider
	 */
	public function getClientProvider();

}