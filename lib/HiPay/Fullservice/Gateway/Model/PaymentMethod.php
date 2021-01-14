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

namespace HiPay\Fullservice\Gateway\Model;

use HiPay\Fullservice\Model\AbstractModel;

/**
 * Payment method model
 *
 * Information about payment method (Card expiry, issuer, country etc ...)
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PaymentMethod extends AbstractModel
{

    public function __construct(
        $token,
        $cardId,
        $brand,
        $pan,
        $cardHolder,
        $cardExpiryMonth,
        $cardExpiryYear,
        $issuer,
        $country
    ) {

        $this->_token = $token;
        $this->_cardId = $cardId;
        $this->_brand = $brand;
        $this->_pan = $pan;
        $this->_cardHolder = $cardHolder;
        $this->_cardExpiryMonth = $cardExpiryMonth;
        $this->_cardExpiryYear = $cardExpiryYear;
        $this->_issuer = $issuer;
        $this->_country = $country;

    }

    /**
     * @var string $_token
     */
    protected $_token;
    
    /**
     * @var string $_cardId
     */
    protected $_cardId;

    /**
     * @var string $_brand
     */
    protected $_brand;

    /**
     * @var string $_pan
     */
    protected $_pan;

    /**
     * @var string $_cardHolder
     */
    protected $_cardHolder;

    /**
     * @var string $_cardExpiryMonth
     */
    protected $_cardExpiryMonth;

    /**
     * @var string $_cardExpiryYear
     */
    protected $_cardExpiryYear;

    /**
     * @var string $_issuer
     */
    protected $_issuer;

    /**
     * @var string $_country
     */
    protected $_country;

    public function getToken()
    {
        return $this->_token;
    }
    public function getCardId()
    {
        return $this->_cardId;
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
}
