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
     * @var string $_cardExpiryMonth
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

    public function getToken()
    {
        return $this->_token;
    }

    public function getBrand()
    {
        return $this->_brand;
    }

    public function getPan()
    {
        return $this->_pan;
    }

    public function getCardHolder()
    {
        return $this->_cardHolder;
    }

    public function getCardExpiryMonth()
    {
        return $this->_cardExpiryMonth;
    }

    public function getCardExpiryYear()
    {
        return $this->_cardExpiryYear;
    }

    public function getIssuer()
    {
        return $this->_issuer;
    }

    public function getCountry()
    {
        return $this->_country;
    }

    public function getRequestId()
    {
        return $this->_requestId;
    }

    public function getDomesticNetwork()
    {
        return $this->_domesticNetwork;
    }

    public function getCardHash()
    {
        return $this->_cardHash;
    }

    public function getCardId()
    {
        return $this->_cardId;
    }

    public function getCardType()
    {
        return $this->_cardType;
    }

    public function getCardCategory()
    {
        return $this->_cardCategory;
    }

    public function getForbiddenIssuerCountry()
    {
        return $this->_forbiddenIssuerCountry;
    }
}
