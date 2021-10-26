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
    const PAYMENT_CONFIG_FILE_PATH = __DIR__ . "/../../PaymentConfigFiles/";

    /**
     *  Get a Payment Product item with a code
     *
     * @param string $product_code
     * @return null|PaymentProduct
     */
    public static function getItem($product_code)
    {
        if (file_exists(self::PAYMENT_CONFIG_FILE_PATH . $product_code . ".json")) {
            return new PaymentProduct(
                json_decode(
                    file_get_contents(self::PAYMENT_CONFIG_FILE_PATH . $product_code . ".json"),
                    true
                )
            );
        }

        return null;
    }

    /**
     * @param null|string|array<string> $categories
     * @return PaymentProduct[] Collection of payment products filtered by category
     */
    public static function getItems($categories = null)
    {
        if (!is_null($categories) && !is_array($categories)) {
            $categories = array($categories);
        }

        $collection = array();

        foreach (self::getPaymentMethodsData() as $item) {
            if (!is_null($categories) && !in_array($item['category'], $categories)) {
                continue;
            }

            $collection[] = new PaymentProduct($item);
        }

        return $collection;
    }

    /**
     * Get all payment methods json data from directory
     *
     * @return \Generator<array<mixed>>
     */
    private static function getPaymentMethodsData()
    {
        foreach (scandir(self::PAYMENT_CONFIG_FILE_PATH) as $file) {
            if (preg_match('/(.*)\.json/', $file) == 1) {
                yield json_decode(file_get_contents(self::PAYMENT_CONFIG_FILE_PATH . $file), true);
            }
        }
    }

    /**
     * Reorder payment product by priority for use in hpayment pages
     *
     * @param array<string>|string|null $paymentProductList
     * @return string|null
     */
    public static function orderByPriority($paymentProductList)
    {
        if (!empty($paymentProductList)) {
            $paymentProductArray = explode(',', $paymentProductList);
            $paymentProductDetailsArray = array();

            foreach ($paymentProductArray as $paymentProduct) {
                $paymentProductDetails = self::getItem(trim($paymentProduct));

                if ($paymentProductDetails != null) {
                    $paymentProductDetailsArray[] = $paymentProductDetails;
                } else {
                    $paymentProductDetailsArray[] = new PaymentProduct(array(
                        "productCode" => trim($paymentProduct),
                        "priority" => 99
                    ));
                }
            }

            usort($paymentProductDetailsArray, array(self::class, 'cmpPaymentProduct'));

            return implode(',', array_map(function ($paymentProductDetails) {
                return $paymentProductDetails->getProductCode();
            }, $paymentProductDetailsArray));
        }

        return null;
    }

    /**
     * Compares two payment products by their priority
     * @param PaymentProduct $p1
     * @param PaymentProduct $p2
     * @return int
     */
    private static function cmpPaymentProduct($p1, $p2)
    {
        if ($p1->getPriority() === $p2->getPriority()) {
            return 0;
        }

        return ($p1->getPriority() > $p2->getPriority()) ? +1 : -1;
    }
}
