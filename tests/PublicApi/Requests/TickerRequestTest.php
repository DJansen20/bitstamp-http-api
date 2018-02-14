<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\PublicApi\Requests;

use PHPUnit\Framework\TestCase;
use Bitstamp\Models\CurrencyPair;
use Bitstamp\PublicApi\Requests\TickerRequest;

class TickerRequestTest extends TestCase
{
    /**
     * Check if request can be constructed
     *
     * @covers \Bitstamp\PublicApi\Requests\TickerRequest::__construct
     * @throws \Exception
     * @return TickerRequest
     */
    public function testCanBeConstructed(): TickerRequest
    {
        $request = new TickerRequest(CurrencyPair::BTCUSD);
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Requests\\TickerRequest', $request);

        return $request;
    }

    /**
     * @throws \Bitstamp\Exception\BitstampEndpointException
     * @throws \Bitstamp\Exception\BitstampParameterException
     * @expectedException \Bitstamp\Exception\BitstampParameterException
     */
    public function testConstructWithInvalidParameters(): void
    {
        $request = new TickerRequest('invalid');
        unset($request);
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\TickerRequest::setCurrencyPair
     * @covers \Bitstamp\PublicApi\Requests\TickerRequest::getCurrencyPair
     *
     * @param TickerRequest $request
     * @return TickerRequest
     * @throws \Exception
     */
    public function testSetCurrencyPair(TickerRequest $request): TickerRequest
    {
        $request->setCurrencyPair(CurrencyPair::ETHEUR);
        $this->assertEquals(CurrencyPair::ETHEUR, $request->getCurrencyPair());

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\TickerRequest::getController
     *
     * @param TickerRequest $request
     * @return TickerRequest
     * @throws \Exception
     */
    public function testGetController(TickerRequest $request): TickerRequest
    {
        $this->assertEquals('ticker', $request->getController());

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\TickerRequest::withUri
     *
     * @param TickerRequest $request
     * @return TickerRequest
     * @throws \Exception
     */
    public function testWithUri(TickerRequest $request): TickerRequest
    {
        $request->setCurrencyPair(CurrencyPair::ETHUSD);
        $this->assertEquals('ticker/ethusd/', $request->withUri());
        $request->setV1Endpoint();
        $this->assertEquals('ticker/', $request->withUri());

        return $request;
    }
}
