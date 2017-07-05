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

namespace HiPay\Tests\Fullservice\Mapper;

use HiPay\Tests\TestCase;

/**
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class AbstractMapperTest extends TestCase
{
    
    protected $_abstractName = 'HiPay\Fullservice\Mapper\AbstractMapper';
    
    /**
     * @cover HiPay\Fullservice\Mapper\AbstractMapper::__construct
     * @expectedException TypeError
     */
    public function testCannotBeConstructUsingInvalidArgument(){
        $mock = $this->getAbstractMock($this->_abstractName);
        
        $this->getClassConstructor($this->_abstractName)->invoke($mock,null);
    }
    
    /**
     * @cover HiPay\Fullservice\Mapper\AbstractMapper::__construct
     * @expectedException HiPay\Fullservice\Exception\LengthException
     */
    public function testCannotBeConstructWithEmptyArray(){
         $mock = $this->getAbstractMock($this->_abstractName);
        $this->getClassConstructor($this->_abstractName)->invoke($mock,array());
    }
    
    /**
     * @cover HiPay\Fullservice\Mapper\AbstractMapper::__construct 
     */
    public function testCanConstructUsingValidArgument(){
        $mock = $this->getAbstractMock($this->_abstractName);
        $this->getClassConstructor($this->_abstractName)->invoke($mock,array('foo'=>'bar','other_foo'=>array('barfoo'=>'foo')));
        
        $this->assertInstanceOf($this->_abstractName, $mock);
        
        return $mock;
    }
    
}