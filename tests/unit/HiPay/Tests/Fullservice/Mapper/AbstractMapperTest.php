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

namespace HiPay\Tests\Fullservice\Mapper;

use HiPay\Tests\TestCase;

/**
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class AbstractMapperTest extends TestCase
{
    
    protected $_abstractName = 'HiPay\Fullservice\Mapper\AbstractMapper';
    
    /**
     * @cover HiPay\Fullservice\Mapper\AbstractMapper::__construct
     * @expectedException PHPUnit_Framework_Error
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