<?php

namespace HiPay\Tests\Fullservice\Gateway\Model;

use HiPay\Fullservice\Gateway\Model\SecuritySettings;
use HiPay\Tests\TestCase;

class SecuritySettingsTest extends TestCase
{
    private $_securitySettingData;

    public function setUp(): void
    {
        $this->_securitySettingData = array(
            "hashingAlgorithm" => "sha-2"
        );
    }

    public function testConstruct() {
        $securitySettings = new SecuritySettings(
            $this->_securitySettingData["hashingAlgorithm"]
        );

        $this->assertInstanceOf(SecuritySettings::class, $securitySettings);

        return $securitySettings;
    }

    /**
     * @var SecuritySettings $securitySettings
     * @depends testConstruct
     */
    public function testGetHashingAlgorithm($securitySettings)
    {
        $securitySettings->setHashingAlgorithm($this->_securitySettingData['hashingAlgorithm']);

        $this->assertEquals($this->_securitySettingData['hashingAlgorithm'], $securitySettings->getHashingAlgorithm());
    }

    /**
     * @var SecuritySettings $securitySettings
     * @depends testConstruct
     */
    public function testSetHashingAlgorithm($securitySettings)
    {
        $this->assertEquals($this->_securitySettingData['hashingAlgorithm'], $securitySettings->getHashingAlgorithm());

        $securitySettings->setHashingAlgorithm("sha-256");

        $this->assertEquals("sha-256", $securitySettings->getHashingAlgorithm());
    }
}
