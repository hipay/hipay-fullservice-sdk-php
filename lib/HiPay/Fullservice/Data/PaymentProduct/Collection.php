<?php
/**
 * HiPay Fullservice SDK PHP
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Apache 2.0 Licence
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * @copyright      Copyright (c) 2016 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */
namespace HiPay\Fullservice\Data\PaymentProduct;

use HiPay\Fullservice\Data\PaymentProduct;

/**
 * Payments product collection
 * 
 * Collection loaded with Json content
 * 
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Collection 
{

    /**
     *  Get a Payment Product item with a code
     *
     * @param string $product_code
     * @return null|PaymentProduct
     */
    public static function getItem($product_code){
        $jsonArr = json_decode(self::$_JSON,true);

        foreach ($jsonArr as $item) {
            if ($item['productCode'] == $product_code) {
                return new PaymentProduct($item['productCode'],
                $item['brandName'],
                $item['category'],
                $item['can3ds'],
                $item['canRefund'],
                $item['canRecurring'],
                $item['comment'],
                $item['basketRequired']);
             break;
            }
        }
    }
    
    /**
     * @param null|string|array $categories
     * @return PaymentProduct[] Collection of payment products filtered by category
     */
    public static function getItems($categories = null){
    	
    	if(!is_null($categories) && !is_array($categories)){
    		$categories = array($categories);
    	}
    	
    	$jsonArr = json_decode(self::$_JSON,true);
    	$collection = array();
    	foreach ($jsonArr as $item){
    		
    		if(!is_null($categories) && !in_array( $item['category'], $categories ))
    			continue;
    		
    		$collection[] = new PaymentProduct($item['productCode'],
    				$item['brandName'],
    				$item['category'],
    				$item['can3ds'],
    				$item['canRefund'],
    				$item['canRecurring'],
    				$item['comment'],
                    $item['basketRequired']);
    	}
    
    	return $collection;
    }
    
    /**
     * 
     * @var string $_JSON Json collection
     */
    private static  $_JSON = <<<EOT
    
        [
            {
                "productCode":"american-express",
                "brandName":"American Express",
                "can3ds":"0",
                "canRefund":"1",
                "canRecurring":"1",
                "category":"credit-card",
                "comment":"",
                "basketRequired":"0"
            },
            {
                "productCode":"cb",
                "brandName":"Carte Bancaire",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"1",
                "category":"credit-card",
                "comment":"Accepted cards: Visa, MasterCard. Available only in France.",
                "basketRequired":"0"
                
            },
            {
                "productCode":"mastercard",
                "brandName":"MasterCard",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"1",
                "category":"credit-card",
                "comment":"",
                "basketRequired":"0"
                
            },
            {
                "productCode":"visa",
                "brandName":"Visa",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"1",
                "category":"credit-card",
                "comment":"",
                "basketRequired":"0"
            },
            {
                "productCode":"3xcb",
                "brandName":"3x Carte Bancaire",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"credit-card",
                "comment":"Available only in France.",
                "basketRequired":"1"
            },
            {
                "productCode":"4xcb",
                "brandName":"4x Carte Bancaire",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"credit-card",
                "comment":"Available only in France.",
                "basketRequired":"1"
            },
            {
                "productCode":"3xcb-no-fees",
                "brandName":"3x Carte Bancaire sans frais",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"credit-card",
                "comment":"Available only in France.",
                "basketRequired":"1"
            },
            {
                "productCode":"4xcb-no-fees",
                "brandName":"4x Carte Bancaire sans frais",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"credit-card",
                "comment":"Available only in France.",
                "basketRequired":"1"
            },
            {
                "productCode":"bcmc",
                "brandName":"Bancontact / Mister Cash",
                "can3ds":"1",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"debit-card",
                "comment":"Available only in Belgium.",
                "basketRequired":"0"
            },
            {
                "productCode":"maestro",
                "brandName":"Maestro",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"debit-card",
                "comment":"",
                "basketRequired":"0"
            },
             {
                "productCode":"bank-transfert",
                "brandName":"TrustPay Banking",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"",
                "basketRequired":"0"
            },
             {
                "productCode":"dexia-directnet",
                "brandName":"Belfius Direct Net",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"",
                "basketRequired":"0"
            },
             {
                "productCode":"giropay",
                "brandName":"Giropay",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in Germany.",
                "basketRequired":"0"
            },
             {
                "productCode":"ideal",
                "brandName":"IDEAL",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"",
                "basketRequired":"0"
            },
             {
                "productCode":"klarna",
                "brandName":"Klarna",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"",
                "basketRequired":"1"
            },
             {
                "productCode":"przelewy24",
                "brandName":"Przelewy24",
                "can3ds":"0",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in PLN currency.",
                "basketRequired":"0"
            },
             {
                "productCode":"sisal",
                "brandName":"Sisal",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Max amount 1000 EUR.",
                "basketRequired":"0"
            },
             {
                "productCode":"sofort-uberweisung",
                "brandName":"Sofort Überweisung",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"",
                "basketRequired":"0"
            },
             {
                "productCode":"sdd",
                "brandName":"SEPA Direct Debit",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"1",
                "category":"realtime-banking",
                "comment":"",
                "basketRequired":"0"
            },
             {
                "productCode":"qiwi-wallet",
                "brandName":"VISA QIWI Wallet",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"ewallet",
                "comment":"Available only in RUB currency.",
                "basketRequired":"0"
            },
            {
                "productCode":"webmoney-transfert",
                "brandName":"WebMoney Transfer",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"ewallet",
                "comment":"Available only in RUB currency.",
                "basketRequired":"0"
            },
            {
                "productCode":"yandex",
                "brandName":"Yandex Money",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"ewallet",
                "comment":"Available only in RUB currency.",
                "basketRequired":"0"
            },
            {
                "productCode":"paypal",
                "brandName":"Paypal",
                "can3ds":"0",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"ewallet",
                "comment":"",
                "basketRequired":"0"
            },
            {
                "productCode":"postfinance-card",
                "brandName":"PostFinance Card",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"",
                "basketRequired":"0"
            },
            {
                "productCode":"postfinance-efinance",
                "brandName":"PostFinance E-Finance",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"",
                "basketRequired":"0"
            },
            {
                "productCode":"ing-homepay",
                "brandName":"ING Home'Pay",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"",
                "basketRequired":"0"
            },
            {
                "productCode":"aura",
                "brandName":"Aura",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in BRL currency.",
                "basketRequired":"0"
            },
            {
                "productCode":"banamex",
                "brandName":"Banamex",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in MXN currency.",
                "basketRequired":"0"
            },
            {
                "productCode":"banco-do-brasil",
                "brandName":"Banco do brazil",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in MXN currency.",
                "basketRequired":"0"
            },
            {
                "productCode":"bbva-bancomer",
                "brandName":"BBVA Bancomer",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in MXN currency.",
                "basketRequired":"0"
            },
            {
                "productCode":"boleto-bancario",
                "brandName":"Boleto bancario",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in BRL currency.",
                "basketRequired":"0"
            },
            {
                "productCode":"bradesco",
                "brandName":"Bradesco",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in BRL currency.",
                "basketRequired":"0"
            },
            {
                "productCode":"caixa",
                "brandName":"Caïxa",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in BRL currency.",
                "basketRequired":"0"
            },
            {
                "productCode":"itau",
                "brandName":"Itau",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in BRL currency.",
                "basketRequired":"0"
            },
            {
                "productCode":"oxxo",
                "brandName":"Oxxo",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in MXN currency.",
                "basketRequired":"0"
            },
            {
                "productCode":"santander-home-banking",
                "brandName":"Santander HomeBanking",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in MXN currency.",
                "basketRequired":"0"
            },
            {
                "productCode":"santander-cash",
                "brandName":"Santander Cash",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in MXN currency.",
                "basketRequired":"0"
            }
        ]
        
EOT;
    
    
}