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

namespace Hipay\Tests\Fullservice\Mapper;

use Hipay\Tests\TestCase;

/**
 *
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class AbstractMapperTest extends TestCase
{
    
    protected $_abstractName = 'Hipay\Fullservice\Mapper\AbstractMapper';
    
    /**
     * @cover Hipay\Fullservice\Mapper\AbstractMapper::__construct
     * @expectedException PHPUnit_Framework_Error
     */
    public function testCannotBeConstructUsingInvalidArgument(){
        $mock = $this->getAbstractMock($this->_abstractName);
        
        $this->getClassConstructor($this->_abstractName)->invoke($mock,null);
    }
    
    /**
     * @cover Hipay\Fullservice\Mapper\AbstractMapper::__construct
     * @expectedException Hipay\Fullservice\Exception\LengthException
     */
    public function testCannotBeConstructWithEmptyArray(){
         $mock = $this->getAbstractMock($this->_abstractName);
        $this->getClassConstructor($this->_abstractName)->invoke($mock,array());
    }
    
    /**
     * @cover Hipay\Fullservice\Mapper\AbstractMapper::__construct 
     */
    public function testCanConstructUsingValidArgument(){
        $mock = $this->getAbstractMock($this->_abstractName);
        $this->getClassConstructor($this->_abstractName)->invoke($mock,array('foo'=>'bar','other_foo'=>array('barfoo'=>'foo')));
        
        $this->assertInstanceOf($this->_abstractName, $mock);
        
        return $mock;
    }
    
}