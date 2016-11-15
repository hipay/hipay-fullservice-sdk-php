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
namespace HiPay\Fullservice\SecureVault\Model;

use HiPay\Fullservice\Model\AbstractModel;

/**
 * Paymen card token model
 *
 * Informations about a Token (Card expiry, issuer, country etc ...)
 *
 * @package   HiPay\Fullservice
 * @author    Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link      https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PaymentCardToken extends AbstractModel
{

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
        $domesticNetwork
    )
    {

        $this->_token           = $token;
        $this->_brand           = $brand;
        $this->_pan             = $pan;
        $this->_cardHolder      = $cardHolder;
        $this->_cardExpiryMonth = $cardExpiryMonth;
        $this->_cardExpiryYear  = $cardExpiryYear;
        $this->_issuer          = $issuer;
        $this->_country         = $country;
        $this->_requestId       = $requestId;
        $this->_domesticNetwork = $domesticNetwork;

    }

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
     *
     * @var string The request ID linked to the token
     */
    private $_requestId;

    /**
     *
     * @var string Card domestic network (if applicable, e.g. "cb").
     */
    private $_domesticNetwork;


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

}