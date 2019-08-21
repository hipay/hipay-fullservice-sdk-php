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

use HiPay\Fullservice\Gateway\Request\Order\OrderRequest;
use HiPay\Fullservice\HTTP\ClientProvider;
use HiPay\Fullservice\HTTP\Configuration\Configuration;
use HiPay\Fullservice\HTTP\Response\AbstractResponse;

/**
 * Client class for all request send to the Data API.
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      Jean-Baptiste Louvet <jlouvet@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PIDataClient implements PIDataClientInterface
{
    /**
     * @var string ENDPOINT_DATA_API endpoint to create / update a data set
     */
    const ENDPOINT_DATA_API = 'checkout-data';

    /**
     * @var string METHOD_DATA_API http method to create / update a data set
     */
    const METHOD_DATA_API = 'POST';

    /**
     * @var ClientProvider $_clientProvider HTTP client provider
     */
    protected $_clientProvider;

    /**
     * @var string $_requestDate date of request's sending
     */
    private $_requestDate;

    /**
     * Construct gateway client with an HTTP client
     * @param ClientProvider $clientProvider
     */
    public function __construct(ClientProvider $clientProvider)
    {
        $this->_clientProvider = $clientProvider;
    }

    /**
     * Return current HTTP client provider
     * @return ClientProvider The current client provider
     */
    public function getClientProvider()
    {
        return $this->_clientProvider;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Gateway\PIDataClient\PIDataClientInterface::initDataFromOrder()
     */
    public function sendDataFromOrder($dataId, OrderRequest $orderRequest, AbstractResponse $response)
    {
        $composerData = json_decode(file_get_contents(__DIR__ . "../../../../../composer.json"));

        $params = array(
            "id" => $dataId,
            "amount" => $orderRequest->amount,
            "currency" => $orderRequest->currency,
            "order_id" => $orderRequest->orderid,
            "components" => array(
                "cms" => empty($orderRequest->source['brand']) ? "sdk_php" : $orderRequest->source['brand'],
                "cms_version" => empty($orderRequest->source['brand_version']) ? $composerData->version : $orderRequest->source['brand_version'],
                "cms_module_version" => empty($orderRequest->source['integration_version']) ? "" : $orderRequest->source['integration_version'],
                "sdk_server" => "php",
                "sdk_server_version" => $composerData->version,
            ),
            "monitoring" => array(
                "date_request" => $this->getRequestDate(),
                "date_response" => (new \DateTime())->format('Y-m-dTH-i-sO'),
            ),
            "environment" => $this->getClientProvider()->getConfiguration()->getApiEnv() == Configuration::API_ENV_PRODUCTION ? 'production' : 'stage',
            "event" => "request"
        );

        $this->getClientProvider()->request(self::METHOD_DATA_API, self::ENDPOINT_DATA_API, $params);
    }

    /**
     * {@inheritDoc}
     *
     * $params must contain a 'device_fingerprint' key with the associated value
     * Computation is a sha256 of device_fingerprint:host_domain
     *
     * @see \HiPay\Fullservice\Gateway\PIDataClient\PIDataClientInterface::initDataFromOrder()
     */
    public function getDataId(array $params)
    {
        if (empty($params['device_fingerprint'])) {
            return false;
        }

        $domain = preg_replace(':[0-9]+$', '', preg_replace('^www\.', '', $_SERVER['HTTP_HOST']));
        $fingerprint = $params['device_fingerprint'];

        return hash('sha256', $fingerprint . ':' . $domain);
    }

    /**
     * @return string
     */
    public function getRequestDate()
    {
        return $this->_requestDate;
    }

    /**
     * Initializes request date to current datetime
     */
    public function setRequestDate()
    {
        $this->_requestDate = (new \DateTime())->format('Y-m-dTH-i-sO');
    }
}
