<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\PublicApi\Requests;

use PHPUnit\Framework\TestCase;
use Bitstamp\Models\CurrencyPair;
use Bitstamp\PublicApi\Requests\OrderBookRequest;

class OrderBookRequestTest extends TestCase
{
    /**
     * Check if request can be constructed
     *
     * @covers \Bitstamp\PublicApi\Requests\OrderBookRequest::__construct
     * @throws \Exception
     * @return OrderBookRequest
     */
    public function testCanBeConstructed(): OrderBookRequest
    {
        $request = new OrderBookRequest(CurrencyPair::BTCUSD);
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Requests\\OrderBookRequest', $request);

        return $request;
    }

    /**
     * @throws \Bitstamp\Exception\BitstampEndpointException
     * @throws \Bitstamp\Exception\BitstampParameterException
     * @expectedException \Bitstamp\Exception\BitstampParameterException
     */
    public function testConstructWithInvalidParameters(): void
    {
        $request = new OrderBookRequest('invalid');
        unset($request);
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\OrderBookRequest::setCurrencyPair
     * @covers \Bitstamp\PublicApi\Requests\OrderBookRequest::getCurrencyPair
     *
     * @param OrderBookRequest $request
     * @return OrderBookRequest
     * @throws \Exception
     */
    public function testSetCurrencyPair(OrderBookRequest $request): OrderBookRequest
    {
        $request->setCurrencyPair(CurrencyPair::ETHEUR);
        $this->assertEquals(CurrencyPair::ETHEUR, $request->getCurrencyPair());

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\OrderBookRequest::getController
     *
     * @param OrderBookRequest $request
     * @return OrderBookRequest
     * @throws \Exception
     */
    public function testGetController(OrderBookRequest $request): OrderBookRequest
    {
        $this->assertEquals('order_book', $request->getController());

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\OrderBookRequest::withUri
     *
     * @param OrderBookRequest $request
     * @return OrderBookRequest
     * @throws \Exception
     */
    public function testWithUri(OrderBookRequest $request): OrderBookRequest
    {
        $request->setCurrencyPair(CurrencyPair::ETHUSD);
        $this->assertEquals('order_book/ethusd/', $request->withUri());
        $request->setV1Endpoint();
        $this->assertEquals('order_book/', $request->withUri());

        return $request;
    }
}
