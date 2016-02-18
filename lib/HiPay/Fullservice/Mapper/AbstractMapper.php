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
namespace HiPay\Fullservice\Mapper;

use HiPay\Fullservice\Mapper\MapperInterface;
use HiPay\Fullservice\Model\AbstractModel;
use HiPay\Fullservice\Exception\LengthException;
use HiPay\Fullservice\Helper\Convert;

/**
 * Abstract Mapper class
 * Map Response Model object
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 */
abstract class AbstractMapper implements MapperInterface{
	
    /**
     * @var AbstractModel $_modelObject Model object to populate
     */
    protected $_modelObject;
    
    /**
     * @var array $_source Source to parse
     */
    protected $_source;
    
    
    /**
     * Construct a new mapper
     * 
     * Assign $source to local protected property $_source
     * $_source is used in mapResponseToModel method
     * 
     * @param array $source
     * @throws LengthException Source must contains 1 element at least
     */
    public function __construct(array $source){
        
        if(count($source) < 1){
            throw new LengthException("Mapper source must contains 1 element at least.");
        }
        
        $this->_source = $source;
        $this->uniformizeSourceKeys();
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Mapper\MapperInterface::getModelObjectMapped()
     */
    public function getModelObjectMapped()
    {
    	$this->validate();
        $this->mapResponseToModel();
        return $this->_modelObject;
    }
    
    protected function uniformizeSourceKeys(){
    	
    	$this->_source = Convert::arrayKeysToCamelCase($this->_source);
    }
    
    /**
     * Return source to map
     * @see AbstractMapper:::_construct
     * @return array Local source
     */
    protected  function _getSource(){
        return $this->_source;
    }
    
    /**
     * Map array response to corresponding model 
     * 
     * In this method, you must create a conform model and populate it
     * with $_source array
     * 
     * @throws \Exception
     */
    abstract protected function mapResponseToModel();
    
    /**
     * Validate source data
     * @throws \Exception
     */
    abstract protected function validate();
    
    /**
     * Model Class name to map
     * @return string Name of the class to return mapped
     */
    abstract protected function getModelClassName();

	
	
}