<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\PublicApi\Requests;

use PHPUnit\Framework\TestCase;
use Bitstamp\Models\CurrencyPair;
use Bitstamp\PublicApi\Requests\HourlyTickerRequest;

class HourlyTickerRequestTest extends TestCase
{
    /**
     * Check if request can be constructed
     *
     * @covers \Bitstamp\PublicApi\Requests\HourlyTickerRequest::__construct
     * @throws \Exception
     * @return HourlyTickerRequest
     */
    public function testCanBeConstructed(): HourlyTickerRequest
    {
        $request = new HourlyTickerRequest(CurrencyPair::BTCUSD);
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Requests\\HourlyTickerRequest', $request);

        return $request;
    }

    /**
     * @throws \Bitstamp\Exception\BitstampEndpointException
     * @throws \Bitstamp\Exception\BitstampParameterException
     * @expectedException \Bitstamp\Exception\BitstampParameterException
     */
    public function testConstructWithInvalidParameters(): void
    {
        $request = new HourlyTickerRequest('invalid');
        unset($request);
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\HourlyTickerRequest::setCurrencyPair
     * @covers \Bitstamp\PublicApi\Requests\HourlyTickerRequest::getCurrencyPair
     *
     * @param HourlyTickerRequest $request
     * @return HourlyTickerRequest
     * @throws \Exception
     */
    public function testSetCurrencyPair(HourlyTickerRequest $request): HourlyTickerRequest
    {
        $request->setCurrencyPair(CurrencyPair::ETHEUR);
        $this->assertEquals(CurrencyPair::ETHEUR, $request->getCurrencyPair());

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\HourlyTickerRequest::getController
     *
     * @param HourlyTickerRequest $request
     * @return HourlyTickerRequest
     * @throws \Exception
     */
    public function testGetController(HourlyTickerRequest $request): HourlyTickerRequest
    {
        $this->assertEquals('ticker_hour', $request->getController());

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\HourlyTickerRequest::withUri
     *
     * @param HourlyTickerRequest $request
     * @return HourlyTickerRequest
     * @throws \Exception
     */
    public function testWithUri(HourlyTickerRequest $request): HourlyTickerRequest
    {
        $request->setCurrencyPair(CurrencyPair::ETHUSD);
        $this->assertEquals('ticker_hour/ethusd/', $request->withUri());
        $request->setV1Endpoint();
        $this->assertEquals('ticker_hour/', $request->withUri());

        return $request;
    }
}
