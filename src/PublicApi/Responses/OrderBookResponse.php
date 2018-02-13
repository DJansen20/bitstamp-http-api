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
     * @var $asks[]
     */
    public $asks;

    /**
     * OrderBookResponse constructor.
     * @param string $json
     */
    public function __construct(string $json)
    {
        $data = json_decode($json, true);
        $this
            ->setTimestamp($data['timestamp'])
            ->setBids($data['bids'])
            ->setAsks($data['asks']);
    }

    /**
     * @return integer
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @param integer $timestamp
     * @return OrderBookResponse
     */
    private function setTimestamp(int $timestamp): OrderBookResponse
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return array
     */
    public function getBids(): array
    {
        return $this->bids;
    }

    /**
     * @param array $bids
     * @return OrderBookResponse
     */
    private function setBids(array $bids): OrderBookResponse
    {
        $this->bids = $bids;
        return $this;
    }

    /**
     * @return array
     */
    public function getAsks(): array
    {
        return $this->asks;
    }

    /**
     * @param array $asks
     * @return OrderBookResponse
     */
    private function setAsks(array $asks): OrderBookResponse
    {
        $this->asks = $asks;
        return $this;
    }
}
