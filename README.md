# laracrypto

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

Add integration between Laravel and cryptocurrency services.

## Structure

```
src/
tests/
vendor/
```

## Install

Via Composer

``` bash
$ composer require andskur/laracrypto
```

### Usage

First you'll need to set up your configuration using your `.env` file.

The available items are as follows:

Item               | Description
------------------ | --------------
`BLOCKCHAIN_GUID`  | The GUID of your wallet.
`BLOCKCHAIN_PASS`  | The password for accessing your local API.
`BLOCKCHAIN_API`   | _Deprecated_
`BLOCKCHAIN_PASS2` | _Deprecated_

### Currencies

**Bitcoin**

The Bitcoin interface utilises the [Blockchain Wallet API].

This will need to be running using the port specified in your laracrypto config.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Credits

- [andskur][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[Blockchain Wallet API]: https://github.com/blockchain/service-my-wallet-v3

[ico-version]: https://img.shields.io/packagist/v/andskur/laracrypto.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/andskur/laracrypto.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/andskur/laracrypto
[link-code-quality]: https://codecov.io/gh/andskur/laracrypto
[link-downloads]: https://packagist.org/packages/andskur/laracrypto
[link-author]: https://github.com/andskur
[link-contributors]: ../../contributors
