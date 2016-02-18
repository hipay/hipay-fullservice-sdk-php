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
namespace HiPay\Fullservice\Request;

/**
 * Serialize Request object
 * 
 * This class is used to serialize request objects
 * It can return request oject to array or Json format
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class RequestSerializer
{
    /**
     * @var AbstractRequest $_request Request object
     */
    private $_request;
    
    /**
     * Construct a new Serializer
     * 
     * @param AbstractRequest $request
     */
    public function __construct(AbstractRequest $request){
        $this->_request = $request;
    }
    
    /**
     * Returns data string as Json
     * 
     * @param bool $pretty If true, display with pretty format (const: JSON_PRETTY_PRINT)
     * @return string Return result of json_encode function
     */
    public function toJson($pretty=false){
        return json_encode($this->toArray(),$pretty ? JSON_PRETTY_PRINT : 0);
    }
    
    
    /**
	 * Returns data array with only scalar values
	 * @return array Hashed array with key/valur pairs (property/value)
	 */
    public function toArray() {
        $params = array();
        
        //prepare an array of scalar properties
        $this->prepareParams($this->_request,$params);
        return $params;
    }
    
    /**
     * Populate $_params array with data to send
     * 
     * If one of properties is type of AbstractRequest
     * This method will be called recursively
     * 
     * @param AbstractRequest $object Object source
     * @param array $params Passed by reference
     * 
     * @todo Make only one depth
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
                
                $this->prepareParams($v,$params);
            }
            if(is_scalar($v)){
                $params[$p] = $v;
            }
        }
    
    }
}