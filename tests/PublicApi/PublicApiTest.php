<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\PublicApi;

use Bitstamp\Models\CurrencyPair;
use Bitstamp\PublicApi\PublicApi;
use PHPUnit\Framework\TestCase;

class PublicApiTest extends TestCase
{
    /**
     * @return PublicApi
     * @throws \Exception
     */
    public function testCanBeConstructed(): PublicApi
    {
        $publicApi = new PublicApi();
        $this->assertInstanceOf('Bitstamp\\PublicApi\\PublicApi', $publicApi);

        return $publicApi;
    }

    /**
     * @depends testCanBeConstructed
     *
     * @param PublicApi $publicApi
     * @throws \Exception
     */
    public function testGetDailyTicker(PublicApi $publicApi)
    {
        $response = $publicApi->getDailyTicker(CurrencyPair::BTCUSD);
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Responses\\TickerResponse', $response);
    }

    /**
     * @depends testCanBeConstructed
     *
     * @param PublicApi $publicApi
     * @throws \Exception
     */
    public function testGetHourlyTicker(PublicApi $publicApi)
    {
        $response = $publicApi->getHourlyTicker(CurrencyPair::BTCUSD);
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Responses\\HourlyTickerResponse', $response);
    }

    /**
     * @depends testCanBeConstructed
     *
     * @param PublicApi $publicApi
     * @throws \Exception
     */
    public function testGetOrderBook(PublicApi $publicApi)
    {
        $response = $publicApi->getOrderBook(CurrencyPair::BTCUSD);
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Responses\\OrderBookResponse', $response);
    }

    /**
     * @depends testCanBeConstructed
     *
     * @param PublicApi $publicApi
     * @throws \Exception
     */
    public function testGetTransactions(PublicApi $publicApi)
    {
        $response = $publicApi->getTransactions(CurrencyPair::BTCUSD, 'minute');
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Responses\\TransactionsResponse', $response);
    }

    /**
     * @depends testCanBeConstructed
     *
     * @param PublicApi $publicApi
     * @throws \Exception
     */
    public function testGetTradingPairInfo(PublicApi $publicApi)
    {
        $response = $publicApi->getTradingPairInfo();
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Responses\\TradingPairsInfoResponse', $response);
    }

    /**
     * @depends testCanBeConstructed
     *
     * @param PublicApi $publicApi
     * @throws \Exception
     */
    public function testGetEurUsdConversionRate(PublicApi $publicApi)
    {
        $response = $publicApi->getEurUsdConversionRate();
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Responses\\EurUsdConversionRateResponse', $response);
    }
}
