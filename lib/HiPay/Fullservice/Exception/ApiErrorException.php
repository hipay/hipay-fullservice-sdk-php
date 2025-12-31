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

namespace HiPay\Fullservice\Exception;

use Throwable;

/**
 * Exception thrown if the Hipay API returns a specific error.
 *
 * @category    HiPay
 * @package     HiPay\Fullservice
 * @author        Kassim Belghait <kassim@sirateck.com>
 * @copyright   Copyright (c) 2016 - HiPay
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link        https://github.com/hipay/hipay-fullservice-sdk-php
 */
class ApiErrorException extends \RuntimeException
{
    /**
     * ApiErrorException constructor.
     * @param string $message
     * @param int $code
     * @param string $description
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, $description = "", ?Throwable $previous = null)
    {
        $text = $message . PHP_EOL . $description;

        parent::__construct($text, $code, $previous);
    }
}
