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
 * @copyright      Copyright (c) 2019 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */

namespace HiPay\Fullservice\Gateway\PIDataClient;

use HiPay\Fullservice\Gateway\Model\AbstractTransaction;
use HiPay\Fullservice\Gateway\Model\HostedPaymentPage;
use HiPay\Fullservice\Gateway\Request\Order\HostedPaymentPageRequest;
use HiPay\Fullservice\Gateway\Request\Order\OrderRequest;
use HiPay\Fullservice\HTTP\ClientProvider;

/**
 * Client interface for all request send to the Data API.
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      Jean-Baptiste Louvet <jlouvet@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
interface PIDataClientInterface
{
    /**
     * Return current HTTP client provider
     * @return ClientProvider The current client provider
     */
    public function getClientProvider();

    /**
     * Initiate a new data
     * @param array<string, mixed> $data
     * @return void
     */
    public function sendData($data);

    /**
     * Gets data needed for data API with order
     * @param string $dataId
     * @param OrderRequest $orderRequest
     * @param AbstractTransaction $transaction
     * @return array<string, mixed>
     */
    public function getOrderData($dataId, OrderRequest $orderRequest, AbstractTransaction $transaction);

    /**
     * Gets data needed for data API with Hpaympent
     * @param string $dataId
     * @param HostedPaymentPageRequest $orderRequest
     * @param HostedPaymentPage $transaction
     * @return array<string, mixed>
     */
    public function getHPaymentData($dataId, HostedPaymentPageRequest $orderRequest, HostedPaymentPage $transaction);

    /**
     * Compute a data id
     * @param string|null $dataId Existing data ID
     * @return string
     */
    public function getDataId($dataId);
}
