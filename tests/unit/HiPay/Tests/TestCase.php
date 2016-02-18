<?php

namespace HiPay\Tests;

/**
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