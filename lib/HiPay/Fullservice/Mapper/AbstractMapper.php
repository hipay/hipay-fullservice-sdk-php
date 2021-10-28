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

namespace HiPay\Fullservice\Mapper;

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
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 */
abstract class AbstractMapper implements MapperInterface
{
    /**
     * @var AbstractModel $_modelObject Model object to populate
     */
    protected $_modelObject;

    /**
     * @var array<string, mixed> $_source Source to parse
     */
    protected $_source;

    /**
     * Construct a new mapper
     *
     * Assign $source to local protected property $_source
     * $_source is used in mapResponseToModel method
     *
     * @param array<string, mixed> $source
     * @throws LengthException Source must contains 1 element at least
     */
    public function __construct(array $source)
    {
        if (count($source) < 1) {
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
     * @return AbstractModel
     */
    public function getModelObjectMapped()
    {
        $this->validate();
        $this->mapResponseToModel();
        return $this->_modelObject;
    }

    /**
     * @return void
     */
    protected function uniformizeSourceKeys()
    {
        $this->_source = Convert::arrayKeysToCamelCase($this->_source);
    }

    /**
     * Return source to map
     * @see AbstractMapper:::_construct
     * @return array<string, mixed> Local source
     */
    protected function _getSource()
    {
        return $this->_source;
    }

    /**
     * Map array response to corresponding model
     *
     * In this method, you must create a conform model and populate it
     * with $_source array
     *
     * @throws \Exception
     * @return void
     */
    abstract protected function mapResponseToModel();

    /**
     * Validate source data
     * @throws \Exception
     * @return AbstractMapper
     */
    abstract protected function validate();

    /**
     * Model Class name to map
     * @return string Name of the class to return mapped
     */
    abstract protected function getModelClassName();
}
