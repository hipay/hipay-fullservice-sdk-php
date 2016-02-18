<?php
/*
 * HiPay fullservice SDK
*
* NOTICE OF LICENSE
*
* This source file is subject to the MIT License
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/mit-license.php
*
* @copyright      Copyright (c) 2016 - HiPay
* @license        http://opensource.org/licenses/mit-license.php MIT License
*
*/
namespace HiPay\Fullservice\SecureVault\Client;

use HiPay\Fullservice\HTTP\ClientProvider;
use HiPay\Fullservice\SecureVault\Request\GenerateTokenRequest;
use HiPay\Fullservice\SecureVault\Model\PaymentCardToken;
use HiPay\Fullservice\SecureVault\Request\UpdateTokenRequest;



/**
 * Client interface for vault request send to TPP Fullservice.
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
interface SecureVaultClientInterface {

	/**
	 * Request a new token
	 * @param GenerateTokenRequest $generateTokenRequest
	 * @return PaymentCardToken Informations about token generated
	 */
	public function requestGenerateToken(GenerateTokenRequest $generateTokenRequest);
	
	/**
	 * Request update token
	 * @param UpdateTokenRequest $updateTokenRequest
	 * @return PaymentCardToken Informations about token updated
	 */
	public function requestUpdateToken(UpdateTokenRequest $updateTokenRequest);
	
	/**
	 * Request lookup for a token
	 * @param string $token
	 * @param string $requestId 
	 * @return PaymentCardToken Informations about token updated
	 */
	public function requestLookupToken($token,$requestId);
	
	/**
	 * Return current HTTP client provider
	 * @return ClientProvider The current client provider
	 */
	public function getClientProvider();

}
