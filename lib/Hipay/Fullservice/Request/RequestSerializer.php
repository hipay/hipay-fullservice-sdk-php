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
namespace Hipay\Fullservice\Request;

/**
 *
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class RequestSerializer
{
    /**
     * 
     * @var AbstractRequest
     */
    private $_request;
    
    /**
     * 
     * @param AbstractRequest $request
     */
    public function __construct(AbstractRequest $request){
        $this->_request = $request;
    }
    
    /**
     * Returns data string as Json
     * @return string
     */
    public function toJson($pretty=false){
        return json_encode($this->toArray(),$pretty ? JSON_PRETTY_PRINT : 0);
    }
    
    
    /**
	 * Returns data array 
	 * @return array
	 */
    public function toArray() {
        $params = array();
        //prepare an array of scalar properties
        $this->prepareParams($this->_request,$params);
        return $params;
    }
    
    /**
     * Populate $_params array with data to send
     * If one of properties is type of AbstractRequest
     * This method is called recursively
     * @param AbstractRequest $object Object source
     * @param array $params
     * @return array $this->_params
     */
    protected function prepareParams($object,&$params) {
        //Get all readble object properties
        $properties = get_object_vars($object);
    
        /**
         * For each property, if it is instance of AbstractRequest, recursive function called
         * Else if value of property is scalar we assign it
         */
        foreach ($properties as $p=>$v){
            if(is_object($v) && $v instanceof AbstractRequest){
                $params[$p] = array();
                $this->prepareParams($v,$params[$p]);
            }
            if(is_scalar($v)){
                $params[$p] = $v;
            }
        }
    
    }
}