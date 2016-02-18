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
namespace Hipay\Fullservice\SecureVault\Request;

use Hipay\Fullservice\Request\AbstractRequest;

/**
 * Secure Vault Update Token request
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class UpdateTokenRequest extends AbstractRequest
{
	
	/**
	 * 
	 * @var int $card_expiry_month The card expiry month. Expressed with two digits (e.g., 01).
	 * @length 2
	 * @required
	 */
	public $card_expiry_month;
	
	/**
	 * 
	 * @var int $card_expiry_year The card expiry year. Expressed with four digits (e.g., 2014).
	 * @length 4
	 * @required
	 */
	public $card_expiry_year;
	
	/**
	 * 
	 * @var string $card_holder The cardholder name as it appears on the card (up to 25 chars).
	 * @length 25
	 */
	public $card_holder;
	
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