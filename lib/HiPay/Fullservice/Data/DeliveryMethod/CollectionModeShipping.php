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

namespace HiPay\Fullservice\Data\DeliveryMethod;

use HiPay\Fullservice\Data\DeliveryMethodAttribute;

/**
 * Delivery collection
 *
 * Collection loaded with Json content
 *
 * @package HiPay\Fullservice
 * @author Etienne Landais <elandais@hipay.com>
 * @copyright Copyright (c) 2017 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class CollectionModeShipping {

    /**
     * @return DeliveryMode[] and DeliveryShipping[] Collection 
     */
    public static function getItems() {

        $jsonModeArr = json_decode(self::$_JSON_MODE, true);
        $jsonShippingArr = json_decode(self::$_JSON_SHIPPING, true);
        $collection = array();

        foreach ($jsonModeArr as $item) {
            $collection["mode"][] = new DeliveryMethodAttribute($item['code'], $item['displayName']);
        }

        foreach ($jsonShippingArr as $item) {
            $collection["shipping"][] = new DeliveryMethodAttribute($item['code'], $item['displayName']);
        }

        return $collection;
    }

    /**
     *
     * @var string $_JSON Json collection
     */
    private static $_JSON_MODE = <<<EOT
    
        [
            {
                "code":"STORE",
                "displayName": {
                    "EN" : "store",
                    "FR" : "boutique"
                }
            },
            {
                "code":"CARRIER",
                "displayName": {
                    "EN" : "carrier",
                    "FR" : "transporteur"
                }
            },
            {
                "code":"RELAYPOINT",
                "displayName": {
                    "EN" : "relay point",
                    "FR" : "point relai"
                }
            },
            {
                "code":"ELECTRONIC",
                "displayName": {
                    "EN" : "electronic",
                    "FR" : "electronique"
                }
            },
            {
                "code":"TRAVEL",
                "displayName": {
                    "EN" : "travel",
                    "FR" : "voyage"
                }
            }
        ]
        
EOT;
    

    /**
     *
     * @var string $_JSON Json collection
     */
    private static $_JSON_SHIPPING = <<<EOT
    
        [
            {
                "code":"STANDARD",
                "displayName": {
                    "EN" : "standard",
                    "FR" : "standard"
                }
            },
            {
                "code":"EXPRESS",
                "displayName": {
                    "EN" : "express",
                    "FR" : "express"
                }
            },
            {
                "code":"PRIORITY24H",
                "displayName": {
                    "EN" : "priority 24H",
                    "FR" : "priorité 24H"
                }
            },
            {
                "code":"PRIORITY2H",
                "displayName": {
                    "EN" : "priority 2H",
                    "FR" : "priorité 2H"
                }
            },
            {
                "code":"PRIORITY1H",
                "displayName": {
                    "EN" : "priority 1H",
                    "FR" : "priorité 1H"
                }
            },
            {
                "code":"INSTANT",
                "displayName": {
                    "EN" : "instant",
                    "FR" : "instantané"
                }
            }
        ]
        
EOT;

}
