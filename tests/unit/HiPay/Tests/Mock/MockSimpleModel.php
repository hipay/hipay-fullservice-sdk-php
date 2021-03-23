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
class MockSimpleModel extends AbstractModel
{

    public $intAttribute = 1;

    private $stringAttribute = "";

    protected $arrayAttribute = array("test", "test");

    protected $objectAttribute;

    public function __construct($recursive = false)
    {
        if ($recursive) {
            $this->objectAttribute = new MockSimpleModel();
        } else {
            $this->objectAttribute = (object)[];
        }
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
    public function getObjectAttribute()
    {
        return $this->objectAttribute;
    }
}
