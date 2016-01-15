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
    
        $this->markTestSkipped(
            'Gateway client is not implement yet!'
            );
    
    }
    
    public function testRequestOrder(){
        
    }

	
}