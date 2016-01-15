<?php
/*
 * Hipay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - Hipay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace Hipay\Fullservice\Gateway\Model;

/**
 *
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 *       @api
 */
class Transaction extends AbstractTransaction
{
    
    public $reason;
    public $forwardUrl;
    public $attemptId;
    public $referenceToPay;
    public $ipAddress;
    public $ipCountry;
    public $deviceId;
    public $avsResult;
    public $cvcResult;
    public $eci;
    public $paymentProduct;
    public $paymentMethod;
    public $threeDSecure;
    public $fraudScreening;
    public $order;
    public $debitAgreement;
    
    public $cdata1;
    public $cdata2;
    public $cdata3;
    public $cdata4;
    public $cdata5;
    public $cdata6;
    public $cdata7;
    public $cdata8;
    public $cdata9;
    public $cdata10;
    
}