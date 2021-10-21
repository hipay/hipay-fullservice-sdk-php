<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Mapper;

use HiPay\Fullservice\Gateway\Mapper\PersonalInformationMapper;
use HiPay\Fullservice\Gateway\Model\PersonalInformation;
use HiPay\TestCase\TestCase;

class PersonalInformationMapperTest extends TestCase
{
    private $_personalInformationMapper;

    public function setUp(): void
    {
        $this->_personalInformationMapper = array(
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
        $personalInformationMapper = new PersonalInformationMapper(
            $this->_personalInformationMapper
        );

        $this->assertInstanceOf(PersonalInformationMapper::class, $personalInformationMapper);

        return $personalInformationMapper;
    }

    /**
     * @var PersonalInformationMapper $personalInformationMapper
     * @depends testConstruct
     */
    public function testMapResponseToModel($personalInformationMapper)
    {
        $personalInformation = $personalInformationMapper->getModelObjectMapped();

        $this->assertInstanceOf(PersonalInformation::class, $personalInformation);
        $this->assertEquals($this->_personalInformationMapper['firstname'], $personalInformation->getFirstname());
        $this->assertEquals($this->_personalInformationMapper['lastname'], $personalInformation->getLastname());
        $this->assertEquals($this->_personalInformationMapper['streetAddress'], $personalInformation->getStreetAddress());
        $this->assertEquals($this->_personalInformationMapper['locality'], $personalInformation->getLocality());
        $this->assertEquals($this->_personalInformationMapper['postalCode'], $personalInformation->getPostalCode());
        $this->assertEquals($this->_personalInformationMapper['country'], $personalInformation->getCountry());
        $this->assertEquals($this->_personalInformationMapper['msisdn'], $personalInformation->getMsisdn());
        $this->assertEquals($this->_personalInformationMapper['phone'], $personalInformation->getPhone());
        $this->assertEquals($this->_personalInformationMapper['phoneOperator'], $personalInformation->getPhoneOperator());
        $this->assertEquals($this->_personalInformationMapper['email'], $personalInformation->getEmail());

    }
}
