<?php

namespace Hipay\Tests;

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
 * @copyright      Copyright (c) 2016 - Hipay
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
	
}