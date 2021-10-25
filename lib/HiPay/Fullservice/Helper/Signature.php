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

namespace HiPay\Fullservice\Helper;

use HiPay\Fullservice\Enum\Helper\HashAlgorithm;

/**
 *  Class Signature validator
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
 *
 * @package     HiPay\Fullservice
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Signature
{
    /**
     * @param string $secretPassphrase
     * @param string $hashAlgorithm
     * @return bool
     */
    public static function isValidHttpSignature($secretPassphrase, $hashAlgorithm = HashAlgorithm::SHA1)
    {
        if (static::getComputedSignature($secretPassphrase, $hashAlgorithm) == static::getSignature()) {
            return true;
        }

        return false;
    }

    /**
     *  Detects is same hash algorithm is used for signature
     *
     * @param string $secretPassphrase
     * @param string $hashAlgorithm
     *
     * @return boolean
     */
    public static function isSameHashAlgorithm($secretPassphrase, $hashAlgorithm)
    {
        if (strlen(static::getComputedSignature($secretPassphrase, $hashAlgorithm)) == strlen(static::getSignature())) {
            return true;
        }

        return false;
    }

    /**
     *  Compute signature according to hash and passphrase
     *
     * @param string $secretPassphrase
     * @param string $hashAlgorithm
     *
     * @return string|false
     */
    protected static function getComputedSignature($secretPassphrase, $hashAlgorithm)
    {
        switch ($hashAlgorithm) {
            case HashAlgorithm::SHA256:
                $computedSignature = hash(HashAlgorithm::SHA256, static::getStringToCompute($secretPassphrase));
                break;
            case HashAlgorithm::SHA512:
                $computedSignature = hash(HashAlgorithm::SHA512, static::getStringToCompute($secretPassphrase));
                break;
            default:
                $computedSignature = sha1(static::getStringToCompute($secretPassphrase));
                break;
        }

        return $computedSignature;
    }

    /**
     * @return bool
     */
    protected static function isRedirection()
    {
        return isset($_GET ['hash']);
    }

    /**
     * @return mixed
     */
    protected static function getSignature()
    {
        if (static::isRedirection()) {
            return $_GET['hash'];
        } else {
            return $_SERVER['HTTP_X_ALLOPASS_SIGNATURE'];
        }
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
        return file_get_contents("php://input");
    }

    /**
     * @param string $secretPassPhrase
     * @return string
     */
    protected static function getStringToCompute($secretPassPhrase)
    {
        $string2compute = "";
        if (static::isRedirection()) {
            foreach (static::getParameters() as $name => $value) {
                if (strlen($value) > 0) {
                    $string2compute .= $name . $value . $secretPassPhrase;
                }
            }
        } else {
            $string2compute = static::getRawPostData() . $secretPassPhrase;
        }

        return $string2compute;
    }
}
