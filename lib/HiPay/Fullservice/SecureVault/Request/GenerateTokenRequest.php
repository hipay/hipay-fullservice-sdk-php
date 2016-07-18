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
namespace HiPay\Fullservice\SecureVault\Request;

use HiPay\Fullservice\Request\AbstractRequest;

/**
 * Secure Vault Generate New Token request
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class GenerateTokenRequest extends AbstractRequest
{
	/**
	 * 
	 * @var int $cardNumber The card number. The length is from 12 to 19 digits.
	 * @length 19
	 * @required
	 */
	public $card_number;
	
	/**
	 * 
	 * @var int $cardExpiryMonth The card expiry month. Expressed with two digits (e.g., 01).
	 * @length 2
	 * @required
	 */
	public $card_expiry_month;
	
	/**
	 * 
	 * @var int $cardExpiryYear The card expiry year. Expressed with four digits (e.g., 2014).
	 * @length 4
	 * @required
	 */
	public $card_expiry_year;
	
	/**
	 * 
	 * @var string $cardHolder The cardholder name as it appears on the card (up to 25 chars).
	 * @length 25
	 */
	public $card_holder;
	
	/**
	 * 
	 * @var int $cvc The 3- or 4- digit security code (called CVC2, CVV2 or CID depending on the card brand) that appears on the credit card.
	 * @length 4
	 */
	public $cvc;
	
	/**
	 * Indicates if the token should be generated either for a single-use or a multi-use.
	 * Possible values:
     * - 1 = Generate a multi-use token
     * - 0 = Generate a single-use token
	 * @var int $multiUse single-use or a multi-use.
	 * @length 1
	 */
	public $multi_use;
    

}