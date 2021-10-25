<?php

namespace Unit\HiPay\Tests\Fullservice\Gateway\Model;

use HiPay\Fullservice\Gateway\Model\FraudScreening;
use HiPay\TestCase\TestCase;

class FraudScreeningTest extends TestCase
{
    private $_fraudScreening;

    public function set_up()
{
        $this->_fraudScreening = array(
            "scoring" => 0,
            "result" => \HiPay\Fullservice\Enum\Transaction\FraudScreening::RESULT_ACCEPTED,
            "review" => \HiPay\Fullservice\Enum\Transaction\FraudScreening::REVIEW_ALLOWED
        );
    }

    public function testConstruct()
    {
        $fraudScreening = new FraudScreening(
            $this->_fraudScreening["scoring"],
            $this->_fraudScreening["result"],
            $this->_fraudScreening["review"]
        );

        $this->assertInstanceOf(FraudScreening::class, $fraudScreening);

        return $fraudScreening;
    }

    /**
     * @var FraudScreening $fraudScreening
     * @depends testConstruct
     */
    public function testGetScoring($fraudScreening)
    {
        $this->assertEquals($this->_fraudScreening["scoring"], $fraudScreening->getScoring());
    }

    /**
     * @var FraudScreening $fraudScreening
     * @depends testConstruct
     */
    public function testGetResult($fraudScreening)
    {
        $this->assertEquals($this->_fraudScreening["result"], $fraudScreening->getResult());
    }

    /**
     * @var FraudScreening $fraudScreening
     * @depends testConstruct
     */
    public function testGetReview($fraudScreening)
    {
        $this->assertEquals($this->_fraudScreening["review"], $fraudScreening->getReview());
    }
}
