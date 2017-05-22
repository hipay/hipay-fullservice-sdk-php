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
 * @copyright      Copyright (c) 2017 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */

namespace HiPay\Fullservice\Data\Category;

use HiPay\Fullservice\Data\Category;

/**
 * Categories collection
 *
 * Collection loaded with Json content
 *
 * @package HiPay\Fullservice
 * @author Aymeric Berthelot <aberthelot@hipay.com>
 * @copyright Copyright (c) 2017 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class Collection
{

    /**
     *
     * @var string $_JSON Json collection
     */
    private static $_JSON = <<<EOT
    
        [
            {
                "categoryCode":1,
                "categoryName":"Home & Gardening"
            },
            {
                "categoryCode":2,
                "categoryName":"Clothing & Accessories"
            },
            {
                "categoryCode":3,
                "categoryName":"Home appliances"
            },
            {
                "categoryCode":4,
                "categoryName":"Sports & Recreations"
            },
            {
                "categoryCode":5,
                "categoryName":"Babies & Children"
            },
            {
                "categoryCode":6,
                "categoryName":"Hi-Fi, Photo & Video equipment"
            },
            {
                "categoryCode":7,
                "categoryName":"IT equipment"
            },
            {
                "categoryCode":8,
                "categoryName":"Phone & Internet services"
            },
            {
                "categoryCode":9,
                "categoryName":"Physical goods : Books, Media, Music & Movies"
            },
            {
                "categoryCode":10,
                "categoryName":"Digital goods : Books, Media, Music & Movies"
            },
             {
                "categoryCode":11,
                "categoryName":"Consoles & Video games"
            },
             {
                "categoryCode":12,
                "categoryName":"Gifts & Flowers"
            },
             {
                "categoryCode":13,
                "categoryName":"Health & Beauty"
            },
             {
                "categoryCode":14,
                "categoryName":"Car & Motorcycle"
            },
             {
               "categoryCode":15,
               "categoryName":"Traveling"
            },
             {
               "categoryCode":16,
               "categoryName":"Food & Gastronomy"
            },
             {
               "categoryCode":17,
               "categoryName":"Auctions & Group buying"
            },
             {
               "categoryCode":18,
               "categoryName":"Services to professionals"
            },
             {
               "categoryCode":19,
               "categoryName":"Services to individuals"
            },
             {
               "categoryCode":20,
               "categoryName":"Culture & Entertainment"
            },
            {
               "categoryCode":21,
               "categoryName":"Games (digital goods)"
            },
            {
               "categoryCode":22,
               "categoryName":"Games (physical goods)"
            },
            {
               "categoryCode":23,
               "categoryName":"Ticketing"
            },
            {
               "categoryCode":24,
               "categoryName":"Opticians, Opticians Goods and Eyeglasses"               
            }
        ]
        
EOT;

    /**
     * @return Category[] Collection of Categrory
     */
    public static function getItems()
    {
        $jsonArr = json_decode(self::$_JSON, true);
        $collection = array();
        foreach ($jsonArr as $item) {
            $collection[] = new Category($item['categoryCode'],
                $item['categoryName']);
        }

        return $collection;
    }


}