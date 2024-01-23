<?php

namespace Unit\HiPay\Tests\Fullservice\SecureVault\Mapper;

use HiPay\Fullservice\SecureVault\Mapper\PaymentCardTokenMapper;
use HiPay\Fullservice\SecureVault\Model\PaymentCardToken;
use HiPay\TestCase\TestCase;

class PaymentCardTokenMapperTest extends TestCase
{
    protected $_paymentCardTokenAsArray;

    public function set_up()
    {
        $this->_paymentCardTokenAsArray = array(
            "token" => "1c1880287b6c1a8749daca1dcd867a67bb2f47248db9a417864b13e58a30a8bd",
            "brand" => "VISA",
            "pan" => "4484120000000029",
            "cardHolder" => "Jane DOE",
            "cardExpiryMonth" => "3",
            "cardExpiryYear" => "2024",
            "issuer" => "BNP",
            "country" => "FRANCE",
            "requestId" => "00001",
            "multiUse" => true,
            "domesticNetwork" => "",
            "cardHash" => "",
            "cardId" => "",
            "cardType" => "CREDIT",
            "cardCategory" => "",
            "forbiddenIssuerCountry" => false,
            "bin" => "400000"
        );
    }

    public function testConstruct()
    {
        $paymentCardTokenMapper = new PaymentCardTokenMapper($this->_paymentCardTokenAsArray);

        $this->assertInstanceOf(PaymentCardTokenMapper::class, $paymentCardTokenMapper);

        return $paymentCardTokenMapper;
    }

    /**
     * @param PaymentCardTokenMapper $paymentCardTokenMapper
     * @depends testConstruct
     */
    public function testMapResponseToModel($paymentCardTokenMapper)
    {
        /** @var PaymentCardToken */
        $paymentCardToken = $paymentCardTokenMapper->getModelObjectMapped();

        $this->assertInstanceOf(PaymentCardToken::class, $paymentCardToken);

        $this->assertEquals($this->_paymentCardTokenAsArray['token'], $paymentCardToken->getToken());
        $this->assertEquals($this->_paymentCardTokenAsArray['brand'], $paymentCardToken->getBrand());
        $this->assertEquals($this->_paymentCardTokenAsArray['pan'], $paymentCardToken->getPan());
        $this->assertEquals($this->_paymentCardTokenAsArray['cardHolder'], $paymentCardToken->getCardHolder());
        $this->assertEquals(sprintf('%02d', $this->_paymentCardTokenAsArray['cardExpiryMonth']), $paymentCardToken->getCardExpiryMonth());
        $this->assertEquals($this->_paymentCardTokenAsArray['cardExpiryYear'], $paymentCardToken->getCardExpiryYear());
        $this->assertEquals($this->_paymentCardTokenAsArray['issuer'], $paymentCardToken->getIssuer());
        $this->assertEquals($this->_paymentCardTokenAsArray['country'], $paymentCardToken->getCountry());
        $this->assertEquals($this->_paymentCardTokenAsArray['requestId'], $paymentCardToken->getRequestId());
        $this->assertEquals($this->_paymentCardTokenAsArray['multiUse'], $paymentCardToken->getMultiUse());
        $this->assertEquals($this->_paymentCardTokenAsArray['domesticNetwork'], $paymentCardToken->getDomesticNetwork());
        $this->assertEquals($this->_paymentCardTokenAsArray['cardHash'], $paymentCardToken->getCardHash());
        $this->assertEquals($this->_paymentCardTokenAsArray['cardType'], $paymentCardToken->getCardType());
        $this->assertEquals($this->_paymentCardTokenAsArray['cardCategory'], $paymentCardToken->getCardCategory());
        $this->assertEquals($this->_paymentCardTokenAsArray['forbiddenIssuerCountry'], $paymentCardToken->getForbiddenIssuerCountry());
        $this->assertEquals($this->_paymentCardTokenAsArray['bin'], $paymentCardToken->getBin());
    }
}
