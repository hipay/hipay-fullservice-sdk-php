<?php
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

namespace HiPay\Fullservice\Request;

use HiPay\Fullservice\Model\AbstractModel;

/**
 * Serialize Request object
 *
 * This class is used to serialize request objects
 * It can return request object to array or Json format
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
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
    public function __construct(AbstractRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Returns data string as Json
     *
     * @param bool $pretty If true, display with pretty format (const: JSON_PRETTY_PRINT)
     * @return string Return result of json_encode function
     */
    public function toJson($pretty = false)
    {
        return json_encode($this->toArray(), $pretty ? JSON_PRETTY_PRINT : 0);
    }

    /**
     * Returns data array with only scalar values
     * @return array Hashed array with key/value pairs (property/value)
     */
    public function toArray()
    {
        $params = array();

        //prepare an array of scalar properties
        $this->prepareParams($this->_request, $params);
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
     */
    protected function prepareParams($object, &$params)
    {
        //Get all readable object properties
        $properties = get_object_vars($object);

        /**
         * For each property, if it is instance of AbstractRequest, recursive function called
         * Else if value of property is scalar we assign it
         */
        foreach ($properties as $p => $v) {

            if (is_scalar($v)) {
                $params[$p] = $v;
            } elseif (is_array($v)) {
                $params[$p] = json_encode($v);
            } elseif (is_object($v) && $v instanceof AbstractModel) {
                $params[$p] = $v->toJson();
            } elseif (is_object($v) && $v instanceof AbstractRequest) {
                $this->prepareParams($v, $params);
            }
        }
    }
}
