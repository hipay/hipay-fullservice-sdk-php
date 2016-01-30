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
namespace Hipay\Tests\Fullservice\Gateway\Client;

use Hipay\Tests\TestCase;
use Hipay\Fullservice\HTTP\Configuration\Configuration;
use Hipay\Fullservice\HTTP\GuzzleClient;
use Hipay\Fullservice\Gateway\Client\GatewayClient;
use Hipay\Fullservice\Gateway\Client\GatewayClientInterface;
use Hipay\Fullservice\Gateway\Request\Order\HostedPaymentPageRequest;
use Hipay\Fullservice\Gateway\Model\HostedPaymentPage;

/**
 * Client Test class for all request send to TPP Fullservice.
 *
 * @category    Hipay
 * @package     Hipay\Tests
 * @author 		Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - Hipay
 * @license     http://opensource.org/licenses/mit-license.php MIT License
 * @link 		https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class GatewayClientTest extends TestCase{
    
    protected function setUp()
    {
    
        /*$this->markTestSkipped(
            'Gateway client is not implement yet!'
            );*/
    
    }
    
    /**
	 * @cover Hipay\Fullservice\Gateway\Client\GatewayClient::__construct
	 * @uses  Hipay\Fullservice\HTTP\Configuration
	 * @uses Hipay\Fullservice\HTTP\GuzzleClient
	 */
    public function testCanBeConstructUsingClientProvider(){
    	$conf = new Configuration("username", "123456");
    	$client = new GuzzleClient($conf);
    	$gateway = new GatewayClient($client);
    	
    	$this->assertInstanceOf(GatewayClient::class, $gateway);
    	
    	return $gateway;
    }
    
    /**
     * @cover Hipay\Fullservice\Gateway\Client\GatewayClient::requestrequestHostedPaymentPage
     * @uses HostedPaymentPageRequest
     * @depends testCanBeConstructUsingClientProvider
     * @expectedException \Hipay\Fullservice\Exception\RuntimeException Incorrect Credentials : API User Not Found
     * expectedExceptionMessage Client error: `POST https://stage-secure-gateway.hipay-tpp.com/rest/v1/rest/v1/hpayment` resulted in a `401 Authorization Required` response:{"code":"1000001","message":"Incorrect Credentials : API User Not Found","description":""}
     * @skip
     */
    public function testCallRequestHostedPaymentPage(GatewayClientInterface $gateway){
    	
    	$hpp = new HostedPaymentPageRequest();
    	$hpp->amount = 30.00;
    	
    	$this->markTestIncomplete(
    			'This test has not been implemented yet.'
    			);
    	
    	
    	$gateway->requestHostedPaymentPage($hpp);
    	
    }

	
}