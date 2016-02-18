# hipay-fullservice-sdk-php

[![Circle CI](https://circleci.com/gh/hipay/hipay-fullservice-sdk-php.svg?style=svg&circle-token=65d5d22b23e308ffc54b2884809b7b871a41bc8e)](https://circleci.com/gh/hipay/hipay-fullservice-sdk-php)


## Requirements

#### PHP

Require php 5.3.0 minimum.

## How to use

You need to instanciate 4 objects to make a request:  

- A configuration object who implements [ConfigurationInterface](lib/Hipay/Fullservice/HTTP/Configuration/ConfigurationInterface.php)
- A client provider inherit from abstract class [\Hipay\Fullservice\HTTP\ClientProvider](lib/Hipay/Fullservice/HTTP/ClientProvider.php)
- A [SecureVault](lib/Hipay/Fullservice/SecureVault/Client/SecureVaultClient.php) or [Gateway](lib/Hipay/Fullservice/Gateway/Client/GatewayClient.php) client 

#### Gateway example:

```php
//Create configuration object
$config = new \Hipay\Fullservice\HTTP\Configuration\Configuration("username","password");

//Instanciate client Provider with configuration object
$clientProvider = new \Hipay\Fullservice\HTTP\SimpleHTTPClient($config);

//Finally create your gateway client
$gatewayClient = new \Hipay\Fullservice\Gateway\Client\GatewayClient($clientProvider);

//Object request
$orderRequest = new \Hipay\Fullservice\Gateway\Request\Order\OrderRequest();
$orderRequest->orderid = "123456";
$orderRequest->operation = "Sale";
//etc ...

//Do a request
$gatewayClient->requestNewOrder($orderRequest);

```

#### Secure Vault example:

```php
//Create configuration object
$config = new \Hipay\Fullservice\HTTP\Configuration\Configuration("username","password");

//Instanciate client Provider with configuration object
$clientProvider = new \Hipay\Fullservice\HTTP\SimpleHTTPClient($config);

//Finally create your gateway client
$vaultClient = new \Hipay\Fullservice\SecureVault\Client\SecureVaultClient($clientProvider);

//Object request
$generateTokenRequest = new \Hipay\Fullservice\SecureVault\Request\GenerateTokenRequest();
$generateTokenRequest->card_number = "4111111111111111";
$generateTokenRequest->card_expiry_month = "02";
$generateTokenRequest->card_expiry_year = "2017";
//etc ...

//Do a request
$vaultClient->requestGenerateToken($generateTokenRequest);

```


