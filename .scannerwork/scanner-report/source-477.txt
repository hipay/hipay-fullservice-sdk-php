<?php

namespace HiPay\Tests\Data;

use HiPay\Fullservice\Data\Category;
use HiPay\Tests\TestCase;

class CategoryTest extends TestCase
{
    public function testConstruct()
    {
        $category = new Category(
            1,
            "Home & Gardening",
            array(
                "EN" => "Home & Gardening",
                "FR" => "Maison et Jardin"
            )
        );

        $this->assertInstanceOf(Category::class, $category);

        return $category;
    }

    /**
     * @param Category $category
     * @depends testConstruct
     */
    public function testGetCode($category)
    {
        $code = $category->getCode();

        $this->assertEquals(1, $code);
    }

    /**
     * @param Category $category
     * @depends testConstruct
     */
    public function testGetName($category)
    {
        $name = $category->getName();

        $this->assertEquals("Home & Gardening", $name);
    }

    /**
     * @param Category $category
     * @depends testConstruct
     */
    public function testGetLocals($category)
    {
        $category->setLocals(
            array(
                "EN" => "Home & Gardening",
                "FR" => "Maison et Jardin"
            )
        );

        $code = $category->getLocal();
        $this->assertEquals("Home & Gardening", $code);

        $code = $category->getLocal("EN");
        $this->assertEquals("Home & Gardening", $code);

        $code = $category->getLocal("FR");
        $this->assertEquals("Maison et Jardin", $code);
    }

    /**
     * @param Category $category
     * @depends testConstruct
     */
    public function testSetLocals($category)
    {
        $category->setLocals(
            array(
                "EN" => "Home & Gardening"
            )
        );

        $code = $category->getLocal();
        $this->assertEquals("Home & Gardening", $code);

        $code = $category->getLocal("EN");
        $this->assertEquals("Home & Gardening", $code);

        $code = $category->getLocal("FR");
        $this->assertEquals("Home & Gardening", $code);
    }
}