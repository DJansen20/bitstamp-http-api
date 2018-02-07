<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp;

use Bitstamp\Common\Transport;
use Bitstamp\Common\Response;
use Bitstamp\Models\CurrencyPair;
use Bitstamp\Models\Endpoint;
use Bitstamp\PublicApi\Ticker\TickerRequest;

class PublicApi
{
    private $request;

    private $transport;

    private $response;

    public function getDailyTicker(string $pair): Response
    {
        $this->request = new TickerRequest();
        $this->request->setCurrencyPair($pair);
    }

    public function getHourlyTicker()
    {

    }

    public function getOrderBook()
    {

    }

    public function getTransactions()
    {

    }

    public function getTradingPairInfo()
    {

    }

    public function getEurUsdConversionRate()
    {

    }

    /**
     * Send out the request
     *
     * @throws \Exception
     * @return Response
     */
    private function sendRequest(): string
    {
        if ($this->request === null) {
            throw new \Exception('No request set');
        }
        if (!$this->transport instanceof Transport) {
            $this->transport = new Transport();
        }

        return $this->transport->send($this->request);
    }
}
