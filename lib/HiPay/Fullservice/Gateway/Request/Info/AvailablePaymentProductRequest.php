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

namespace HiPay\Fullservice\Gateway\Request\Info;

use HiPay\Fullservice\Request\AbstractRequest;

/**
 * AvailablePaymentProductRequest class.
 *
 * @package HiPay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class AvailablePaymentProductRequest extends AbstractRequest
{
    /**
     * @var array<string> $operation Transaction types
     */
    public $operation = ['4'];

    /**
     * @var array<string> $payment_product The payment products
     */
    public $payment_product = [];

    /**
     * @var array<string> $eci Electronic Commerce Indicators (ECI)
     */
    public $eci = ['7'];

    /**
     * @var bool $with_options Whether to include additional options in the response
     */
    public $with_options = false;

    /**
     * @var array<string> $customer_country The country codes of the customer (ISO 3166-1 alpha-2)
     */
    public $customer_country = [];

    /**
     * @var array<string> $currency Base currencies for this request. These three-character currency codes comply with ISO 4217.
     */
    public $currency = [];

    /**
     * @var array<string> $payment_product_category The payment product categories
     */
    public $payment_product_category = [];

    /**
     * AvailablePaymentProductRequest constructor.
     *
     * @param array<string> $payment_product
     * @param bool $with_options
     * @param array<string> $currency
     * @param array<string> $customer_country
     * @param array<string> $payment_product_category
     * @param array<string> $eci
     * @param array<string> $operation
     */
    public function __construct(
        $payment_product = [],
        $with_options = false,
        $currency = [],
        $customer_country = [],
        $payment_product_category = [],
        $eci = ['7'],
        $operation = ['4']
    ) {
        $this->payment_product = $payment_product;
        $this->with_options = $with_options;
        $this->operation = $operation;
        $this->eci = $eci;
        $this->customer_country = $customer_country;
        $this->currency = $currency;
        $this->payment_product_category = $payment_product_category;
    }

    /**
     * Convert the request to a query string
     *
     * @return string
     */
    public function toQueryString()
    {
        $params = [
            'operation' => $this->operation,
            'payment_product' => $this->payment_product,
            'eci' => $this->eci,
            'with_options' => $this->with_options ? 'true' : 'false',
            'customer_country' => $this->customer_country,
            'currency' => $this->currency,
            'payment_product_category' => $this->payment_product_category,
        ];

        // Remove empty values and convert non-empty arrays to comma-separated strings
        $filteredParams = array_filter($params, function ($value) {
            return !empty($value);
        });

        $stringParams = array_map(function ($value) {
            return is_array($value) ? implode(',', $value) : $value;
        }, $filteredParams);

        return http_build_query($stringParams);
    }
}
