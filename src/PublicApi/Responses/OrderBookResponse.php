<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\PublicApi\Responses;

use Bitstamp\Common\Response;

class OrderBookResponse extends Response
{
    /**
     * @var $timestamp
     */
    public $timestamp;

    /**
     * @var $bids[]
     */
    public $bids;

    /**
     * OrderBookResponse constructor.
     * @param string $json
     */
    public function __construct(string $json)
    {
        $data = json_decode($json, true);
        $this
            ->setTimestamp($data['timestamp'])
            ->setBids($data['bids']);
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     * @return OrderBookResponse
     */
    private function setTimestamp($timestamp): OrderBookResponse
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBids()
    {
        return $this->bids;
    }

    /**
     * @param mixed $bids
     * @return OrderBookResponse
     */
    private function setBids($bids): OrderBookResponse
    {
        $this->bids = $bids;
        return $this;
    }
}
