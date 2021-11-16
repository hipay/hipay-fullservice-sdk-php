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

use HiPay\Fullservice\Data\DeliveryMethod;

/**
 * Delivery collection
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
     * @return DeliveryMethod[] Collection of Category
     */
    public static function getItems()
    {
        $jsonArr = json_decode(self::$_JSON, true);
        $collection = array();
        foreach ($jsonArr as $item) {
            $collection[] = new DeliveryMethod(
                $item['code'],
                $item['mode'],
                $item['shipping']
            );
        }

        return $collection;
    }

    /**
     * @var string $_JSON Json collection
     */
    private static $_JSON = <<<EOT
    
        [
            {
                "code":1,
                "mode":"STORE",
                "shipping":"STANDARD"
            },
            {
                "code":2,
                "mode":"STORE",
                "shipping":"EXPRESS"
            },
            {
                "code":3,
                "mode":"STORE",
                "shipping":"PRIORITY24H"
            },
            {
                "code":4,
                "mode":"STORE",
                "shipping":"PRIORITY2H"
            },
            {
                "code":5,
                "mode":"STORE",
                "shipping":"PRIORITY1H"
            },
            {
                "code":6,
                "mode":"STORE",
                "shipping":"INSTANT"
            },
            {
                "code":7,
                "mode":"CARRIER",
                "shipping":"STANDARD"
            },
            {
                "code":8,
                "mode":"CARRIER",
                "shipping":"EXPRESS"
            },
            {
                "code":9,
                "mode":"CARRIER",
                "shipping":"PRIORITY24H"
            },
            {
                "code":10,
                "mode":"CARRIER",
                "shipping":"PRIORITY2H"
            },
            {
                "code":11,
                "mode":"STORE",
                "shipping":"PRIORITY1H"
            },
            {
                "code":12,
                "mode":"CARRIER",
                "shipping":"INSTANT"
            },
            {
                "code":13,
                "mode":"RELAYPOINT",
                "shipping":"STANDARD"
            },
            {
                "code":14,
                "mode":"RELAYPOINT",
                "shipping":"EXPRESS"
            },
            {
                "code":15,
                "mode":"RELAYPOINT",
                "shipping":"PRIORITY24H"
            },
            {
                "code":16,
                "mode":"RELAYPOINT",
                "shipping":"PRIORITY2H"
            },
            {
                "code":17,
                "mode":"RELAYPOINT",
                "shipping":"PRIORITY1H"
            },
            {
                "code":18,
                "mode":"RELAYPOINT",
                "shipping":"INSTANT"
            },
            {
                "code":19,
                "mode":"ELECTRONIC",
                "shipping":"STANDARD"
            },
            {
                "code":20,
                "mode":"ELECTRONIC",
                "shipping":"EXPRESS"
            },
            {
                "code":21,
                "mode":"ELECTRONIC",
                "shipping":"PRIORITY24H"
            },
            {
                "code":22,
                "mode":"ELECTRONIC",
                "shipping":"PRIORITY2H"
            },
            {
                "code":23,
                "mode":"ELECTRONIC",
                "shipping":"PRIORITY1H"
            },
            {
                "code":24,
                "mode":"ELECTRONIC",
                "shipping":"INSTANT"
            },
            {
                "code":25,
                "mode":"TRAVEL",
                "shipping":"STANDARD"
            },
            {
                "code":26,
                "mode":"TRAVEL",
                "shipping":"EXPRESS"
            },
            {
                "code":27,
                "mode":"TRAVEL",
                "shipping":"PRIORITY24H"
            },
            {
                "code":28,
                "mode":"TRAVEL",
                "shipping":"PRIORITY1H"
            },
            {
                "code":29,
                "mode":"TRAVEL",
                "shipping":"INSTANT"
            }
        ]
        
EOT;
}
