<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Mapper;

use HiPay\Fullservice\Gateway\Mapper\SecuritySettingsMapper;
use HiPay\Fullservice\Gateway\Model\SecuritySettings;
use HiPay\TestCase\TestCase;

class SecuritySettingsMapperTest extends TestCase
{
    private $_securitySettingsMapper;

    public function set_up()
{
        $this->_securitySettingsMapper = array(
            "hashingAlgorithm" => "sha-2"
        );
    }

    public function testConstruct()
    {
        $securitySettingsMapper = new SecuritySettingsMapper(
            $this->_securitySettingsMapper
        );

        $this->assertInstanceOf(SecuritySettingsMapper::class, $securitySettingsMapper);

        return $securitySettingsMapper;
    }

    /**
     * @var SecuritySettingsMapper $securitySettingsMapper
     * @depends testConstruct
     */
    public function testMapResponseToModel($securitySettingsMapper)
    {
        $securitySettings = $securitySettingsMapper->getModelObjectMapped();

        $this->assertInstanceOf(SecuritySettings::class, $securitySettings);
        $this->assertEquals($this->_securitySettingsMapper['hashingAlgorithm'], $securitySettings->getHashingAlgorithm());

    }
}
