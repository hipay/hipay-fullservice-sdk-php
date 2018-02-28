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
namespace HiPay\Fullservice\Enum\Helper;

use HiPay\Fullservice\Enum\AbstractEnum;

/**
 * Constant values of Hash Algorithm
 *
 * Hash Algorithm is used to verify signature from notification and redirection
 *
 * @package HiPay\Fullservice
 * @author Etienne Landais <elandais@hipay.com>
 * @copyright Copyright (c) 2018 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class HashAlgorithm extends AbstractEnum
{
    /**
     * @var string  Hashing SHA-1
     */
    const SHA1 = 'sha1';

    /**
     * @var string  Hashing SHA-256
     */
    const SHA256 = 'sha256';

    /**
     * @var string  Hashing SHA-512
     */
    const SHA512 = 'sha512';

}

