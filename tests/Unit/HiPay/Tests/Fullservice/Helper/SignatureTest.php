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

namespace Unit\HiPay\Tests\Helper;

use HiPay\Fullservice\Enum\Helper\HashAlgorithm;
use HiPay\Fullservice\Helper\Signature;
use HiPay\TestCase\TestCase;

/**
 *
 * @package HiPay\Fullservice
 * @author      HiPay <support.tpp@hipay.com>
 * @copyright   Copyright (c) 2019 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class SignatureTest extends TestCase
{
    private $_signature = "testSignature";

    private $_hashedSignatureSHA1 = "9cf701f5d7519f1aeabe69a2857ee85fefbf31a3";
    private $_hashedSignatureSHA256 = "9664430560899c4a1eeff059f4244265d783bdba077c525943ec1438db04b8bc";
    private $_hashedSignatureSHA512 = "dca1c8cd59e00362d6c1516596e5cc514778f7d88a2fcbedf4feae035333dddc3e86175d7df65616857571d3ce75b994fe3abc43048bfca248cdb198c521e7a0";

    public function setUp(): void
    {
        $_GET['signature'] = $this->_signature;
    }

    public function testIsValidHttpSignatureSHA1Valid()
    {
        $_GET['hash'] = $this->_hashedSignatureSHA1;

        $isValid = Signature::isValidHttpSignature($this->_signature, HashAlgorithm::SHA1);
        $this->assertTrue($isValid);
    }

    public function testIsValidHttpSignatureSHA1NotValid()
    {
        $_GET['hash'] = $this->_hashedSignatureSHA1;

        $isValid = Signature::isValidHttpSignature("1234",HashAlgorithm::SHA1);
        $this->assertFalse($isValid);
    }

    public function testIsValidHttpSignatureSHA256Valid()
    {
        $_GET['hash'] = $this->_hashedSignatureSHA256;

        $isValid = Signature::isValidHttpSignature($this->_signature, HashAlgorithm::SHA256);
        $this->assertTrue($isValid);
    }

    public function testIsValidHttpSignatureSHA256NotValid()
    {
        $_GET['hash'] = $this->_hashedSignatureSHA256;

        $isValid = Signature::isValidHttpSignature("1234",HashAlgorithm::SHA256);
        $this->assertFalse($isValid);
    }

    public function testIsValidHttpSignatureSHA512Valid()
    {
        $_GET['hash'] = $this->_hashedSignatureSHA512;

        $isValid = Signature::isValidHttpSignature($this->_signature, HashAlgorithm::SHA512);
        $this->assertTrue($isValid);
    }

    public function testIsValidHttpSignatureSHA512NotValid()
    {
        $_GET['hash'] = $this->_hashedSignatureSHA512;

        $isValid = Signature::isValidHttpSignature("1234",HashAlgorithm::SHA512);
        $this->assertFalse($isValid);
    }

    public function testIsSameHashAlgorithmSHA1()
    {
        $_GET['hash'] = $this->_hashedSignatureSHA1;

        $isValid = Signature::isSameHashAlgorithm($this->_signature,HashAlgorithm::SHA1);
        $this->assertTrue($isValid);
    }

    public function testIsNotSameHashAlgorithmSHA1()
    {
        $_GET['hash'] = $this->_hashedSignatureSHA256;

        $isValid = Signature::isSameHashAlgorithm($this->_signature,HashAlgorithm::SHA1);
        $this->assertFalse($isValid);
    }

    public function testIsSameHashAlgorithmSHA256()
    {
        $_GET['hash'] = $this->_hashedSignatureSHA256;

        $isValid = Signature::isValidHttpSignature($this->_signature,HashAlgorithm::SHA256);
        $this->assertTrue($isValid);
    }

    public function testIsNotSameHashAlgorithmSHA256()
    {
        $_GET['hash'] = $this->_hashedSignatureSHA512;

        $isValid = Signature::isValidHttpSignature($this->_signature,HashAlgorithm::SHA256);
        $this->assertFalse($isValid);
    }

    public function testIsSameHashAlgorithmSHA512()
    {
        $_GET['hash'] = $this->_hashedSignatureSHA512;

        $isValid = Signature::isValidHttpSignature($this->_signature,HashAlgorithm::SHA512);
        $this->assertTrue($isValid);
    }

    public function testIsNotSameHashAlgorithmSHA512()
    {
        $_GET['hash'] = $this->_hashedSignatureSHA256;

        $isValid = Signature::isValidHttpSignature($this->_signature,HashAlgorithm::SHA512);
        $this->assertFalse($isValid);
    }
}
