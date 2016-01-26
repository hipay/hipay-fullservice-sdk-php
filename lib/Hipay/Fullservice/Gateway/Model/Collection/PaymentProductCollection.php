<?php
/*
 * Hipay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - Hipay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace Hipay\Fullservice\Gateway\Model\Collection;

use Hipay\Fullservice\Model\AbstractModel;
use Hipay\Fullservice\Gateway\Model\PaymentProduct;

/**
 * Payment product model collection
 * 
 * Collection loaded with Json content
 * 
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class PaymentProductCollection extends AbstractModel
{
    /**
     * @return PaymentProduct[] Collection of payment products available
     */
    public static function getItems(){
        $jsonArr = json_decode(self::_JSON);
        $collection = array();
        foreach ($jsonArr as $item){
            $collection[] = new PaymentProduct($item['productCode'],
                                                $item['brandName'],
                                                $item['can3ds'],
                                                $item['canRefund'],
                                                $item['canRecurring'],
                                                $item['category'],
                                                $item['comment']);
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
                "comment":""
            },
            {
                "productCode":"cb",
                "brandName":"Carte Bancaire",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"1",
                "category":"credit-card",
                "comment":"Accepted cards: Visa, MasterCard. Available only in France."
            },
            {
                "productCode":"mastercard",
                "brandName":"MasterCard",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"1",
                "category":"credit-card",
                "comment":""
            },
            {
                "productCode":"visa",
                "brandName":"Visa",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"1",
                "category":"credit-card",
                "comment":""
            },
            {
                "productCode":"3xcb",
                "brandName":"3x Carte Bancaire",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"credit-card",
                "comment":"Available only in France."
            },
            {
                "productCode":"4xcb",
                "brandName":"4x Carte Bancaire",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"credit-card",
                "comment":"Available only in France."
            },
            {
                "productCode":"3xcb-no-fees",
                "brandName":"3x Carte Bancaire sans frais",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"credit-card",
                "comment":"Available only in France."
            },
            {
                "productCode":"4xcb-no-fees",
                "brandName":"4x Carte Bancaire sans frais",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"credit-card",
                "comment":"Available only in France."
            },
            {
                "productCode":"bcmc",
                "brandName":"Bancontact / Mister Cash",
                "can3ds":"1",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"debit-card",
                "comment":"Available only in Belgium."
            },
            {
                "productCode":"maestro",
                "brandName":"Maestro",
                "can3ds":"1",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"debit-card",
                "comment":""
            },
             {
                "productCode":"bank-transfert",
                "brandName":"TrustPay Banking",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":""
            },
             {
                "productCode":"dexia-directnet",
                "brandName":"Belfius Direct Net",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":""
            },
             {
                "productCode":"giropay",
                "brandName":"Giropay",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in Germany."
            },
             {
                "productCode":"ideal",
                "brandName":"IDEAL",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":""
            },
             {
                "productCode":"klarna",
                "brandName":"Klarna",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":""
            },
             {
                "productCode":"przelewy24",
                "brandName":"Przelewy24",
                "can3ds":"0",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Available only in PLN currency."
            },
             {
                "productCode":"sisal",
                "brandName":"Sisal",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":"Max amount 1000 EUR."
            },
             {
                "productCode":"sofort-uberweisung",
                "brandName":"Sofort Überweisung",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"realtime-banking",
                "comment":""
            },
             {
                "productCode":"sdd",
                "brandName":"SEPA Direct Debit",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"1",
                "category":"realtime-banking",
                "comment":""
            },
             {
                "productCode":"qiwi-wallet",
                "brandName":"VISA QIWI Wallet",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"ewallet",
                "comment":"Available only in RUB currency."
            },
            {
                "productCode":"webmoney-transfert",
                "brandName":"WebMoney Transfer",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"ewallet",
                "comment":"Available only in RUB currency."
            },
            {
                "productCode":"yandex",
                "brandName":"Yandex Money",
                "can3ds":"0",
                "canRefund":"0",
                "canRecurring":"0",
                "category":"ewallet",
                "comment":"Available only in RUB currency."
            },
            {
                "productCode":"paypal",
                "brandName":"Paypal",
                "can3ds":"0",
                "canRefund":"1",
                "canRecurring":"0",
                "category":"ewallet",
                "comment":""
            }
        ]
        
EOT;
    
    
}