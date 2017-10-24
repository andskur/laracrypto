# laracrypto

Add integration between Laravel and cryptocurrency services.

### Installation

`composer require andskur/laracrypto`

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

[Blockchain Wallet API]: https://github.com/blockchain/service-my-wallet-v3