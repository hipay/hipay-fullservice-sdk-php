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

use Hipay\Fullservice\Gateway\Request\Order as OrderRequest;
use Hipay\Fullservice\Gateway\Response\TransactionInterface as TransactionResponse;
use Hipay\Fullservice\Client\ClientProvider;
use Hipay\Fullservice\Client\Configuration\Configuration;


/**
 * Client interface for all request send to TPP Fullservice.
 *
 * @category       Hipay
 * @package        Hipay_Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @api
 */
interface GatewayClientInterface {
	

	/**
	 *
	 * @var Configuration
	 */
	protected $configuration;
	
	/**
	 * 
	 * @var ClientProvider $_clientProvider
	 */
	protected $_clientProvider;

	/**
	 * Construct a gateway client with a HTTP client and Resquest Configuration
	 * 
	 * @param ClientProvider $clientProvider
	 * @param Configuration $configuration
	 */
	public function __construct(ClientProvider $clientProvider,Configuration $configuration);

	/**
	 * Request a new order
	 * @param OrderRequest $orderRequest
	 * @return TransactionResponse $transactionResponse
	 */
	function requestNewOrder(OrderRequest $orderRequest);

	function requestMaintenanceTransaction();

	function requestHostedPaymentPage();

	function requestTransactionInformation();
	
	/**
	 * Return current HTTP client provider
	 */
	function getClientProvider();

}