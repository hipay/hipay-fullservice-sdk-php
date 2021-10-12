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
abstract class AbstractModel implements ModelInterface
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
            if (preg_match("/^(?:get|is)(\w+)/", $method->name, $groups)) {
                //clean key name
                $key = $this->decamelize($groups[1]);

                //Call getter to get the value
                $val = $method->invoke($this);
                if (is_object($val) && is_a($val, AbstractModel::class)) {
                    $array[$key] = $val->toArray();
                } elseif ($val !== null) {
                    $array[$key] = $val;
                }
            }
        }

        return $array;
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

    public function __get($name)
    {
        return isset($this->{$name}) ? $this->{$name} : null;
    }

    /**
     * @param string $string string in camelCase
     * @return string string in snake_case
     */
    private function decamelize($string)
    {
        return strtolower(preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $string));
    }
}
