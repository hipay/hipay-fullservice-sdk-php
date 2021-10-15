<?php

namespace HiPay\Tests\Fullservice\Gateway\Model;

use HiPay\Fullservice\Gateway\Model\PersonalInformation;
use HiPay\Tests\TestCase;

class PersonnalInformationTest extends TestCase
{
    private $_personnalInformationData;

    public function setUp(): void
    {
        $this->_personnalInformationData = array(
            "firstname" => "Jane",
            "lastname" => "Doe",
            "streetAddress" => "56 avenue de la paix",
            "locality" => "Paris",
            "postalCode" => "75000",
            "country" => "FRANCE",
            "msisdn" => "000001",
            "phone" => "0123456789",
            "phoneOperator" => "Orange",
            "email" => "jane.doe@test.com"
        );
    }

    public function testConstruct()
    {
        $personalInformation = new PersonalInformation(
            $this->_personnalInformationData["firstname"],
            $this->_personnalInformationData["lastname"],
            $this->_personnalInformationData["streetAddress"],
            $this->_personnalInformationData["locality"],
            $this->_personnalInformationData["postalCode"],
            $this->_personnalInformationData["country"],
            $this->_personnalInformationData["msisdn"],
            $this->_personnalInformationData["phone"],
            $this->_personnalInformationData["phoneOperator"],
            $this->_personnalInformationData["email"]
        );

        $this->assertInstanceOf(PersonalInformation::class, $personalInformation);

        return $personalInformation;
    }

    /**
     * @var PersonalInformation $personalInformation
     * @depends testConstruct
     */
    public function testGetFirstname($personalInformation)
    {
        $this->assertEquals($this->_personnalInformationData["firstname"], $personalInformation->getFirstname());
    }

    /**
     * @var PersonalInformation $personalInformation
     * @depends testConstruct
     */
    public function testGetLastname($personalInformation)
    {
        $this->assertEquals($this->_personnalInformationData["lastname"], $personalInformation->getLastname());
    }

    /**
     * @var PersonalInformation $personalInformation
     * @depends testConstruct
     */
    public function testGetStreetAddress($personalInformation)
    {
        $this->assertEquals($this->_personnalInformationData["streetAddress"], $personalInformation->getStreetAddress());
    }

    /**
     * @var PersonalInformation $personalInformation
     * @depends testConstruct
     */
    public function testGetLocality($personalInformation)
    {
        $this->assertEquals($this->_personnalInformationData["locality"], $personalInformation->getLocality());
    }

    /**
     * @var PersonalInformation $personalInformation
     * @depends testConstruct
     */
    public function testGetPostalCode($personalInformation)
    {
        $this->assertEquals($this->_personnalInformationData["postalCode"], $personalInformation->getPostalCode());
    }

    /**
     * @var PersonalInformation $personalInformation
     * @depends testConstruct
     */
    public function testGetCountry($personalInformation)
    {
        $this->assertEquals($this->_personnalInformationData["country"], $personalInformation->getCountry());
    }

    /**
     * @var PersonalInformation $personalInformation
     * @depends testConstruct
     */
    public function testGetMsisnd($personalInformation)
    {
        $this->assertEquals($this->_personnalInformationData["msisdn"], $personalInformation->getMsisdn());
    }

    /**
     * @var PersonalInformation $personalInformation
     * @depends testConstruct
     */
    public function testGetPhone($personalInformation)
    {
        $this->assertEquals($this->_personnalInformationData["phone"], $personalInformation->getPhone());
    }

    /**
     * @var PersonalInformation $personalInformation
     * @depends testConstruct
     */
    public function testGetPhoneOperator($personalInformation)
    {
        $this->assertEquals($this->_personnalInformationData["phoneOperator"], $personalInformation->getPhoneOperator());
    }

    /**
     * @var PersonalInformation $personalInformation
     * @depends testConstruct
     */
    public function testGetEmail($personalInformation)
    {
        $this->assertEquals($this->_personnalInformationData["email"], $personalInformation->getEmail());
    }
}
