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

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
/**
 * Client interface for construct and send request.
 *
 * @category       Hipay
 * @package        Hipay_Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @api
 */
interface Client{

	
	/**
	 * Send an HTTP request.
	 *
	 * @param RequestInterface $request Request to send
	 * @param array            $options Request options to apply to the given
	 *                                  request and to the transfer.
	 *
	 * @return ResponseInterface
	 * @throws Exception
	 */
	public function send(RequestInterface $request, array $options = []);

    /**
     * Create and send an HTTP request.
     *
     * Use an absolute path to override the base path of the client, or a
     * relative path to append to the base path of the client. The URL can
     * contain the query string as well.
     *
     * @param string              $method  HTTP method
     * @param string|UriInterface $uri     URI object or string.
     * @param array               $options Request options to apply.
     *
     * @return ResponseInterface
     * @throws Exception
     */
    public function request($method, $uri, array $options = []);

}