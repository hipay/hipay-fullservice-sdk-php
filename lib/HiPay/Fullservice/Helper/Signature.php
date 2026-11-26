<?php

/**
 * HiPay Fullservice SDK PHP.
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
 */

namespace HiPay\Fullservice\Helper;

use HiPay\Fullservice\Enum\Helper\HashAlgorithm;

/**
 * Class Signature validator.
 *
 * For the URL notification, the signature is sent on the HTTP header under the “HTTP_X_ALLOPASS_SIGNATURE” parameter
 * To check this point, we concatenate the passphrase with the POST content of the query.
 *
 * For each redirection page (accept page, decline page, etc.) the signature is sent under the “hash” parameter
 * To check this point, you must concatenate the parameters, the values of each and the passphrase under the following conditions:
 * a) The parameter must be predefined.
 * b) The value can’t be empty.
 * c) The parameter must be sorted in alphabetical order.
 *
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 *
 * @see        https://github.com/hipay/hipay-fullservice-sdk-php
 *
 * @api
 */
class Signature
{
    /**
     * @param string                           $secretPassphrase
     * @param string                           $hashAlgorithm
     * @param string|null                      $signature
     * @param string|array<string, mixed>|null $payload
     *
     * @return bool
     */
    public static function isValidHttpSignature($secretPassphrase, $hashAlgorithm = HashAlgorithm::SHA1, $signature = null, $payload = null)
    {
        list($signature, $payload) = static::resolveSignatureAndPayload($signature, $payload);

        if (!is_string($signature) || '' === $signature) {
            return false;
        }

        $computedSignature = static::getComputedSignature($secretPassphrase, $hashAlgorithm, $payload);

        return false !== $computedSignature && hash_equals($computedSignature, $signature);
    }

    /**
     * Detects is same hash algorithm is used for signature.
     *
     * @param string                           $secretPassphrase
     * @param string                           $hashAlgorithm
     * @param string|null                      $signature
     * @param string|array<string, mixed>|null $payload
     *
     * @return bool
     */
    public static function isSameHashAlgorithm($secretPassphrase, $hashAlgorithm, $signature = null, $payload = null)
    {
        list($signature) = static::resolveSignatureAndPayload($signature, $payload);

        if (!is_string($signature) || '' === $signature) {
            return false;
        }

        // Only the digest length matters here: it depends on the algorithm, not on what is hashed.
        return strlen(static::digest($hashAlgorithm, '')) === strlen($signature);
    }

    /**
     * Compute signature according to hash and passphrase.
     *
     * @param string                           $secretPassphrase
     * @param string                           $hashAlgorithm
     * @param string|array<string, mixed>|null $payload
     *
     * @return string|false false when the payload or the passphrase cannot produce a trustworthy signature
     */
    protected static function getComputedSignature($secretPassphrase, $hashAlgorithm, $payload)
    {
        $stringToCompute = static::getStringToCompute($secretPassphrase, $payload);

        if (null === $stringToCompute) {
            return false;
        }

        return static::digest($hashAlgorithm, $stringToCompute);
    }

    /**
     * @param string $hashAlgorithm
     * @param string $string
     *
     * @return string
     */
    protected static function digest($hashAlgorithm, $string)
    {
        switch ($hashAlgorithm) {
            case HashAlgorithm::SHA256:
                return (string) hash(HashAlgorithm::SHA256, $string);
            case HashAlgorithm::SHA512:
                return (string) hash(HashAlgorithm::SHA512, $string);
            default:
                return sha1($string);
        }
    }

    /**
     * Fills the missing signature and payload from the current request.
     *
     * The request type is resolved once, so the signature and the payload always come from the same channel:
     * a query-string hash can never stand in for the notification header.
     *
     * @param mixed $signature
     * @param mixed $payload
     *
     * @return array{0: mixed, 1: mixed}
     */
    protected static function resolveSignatureAndPayload($signature, $payload)
    {
        if (null !== $signature && null !== $payload) {
            return array($signature, $payload);
        }

        $isRedirection = static::isRedirection();

        if (null === $signature) {
            $signature = $isRedirection ? $_GET['hash'] : static::getNotificationSignature();
        }

        if (null === $payload) {
            $payload = $isRedirection ? static::getParameters() : static::getRawPostData();
        }

        return array($signature, $payload);
    }

    /**
     * Load signature from globals var.
     *
     * @return mixed
     */
    protected static function getSignatureFromGlobals()
    {
        list($signature) = static::resolveSignatureAndPayload(null, '');

        return $signature;
    }

    /**
     * Load payload from globals var.
     *
     * @return mixed
     */
    protected static function getPayloadFromGlobals()
    {
        list(, $payload) = static::resolveSignatureAndPayload('', null);

        return $payload;
    }

    /**
     * @return string|null
     */
    protected static function getNotificationSignature()
    {
        return isset($_SERVER['HTTP_X_ALLOPASS_SIGNATURE']) ? $_SERVER['HTTP_X_ALLOPASS_SIGNATURE'] : null;
    }

    /**
     * Builds the string to hash: the raw body followed by the passphrase for a notification,
     * the canonical name.value.passphrase sequence for an array of parameters.
     *
     * @param string                           $secretPassPhrase
     * @param string|array<string, mixed>|null $payload
     *
     * @return string|null null when the passphrase or the signed content is empty, or the payload is malformed
     */
    protected static function getStringToCompute($secretPassPhrase, $payload)
    {
        if (!is_string($secretPassPhrase) || '' === $secretPassPhrase) {
            return null;
        }

        if (is_string($payload)) {
            return '' === $payload ? null : $payload.$secretPassPhrase;
        }

        if (!is_array($payload)) {
            return null;
        }

        $string2compute = '';
        foreach ($payload as $name => $value) {
            if (null === $value) {
                continue;
            }
            if (!is_scalar($value)) {
                return null;
            }
            $value = (string) $value;
            if ('' !== $value) {
                $string2compute .= $name.$value.$secretPassPhrase;
            }
        }

        return '' === $string2compute ? null : $string2compute;
    }

    /**
     * A request is a redirection (accept, decline... pages) only when it carries the query-string hash
     * and nothing that belongs to a server-to-server notification.
     *
     * @return bool
     */
    protected static function isRedirection()
    {
        if (!isset($_GET['hash']) || !is_string($_GET['hash'])) {
            return false;
        }

        if (isset($_SERVER['HTTP_X_ALLOPASS_SIGNATURE'])) {
            return false;
        }

        $rawBody = static::getRawPostData();
        if (is_string($rawBody) && '' !== $rawBody) {
            return false;
        }

        if (!isset($_SERVER['REQUEST_METHOD'])) {
            return true;
        }

        return in_array(strtoupper((string) $_SERVER['REQUEST_METHOD']), array('GET', 'HEAD'), true);
    }

    /**
     * @return array<string, mixed>
     */
    protected static function getParameters()
    {
        $params = $_GET;
        unset($params['hash']);
        ksort($params);

        return $params;
    }

    /**
     * @return false|string
     */
    protected static function getRawPostData()
    {
        return file_get_contents('php://input');
    }
}
