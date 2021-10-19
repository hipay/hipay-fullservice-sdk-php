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

namespace HiPay\Fullservice\SecureVault\Model;

use HiPay\Fullservice\Model\AbstractModel;

/**
 * Payment card token model
 *
 * Information about a Token (Card expiry, issuer, country etc ...)
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PaymentCardToken extends AbstractModel
{
    /**
     * @var string $_token
     */
    private $_token;

    /**
     * @var string $_brand
     */
    private $_brand;

    /**
     * @var string $_pan
     */
    private $_pan;

    /**
     * @var string $_cardHolder
     */
    private $_cardHolder;

    /**
     * @var string|null $_cardExpiryMonth
     */
    private $_cardExpiryMonth;

    /**
     * @var string $_cardExpiryYear
     */
    private $_cardExpiryYear;

    /**
     * @var string $_issuer
     */
    private $_issuer;

    /**
     * @var string $_country
     */
    private $_country;

    /**
     * @var string The request ID linked to the token
     */
    private $_requestId;

    /**
     * @var string Card domestic network (if applicable, e.g. "cb").
     */
    private $_domesticNetwork;

    /**
     * @var string $_cardHash
     */
    private $_cardHash;

    /**
     * @var string $_cardId
     */
    private $_cardId;

    /**
     * @var string $_cardType
     */
    private $_cardType;

    /**
     * @var string $_cardCategory
     */
    private $_cardCategory;

    /**
     * @var string $_forbiddenIssuerCountry
     */
    private $_forbiddenIssuerCountry;

    /**
     * PaymentCardToken constructor.
     * @param string $token
     * @param string $brand
     * @param string $pan
     * @param string $cardHolder
     * @param string $cardExpiryMonth
     * @param string $cardExpiryYear
     * @param string $issuer
     * @param string $country
     * @param string $requestId
     * @param string $domesticNetwork
     * @param string $cardHash
     * @param string $cardId
     * @param string $cardType
     * @param string $cardCategory
     * @param string $forbiddenIssuerCountry
     */
    public function __construct(
        $token,
        $brand,
        $pan,
        $cardHolder,
        $cardExpiryMonth,
        $cardExpiryYear,
        $issuer,
        $country,
        $requestId,
        $domesticNetwork,
        $cardHash,
        $cardId,
        $cardType,
        $cardCategory,
        $forbiddenIssuerCountry
    ) {
        $this->_token = $token;
        $this->_brand = $brand;
        $this->_pan = $pan;
        $this->_cardHolder = $cardHolder;
        $this->_cardExpiryMonth = $cardExpiryMonth;
        $this->_cardExpiryYear = $cardExpiryYear;
        $this->_issuer = $issuer;
        $this->_country = $country;
        $this->_requestId = $requestId;
        $this->_domesticNetwork = $domesticNetwork;
        $this->_cardHash = $cardHash;
        $this->_cardId = $cardId;
        $this->_cardType = $cardType;
        $this->_cardCategory = $cardCategory;
        $this->_forbiddenIssuerCountry = $forbiddenIssuerCountry;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->_token;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->_brand;
    }

    /**
     * @return string
     */
    public function getPan()
    {
        return $this->_pan;
    }

    /**
     * @return string
     */
    public function getCardHolder()
    {
        return $this->_cardHolder;
    }

    /**
     * @return string|null
     */
    public function getCardExpiryMonth()
    {
        return $this->_cardExpiryMonth;
    }

    /**
     * @return string
     */
    public function getCardExpiryYear()
    {
        return $this->_cardExpiryYear;
    }

    /**
     * @return string
     */
    public function getIssuer()
    {
        return $this->_issuer;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->_country;
    }

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->_requestId;
    }

    /**
     * @return string
     */
    public function getDomesticNetwork()
    {
        return $this->_domesticNetwork;
    }

    /**
     * @return string
     */
    public function getCardHash()
    {
        return $this->_cardHash;
    }

    /**
     * @return string
     */
    public function getCardId()
    {
        return $this->_cardId;
    }

    /**
     * @return string
     */
    public function getCardType()
    {
        return $this->_cardType;
    }

    /**
     * @return string
     */
    public function getCardCategory()
    {
        return $this->_cardCategory;
    }

    /**
     * @return string
     */
    public function getForbiddenIssuerCountry()
    {
        return $this->_forbiddenIssuerCountry;
    }
}
