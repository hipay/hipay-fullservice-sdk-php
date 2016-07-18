<?php

namespace HiPay\Tests;

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
abstract class TestCase extends \PHPUnit_Framework_TestCase{

	/**
	 * {@inheritDoc}
	 * @see PHPUnit_Framework_TestCase::__construct()
	 */
	public function __construct($name=null, $data=array() ,$dataName=''){ 
	
		parent::__construct( $name, $data , $dataName);
	}
	
	/**
	 * Method factory for abstract class test
	 * 
	 * @param string $abstractName
	 * @param string $disableOriginalConstructor
	 * @return \Object Abstract class instance
	 */
	protected function getAbstractMock($abstractName,$disableOriginalConstructor = true){
	    
	    $mock = $this->getMockBuilder($abstractName);
	    if($disableOriginalConstructor){
	        $mock->disableOriginalConstructor();
	    }
	    return $mock->getMockForAbstractClass();
	    
	}
	
	/**
	 * Method factory for return a class constructor as ReflectionMethod Object
	 * 
	 * @param string $className
	 * @return \ReflectionMethod $constructor
	 */
	protected function getClassConstructor($className){
	       
	    $reflectedClass = new \ReflectionClass($className);
	    return  $reflectedClass->getConstructor();
	}
}