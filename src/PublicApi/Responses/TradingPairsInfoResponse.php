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
     * @var $tradingPairs[]
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
     * @return mixed
     */
    public function getTradingPairs()
    {
        return $this->tradingPairs;
    }

    /**
     * @param mixed $tradingPairs
     * @return TradingPairsInfoResponse
     */
    private function setTradingPairs($tradingPairs): TradingPairsInfoResponse
    {
        $this->tradingPairs = $tradingPairs;
        return $this;
    }

}
