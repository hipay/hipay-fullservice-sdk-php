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
use Hipay\Fullservice\Gateway\Mapper\OrderMapper;
use Hipay\Fullservice\Gateway\Request\Order\HostedPaymentPageRequest;
use Hipay\Fullservice\Gateway\Mapper\HostedPaymentPageMapper;
use Hipay\Fullservice\Gateway\Mapper\OperationMapper;
use Hipay\Fullservice\Request\AbstractRequest;
use Hipay\Fullservice\Exception\InvalidArgumentException;
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
	
    
	/**
	 * 
	 * @var string ENDPOINT_NEW_ORDER endpoint to create a new transaction order
	 */
    const ENDPOINT_NEW_ORDER = 'order';
    
    /**
     *
     * @var string METHOD_NEW_ORDER http method to create a new transaction order
     */
    const METHOD_NEW_ORDER = 'POST';
    
    /**
     *
     * @var string ENDPOINT_HOSTED_PAYMENT_PAGE endpoint to call Hosted payment page
     */
    const ENDPOINT_HOSTED_PAYMENT_PAGE = 'hpayment';
    
    /**
     *
     * @var string METHOD_HOSTED_PAYMENT_PAGE http method to call Hosted payment page
     */
    const METHOD_HOSTED_PAYMENT_PAGE = 'POST';
    
    /**
     *
     * @var string ENDPOINT_MAINTENANCE_OPERATION http method to do a maintenance operation (capture,refund,accept,deby etc ...)
     */
    const ENDPOINT_MAINTENANCE_OPERATION = 'maintenance/transaction/{transaction}';
    
    /**
     *
     * @var string METHOD_MAINTENANCE_OPERATION http method to do a maintenance operation
     */
    const METHOD_MAINTENANCE_OPERATION = 'POST';
	
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
		
		//Get params array from serializer
		$params = $this->_serializeRequestToArray($orderRequest);
		
		//send request
		$response = $this->getClientProvider()->request(self::METHOD_NEW_ORDER,self::ENDPOINT_NEW_ORDER,$params);
		
		//Transform response to Transaction Model with OrderMapper
		$orderMapper = new OrderMapper($response->toArray());
		$transaction = $orderMapper->getModelObjectMapped();
		
		return $transaction;
		
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Gateway\Client\GatewayClientInterface::requestHostedPaymentPage()
	 */
	public function requestHostedPaymentPage(HostedPaymentPageRequest $pageRequest) {
	
		//Get params array from serializer
		$params = $this->_serializeRequestToArray($pageRequest);
		
		//send request
		$response = $this->getClientProvider()->request(self::METHOD_HOSTED_PAYMENT_PAGE,self::ENDPOINT_HOSTED_PAYMENT_PAGE,$params);
		
		//Transform response to HostedPaymentPage Model with HostedPaymentPageMapper
		$mapper = new HostedPaymentPageMapper($response->toArray());
		$hostedPagePayment = $mapper->getModelObjectMapped();
		
		return $hostedPagePayment;
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
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Gateway\Client\GatewayClientInterface::requestMaintenanceTransaction()
	 */
	public function requestMaintenanceOperation($operationType,$transactionReference,$amount=null,$operationId=null) {
	
		$payload = array('operation'=>$operationType);
		
		if(!is_null($amount)){
			if(!is_float($amount) && !($amount > 0.01)){
				throw new InvalidArgumentException("Amount must be a float type and greater than 0.01");
			}
			else{
				$payload['amount'] = $amount;
			}
		}
		
		if(!is_null($operationId)){
			$payload['operation_id'] = $operationId;
		}
		
		$response = $this->getClientProvider()
							->request(self::METHOD_MAINTENANCE_OPERATION,
									str_replace('{transaction}',$transactionReference,self::ENDPOINT_MAINTENANCE_OPERATION),
									$payload);
		
		$om = new OperationMapper($response->toArray());
		return $om->getModelObjectMapped();
		
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