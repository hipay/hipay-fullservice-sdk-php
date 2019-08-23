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
     * Initiate a new data from an order request
     * @param string $dataId
     * @param OrderRequest $orderRequest
     * @param AbstractTransaction $transaction
     * @return null
     */
    public function sendDataFromOrder($dataId, OrderRequest $orderRequest, AbstractTransaction $transaction);

    /**
     * Gets data needed for data API
     * @param string $dataId
     * @param OrderRequest $orderRequest
     * @param AbstractTransaction $transaction
     * @return array
     */
    public function getData($dataId, OrderRequest $orderRequest, AbstractTransaction $transaction);

    /**
     * Compute a data id from params
     * @param array $params
     * @return string
     */
    public function getDataId(array $params);
}
