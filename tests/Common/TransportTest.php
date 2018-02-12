<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\Common;

use Bitstamp\Models\CurrencyPair;
use Bitstamp\PublicApi\Requests\TickerRequest;
use PHPUnit\Framework\TestCase;

use Bitstamp\Common\Transport;


class TransportTest extends TestCase
{
    /**
     * Test if the Transport object can be created
     *
     * @return Transport
     * @throws \Exception
     */
    public function testCanBeConstructed(): Transport
    {
        $transport = new Transport();
        $this->assertInstanceOf('Bitstamp\\Common\\Transport', $transport);
        return $transport;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\Common\Transport::send
     * @covers \Bitstamp\Common\Transport::buildUrl
     *
     * @param Transport $transport
     * @return Transport
     * @throws \Bitstamp\Exception\BitstampEndpointException
     * @throws \Exception
     */
    public function testCanSendRequest(Transport $transport): Transport
    {
        $request = new TickerRequest(CurrencyPair::BTCUSD);
        $response = $transport->send($request);
        $this->assertNotEmpty($response);
        $this->assertJson($response);
        return $transport;
    }
}
