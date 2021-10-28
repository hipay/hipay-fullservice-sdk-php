<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model\Request\ThreeDSTwo;

use HiPay\Fullservice\Gateway\Model\Request\ThreeDSTwo\BrowserInfo;
use HiPay\TestCase\TestCase;

class BrowserInfoTest extends TestCase
{
    public function testConstruct() {
        $browserInfo = new BrowserInfo();

        $this->assertInstanceOf(BrowserInfo::class, $browserInfo);

        return $browserInfo;
    }

    /**
     * @var BrowserInfo $browserInfo
     * @depends testConstruct
     */
    public function testGetIpaddr($browserInfo)
    {
        $this->assertNull($browserInfo->getIpaddr());

        $browserInfo->ipaddr = "127.0.0.1";

        $this->assertEquals("127.0.0.1", $browserInfo->getIpaddr());
    }

    /**
     * @var BrowserInfo $browserInfo
     * @depends testConstruct
     */
    public function testGetHttpAccept($browserInfo)
    {
        $this->assertNull($browserInfo->getHttpAccept());

        $browserInfo->http_accept = "application/json";

        $this->assertEquals("application/json", $browserInfo->getHttpAccept());
    }

    /**
     * @var BrowserInfo $browserInfo
     * @depends testConstruct
     */
    public function testGetHttpUserAgent($browserInfo)
    {
        $this->assertNull($browserInfo->getHttpUserAgent());

        $browserInfo->http_user_agent = "Mozilla/4.0";

        $this->assertEquals("Mozilla/4.0", $browserInfo->getHttpUserAgent());
    }

    /**
     * @var BrowserInfo $browserInfo
     * @depends testConstruct
     */
    public function testGetJavaEnabled($browserInfo)
    {
        $this->assertNull($browserInfo->isJavaEnabled());

        $browserInfo->java_enabled = true;

        $this->assertEquals(true, $browserInfo->isJavaEnabled());
    }

    /**
     * @var BrowserInfo $browserInfo
     * @depends testConstruct
     */
    public function testGetJavascriptEnabled($browserInfo)
    {
        $this->assertNull($browserInfo->isJavaScriptEnabled());

        $browserInfo->javascript_enabled = true;

        $this->assertEquals(true, $browserInfo->isJavaScriptEnabled());
    }

    /**
     * @var BrowserInfo $browserInfo
     * @depends testConstruct
     */
    public function testGetLanguage($browserInfo)
    {
        $this->assertNull($browserInfo->getLanguage());

        $browserInfo->language = "fr";

        $this->assertEquals('fr', $browserInfo->getLanguage());
    }

    /**
     * @var BrowserInfo $browserInfo
     * @depends testConstruct
     */
    public function testGetColorDepth($browserInfo)
    {
        $this->assertNull($browserInfo->getColorDepth());

        $browserInfo->color_depth = 24;

        $this->assertEquals(24, $browserInfo->getColorDepth());
    }

    /**
     * @var BrowserInfo $browserInfo
     * @depends testConstruct
     */
    public function testGetScreenHeight($browserInfo)
    {
        $this->assertNull($browserInfo->getScreenHeight());

        $browserInfo->screen_height= 1080;

        $this->assertEquals(1080, $browserInfo->getScreenHeight());
    }

    /**
     * @var BrowserInfo $browserInfo
     * @depends testConstruct
     */
    public function testGetScreenWidth($browserInfo)
    {
        $this->assertNull($browserInfo->getScreenWidth());

        $browserInfo->screen_width= 1920;

        $this->assertEquals(1920, $browserInfo->getScreenWidth());
    }

    /**
     * @var BrowserInfo $browserInfo
     * @depends testConstruct
     */
    public function testGetTimezone($browserInfo)
    {
        $this->assertNull($browserInfo->getTimezone());

        $browserInfo->timezone = "+120";

        $this->assertEquals("+120", $browserInfo->getTimezone());
    }
}