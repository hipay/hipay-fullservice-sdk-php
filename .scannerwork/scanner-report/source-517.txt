<?php

namespace HiPay\Tests\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo;


use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\AccountInfo\Customer;
use HiPay\Tests\TestCase;

class CustomerTest extends TestCase
{
    public function testConstruct() {
        $customer = new Customer();

        $this->assertInstanceOf(Customer::class, $customer);

        return $customer;
    }

    /**
     * @var Customer $customer
     * @depends testConstruct
     */
    public function testGetAccountChange($customer)
    {
        $this->assertNull($customer->getAccountChange());

        $customer->account_change = 20180507;

        $this->assertEquals(20180507, $customer->getAccountChange());
    }

    /**
     * @var Customer $customer
     * @depends testConstruct
     */
    public function testGetOpeningAccountDate($customer)
    {
        $this->assertNull($customer->getOpeningAccountDate());

        $customer->opening_account_date = 20180507;

        $this->assertEquals(20180507, $customer->getOpeningAccountDate());
    }

    /**
     * @var Customer $customer
     * @depends testConstruct
     */
    public function testGetPasswordChange($customer)
    {
        $this->assertNull($customer->getPasswordChange());

        $customer->password_change = 20180507;

        $this->assertEquals(20180507, $customer->getPasswordChange());
    }
}