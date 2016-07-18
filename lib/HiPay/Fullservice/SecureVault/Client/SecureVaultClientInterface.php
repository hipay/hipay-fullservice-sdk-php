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
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
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
