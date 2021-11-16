<?php

namespace Integration\HiPay\Tests\Fullservice;

use HiPay\Fullservice\Exception\ApiErrorException;
use HiPay\Fullservice\Gateway\Model\Transaction;
use HiPay\Fullservice\Gateway\Request\Info\CustomerShippingInfoRequest;
use HiPay\Fullservice\Gateway\Request\Order\OrderRequest;
use HiPay\Fullservice\Gateway\Request\PaymentMethod\CardTokenPaymentMethod;
use HiPay\TestCase\TestCase;
use HiPay\Fullservice\Gateway\Client\GatewayClient;
use HiPay\Fullservice\HTTP\Configuration\Configuration;
use HiPay\Fullservice\HTTP\SimpleHTTPClient;

class GatewayTest extends TestCase
{
    public function testNewOrderAlreadyPaid()
    {
        $configuration = new Configuration(
            array(
                "apiUsername" => $_ENV['STAGE_API_LOGIN'],
                "apiPassword" => $_ENV['STAGE_API_PASSWORD'],
                "apiEnv" => Configuration::API_ENV_STAGE
            )
        );

        $this->assertInstanceOf(Configuration::class, $configuration);

        $clientProvider = new SimpleHTTPClient($configuration);

        $this->assertInstanceOf(SimpleHTTPClient::class, $clientProvider);

        $gatewayClient = new GatewayClient($clientProvider);

        $this->assertInstanceOf(GatewayClient::class, $gatewayClient);

        $orderRequest = new OrderRequest();

        $this->assertInstanceOf(OrderRequest::class, $orderRequest);

        $orderRequest->orderid = "ORDER #123456";
        $orderRequest->operation = "Sale";
        $orderRequest->payment_product = "visa";
        $orderRequest->description = "ref_85";
        $orderRequest->currency = "EUR";
        $orderRequest->amount = "21.60";
        $orderRequest->shipping = "0.00";
        $orderRequest->tax = "3.6";
        $orderRequest->cid = null;
        $orderRequest->ipaddr = "172.20.0.1";
        $orderRequest->accept_url = "http:/www.my-shop.fr/checkout/accept";
        $orderRequest->decline_url = "http:/www.my-shop.fr/checkout/decline";
        $orderRequest->pending_url = "http:/www.my-shop.fr/checkout/pending";
        $orderRequest->exception_url = "http:/www.my-shop.fr/checkout/exeception";
        $orderRequest->cancel_url = "http:/www.my-shop.fr/checkout/cancel";
        $orderRequest->http_accept = "*/*";
        $orderRequest->http_user_agent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36";
        $orderRequest->language = "en_US";
        $orderRequest->custom_data = "{\"shipping_description\":\"Flat rate\",\"payment_code\":\"visa\",\"display_iframe\":0}";

        $paymentMethod = new CardTokenPaymentMethod();

        $this->assertInstanceOf(CardTokenPaymentMethod::class, $paymentMethod);

        $paymentMethod->cardtoken = "61f92d7a135db52dbd583b2aad208e73978196392357f674bacf39f549042f14";
        $paymentMethod->eci = 7;
        $paymentMethod->authentication_indicator = 0;

        $orderRequest->paymentMethod = $paymentMethod;

        $customerShippingInfo = new CustomerShippingInfoRequest();

        $this->assertInstanceOf(CustomerShippingInfoRequest::class, $customerShippingInfo);

        $customerShippingInfo->shipto_firstname = "Jane";
        $customerShippingInfo->shipto_lastname = "Doe";
        $customerShippingInfo->shipto_streetaddress = "56 avenue de la paix";
        $customerShippingInfo->shipto_streetaddress2 = "";
        $customerShippingInfo->shipto_city = "Paris";
        $customerShippingInfo->shipto_state = "";
        $customerShippingInfo->shipto_zipcode = "75000";
        $customerShippingInfo->shipto_country = "FR";
        $customerShippingInfo->shipto_phone = "0130811322";
        $customerShippingInfo->shipto_msisdn = "0600000000";
        $customerShippingInfo->shipto_gender = "M";

        $orderRequest->customerShippingInfo = $customerShippingInfo;

        $this->expectException(ApiErrorException::class);
        $this->expectExceptionMessage("This order has already been paid");

        $transaction = $gatewayClient->requestNewOrder($orderRequest);

        $this->assertInstanceOf(Transaction::class, $transaction);
    }
}