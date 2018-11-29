<?php
/**
 * HiPay Enterprise SDK Prestashop
 *
 * 2017 HiPay
 *
 * NOTICE OF LICENSE
 *
 * @author    HiPay <support.tpp@hipay.com>
 * @copyright 2018 HiPay
 * @license   https://github.com/hipay/hipay-enterprise-sdk-prestashop/blob/master/LICENSE.md
 */

namespace HiPay\Tests\Mock;

use HiPay\Fullservice\Model\AbstractModel;

/**
 *
 * @package HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2018 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class MockComplexModel extends AbstractModel
{

    public $intAttribute = 1;

    protected $stringAttribute = "test";

    protected $arrayAttribute = array("test", "test");

    protected $serializableObject;

    public function __construct()
    {
        $this->serializableObject = new MockSimpleModel(true);
    }

    /**
     * @return int
     */
    public function getIntAttribute()
    {
        return $this->intAttribute;
    }

    /**
     * @return string
     */
    public function getStringAttribute()
    {
        return $this->stringAttribute;
    }

    /**
     * @return array
     */
    public function getArrayAttribute()
    {
        return $this->arrayAttribute;
    }

    /**
     * @return MockSimpleModel
     */
    public function getSerializableObject()
    {
        return $this->serializableObject;
    }
}
