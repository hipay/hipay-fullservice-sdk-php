<?php
namespace Hipay\Tests\Fullservice\HTTP\Response;

use Hipay\Tests\TestCase;

/**
 * Test Abstract HTTP Response
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 */
class AbstractResponseTest extends TestCase
{
    
    protected $_abstractName = 'Hipay\Fullservice\HTTP\Response\AbstractResponse';
    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\AbstractResponse::__construct
     * @expectedException \Hipay\Fullservice\Exception\InvalidArgumentException
     */
    public function testCannotBeConstructFromNonStringValue(){
        
        $mock = $this->getAbstractMock($this->_abstractName);
        $this->getClassConstructor($this->_abstractName)->invoke($mock,null,500,array());
        
    }

    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\AbstractResponse::__construct
     * @expectedException \Hipay\Fullservice\Exception\InvalidArgumentException
     */
    public function testCannotBeConstructFromNonNumericValue(){
    
        $mock = $this->getAbstractMock($this->_abstractName);
        $this->getClassConstructor($this->_abstractName)->invoke($mock,'some string','status 500',array());
    
    }
    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\AbstractResponse::__construct
     * @expectedException PHPUnit_Framework_Error
     */
    public function testCannotBeConstructFromNonArrayValue(){
    
        $mock = $this->getAbstractMock($this->_abstractName);
        $this->getClassConstructor($this->_abstractName)->invoke($mock,'some string',500,'Content-Type: application/json');
    
    }
    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\AbstractResponse::__construct
     */
    public function testObjectBanBeConstructFromNumericStatusCodeArgument(){
        $mock = $this->getAbstractMock($this->_abstractName);
        $this->getClassConstructor($this->_abstractName)->invoke($mock,'some string','500',array());
    }
    
    /**
     * @covers \Hipay\Fullservice\HTTP\Response\AbstractResponse::__construct
     */
    public function testObjectBanBeConstructUsingValidArguments(){
        $mock = $this->getMockBuilder($this->_abstractName)->setConstructorArgs(array('body'=>'some string','statusCode'=>200,'headers'=>array()))->getMock();
        //$mock = $this->getAbstractMock($this->_abstractName);
        //$this->getClassConstructor($this->_abstractName)->invoke($mock,'some string',200,array());
            
        return $mock;
    }
 
    
}