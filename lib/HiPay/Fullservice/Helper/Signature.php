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
     * @param $secretPassPhrase
     * @param string $hashAlgorithm
     * @return bool
     */
    static public function isValidHttpSignature($secretPassPhrase, $hashAlgorithm = HashAlgorithm::SHA1)
    {
        switch ($hashAlgorithm) {
            case HashAlgorithm::SHA256:
                $computedSignature = hash(HashAlgorithm::SHA256, static::getStringToCompute($secretPassphrase));
                break;
            case HashAlgorithm::SHA512 :
                $computedSignature = hash(HashAlgorithm::SHA512, static::getStringToCompute($secretPassphrase));
                break;
            default:
                $computedSignature = sha1(static::getStringToCompute($secretPassphrase));
                break;
        }

        if ($computedSignature == static::getSignature()) {
            return true;
        }

        return false;
    }

    static protected function isRedirection()
    {
        return isset($_GET ['hash']);
    }

    static protected function getSignature()
    {
        if (static::isRedirection()) {
            return $_GET['hash'];
        } else {
            return $_SERVER['HTTP_X_ALLOPASS_SIGNATURE'];
        }
    }

    static protected function getParameters()
    {
        $params = $_GET;
        unset($params['hash']);
        ksort($params);
        return $params;
    }

    static protected function getRawPostData()
    {
        return file_get_contents("php://input");
    }

    static protected function getStringToCompute($secretPassPhrase)
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
