<?php
/**
 * HiPay Fullservice SDK PHP
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Apache 2.0 Licence
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * @copyright      Copyright (c) 2016 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */

namespace HiPay\Fullservice\Gateway\Client;

use HiPay\Fullservice\Gateway\Request\Maintenance\MaintenanceRequest;
use HiPay\Fullservice\HTTP\ClientProvider;
use HiPay\Fullservice\Gateway\Model\Transaction;
use HiPay\Fullservice\Request\RequestSerializer;
use HiPay\Fullservice\Gateway\Request\Order\OrderRequest;
use HiPay\Fullservice\Gateway\Request\Order\HostedPaymentPageRequest;
use HiPay\Fullservice\Gateway\Mapper\HostedPaymentPageMapper;
use HiPay\Fullservice\Gateway\Mapper\OperationMapper;
use HiPay\Fullservice\Request\AbstractRequest;
use HiPay\Fullservice\Exception\InvalidArgumentException;
use HiPay\Fullservice\Gateway\Mapper\TransactionMapper;
use HiPay\Fullservice\Gateway\Mapper\SecuritySettingsMapper;
use Magento\Review\Block\Adminhtml\Main;

/**
 * Client class for all request send to TPP Fullservice.
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class GatewayClient implements GatewayClientInterface
{


    /**
     *
     * @var string ENDPOINT_NEW_ORDER endpoint to create a new transaction order
     */
    const ENDPOINT_NEW_ORDER = 'v1/order';

    /**
     *
     * @var string METHOD_NEW_ORDER http method to create a new transaction order
     */
    const METHOD_NEW_ORDER = 'POST';

    /**
     *
     * @var string ENDPOINT_HOSTED_PAYMENT_PAGE endpoint to call Hosted payment page
     */
    const ENDPOINT_HOSTED_PAYMENT_PAGE = 'v1/hpayment';

    /**
     *
     * @var string METHOD_HOSTED_PAYMENT_PAGE http method to call Hosted payment page
     */
    const METHOD_HOSTED_PAYMENT_PAGE = 'POST';

    /**
     *
     * @var string ENDPOINT_MAINTENANCE_OPERATION endpoint to do a maintenance operation (capture,refund,accept,deby etc ...)
     */
    const ENDPOINT_MAINTENANCE_OPERATION = 'v1/maintenance/transaction/{transaction}';

    /**
     *
     * @var string METHOD_MAINTENANCE_OPERATION http method to do a maintenance operation
     */
    const METHOD_MAINTENANCE_OPERATION = 'POST';

    /**
     * @var string ENDPOINT_TRANSACTION_DETAILS endpoint to call transaction information
     */
    const ENDPOINT_TRANSACTION_INFORMATION = 'v1/transaction/{transaction}';

    /**
     * @var string METHOD_TRANSACTION_DETAILS http method to call transaction information
     */
    const METHOD_TRANSACTION_INFORMATION = 'GET';

    /**
     * @var string ENDPOINT_ORDER_TRANSACTION_INFORMATION endpoint to call transaction information
     */
    const ENDPOINT_ORDER_TRANSACTION_INFORMATION = 'v1/transaction';

    /**
     * @var string METHOD_ORDER_TRANSACTION_INFORMATION http method to call transaction information
     */
    const METHOD_ORDER_TRANSACTION_INFORMATION = 'GET';

    /**
     * @var string ENDPOINT_SECURITY_SETTINGS endpoint to call security settings information
     */
    const ENDPOINT_SECURITY_SETTINGS = 'v2/security-settings';

    /**
     * @var string METHOD_ORDER_TRANSACTION_INFORMATION http method to call transaction information
     */
    const METHOD_SECURITY_SETTINGS = 'GET';

    /**
     * @var ClientProvider $_clientProvider HTTP client provider
     */
    protected $_clientProvider;

    /**
     * Construct gateway client with an HTTP client
     * @param ClientProvider $clientProvider
     */
    public function __construct(ClientProvider $clientProvider)
    {
        $this->_clientProvider = $clientProvider;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Gateway\Client\GatewayClientInterface::requestNewOrder()
     */
    public function requestNewOrder(OrderRequest $orderRequest)
    {

        //Get params array from serializer
        $params = $this->_serializeRequestToArray($orderRequest);

        //send request
        $response = $this->getClientProvider()->request(self::METHOD_NEW_ORDER, self::ENDPOINT_NEW_ORDER, $params);

        //Transform response to Transaction Model with TransactionMapper
        $transactionMapper = new TransactionMapper($response->toArray());
        $transaction = $transactionMapper->getModelObjectMapped();

        return $transaction;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Gateway\Client\GatewayClientInterface::requestHostedPaymentPage()
     */
    public function requestHostedPaymentPage(HostedPaymentPageRequest $pageRequest)
    {

        //Get params array from serializer
        $params = $this->_serializeRequestToArray($pageRequest);

        //send request
        $response = $this->getClientProvider()->request(
            self::METHOD_HOSTED_PAYMENT_PAGE,
            self::ENDPOINT_HOSTED_PAYMENT_PAGE,
            $params
        );

        //Transform response to HostedPaymentPage Model with HostedPaymentPageMapper
        $mapper = new HostedPaymentPageMapper($response->toArray());
        $hostedPagePayment = $mapper->getModelObjectMapped();

        return $hostedPagePayment;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Gateway\Client\GatewayClientInterface::requestMaintenanceTransaction()
     */
    public function requestMaintenanceOperation(
        $operationType,
        $transactionReference,
        $amount = null,
        $operationId = null,
        MaintenanceRequest $maintenanceRequest = null
    ) {
        if ($maintenanceRequest == null) {
            $maintenanceRequest = new MaintenanceRequest();
        }

        if ($operationType !== null) {
            $maintenanceRequest->operation = $operationType;
        } elseif ($maintenanceRequest->operation === null) {
            throw new InvalidArgumentException(
                'You must specify an Operation Type in  $operationType or $maintenanceRequest->operation'
            );
        }

        if (!is_null($amount)) {
            if (is_float($amount) && $amount < 0.01) {
                throw new InvalidArgumentException("Amount must be a greater than 0.01");
            } else {
                $maintenanceRequest->amount = $amount;
            }
        }

        if (!is_null($operationId)) {
            $maintenanceRequest->operation_id = $operationId;
        }

        //Get params array from serializer
        $params = $this->_serializeRequestToArray($maintenanceRequest);

        $response = $this->getClientProvider()
            ->request(
                self::METHOD_MAINTENANCE_OPERATION,
                str_replace('{transaction}', $transactionReference, self::ENDPOINT_MAINTENANCE_OPERATION),
                $params
            );

        $om = new OperationMapper($response->toArray());
        return $om->getModelObjectMapped();
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Gateway\Client\GatewayClientInterface::requestTransactionInformation()
     */
    public function requestTransactionInformation($transactionReference)
    {
        $response = $this->getClientProvider()->request(
            self::METHOD_TRANSACTION_INFORMATION,
            str_replace('{transaction}', $transactionReference, self::ENDPOINT_TRANSACTION_INFORMATION)
        );

        $data = $response->toArray();

        if (empty($data['transaction'])) {
            return null;
        }

        $transactionMapper = new TransactionMapper($data['transaction']);

        return $transactionMapper->getModelObjectMapped();
    }


    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Gateway\Client\GatewayClientInterface::requestOrderTransactionInformation()
     */
    public function requestOrderTransactionInformation($orderId)
    {
        $response = $this->getClientProvider()->request(
            self::METHOD_ORDER_TRANSACTION_INFORMATION,
            self::ENDPOINT_ORDER_TRANSACTION_INFORMATION . '?orderid=' . $orderId
        );

        $data = $response->toArray();

        if (empty($data['transaction'])) {
            return array();
        }

        $transactions = array();

        // Single transaction response
        if (!empty($data['transaction']['state'])) {
            $transactionMapper = new TransactionMapper($data['transaction']);
            $transactions[] = $transactionMapper->getModelObjectMapped();
        } else { // Array of transactions
            foreach ($data['transaction'] as $transaction) {
                $transactionMapper = new TransactionMapper($transaction);
                $transactions[] = $transactionMapper->getModelObjectMapped();
            }
        }

        return $transactions;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Gateway\Client\GatewayClientInterface::requestSecuritySettings()
     */
    public function requestSecuritySettings()
    {

        //send request
        $response = $this->getClientProvider()->request(
            self::METHOD_SECURITY_SETTINGS,
            self::ENDPOINT_SECURITY_SETTINGS
        );

        $ssm = new SecuritySettingsMapper($response->toArray());
        return $ssm->getModelObjectMapped();
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Gateway\Client\GatewayClientInterface::getClientProvider()
     */
    public function getClientProvider()
    {
        return $this->_clientProvider;
    }

    /**
     * Serialize to array an object request
     * @param AbstractRequest $request
     * @return array
     */
    protected function _serializeRequestToArray(AbstractRequest $request)
    {
        $serializer = new RequestSerializer($request);
        return $serializer->toArray();
    }
}
