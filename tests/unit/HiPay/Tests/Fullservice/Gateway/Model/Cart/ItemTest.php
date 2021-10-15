<?php

namespace HiPay\Tests\Fullservice\Gateway\Model\Cart;

use HiPay\Fullservice\Data\DeliveryMethod;
use HiPay\Fullservice\Enum\Cart\TypeItems;
use HiPay\Fullservice\Gateway\Model\Cart\Item;
use HiPay\Tests\TestCase;

class ItemTest extends TestCase
{

    protected $_itemInfo;

    public function setUp(): void
    {
        $this->_itemInfo = array(
            "european_article_numbering" => "000001",
            "product_reference" => "000002",
            "type" => 'TEST',
            "name" => "Phone",
            "quantity" => 1,
            "unit_price" => 100,
            "tax_rate" => 20,
            "discount" => 50,
            "discount_description" => 'BLACK FRIDAY',
            "total_amount" => 100,
            "product_description" => "Cellphone",
            "delivery_method" => "NORMAL",
            "delivery_company" => "Fedex",
            "delivery_delay" => "1 week",
            "delivery_number" => "000003",
            "product_category" => "Electronics",
            "shop_id" => "000004"
        );
    }

    public function testConstruct()
    {
        $item = new Item();

        $this->assertNull($item->getEuropeanArticleNumbering());
        $this->assertEquals("", $item->getProductReference());
        $this->assertEquals("", $item->getType());
        $this->assertEquals("", $item->getName());
        $this->assertEquals("", $item->getQuantity());
        $this->assertEquals(0.00, $item->getUnitPrice());
        $this->assertEquals(0.00, $item->getTaxRate());
        $this->assertEquals(0.00, $item->getDiscount());
        $this->assertEquals(0.00, $item->getTotalAmount());
        $this->assertEquals("", $item->getDiscountDescription());
        $this->assertEquals("", $item->getProductDescription());
        $this->assertNull($item->getDeliveryMethod());
        $this->assertNull($item->getDeliveryCompany());
        $this->assertNull($item->getDeliveryDelay());
        $this->assertNull($item->getDeliveryNumber());
        $this->assertNull($item->getProductCategory());
        $this->assertNull($item->getShopId());

        return $item;
    }

    public function testBuildItemTypeDiscount()
    {
        $item = Item::buildItemTypeDiscount(
            $this->_itemInfo['product_reference'],
            $this->_itemInfo['name'],
            $this->_itemInfo['unit_price'],
            $this->_itemInfo['tax_rate'],
            $this->_itemInfo['discount'],
            $this->_itemInfo['discount_description'],
            $this->_itemInfo['total_amount']
        );

        $this->assertInstanceOf(Item::class, $item);

        $this->assertEquals($this->_itemInfo['product_reference'], $item->getProductReference());
        $this->assertEquals($this->_itemInfo['name'], $item->getName());
        $this->assertEquals(1, $item->getQuantity());
        $this->assertEquals($this->_itemInfo['unit_price'], $item->getUnitPrice());
        $this->assertEquals($this->_itemInfo['tax_rate'], $item->getTaxRate());
        $this->assertEquals($this->_itemInfo['discount'], $item->getDiscount());
        $this->assertEquals($this->_itemInfo['total_amount'], $item->getTotalAmount());
        $this->assertEquals(TypeItems::DISCOUNT, $item->getType());
        $this->assertEquals($this->_itemInfo['discount_description'], $item->getDiscountDescription());
    }

    public function testBuildItemTypeFees()
    {
        $item = Item::buildItemTypeFees(
            $this->_itemInfo['product_reference'],
            $this->_itemInfo['name'],
            $this->_itemInfo['unit_price'],
            $this->_itemInfo['tax_rate'],
            $this->_itemInfo['discount'],
            $this->_itemInfo['total_amount']
        );

        $this->assertEquals($this->_itemInfo['product_reference'], $item->getProductReference());
        $this->assertEquals($this->_itemInfo['name'], $item->getName());
        $this->assertEquals(1, $item->getQuantity());
        $this->assertEquals($this->_itemInfo['unit_price'], $item->getUnitPrice());
        $this->assertEquals($this->_itemInfo['tax_rate'], $item->getTaxRate());
        $this->assertEquals($this->_itemInfo['discount'], $item->getDiscount());
        $this->assertEquals($this->_itemInfo['total_amount'], $item->getTotalAmount());
        $this->assertEquals(TypeItems::FEE, $item->getType());
        $this->assertEquals("", $item->getDiscountDescription());
    }

    public function testConstructItem()
    {
        $item = new Item();

        $item->__constructItem(
            $this->_itemInfo['european_article_numbering'],
            $this->_itemInfo['product_reference'],
            $this->_itemInfo['type'],
            $this->_itemInfo['name'],
            $this->_itemInfo['quantity'],
            $this->_itemInfo['unit_price'],
            $this->_itemInfo['tax_rate'],
            $this->_itemInfo['discount'],
            $this->_itemInfo['total_amount'],
            $this->_itemInfo['discount_description'],
            $this->_itemInfo['product_description'],
            $this->_itemInfo['delivery_method'],
            $this->_itemInfo['delivery_company'],
            $this->_itemInfo['delivery_delay'],
            $this->_itemInfo['delivery_number'],
            $this->_itemInfo['product_category'],
            $this->_itemInfo['shop_id']
        );

        $this->assertEquals($this->_itemInfo['european_article_numbering'], $item->getEuropeanArticleNumbering());
        $this->assertEquals($this->_itemInfo['product_reference'], $item->getProductReference());
        $this->assertEquals($this->_itemInfo['type'], $item->getType());
        $this->assertEquals($this->_itemInfo['name'], $item->getName());
        $this->assertEquals($this->_itemInfo['quantity'], $item->getQuantity());
        $this->assertEquals($this->_itemInfo['unit_price'], $item->getUnitPrice());
        $this->assertEquals($this->_itemInfo['tax_rate'], $item->getTaxRate());
        $this->assertEquals($this->_itemInfo['discount'], $item->getDiscount());
        $this->assertEquals($this->_itemInfo['total_amount'], $item->getTotalAmount());
        $this->assertEquals($this->_itemInfo['discount_description'], $item->getDiscountDescription());
        $this->assertEquals($this->_itemInfo['product_description'], $item->getProductDescription());
        $this->assertEquals($this->_itemInfo['delivery_method'], $item->getDeliveryMethod());
        $this->assertEquals($this->_itemInfo['delivery_company'], $item->getDeliveryCompany());
        $this->assertEquals($this->_itemInfo['delivery_delay'], $item->getDeliveryDelay());
        $this->assertEquals($this->_itemInfo['delivery_number'], $item->getDeliveryNumber());
        $this->assertEquals($this->_itemInfo['product_category'], $item->getProductCategory());
        $this->assertEquals($this->_itemInfo['shop_id'], $item->getShopId());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetEuropeanArticleNumbering($item)
    {
        $item->setEuropeanArticleNumbering($this->_itemInfo['european_article_numbering']);

        $this->assertEquals($this->_itemInfo['european_article_numbering'], $item->getEuropeanArticleNumbering());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetProductReference($item)
    {
        $item->setProductReference($this->_itemInfo['product_reference']);

        $this->assertEquals($this->_itemInfo['product_reference'], $item->getProductReference());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetType($item)
    {
        $item->setType($this->_itemInfo['type']);

        $this->assertEquals($this->_itemInfo['type'], $item->getType());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetName($item)
    {
        $item->setName($this->_itemInfo['name']);

        $this->assertEquals($this->_itemInfo['name'], $item->getName());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetQuantity($item)
    {
        $item->setQuantity($this->_itemInfo['quantity']);

        $this->assertEquals($this->_itemInfo['quantity'], $item->getQuantity());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetUnitPrice($item)
    {
        $item->setUnitPrice($this->_itemInfo['unit_price']);

        $this->assertEquals($this->_itemInfo['unit_price'], $item->getUnitPrice());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetTaxRate($item)
    {
        $item->setTaxRate($this->_itemInfo['tax_rate']);

        $this->assertEquals($this->_itemInfo['tax_rate'], $item->getTaxRate());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetDiscount($item)
    {
        $item->setDiscount($this->_itemInfo['discount']);

        $this->assertEquals($this->_itemInfo['discount'], $item->getDiscount());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetTotalAmount($item)
    {
        $item->setTotalAmount($this->_itemInfo['total_amount']);

        $this->assertEquals($this->_itemInfo['total_amount'], $item->getTotalAmount());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetDiscountDescription($item)
    {
        $item->setDiscountDescription($this->_itemInfo['discount_description']);

        $this->assertEquals($this->_itemInfo['discount_description'], $item->getDiscountDescription());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetProductDescription($item)
    {
        $item->setProductDescription($this->_itemInfo['product_description']);

        $this->assertEquals($this->_itemInfo['product_description'], $item->getProductDescription());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetDeliveryMethod($item)
    {
        $item->setDeliveryMethod($this->_itemInfo['delivery_method']);

        $this->assertEquals($this->_itemInfo['delivery_method'], $item->getDeliveryMethod());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetDeliveryCompany($item)
    {
        $item->setDeliveryCompany($this->_itemInfo['delivery_company']);

        $this->assertEquals($this->_itemInfo['delivery_company'], $item->getDeliveryCompany());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetDeliveryDelay($item)
    {
        $item->setDeliveryDelay($this->_itemInfo['delivery_delay']);

        $this->assertEquals($this->_itemInfo['delivery_delay'], $item->getDeliveryDelay());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetDeliveryNumber($item)
    {
        $item->setDeliveryNumber($this->_itemInfo['delivery_number']);

        $this->assertEquals($this->_itemInfo['delivery_number'], $item->getDeliveryNumber());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetProductCategory($item)
    {
        $item->setProductCategory($this->_itemInfo['product_category']);

        $this->assertEquals($this->_itemInfo['product_category'], $item->getProductCategory());
    }

    /**
     * @var Item $item
     * @depends testConstruct
     */
    public function testSetShopID($item)
    {
        $item->setShopId($this->_itemInfo['shop_id']);

        $this->assertEquals($this->_itemInfo['shop_id'], $item->getShopId());
    }
}