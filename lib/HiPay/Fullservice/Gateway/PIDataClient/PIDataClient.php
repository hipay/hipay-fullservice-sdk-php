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

use HiPay\Fullservice\Exception\ApiErrorException;
use HiPay\Fullservice\Exception\UnexpectedValueException;
use HiPay\Fullservice\Gateway\Model\AbstractTransaction;
use HiPay\Fullservice\Gateway\Model\HostedPaymentPage;
use HiPay\Fullservice\Gateway\Request\Order\HostedPaymentPageRequest;
use HiPay\Fullservice\Gateway\Request\Order\OrderRequest;
use HiPay\Fullservice\HTTP\ClientProvider;

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
    const ENDPOINT_DATA_API = '/checkout-data';

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
        $this->setRequestDate();
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
     * @see \HiPay\Fullservice\Gateway\PIDataClient\PIDataClientInterface::sendData()
     */
    public function sendData($data)
    {
        $this->getClientProvider()->request(
            self::METHOD_DATA_API,
            self::ENDPOINT_DATA_API,
            $data,
            false,
            true
        );
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Gateway\PIDataClient\PIDataClientInterface::getOrderData()
     */
    public function getOrderData($dataId, OrderRequest $orderRequest, AbstractTransaction $transaction)
    {
        $params = $this->getCommonData($dataId, $orderRequest);
        $params['event'] = "request";
        $params['transaction_id'] = (int) $transaction->getTransactionReference();
        $params['status'] = $transaction->getStatus();
        $params['payment_method'] = $orderRequest->payment_product;

        return $params;
    }


    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Gateway\PIDataClient\PIDataClientInterface::getHPaymentData()
     *
     * @param string $dataId
     * @param HostedPaymentPageRequest $hostedPaymentPageRequest
     * @param HostedPaymentPage $transaction
     * @return array<string, mixed>
     */
    public function getHPaymentData($dataId, HostedPaymentPageRequest $hostedPaymentPageRequest, HostedPaymentPage $transaction)
    {
        $params = $this->getCommonData($dataId, $hostedPaymentPageRequest);
        $params['event'] = "initHpayment";
        $params['payment_method'] = is_array($hostedPaymentPageRequest->payment_product_list) ?
            implode(',', $hostedPaymentPageRequest->payment_product_list) : $hostedPaymentPageRequest->payment_product_list;
        $params['components']['template'] = $hostedPaymentPageRequest->template;

        return $params;
    }

    /**
     * Returns common request data
     * @param string $dataId
     * @param OrderRequest $request
     * @return array<string, mixed>
     */
    private function getCommonData($dataId, OrderRequest $request)
    {
        $composerConfig = file_get_contents(__DIR__ . "/../../../../../composer.json");
        if ($composerConfig === false) {
            throw new UnexpectedValueException("Error while trying to retrieve composer configuration.");
        }

        $composerData = json_decode($composerConfig);

        if (!is_array($request->source)) {
            $sourceData = json_decode($request->source, true);
        } else {
            $sourceData = $request->source;
        }

        $params = array(
            "id" => $dataId,
            "amount" => (float) $request->amount,
            "currency" => $request->currency,
            "order_id" => $request->orderid,
            "components" => array(
                "cms" => empty($sourceData['brand']) ? "sdk_php" : $sourceData['brand'],
                "cms_version" => empty($sourceData['brand_version']) ? $composerData->version : $sourceData['brand_version'],
                "cms_module_version" => empty($sourceData['integration_version']) ? "" : $sourceData['integration_version'],
                "sdk_server" => "php",
                "sdk_server_version" => $composerData->version,
                "sdk_server_engine_version" => phpversion(),
            ),
            "monitoring" => array(
                "date_request" => $this->getRequestDate(),
                "date_response" => $this->getCurDateUTCFormatted(),
            ),
            "domain" => $this->getDomain($this->getHost($request->accept_url))
        );

        return $params;
    }

    /**
     * {@inheritDoc}
     *
     * $params must contain a 'device_fingerprint' key with the associated value or a 'forward_url' key with the associated value
     * Computation is a sha256 of device_fingerprint:host_domain or a sha256 of the forward_url if present
     *
     * @see \HiPay\Fullservice\Gateway\PIDataClient\PIDataClientInterface::initDataFromOrder()
     *
     * @param array<string, mixed>$params
     * @return false|string
     */
    public function getDataId(array $params)
    {
        if (!empty($params['forward_url'])) {
            return hash('sha256', $params['forward_url']);
        } elseif (!empty($params['device_fingerprint'])) {
            $params['url_accept'] = empty($params['url_accept']) ? null : $params['url_accept'];

            // Cleaning the domain from http(s) tag, www tag, any path and ports
            $domain = $this->getDomain($this->getHost($params['url_accept']));
            $fingerprint = $params['device_fingerprint'];

            return hash('sha256', $fingerprint . ':' . $domain);
        } else {
            return false;
        }
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
     * @return void
     */
    public function setRequestDate()
    {
        $this->_requestDate = $this->getCurDateUTCFormatted();
    }

    /**
     * @param string $defaultHost
     * @return string
     */
    private function getHost($defaultHost = "")
    {
        $possibleHostSources = array('HTTP_REFERER','HTTP_X_FORWARDED_HOST', 'HTTP_HOST');
        $sourceTransformations = array(
            "HTTP_X_FORWARDED_HOST" => function ($value) {
                $elements = explode(',', $value);
                return trim(end($elements));
            }
        );
        $host = '';
        foreach ($possibleHostSources as $source) {
            if (!empty($host)) {
                break;
            }
            if (empty($_SERVER[$source])) {
                continue;
            }
            $host = $_SERVER[$source];
            if (array_key_exists($source, $sourceTransformations)) {
                $host = $sourceTransformations[$source]($host);
            }
        }

        if (empty($host)) {
            $host = $defaultHost;
        }

        return trim($host);
    }

    /**
     * @param string $rawHostname
     * @return string|null
     */
    private function getDomain($rawHostname)
    {
        if (!$rawHostname) {
            return "";
        }

        $withoutProtocol = preg_replace('/(^(http|https):\/\/)?(www\.)?/', '', $rawHostname);

        if (is_null($withoutProtocol)) {
            throw new UnexpectedValueException("Invalid hostname \"$rawHostname\"");
        }

        $withoutDirectory = preg_replace('/\/(.*)$/', '', $withoutProtocol);

        if (is_null($withoutDirectory)) {
            throw new UnexpectedValueException("Invalid hostname \"$rawHostname\"");
        }

        return preg_replace(
            '/:[0-9]+$/',
            '',
            $withoutDirectory
        );
    }

    /**
     * @return string
     */
    private function getCurDateUTCFormatted()
    {
        $curDate = new \DateTime('now', new \DateTimeZone('UTC'));
        $milliSec = str_pad(strval(floor($curDate->format('u') / 1000)), 3, "0", STR_PAD_LEFT);
        return $curDate->format('Y-m-d\TH:i:s.') . $milliSec . 'Z';
    }
}
