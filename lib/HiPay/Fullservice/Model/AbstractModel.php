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

namespace HiPay\Fullservice\Model;

/**
 * Model abstract class
 *
 * Created for furthers features.
 * Not used for the moment but extended
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 */
abstract class AbstractModel implements ModelInterface, \JsonSerializable
{

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Model\ModelInterface::toArray()
     */
    public function toArray()
    {

        $array = array();

        $classRef = new \ReflectionClass(get_class($this));
        foreach ($classRef->getMethods() as $method) {
            if (substr($method->name, 0, 3) == 'get') {
                //clean key name
                $key = lcfirst(substr($method->name, 3));

                //Call getter to get the value
                $val = $method->invoke($this);
                if (is_object($val) && is_a($val, AbstractModel::class)) {
                    $array[$key] = $val->toArray();
                } else {
                    $array[$key] = $val;
                }
            }
        }

        return $array;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\Model\ModelInterface::toJson()
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Deletes every null value recursively in $this
     * @return bool True if the resulting object still has non null values
     */
    public function cleanNullValues()
    {
        $properties = get_object_vars($this);

        foreach ($properties as $p => $v) {
            if ($v === null) {
                unset($this->$p);
            } elseif (is_object($v) && $v instanceof AbstractModel) {
                if (!$this->$p->cleanNullValues()) {
                    unset($this->$p);
                }
            }
        }

        return !(empty(get_object_vars($this)));
    }
}
