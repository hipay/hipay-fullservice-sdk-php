<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model\Request\ThreeDSTwo;

use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo;
use HiPay\TestCase\TestCase;

class AccountInfoTest extends TestCase
{
    public function testConstruct() {
        $accountInfo = new AccountInfo();

        $this->assertInstanceOf(AccountInfo::class, $accountInfo);

        return $accountInfo;
    }

    /**
     * @var AccountInfo $accountInfo
     * @depends testConstruct
     */
    public function testGetCustomer($accountInfo)
    {
        $this->assertNull($accountInfo->getCustomer());

        $customer = new AccountInfo\Customer();

        $accountInfo->customer = $customer;

        $retrievedCustomer = $accountInfo->getCustomer();

        $this->assertInstanceOf(AccountInfo\Customer::class, $retrievedCustomer);
        $this->assertEquals($customer, $retrievedCustomer);
    }

    /**
     * @var AccountInfo $accountInfo
     * @depends testConstruct
     */
    public function testGetPurchase($accountInfo)
    {
        $this->assertNull($accountInfo->getPurchase());

        $purchase = new AccountInfo\Purchase();

        $accountInfo->purchase = $purchase;

        $retrievedPurchase = $accountInfo->getPurchase();

        $this->assertInstanceOf(AccountInfo\Purchase::class, $retrievedPurchase);
        $this->assertEquals($purchase, $retrievedPurchase);
    }

    /**
     * @var AccountInfo $accountInfo
     * @depends testConstruct
     */
    public function testGetPayment($accountInfo)
    {
        $this->assertNull($accountInfo->getPayment());

        $payment = new AccountInfo\Payment();

        $accountInfo->payment = $payment;

        $retrievedPayment = $accountInfo->getPayment();

        $this->assertInstanceOf(AccountInfo\Payment::class, $retrievedPayment);
        $this->assertEquals($payment, $retrievedPayment);
    }

    /**
     * @var AccountInfo $accountInfo
     * @depends testConstruct
     */
    public function testGetShipping($accountInfo)
    {
        $this->assertNull($accountInfo->getShipping());

        $shipping = new AccountInfo\Shipping();

        $accountInfo->shipping = $shipping;

        $retrievedShopping = $accountInfo->getShipping();

        $this->assertInstanceOf(AccountInfo\Shipping::class, $retrievedShopping);
        $this->assertEquals($shipping, $retrievedShopping);
    }
}