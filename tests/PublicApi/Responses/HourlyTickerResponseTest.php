<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\PublicApi\Responses;

use Bitstamp\PublicApi\Responses\HourlyTickerResponse;
use PHPUnit\Framework\TestCase;

class HourlyTickerResponseTest extends TestCase
{
    /**
     * Test data
     */
    const TEST = [
        'high' => 1241.30,
        'last' => 1232.77,
        'timestamp' => 1518548170,
        'bid' => 1232.26,
        'vwap' => 1237.47,
        'volume' => 38.2800217,
        'low' => 1232.77,
        'ask' => 1232.77,
        'open' => 1234.20
    ];

    /**
     * @covers \Bitstamp\PublicApi\Responses\HourlyTickerResponse::__construct
     * @covers \Bitstamp\PublicApi\Responses\TickerResponse::setHigh
     * @covers \Bitstamp\PublicApi\Responses\TickerResponse::setLast
     * @covers \Bitstamp\PublicApi\Responses\TickerResponse::setTimestamp
     * @covers \Bitstamp\PublicApi\Responses\TickerResponse::setBid
     * @covers \Bitstamp\PublicApi\Responses\TickerResponse::setVwap
     * @covers \Bitstamp\PublicApi\Responses\TickerResponse::setVolume
     * @covers \Bitstamp\PublicApi\Responses\TickerResponse::setLow
     * @covers \Bitstamp\PublicApi\Responses\TickerResponse::setAsk
     * @covers \Bitstamp\PublicApi\Responses\TickerResponse::setOpen
     *
     * @return HourlyTickerResponse
     * @throws \Exception
     */
    public function testCanBeConstructed(): HourlyTickerResponse
    {
        $response = new HourlyTickerResponse(json_encode(self::TEST));
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Responses\\HourlyTickerResponse', $response);

        return $response;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\HourlyTickerResponse::getHigh
     *
     * @param HourlyTickerResponse $response
     * @throws \Exception
     */
    public function testGetHigh(HourlyTickerResponse $response) :void
    {
        $this->assertEquals(self::TEST['high'], $response->getHigh());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\HourlyTickerResponse::getLast
     *
     * @param HourlyTickerResponse $response
     * @throws \Exception
     */
    public function testGetLast(HourlyTickerResponse $response): void
    {
        $this->assertEquals(self::TEST['last'], $response->getLast());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\HourlyTickerResponse::getTimestamp
     *
     * @param HourlyTickerResponse $response
     * @throws \Exception
     */
    public function testGetTimestamp(HourlyTickerResponse $response): void
    {
        $this->assertEquals(self::TEST['timestamp'], $response->getTimestamp());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\HourlyTickerResponse::getBid
     *
     * @param HourlyTickerResponse $response
     * @throws \Exception
     */
    public function testGetBid(HourlyTickerResponse $response): void
    {
        $this->assertEquals(self::TEST['bid'], $response->getBid());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\HourlyTickerResponse::getVwap
     *
     * @param HourlyTickerResponse $response
     * @throws \Exception
     */
    public function testGetVwap(HourlyTickerResponse $response): void
    {
        $this->assertEquals(self::TEST['vwap'], $response->getVwap());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\HourlyTickerResponse::getVolume
     *
     * @param HourlyTickerResponse $response
     * @throws \Exception
     */
    public function testGetVolume(HourlyTickerResponse $response): void
    {
        $this->assertEquals(self::TEST['volume'], $response->getVolume());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\HourlyTickerResponse::getLow
     *
     * @param HourlyTickerResponse $response
     * @throws \Exception
     */
    public function testGetLow(HourlyTickerResponse $response): void
    {
        $this->assertEquals(self::TEST['low'], $response->getLow());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\HourlyTickerResponse::getAsk
     *
     * @param HourlyTickerResponse $response
     * @throws \Exception
     */
    public function testGetAsk(HourlyTickerResponse $response): void
    {
        $this->assertEquals(self::TEST['ask'], $response->getAsk());
    }
    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\HourlyTickerResponse::getOpen
     *
     * @param HourlyTickerResponse $response
     * @throws \Exception
     */
    public function testGetOpen(HourlyTickerResponse $response): void
    {
        $this->assertEquals(self::TEST['open'], $response->getOpen());
    }
}
