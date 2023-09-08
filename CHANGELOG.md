# Changelog

## 2.15.0

- [add]: Add `soft_descriptor` property to Order Requests
- [add]: Add internal `data_id` property

## Version 2.14.1

- [fix]: fix tag

## Version 2.14.0

- [add]: Add display_cancel_button property

## Version 2.13.0

- [fix]: Fixed `basket` element in `transaction` object
- [add]: Add Hosted Page to demo page

## Version 2.12.4

- [fix]: Fixed `reference_to_pay` field in `Transaction` class
- [fix]: Fixed partial capture for `Alma` methods as unavailable

## Version 2.12.3

- [fix]: Fixed composer.json

## Version 2.12.2

- [fix]: Removed partial capture for Alma 3x and 4x payment means

## Version 2.12.0

- [add]: Remove support for PHP 5.x --> Minimum supported version is now **7.2**
- [add]: Added support for new payment means:
  - Alma 3x
  - Alma 4x

## Version 2.11.5

- [fix]: Fixed issues with PHP 8.2

## Version 2.11.4

- [fix]: PhpDoc correction. Thanks to [VincentLanglet](https://github.com/VincentLanglet) on [#61](https://github.com/hipay/hipay-fullservice-sdk-php/pull/61)

## Version 2.11.3

- [fix]: disabled refund partially for przelewy24

## Version 2.11.2

- [add]: add expiration limit method payment

## Version 2.11.1

- [add]: fix model parameters with number in the name

## Version 2.11.0

- [add]: Comparison of signatures decorated with global variables

## Version 2.10.0

- [add]: Added **Bancontact Credit Card / QR code** payment method

## Version 2.9.2

- [fix]: Added MB Way mandatory controls

## Version 2.9.1

- [fix]: qualimetry and tests

## Version 2.9.0

- [change]: improvement on qualimetry

## Version 2.8.4

- [fix]: Fixed DSP2 field names in OrderRequest

## Version 2.8.3

- [fix]: Timeout for OrderRequest
- [change]: payment product configuration for:
  - Oney 3xcb, 4xcb fees/no-fees
  - Oney Credit Long

## Version 2.8.2

- [fix]: Double constructor for cart's item
- [fix]: Error on request parameters serialization

## Version 2.8.1

- **Fix**: PHP compatibility [#46](https://github.com/hipay/hipay-fullservice-sdk-php/issues/46)
- **Fix**: toArray() method to be recursive [#50](https://github.com/hipay/hipay-fullservice-sdk-php/issues/50)

## Version 2.8.0

- **Add** HostedPage v2 endpoint API
- **Add** Configuration parameter to enable HostedPage v2

## Version 2.7.0

- **Add** Oney Credit Long payment product
- **Change** payment product configuration for:
  - Oney 3xcb, 4xcb
  - Illicado

## Version 2.6.0

- **Add** Illicado payment product on hosted fields
- **Add** MB Way payment product on hosted fields
- **Fix**: errors processing on API Maintenance

## Version 2.5.3

- Add promotion parameter for oney 3x and 4x no fees payment methods

## Version 2.5.2

- Fix: Internal cURL Request

## Version 2.5.1

- Fix: Internal data for CMS

## Version 2.5.0

- Add support for Multibanco

## Version 2.4.2

- Add new status "Cancellation authorization requested" (275) in TransactionStatus enum

## Version 2.4.1

- Fix: Missing field in payment method config file

## Version 2.4.0

- Add configuration option for payment product sorting
- Add priority reordering for payment product on hosted page request
- Add custom API URL

## Version 2.3.1

- Fix: delete scalar type hint (PHP7.1 and less backward compatibility)

## Version 2.3.0

- Add support for 3dsv2 information (PSD2)
- Add CURLOPT_CONNECTTIMEOUT and CURLOPT_TIMEOUT in configuration [#43](https://github.com/hipay/hipay-fullservice-sdk-php/issues/43)
- Add monitoring data
- Fix: update model for requestLookupToken [#44](https://github.com/hipay/hipay-fullservice-sdk-php/issues/44)

## Version 2.2.1

- Add toArray method to PaymentProduct
- Fix: typo and code formatting

## Version 2.2.0

- Update payment product collection

## Version 2.1.0

- Add payment token lookup method

## Version 2.0.1

- Add transaction mapper for custom data

## Version 2.0.0

- Remove Tokenization
- Fix: toJson method

## Version 1.10.1

- Fix of amount which is not a float type in api maintenance

## Version 1.10.0

- [#39](https://github.com/hipay/hipay-fullservice-sdk-php/pull/39) Merge pull request #39 (#39)
- [#38](https://github.com/hipay/hipay-fullservice-sdk-php/issues/38) Fix issue #38 (#38)

## Version 1.9.0

- Add proxy support to Curl request

## Version 1.8.0

- [#35](https://github.com/hipay/hipay-fullservice-sdk-php/pull/35) Fix issue #34 (#35)
- [#33](https://github.com/hipay/hipay-fullservice-sdk-php/pull/33) Add Notification Url (#33)
- [#32](https://github.com/hipay/hipay-fullservice-sdk-php/pull/32) Add security settings api call & Change signature helper (#32)

## Version 1.7.0

- [#31](https://github.com/hipay/hipay-fullservice-sdk-php/pull/31) Add multi_use field for Hpayment (#31)

## Version 1.6.1

- [#27](https://github.com/hipay/hipay-fullservice-sdk-php/pull/27) Fixes Undefined index: msisdn (#27) (@legithubdeaymeric)

## Version 1.6.0

- [#26](https://github.com/hipay/hipay-fullservice-sdk-php/pull/26) Add time_limit_to_pay in HostedPaymentPageRequest (#26) (@legithubdeaymeric)
- [#25](https://github.com/hipay/hipay-fullservice-sdk-php/pull/25) Remove CDATA parameters ( Use custom_data now )(#25) (@legithubdeaymeric)

## Version 1.5.1

- Fix : Invert payment method and billing adress in OrderRequest

## Version 1.5.0

New - Operation response in transaction object (id, reference...)
New - Basket in transaction object
New - Add translation in category collection

## Version 1.4.0

New - Add new fields for 3x/4x payment

## Version 1.3.0

New - Add 2 methods to get transaction details + order's transactions
New - Improvements for support of basket in Order and Maintenance Request
Fix circle CI
Fix order transaction info with single transaction response

## Version 1.2.1

Fix - Get order transaction info with single transaction response

## Version 1.2.0

New - Add 2 methods to get transaction details + order's transactions
Fix - Delete git index .idea and composer.lock
Fix - PHPUNIT for CircleCI
Fix - PHPDoc return tags

## Version 1.1.3

Fix - Set request_id parameter optional, add to end point url and set curl post parameters only for POST method

## Version 1.1.2

New optional vault param generate_request_id when creating a token
Fix - missing response fields (domesticNetwork + requestId)

## Version 1.1.1

Update documentation URL to the HiPay portal developer

## Version 1.1.0

Adds a _transaction reference_ getter in the `Transaction` model class

## Version 1.0.4

Fix - update the name of the const MANUALLY_KEYED_CARD_PRESENT in ECI class

## Version 1.0.3

Update version sdk for PHP in composer.json

## Version 1.0.2

## Version 1.0.1

update circle.yml for version PHP

## Version 1.0.0

First version of the HiPay Fullservice SDK for PHP
