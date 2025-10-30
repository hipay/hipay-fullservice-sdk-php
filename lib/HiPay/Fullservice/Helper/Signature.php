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
        if (null === $signature) {
            $signature = static::getSignatureFromGlobals();
        }

        if (null === $payload) {
            $payload = static::getPayloadFromGlobals();
        }

        return static::getComputedSignature($secretPassphrase, $hashAlgorithm, $payload) === $signature;
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
        if (null === $signature) {
            $signature = static::getSignatureFromGlobals();
        }

        if (null === $payload) {
            $payload = static::getPayloadFromGlobals();
        }

        $computedPassphrase = static::getComputedSignature($secretPassphrase, $hashAlgorithm, $payload);

        return false !== $computedPassphrase && strlen($computedPassphrase) == strlen($signature);
    }

    /**
     * Compute signature according to hash and passphrase.
     *
     * @param string                      $secretPassphrase
     * @param string                      $hashAlgorithm
     * @param string|array<string, mixed> $payload
     *
     * @return string|false
     */
    protected static function getComputedSignature($secretPassphrase, $hashAlgorithm, $payload)
    {
        $stringToCompute = static::getStringToCompute($secretPassphrase, $payload);

        switch ($hashAlgorithm) {
            case HashAlgorithm::SHA256:
                $computedSignature = hash(HashAlgorithm::SHA256, $stringToCompute);
                break;
            case HashAlgorithm::SHA512:
                $computedSignature = hash(HashAlgorithm::SHA512, $stringToCompute);
                break;
            default:
                $computedSignature = sha1($stringToCompute);
                break;
        }

        return $computedSignature;
    }

    /**
     * Load signature from gobals var.
     *
     * @return mixed
     */
    protected static function getSignatureFromGlobals()
    {
        if (static::isRedirection()) {
            return $_GET['hash'];
        } else {
            return $_SERVER['HTTP_X_ALLOPASS_SIGNATURE'];
        }
    }

    /**
     * Load payload from globals var.
     *
     * @return mixed
     */
    protected static function getPayloadFromGlobals()
    {
        if (static::isRedirection()) {
            return static::getParameters();
        } else {
            return static::getRawPostData();
        }
    }

    /**
     * @param string                      $secretPassPhrase
     * @param string|array<string, mixed> $payload
     *
     * @return string
     */
    protected static function getStringToCompute($secretPassPhrase, $payload)
    {
        $string2compute = '';
        if (static::isRedirection() && is_array($payload)) {
            foreach ($payload as $name => $value) {
                if (strlen($value) > 0) {
                    $string2compute .= $name.$value.$secretPassPhrase;
                }
            }
        } elseif (is_string($payload)) {
            $string2compute = $payload.$secretPassPhrase;
        }

        return $string2compute;
    }

    /**
     * @return bool
     */
    protected static function isRedirection()
    {
        return isset($_GET['hash']);
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
