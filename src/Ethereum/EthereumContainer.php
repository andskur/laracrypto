<?php

namespace Andskur\Laracrypto\Ethereum;

use GuzzleHttp\Client;

/**
 * Class EthereumContainer.
 */
class EthereumContainer
{
    /**
     * @var int
     */
    private $port;
    /**
     * @var string
     */
    private $uri;

    /**
     * Construct Ethereum RPC access from config file.
     */
    public function __construct()
    {
        $this->port = config('laracrypto.ethereum.port');
        $this->uri = config('laracrypto.ethereum.uri').':'.$this->port;
    }

    /**
     * Retrieve the JSON response from the RPC client.
     *
     * @param string $method
     * @param array  $params
     *
     * @return mixed
     */
    private function getJson($method, $params)
    {
        $client = new Client([
            'base_uri' => $this->uri,
        ]);

        $data = $client->post(
            '',
            [
                'jsonrpc' => 2.0,
                'method'  => $method,
                'params'  => $params,
            ]
        );

        return \GuzzleHttp\json_decode(
            $data->getBody()
                 ->getContents()
        );
    }

    /**
     * List of all wallet addresses.
     *
     * @return mixed
     */
    public function addresses()
    {
        $results = $this->getJson(
            'eth_accounts',
            null
        );

        return $results->result;
    }

    /**
     * Check a single address' balance.
     *
     * @param string $address
     * @param string $tag
     *
     * @return mixed
     */
    public function addressBalance($address, $tag = 'latest')
    {
        $results = $this->getJson(
            'eth_getBalance',
            [
                $address,
                $tag,
            ]
        );

        return $results->result;
    }

    /**
     * Generate a new address.
     *
     * @param string $passphrase
     *
     * @return mixed
     */
    public function newAddress($passphrase)
    {
        $results = $this->getJson(
            'personal_newAccount',
            [
                $passphrase,
            ]
        );

        return $results->result;
    }

    /**
     * Lock address.
     *
     * @param string $address
     *
     * @return mixed
     */
    public function lockAddress($address)
    {
        $results = $this->getJson(
            'personal_lockAccount',
            [
                $address,
            ]
        );

        return $results->result;
    }

    /**
     * Unlock address.
     *
     * @param string $address
     * @param string $passphrase
     * @param int    $duration
     *
     * @return mixed
     */
    public function unlockAddress($address, $passphrase, $duration = 300)
    {
        $results = $this->getJson(
            'personal_unlockAccount',
            [
                $address,
                $passphrase,
                $duration,
            ]
        );

        return $results->result;
    }

    /**
     * Send payment.
     *
     * @param string      $to_address
     * @param string|null $value
     * @param string      $from_address
     * @param string|null $gas
     * @param string|null $gasPrice
     * @param string|null $data
     *
     * @return mixed
     */
    public function send(
        $to_address,
        $value,
        $from_address,
        $gas = null,
        $gasPrice = null,
        $data = null
    ) {
        $transactionData = [
            'to'       => $to_address,
            'value'    => $value,
            'from'     => $from_address,
            'gas'      => $gas,
            'gasPrice' => $gasPrice,
            'data'     => $data,
        ];

        $results = $this->getJson(
            'eth_sendTransaction',
            [
                $transactionData,
            ]
        );

        return $results->result;
    }
}
