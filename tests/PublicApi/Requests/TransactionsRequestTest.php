<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\PublicApi\Requests;

use PHPUnit\Framework\TestCase;
use Bitstamp\Models\CurrencyPair;
use Bitstamp\PublicApi\Requests\TransactionsRequest;

class TransactionsRequestTest extends TestCase
{
    /**
     * Check if request can be constructed
     *
     * @covers \Bitstamp\PublicApi\Requests\TransactionsRequest::__construct
     *
     * @return TransactionsRequest
     * @throws \Bitstamp\Exception\BitstampEndpointException
     * @throws \Exception
     */
    public function testCanBeConstructed(): TransactionsRequest
    {
        $request = new TransactionsRequest(CurrencyPair::BCHBTC);
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Requests\\TransactionsRequest', $request);

        return $request;
    }

    /**
     * @throws \Bitstamp\Exception\BitstampEndpointException
     * @throws \Bitstamp\Exception\BitstampParameterException
     * @expectedException \Bitstamp\Exception\BitstampParameterException
     */
    public function testConstructWithInvalidCurrencyPair(): void
    {
        $request = new TransactionsRequest('invalid');
        unset($request);
    }

    /**
     * @throws \Bitstamp\Exception\BitstampEndpointException
     * @throws \Bitstamp\Exception\BitstampParameterException
     * @expectedException \Bitstamp\Exception\BitstampParameterException
     */
    public function testConstructWithInvalidTime(): void
    {
        $request = new TransactionsRequest('bchbtc', 'invalid');
        unset($request);
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\TransactionsRequest::getCurrencyPair
     *
     * @param TransactionsRequest $request
     * @throws \Exception
     */
    public function testGetCurrencyPair(TransactionsRequest $request): void
    {
        $this->assertEquals('bchbtc', $request->getCurrencyPair());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\TransactionsRequest::setCurrencyPair
     *
     * @param TransactionsRequest $request
     * @throws \Exception
     */
    public function testSetCurrencyPair(TransactionsRequest $request): void
    {
        $request->setCurrencyPair(CurrencyPair::ETHBTC);
        $this->assertEquals(CurrencyPair::ETHBTC, $request->getCurrencyPair());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\TransactionsRequest::getTime
     *
     * @param TransactionsRequest $request
     * @throws \Exception
     */
    public function testGetTime(TransactionsRequest $request): void
    {
        $this->assertEquals('hour', $request->getTime());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\TransactionsRequest::setTime
     *
     * @param TransactionsRequest $request
     * @throws \Exception
     */
    public function testSetTime(TransactionsRequest $request): void
    {
        $request->setTime('minute');
        $this->assertEquals('minute', $request->getTime());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\TransactionsRequest::withUri
     *
     * @param TransactionsRequest $request
     * @return TransactionsRequest
     * @throws \Exception
     */
    public function testWithUri(TransactionsRequest $request): TransactionsRequest
    {
        $request->setCurrencyPair(CurrencyPair::BCHBTC);
        $request->setTime('hour');
        $this->assertEquals('bchbtc', $request->getCurrencyPair());
        $this->assertEquals('hour', $request->getTime());
        $this->assertEquals('transactions/bchbtc?time=hour', $request->withUri());

        return $request;
    }
}
