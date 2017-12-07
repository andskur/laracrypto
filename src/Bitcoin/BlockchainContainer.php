<?php

namespace Andskur\Laracrypto\Bitcoin;

/**
 * Class BlockchainContainer.
 */
class BlockchainContainer
{
    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    private $guid;
    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    private $api;
    /**
     * @var string
     */
    private $pass;
    /**
     * @var string
     */
    private $url = 'http://localhost:3000/merchant/';

    /**
     * Construct Blockchain access from config file.
     */
    public function __construct()
    {
        $this->guid = config('laracrypto.blockchain.guid');
        $this->api = config('laracrypto.blockchain.api');
        $this->pass = '?password='.config('laracrypto.blockchain.pass');
        $this->url = $this->url.$this->guid;
    }

    /**
     * @param $endpoint
     *
     * @return mixed json response
     */
    private function getJson($endpoint)
    {
        $json_url = $this->url.$endpoint;
        $json_data = file_get_contents($json_url);
        $json_feed = json_decode($json_data);

        return $json_feed;
    }

    /**
     * Check Full Balance.
     *
     * @return mixed
     */
    public function balance()
    {
        $endpoint = '/balance'.$this->pass;
        $results = $this->getJson($endpoint);

        return $results->balance;
    }

    /**
     * List of all wallet addresses.
     *
     * @return mixed
     */
    public function addresses()
    {
        $endpoint = '/list'.$this->pass;
        $results = $this->getJson($endpoint);

        return $results;
    }

    /**
     * Check address balamce.
     *
     * @param $address
     *
     * @return mixed
     */
    public function addressBalance($address)
    {
        $endpoint = '/address_balance'.$this->pass.'&address='.$address;
        $results = $this->getJson($endpoint);

        return $results->balance;
    }

    /**
     * Generate new address.
     *
     * @param $label
     *
     * @return mixed
     */
    public function newAddress($label)
    {
        $endpoint = '/new_address'.$this->pass.'&label='.$label;
        $results = $this->getJson($endpoint);

        return $results;
    }

    /**
     * Archive address.
     *
     * @param $address
     */
    public function archiveAddress($address)
    {
        $endpoint = '/archive_address'.$this->pass.'&address='.$address;
        $results = $this->getJson($endpoint);
    }

    /**
     * Unarchive address.
     *
     * @param $address
     */
    public function unarchiveAddress($address)
    {
        $endpoint = '/unarchive_address'.$this->pass.'&address='.$address;
        $results = $this->getJson($endpoint);
    }

    /**
     * Send payment.
     *
     * @param      $to_address
     * @param      $amount
     * @param      $from_address
     * @param null $fee
     * @param null $public_note
     *
     * @return mixed
     */
    public function send($to_address, $amount, $from_address, $fee = null, $public_note = null)
    {
        $data = [
            'to'     => $to_address,
            'from'   => $from_address,
            'amount' => $amount,
            'note'   => $public_note,
            'fee'    => $fee,
        ];
        $param = http_build_query($data);
        $endpoint = '/payment'.$this->pass.'&'.$param;
        $results = $this->getJson($endpoint);

        return $results;
    }

    /**
     * Send many payments.
     *
     * @param      $recipients
     * @param      $from_address
     * @param null $fee
     *
     * @return mixed
     */
    public function sendMany($recipients, $from_address, $fee = null)
    {
        $data = [
            'recipients' => $recipients,
            'from'       => $from_address,
            'fee'        => $fee,
        ];
        $param = http_build_query($data);
        $endpoint = '/sendmany'.$this->pass.'&'.$param;
        $results = $this->getJson($endpoint);

        return $results;
    }
}
