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
namespace Hipay\Fullservice\Mapper;

use Hipay\Fullservice\Mapper\MapperInterface;
use Hipay\Fullservice\Model\AbstractModel;
use Hipay\Fullservice\Exception\LengthException;

/**
 * Abstract Mapper
 * Map Response object
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
abstract class AbstractMapper implements MapperInterface{
	
    /**
     * 
     * @var AbstractModel $_modelObject
     */
    protected $_modelObject;
    
    /**
     * 
     * @var array
     */
    protected $_source;
    
    /**
     * 
     * @param array $source
     */
    public function __construct(array $source){
        
        if(count($source) < 1){
            throw new LengthException("Mapper source must contains 1 element at least.");
        }
        
        $this->_source = $source;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Hipay\Fullservice\Mapper\MapperInterface::getModelObject()
     */
    public function getModelObject()
    {
        $this->mapResponseToModel();
        return $this->_modelObject;
    }
    
    /**
     * Map array response to corresponding model 
     */
    abstract protected function mapResponseToModel();
    
    /**
     * Validate source data
     * @throws \Exception
     */
    abstract protected function validate();

	
	
}