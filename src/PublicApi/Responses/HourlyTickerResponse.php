<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\PublicApi\Responses;

use Bitstamp\Common\Response;

class HourlyTickerResponse extends Response
{
    /**
     * @var float
     */
    public $high;

    /**
     * @var float
     */
    public $last;

    /**
     * @var integer
     */
    public $timestamp;

    /**
     * @var float
     */
    public $bid;

    /**
     * @var float
     */
    public $vwap;

    /**
     * @var float
     */
    public $volume;

    /**
     * @var float
     */
    public $low;

    /**
     * @var float
     */
    public $ask;

    /**
     * @var float
     */
    public $open;

    public function __construct(string $json)
    {
        $data = json_decode($json, true);
        $this
            ->setHigh($data['high'])
            ->setLast($data['last'])
            ->setTimestamp($data['timestamp'])
            ->setBid($data['bid'])
            ->setVwap($data['vwap'])
            ->setVolume($data['volume'])
            ->setLow($data['low'])
            ->setAsk($data['ask'])
            ->setOpen($data['open']);
    }

    /**
     * @return mixed
     */
    public function getHigh(): float
    {
        return $this->high;
    }

    /**
     * @param mixed $high
     * @return HourlyTickerResponse
     */
    private function setHigh(float $high): HourlyTickerResponse
    {
        $this->high = $high;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLast(): float
    {
        return $this->last;
    }

    /**
     * @param mixed $last
     * @return HourlyTickerResponse
     */
    private function setLast(float $last): HourlyTickerResponse
    {
        $this->last = $last;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimestamp(): integer
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     * @return HourlyTickerResponse
     */
    private function setTimestamp(int $timestamp): HourlyTickerResponse
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBid(): float
    {
        return $this->bid;
    }

    /**
     * @param mixed $bid
     * @return HourlyTickerResponse
     */
    private function setBid(float $bid): HourlyTickerResponse
    {
        $this->bid = $bid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVwap(): float
    {
        return $this->vwap;
    }

    /**
     * @param mixed $vwap
     * @return HourlyTickerResponse
     */
    private function setVwap(float $vwap): HourlyTickerResponse
    {
        $this->vwap = $vwap;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVolume(): float
    {
        return $this->volume;
    }

    /**
     * @param mixed $volume
     * @return HourlyTickerResponse
     */
    private function setVolume(float $volume): HourlyTickerResponse
    {
        $this->volume = $volume;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLow(): float
    {
        return $this->low;
    }

    /**
     * @param mixed $low
     * @return HourlyTickerResponse
     */
    private function setLow(float $low): HourlyTickerResponse
    {
        $this->low = $low;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAsk(): float
    {
        return $this->ask;
    }

    /**
     * @param mixed $ask
     * @return HourlyTickerResponse
     */
    private function setAsk(float $ask): HourlyTickerResponse
    {
        $this->ask = $ask;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOpen(): float
    {
        return $this->open;
    }

    /**
     * @param mixed $open
     * @return HourlyTickerResponse
     */
    private function setOpen(float $open): HourlyTickerResponse
    {
        $this->open = $open;
        return $this;
    }
}
