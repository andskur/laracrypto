# laracrypto

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
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

**Bitcoin**

The Bitcoin interface utilises the [Blockchain Wallet API].

This will need to be running using the port specified in your laracrypto config.

Item               | Description
------------------ | --------------
`BLOCKCHAIN_GUID`  | The GUID of your wallet.
`BLOCKCHAIN_PASS`  | The password for accessing your local API.
`BLOCKCHAIN_API`   | _Deprecated_
`BLOCKCHAIN_PASS2` | _Deprecated_

**Ethereum**

The Ethereum interface utilises the [Ethereum JSON-RPC API].

This will need to be running using the port specified in your laracrypto config.

Item               | Description
------------------ | --------------
`ETHEREUM_URI`     | The base URI that the RPC is running on.
`ETHEREUM_PORT`    | The port that the RPC is running on.

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

The MIT License (MIT). Please see [License File](LICENSE) for more information.

[Blockchain Wallet API]: https://github.com/blockchain/service-my-wallet-v3
[Ethereum JSON-RPC API]: https://github.com/ethereum/wiki/wiki/JSON-RPC

[ico-version]: https://img.shields.io/packagist/v/andskur/laracrypto.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/andskur/laracrypto.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/andskur/laracrypto
[link-code-quality]: https://codecov.io/gh/andskur/laracrypto
[link-downloads]: https://packagist.org/packages/andskur/laracrypto
[link-author]: https://github.com/andskur
[link-contributors]: ../../contributors
