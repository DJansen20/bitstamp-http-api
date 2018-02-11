<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\PublicApi\Responses;

use Bitstamp\Common\Response;

class EurUsdConversionRateResponse extends Response
{
    /**
     * @var float $buy
     */
    public $buy;

    /**
     * @var float $sell
     */
    public $sell;

    /**
     * EurUsdConversionRateResponse constructor.
     * @param string $json
     */
    public function __construct(string $json)
    {
        $data = json_decode($json, true);
        $this
            ->setBuy($data['buy'])
            ->setSell($data['sell']);
    }

    /**
     * @return float
     */
    public function getBuy(): float
    {
        return $this->buy;
    }

    /**
     * @param float $buy
     * @return EurUsdConversionRateResponse
     */
    private function setBuy(float $buy): EurUsdConversionRateResponse
    {
        $this->buy = $buy;
        return $this;
    }

    /**
     * @return float
     */
    public function getSell(): float
    {
        return $this->sell;
    }

    /**
     * @param float $sell
     * @return EurUsdConversionRateResponse
     */
    private function setSell(float $sell): EurUsdConversionRateResponse
    {
        $this->sell = $sell;
        return $this;
    }
}
