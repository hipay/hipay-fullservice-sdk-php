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

use HiPay\Fullservice\Gateway\Model\AvailablePaymentProduct;
use HiPay\Fullservice\Gateway\Model\Transaction;
use HiPay\Fullservice\Gateway\Request\Info\AvailablePaymentProductRequest;
use HiPay\Fullservice\Gateway\Request\Maintenance\MaintenanceRequest;
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
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
interface GatewayClientInterface
{
    /**
     * Request a new order
     * @param OrderRequest $orderRequest
     * @param string $dataId
     * @return Transaction $transaction
     */
    public function requestNewOrder(OrderRequest $orderRequest, $dataId = null);

    /**
     * Request Maintenance operation on a transaction
     * Because this api call is simple, we don't use an object request as method parameter
     *
     * @param string|null $operationType (capture,refund,cancel,acceptChallenge and denyChallenge)
     * @param string $transactionReference Transaction ID related to customer order
     * @param string|float $amount Amount to process
     * @param string $operationId Operation ID
     * @param MaintenanceRequest $maintenanceRequest
     * @return Operation
     */
    public function requestMaintenanceOperation(
        $operationType,
        $transactionReference,
        $amount = null,
        $operationId = null,
        MaintenanceRequest $maintenanceRequest = null
    );


    /**
     * Request Hosted Payment Page
     * @param HostedPaymentPageRequest $hppRequest
     * @param string $dataId
     * @return HostedPaymentPage $hpp
     */
    public function requestHostedPaymentPage(HostedPaymentPageRequest $hppRequest, $dataId = null);

    /**
     * Get Transaction information
     *
     * @param string $transactionReference
     * @return Transaction|null Transaction Model
     */
    public function requestTransactionInformation($transactionReference);

    /**
     * Get order Transaction information
     *
     * @param string $orderId
     * @return array<int, Transaction> Transaction Model
     */
    public function requestOrderTransactionInformation($orderId);

    /**
     * Request available payment products
     *
     * @param AvailablePaymentProductRequest $request
     * @return array<AvailablePaymentProduct> AbstractAvailablePaymentProduct Model
     */
    public function requestAvailablePaymentProduct(AvailablePaymentProductRequest $request);

    /**
     * Get security settings
     *
     * @return mixed
     */
    public function requestSecuritySettings();

    /**
     * Return current HTTP client provider
     * @return ClientProvider The current client provider
     */
    public function getClientProvider();
}
