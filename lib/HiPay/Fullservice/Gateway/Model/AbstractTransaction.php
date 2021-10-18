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
 * Abstract Model Transaction response.
 * Order and Transaction commons methods
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
abstract class AbstractTransaction extends AbstractModel
{


    /**
     *
     * @param string $mid
     * @param string $authorizationCode
     * @param string $transactionReference
     * @param string $dateCreated
     * @param string $dateUpdated
     * @param string $dateAuthorized
     * @param int $status
     * @param string|null $state
     * @param string $message
     * @param float $authorizedAmount
     * @param float $capturedAmount
     * @param float $refundedAmount
     * @param int $decimals
     * @param string $currency
     */
    public function __construct(
        $mid,
        $authorizationCode,
        $transactionReference,
        $dateCreated,
        $dateUpdated,
        $dateAuthorized,
        $status,
        $state,
        $message,
        $authorizedAmount,
        $capturedAmount,
        $refundedAmount,
        $decimals,
        $currency
    ) {

        $this->_mid = $mid;
        $this->_authorizationCode = $authorizationCode;
        $this->_transactionReference = $transactionReference;
        $this->_dateCreated = $dateCreated;
        $this->_dateUpdated = $dateUpdated;
        $this->_dateAuthorized = $dateAuthorized;
        $this->_status = $status;
        $this->_state = $state;
        $this->_message = $message;
        $this->_authorizedAmount = $authorizedAmount;
        $this->_capturedAmount = $capturedAmount;
        $this->_refundedAmount = $refundedAmount;
        $this->_decimals = $decimals;
        $this->_currency = $currency;

    }

    /**
     * @var string $_mid Your merchant account number
     */
    protected $_mid;

    /**
     * An authorization code (up to 35 characters) generated for each approved or pending transaction by the acquiring provider.
     *
     * @var string $_authorizationCode An authorization code
     */
    protected $_authorizationCode;

    /**
     * @var string $_transactionReference The unique identifier of the transaction
     */
    protected $_transactionReference;

    /**
     * @var string $_dateCreated Time when transaction was created (yyyy-mm-ddTH:i:sZ).
     * @format yyyy-mm-ddTH:i:sZ
     */
    protected $_dateCreated;

    /**
     * @var string $_dateUpdated Time when transaction was last updated (yyyy-mm-ddTH:i:sZ).
     * @format yyyy-mm-ddTH:i:sZ
     */
    protected $_dateUpdated;

    /**
     * @var string $_dateAuthorized Time when transaction was authorized (yyyy-mm-ddTH:i:sZ).
     * @format yyyy-mm-ddTH:i:sZ
     */
    protected $_dateAuthorized;

    /**
     * @var int $_status Transaction status return by Fullservice API.
     * @see \HiPay\Fullservice\Enum\Transaction\TransactionStatus
     */
    protected $_status;

    /**
     * @var string|null $_state Transaction state return by Fullservice API.
     * @see \HiPay\Fullservice\Enum\Transaction\TransactionState
     */
    protected $_state;

    /**
     * @var string $_message Transaction message
     */
    protected $_message;

    /**
     * @var float $_authorizedAmount The transaction amount.
     */
    protected $_authorizedAmount;

    /**
     * @var float $_capturedAmount The captured amount
     */
    protected $_capturedAmount;

    /**
     * @var float $_refundedAmount The refunded amount
     */
    protected $_refundedAmount;

    /**
     * @var int $_decimals Decimal precision of transaction amount.
     */
    protected $_decimals;

    /**
     * @var string $_currency Base currency for this transaction. This three-character currency code complies with ISO 4217.
     */
    protected $_currency;

    /**
     * @var Operation
     */
    protected $_operation;

    /**
     * @return string
     */
    public function getMid()
    {
        return $this->_mid;
    }

    /**
     * @return string
     */
    public function getAuthorizationCode()
    {
        return $this->_authorizationCode;
    }

    /**
     * @return string
     */
    public function getTransactionReference()
    {
        return $this->_transactionReference;
    }

    /**
     * @return string
     */
    public function getDateCreated()
    {
        return $this->_dateCreated;
    }

    /**
     * @return string
     */
    public function getDateUpdated()
    {
        return $this->_dateUpdated;
    }

    /**
     * @return string
     */
    public function getDateAuthorized()
    {
        return $this->_dateAuthorized;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->_message;
    }

    /**
     * @return float
     */
    public function getAuthorizedAmount()
    {
        return $this->_authorizedAmount;
    }

    /**
     * @return float
     */
    public function getCapturedAmount()
    {
        return $this->_capturedAmount;
    }

    /**
     * @return float
     */
    public function getRefundedAmount()
    {
        return $this->_refundedAmount;
    }

    /**
     * @return int
     */
    public function getDecimals()
    {
        return $this->_decimals;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->_currency;
    }
}
