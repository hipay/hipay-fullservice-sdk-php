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
namespace Hipay\Tests\Fullservice\Client;

use Hipay\Tests\TestCase;
use Hipay\Fullservice\Client\GuzzleClient;
use Hipay\Fullservice\Model\ModelInterface;

/**
 * @author kassim
 *
 */
class GuzzleClientTest extends TestCase{

		public function testResponse(){
			
			$guzzleClient = new GuzzleClient();
			
			$response = $guzzleClient->request('GET', 'http://www.google.com',array());
			
			$this->assertEquals(true, $response instanceof ModelInterface );
			
		}
		
}