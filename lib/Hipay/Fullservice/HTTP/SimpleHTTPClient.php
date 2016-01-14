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
namespace Hipay\Fullservice\HTTP;

use Hipay\Fullservice\HTTP\ClientProvider;


/**
 *
 * @package     Hipay\Fullservice
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php 
 * @api
 */
class SimpleHTTPClient extends ClientProvider {

	/**
	 * {@inheritDoc}
	 * @see \Hipay\Fullservice\HTTP\ClientProvider::doRequest()
	 */
	protected function doRequest( $method, $endpoint,array $params=array() ){ 
		// TODO Auto-generated method stub 
	}

	/**
	 * {@inheritDoc}
	 * @see \Hipay\Fullservice\HTTP\ClientProvider::createHttpClient()
	 */
	protected 
	function createHttpClient() {
		// TODO Auto-generated method stub
	}


}