<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\PublicApi\Requests;

use Bitstamp\PublicApi\Requests\TradingPairsInfoRequest;
use PHPUnit\Framework\TestCase;

class TradingPairsInfoRequestTest extends TestCase
{
    /**
     * Check if request can be constructed
     *
     * @covers \Bitstamp\PublicApi\Requests\TradingPairsInfoRequest::__construct
     * @throws \Exception
     * @return TradingPairsInfoRequest
     */
    public function testCanBeConstructed(): TradingPairsInfoRequest
    {
        $request = new TradingPairsInfoRequest();
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Requests\\TradingPairsInfoRequest', $request);

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\TradingPairsInfoRequest::withUri
     *
     * @param TradingPairsInfoRequest $request
     * @return TradingPairsInfoRequest
     * @throws \Exception
     */
    public function testWithUri(TradingPairsInfoRequest $request): TradingPairsInfoRequest
    {
        $this->assertEquals('trading-pairs-info', $request->withUri());

        return $request;
    }
}
