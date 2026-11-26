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
 * @copyright      Copyright (c) 2026 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */

namespace Unit\HiPay\Tests\Helper;

use HiPay\Fullservice\Enum\Helper\HashAlgorithm;
use HiPay\Fullservice\Helper\Signature;
use HiPay\TestCase\TestCase;

/**
 * Signature with a controllable raw body: php://input cannot be written from the CLI.
 */
class RawBodySignature extends Signature
{
    /** @var string */
    public static $rawBody = '';

    protected static function getRawPostData()
    {
        return static::$rawBody;
    }
}

/**
 * PI-6670: a query-string hash must never stand in for the notification signature.
 *
 * @package HiPay\Fullservice
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 */
class SignatureNotificationBypassTest extends TestCase
{
    const PASSPHRASE = 'merchantSecret';

    /** @var array<string, mixed> */
    private $savedGet;

    /** @var array<string, mixed> */
    private $savedServer;

    public function set_up()
    {
        parent::set_up();
        $this->savedGet = $_GET;
        $this->savedServer = $_SERVER;
        $_GET = array();
        unset($_SERVER['HTTP_X_ALLOPASS_SIGNATURE'], $_SERVER['REQUEST_METHOD']);
        RawBodySignature::$rawBody = '';
    }

    public function tear_down()
    {
        $_GET = $this->savedGet;
        $_SERVER = $this->savedServer;
        RawBodySignature::$rawBody = '';
        parent::tear_down();
    }

    /**
     * @return array<string, array{0: string, 1: string}>
     */
    public function algorithmProvider()
    {
        return array(
            'SHA1' => array(HashAlgorithm::SHA1, 'sha1'),
            'SHA256' => array(HashAlgorithm::SHA256, 'sha256'),
            'SHA512' => array(HashAlgorithm::SHA512, 'sha512'),
        );
    }

    /**
     * @param string $method
     * @param string $body
     * @param array<string, mixed> $get
     * @param string|null $header
     */
    private function givenRequest($method, $body, array $get, $header = null)
    {
        $_SERVER['REQUEST_METHOD'] = $method;
        RawBodySignature::$rawBody = $body;
        $_GET = $get;
        if (null !== $header) {
            $_SERVER['HTTP_X_ALLOPASS_SIGNATURE'] = $header;
        }
    }

    /**
     * Query string of a redirect really signed by HiPay (e.g. the attacker's own declined payment).
     *
     * @param string $phpAlgo
     *
     * @return array<string, string>
     */
    private function signedRedirectQuery($phpAlgo)
    {
        $params = array('orderid' => '42', 'status' => '113');

        return $params + array(
            'hash' => hash($phpAlgo, 'orderid42'.self::PASSPHRASE.'status113'.self::PASSPHRASE),
        );
    }

    /**
     * @dataProvider algorithmProvider
     */
    public function testLegitimateRedirectIsValid($algorithm, $phpAlgo)
    {
        $this->givenRequest('GET', '', $this->signedRedirectQuery($phpAlgo));

        $this->assertTrue(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, $algorithm));
    }

    /**
     * @dataProvider algorithmProvider
     */
    public function testLegitimateNotificationIsValid($algorithm, $phpAlgo)
    {
        $body = 'state=completed&status=118&order%5Bid%5D=42';
        $this->givenRequest('POST', $body, array(), hash($phpAlgo, $body.self::PASSPHRASE));

        $this->assertTrue(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, $algorithm));
    }

    /**
     * @dataProvider algorithmProvider
     */
    public function testLegitimateNotificationWithBogusQueryHashIsValid($algorithm, $phpAlgo)
    {
        $body = 'state=completed&status=118';
        $this->givenRequest('POST', $body, array('hash' => 'bogus'), hash($phpAlgo, $body.self::PASSPHRASE));

        $this->assertTrue(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, $algorithm));
    }

    /**
     * @dataProvider algorithmProvider
     */
    public function testEmptyCanonicalHashWithForgedFormBodyIsRejected($algorithm, $phpAlgo)
    {
        $this->givenRequest('POST', 'state=completed&status=118', array('hash' => hash($phpAlgo, '')));

        $this->assertFalse(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, $algorithm));
    }

    /**
     * @dataProvider algorithmProvider
     */
    public function testEmptyCanonicalHashWithGetOnlyIsRejected($algorithm, $phpAlgo)
    {
        $this->givenRequest('GET', '', array('hash' => hash($phpAlgo, '')));

        $this->assertFalse(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, $algorithm));
    }

    /**
     * @dataProvider algorithmProvider
     */
    public function testEmptyRoutingParametersAreRejected($algorithm, $phpAlgo)
    {
        $this->givenRequest('GET', '', array('orderid' => '', 'status' => '', 'hash' => hash($phpAlgo, '')));

        $this->assertFalse(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, $algorithm));
    }

    /**
     * @return array<string, array{0: string, 1: string}>
     */
    public function replayProvider()
    {
        return array(
            'POST urlencoded' => array('POST', 'state=completed&status=118'),
            'POST multipart' => array('POST', "--b\r\nContent-Disposition: form-data; name=\"status\"\r\n\r\n118\r\n--b--"),
            'PUT' => array('PUT', 'state=completed&status=118'),
            'GET with a body' => array('GET', 'state=completed&status=118'),
            'POST with an empty body' => array('POST', ''),
        );
    }

    /**
     * @dataProvider replayProvider
     */
    public function testReplayedRedirectQueryOnNotificationIsRejected($method, $body)
    {
        $this->givenRequest($method, $body, $this->signedRedirectQuery('sha1'));

        $this->assertFalse(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, HashAlgorithm::SHA1));
    }

    public function testArrayHashParameterIsRejected()
    {
        $this->givenRequest('GET', '', array('hash' => array(sha1('')), 'orderid' => '42'));

        $this->assertFalse(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, HashAlgorithm::SHA1));
    }

    public function testNestedArrayParameterIsRejectedWithoutError()
    {
        $this->givenRequest('GET', '', array('hash' => sha1(''), 'a' => array('b')));

        $this->assertFalse(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, HashAlgorithm::SHA1));
    }

    /**
     * @dataProvider algorithmProvider
     */
    public function testEmptyBodySignedWithEmptyDigestIsRejected($algorithm, $phpAlgo)
    {
        $this->givenRequest('POST', '', array(), hash($phpAlgo, ''));

        $this->assertFalse(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, $algorithm));
    }

    public function testEmptyBodySignedWithPassphraseIsRejected()
    {
        $this->givenRequest('POST', '', array(), sha1(self::PASSPHRASE));

        $this->assertFalse(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, HashAlgorithm::SHA1));
    }

    public function testEmptyPassphraseIsRejected()
    {
        $body = 'state=completed';
        $this->givenRequest('POST', $body, array(), sha1($body));

        $this->assertFalse(RawBodySignature::isValidHttpSignature('', HashAlgorithm::SHA1));
    }

    public function testMissingSignatureIsRejectedWithoutNotice()
    {
        $this->givenRequest('POST', 'state=completed', array());

        $this->assertFalse(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, HashAlgorithm::SHA1));
    }

    public function testExplicitArrayPayloadUsesCanonicalForm()
    {
        $payload = array('orderid' => '42', 'status' => '113');
        $signature = sha1('orderid42'.self::PASSPHRASE.'status113'.self::PASSPHRASE);

        $this->assertTrue(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, HashAlgorithm::SHA1, $signature, $payload));
        $this->assertFalse(RawBodySignature::isValidHttpSignature(self::PASSPHRASE, HashAlgorithm::SHA1, sha1(''), $payload));
    }

    public function testExplicitArrayPayloadWithNonScalarValueIsRejected()
    {
        $this->assertFalse(
            RawBodySignature::isValidHttpSignature(self::PASSPHRASE, HashAlgorithm::SHA1, sha1(''), array('a' => array('b')))
        );
    }

    public function testExplicitNonStringSignatureIsRejected()
    {
        $this->assertFalse(
            RawBodySignature::isValidHttpSignature(self::PASSPHRASE, HashAlgorithm::SHA1, array(sha1('x')), 'x')
        );
    }

    public function testIsSameHashAlgorithmReadsNotificationHeaderDespiteQueryHash()
    {
        $body = 'state=completed';
        $this->givenRequest('POST', $body, array('hash' => sha1('')), hash('sha256', $body.self::PASSPHRASE));

        $this->assertTrue(RawBodySignature::isSameHashAlgorithm(self::PASSPHRASE, HashAlgorithm::SHA256));
        $this->assertFalse(RawBodySignature::isSameHashAlgorithm(self::PASSPHRASE, HashAlgorithm::SHA1));
    }

    public function testIsSameHashAlgorithmWithoutSignatureIsFalse()
    {
        $this->givenRequest('POST', 'state=completed', array('hash' => sha1('')));

        $this->assertFalse(RawBodySignature::isSameHashAlgorithm(self::PASSPHRASE, HashAlgorithm::SHA1));
    }
}
