<?php
/*
 * Hipay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - Hipay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace Hipay\Fullservice\Gateway\Model;


use Hipay\Fullservice\Model\AbstractModel;

/**
 * Abstract Model Transaction response.
 * Order and Transaction commons methods
 *
 * @category    Hipay
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
abstract class AbstractTransaction extends AbstractModel{

    
    /**
     * @var string
     * @desc Your merchant account number
     */
    public $mid;
    
    /**
     * @var string
     * @desc An authorization code (up to 35 characters) generated for each approved or pending 
     * transaction by the acquiring provider.
     */
    public $authorizationCode;
    
    /**
     * @var string
     * @desc The unique identifier of the transaction
     */
    public $transactionReference;
    
    /**
     * @var string
     * @type date
     * @format yyyy-mm-ddTH:i:sZ
     * @desc Time when transaction was created
     * @example 2016-01-12T17:36:23+0000
     */
    public $dateCreated;
    
    /**
     * @var string
     * @type date
     * @format yyyy-mm-ddTH:i:sZ
     * @desc Time when transaction was last updated.
     * @example 2016-01-12T17:36:23+0000
     */
    public $dateUpdated;
    
    /**
     * @var string
     * @type date
     * @format yyyy-mm-ddTH:i:sZ
     * @desc Time when transaction was authorized
     * @example 2016-01-12T17:36:23+0000
     */
    public $dateAuthorized;
    
    /**
     * 
     * @var string
     * @desc Transaction status.
     */
    public $status;
    
    /**
     * @var string
     * @desc Transaction message
     */
    public $message;
    
    /**
     * @var float 
     * @desc The transaction amount.
     */
    public $authorizedAmount;
    
    /**
     * @var flaot
     * @desc The captured amount
     */
    public $capturedAmount;
    
    /**
     * 
     * @var float
     * @desc The refunded amount
     */
    public $refundedAmount;
    
    /**
     * @var string
     * @desc Decimal precision of transaction amount.
     */
    public $decimals;
    
    /**
     * @var string
     * @type currency
     * @desc Base currency for this transaction.
     * This three-character currency code complies with ISO 4217.
     */
    public $currency;
    
}