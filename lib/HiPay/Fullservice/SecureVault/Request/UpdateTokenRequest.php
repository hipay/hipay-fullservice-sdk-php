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
 * Secure Vault Update Token request
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class UpdateTokenRequest extends AbstractRequest
{
	
	/**
	 * 
	 * @var int $cardExpiryMonth The card expiry month. Expressed with two digits (e.g., 01).
	 * @length 2
	 * @required
	 */
	public $cardExpiryMonth;
	
	/**
	 * 
	 * @var int $cardExpiryYear The card expiry year. Expressed with four digits (e.g., 2014).
	 * @length 4
	 * @required
	 */
	public $cardExpiryYear;
	
	/**
	 * 
	 * @var string $cardHolder The cardholder name as it appears on the card (up to 25 chars).
	 * @length 25
	 */
	public $cardHolder;
	
	/**
	 * 
	 * @var string $token The token to be updated.
	 * @length 40
	 * @required
	 */
	public $token;
	
	/**
	 * @var string $requestId The request ID linked to the card token.
	 * @required
	 */
	public $requestId;
    

}