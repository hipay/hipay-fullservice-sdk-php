<?php
/*
 * HiPay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - HiPay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace HiPay\Fullservice\HTTP\Response;

use HiPay\Fullservice\HTTP\Response\AbstractResponse;

/**
 * Simple Object Response Data
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 */
class Response extends AbstractResponse {
    
    /**
     *
     * {@inheritDoc}
     *
     * @see \HiPay\Fullservice\HTTP\Response\AbstractResponse::__construct()
     */
    public function __construct($body, $statusCode, array $headers){
        parent::__construct($body, $statusCode, $headers);
    }
}