<?php
/**
 * Hipay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace Hipay\Fullservice\Client;

use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;

/**
 * Guzzle provider
 *
 * @category       Hipay
 * @package        Hipay_Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @api
 */
class GuzzleClient extends ClientProvider{

	/**
	 * 
	 * @var Client $_client
	 */
	private $_client; 
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\ClientProvider::doRequest()
	 */
	protected function doRequest($method, $uri, array $options = array()) {
		$this->_client = new Client();
		$response = $this->_client->request($method,$uri,$options);
		return $response;
	}
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Hipay\Fullservice\Client\ClientProvider::doSend()
	 */
	protected function doSend(RequestInterface $request, array $options = array()) {
		return null;
	}

	
	/**
	 * @return Client $_client
	 */
	public function getClient(){
		return $this->_client;
	}

	
}