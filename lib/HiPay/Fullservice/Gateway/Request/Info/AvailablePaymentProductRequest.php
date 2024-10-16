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
     * @var string $operation Transaction type
     * @required
     */
    public $operation = '4';

    /**
     * @var string $payment_product The payment product (e.g., alma-3x)
     */
    public $payment_product;

    /**
     * @var string $eci Electronic Commerce Indicator (ECI)
     */
    public $eci = '7';

    /**
     * @var bool $with_options Whether to include additional options in the response
     */
    public $with_options = false;

    /**
     * @var string $customer_country The country code of the customer (ISO 3166-1 alpha-2)
     */
    public $customer_country;

    /**
     * @var string $currency Base currency for this request. This three-character currency code complies with ISO 4217.
     */
    public $currency;

    /**
     * AvailablePaymentProductRequest constructor.
     *
     * @param string $payment_product
     * @param bool $with_options
     * @param string $eci
     * @param string $operation
     * @param string $customer_country
     * @param string $currency
     */
    public function __construct(
        $payment_product = '',
        $with_options = false,
        $currency = '',
        $customer_country = '',
        $eci = '7',
        $operation = '4'
    ) {
        $this->payment_product = $payment_product;
        $this->with_options = $with_options;
        $this->operation = $operation;
        $this->eci = $eci;
        $this->customer_country = $customer_country;
        $this->currency = $currency;
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
        ];

        // Remove null values and empty strings
        $filteredParams = array_filter($params, function ($value) {
            return !empty($value);
        });

        return http_build_query($filteredParams);
    }
}
