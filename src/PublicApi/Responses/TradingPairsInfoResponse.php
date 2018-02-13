<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\PublicApi\Responses;

use Bitstamp\Common\Response;

class TradingPairsInfoResponse extends Response
{
    /**
     * @var array $tradingPairs[]
     */
    public $tradingPairs;

    /**
     * TradingPairsInfoResponse constructor.
     * @param string $json
     */
    public function __construct(string $json)
    {
        $data = json_decode($json, true);
        $this
            ->setTradingPairs($data);
    }

    /**
     * @return array
     */
    public function getTradingPairs(): array
    {
        return $this->tradingPairs;
    }

    /**
     * @param array $tradingPairs
     * @return TradingPairsInfoResponse
     */
    private function setTradingPairs(array $tradingPairs): TradingPairsInfoResponse
    {
        $this->tradingPairs = $tradingPairs;
        return $this;
    }

}
