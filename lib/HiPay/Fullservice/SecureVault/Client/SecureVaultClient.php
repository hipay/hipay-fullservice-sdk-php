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
 */

namespace HiPay\Fullservice\SecureVault\Client;

use HiPay\Fullservice\HTTP\ClientProvider;
use HiPay\Fullservice\Model\AbstractModel;
use HiPay\Fullservice\SecureVault\Mapper\PaymentCardTokenMapper;
use HiPay\Fullservice\SecureVault\Model\PaymentCardToken;

/**
 * Client interface for vault request send to TPP Fullservice.
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class SecureVaultClient implements SecureVaultClientInterface
{
    /**
     * @var string ENDPOINT_LOOKUP_TOKEN endpoint to get vault information by token
     */
    const ENDPOINT_LOOKUP_TOKEN = 'v2/token/{token}';

    /**
     * @var string METHOD_LOOKUP_TOKEN http method to get vault information by token
     */
    const METHOD_LOOKUP_TOKEN = 'GET';

    /**
     * @var ClientProvider $_clientProvider HTTP client provider
     */
    protected $_clientProvider;

    /**
     * Construct secure vault client with an HTTP client
     *
     * @param ClientProvider $clientProvider
     */
    public function __construct(ClientProvider $clientProvider)
    {
        $this->_clientProvider = $clientProvider;
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\SecureVault\Client\SecureVaultClientInterface::requestLookupToken()
     * @return AbstractModel
     */
    public function requestLookupToken($token, $requestId = '0')
    {

        $endPoint = str_replace('{token}', $token, self::ENDPOINT_LOOKUP_TOKEN);

        // Add request_id on end point url
        $endPoint .= '?request_id=' . $requestId;

        $response = $this->getClientProvider()
                         ->request(self::METHOD_LOOKUP_TOKEN, $endPoint, array(), true);

        $pctMapper = new PaymentCardTokenMapper($response->toArray());

        return $pctMapper->getModelObjectMapped();
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Gateway\Client\GatewayClientInterface::getClientProvider()
     */
    public function getClientProvider()
    {
        return $this->_clientProvider;
    }
}
