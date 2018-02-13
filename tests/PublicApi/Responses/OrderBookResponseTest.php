<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\PublicApi\Responses;

use Bitstamp\PublicApi\Responses\OrderBookResponse;
use PHPUnit\Framework\TestCase;

class OrderBookResponseTest extends TestCase
{
    /**
     * Test data
     */
    const TEST = [
        'timestamp' => 1518549575,
        'bids' => [
            [
                0.09780000,
                22.73767262
            ],
            [
                0.09775600,
                1.09584452
            ],
            [
                0.09774001,
                1.43338000
            ]
        ],
        'asks' => [
            [
                0.09813996,
                42.52653460
            ],
            [
                0.09813999,
                3.64073018
            ],
            [
                0.09814000,
                11.88860000
            ]
        ]
    ];

    /**
     * @covers \Bitstamp\PublicApi\Responses\OrderBookResponse::__construct
     * @covers \Bitstamp\PublicApi\Responses\OrderBookResponse::setTimestamp
     * @covers \Bitstamp\PublicApi\Responses\OrderBookResponse::setBids
     * @covers \Bitstamp\PublicApi\Responses\OrderBookResponse::setAsks
     *
     * @return OrderBookResponse
     * @throws \Exception
     */
    public function testCanBeConstructed(): OrderBookResponse
    {
        $response = new OrderBookResponse(json_encode(self::TEST));
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Responses\\OrderBookResponse', $response);

        return $response;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\OrderBookResponse::getTimestamp()
     *
     * @param OrderBookResponse $response
     * @throws \Exception
     */
    public function testGetTimestamp(OrderBookResponse $response): void
    {
        $this->assertEquals(self::TEST['timestamp'], $response->getTimestamp());
    }

    /**
     * @depends testCanBeConstructed
     * @covers  \Bitstamp\PublicApi\Responses\OrderBookResponse::getBids
     *
     * @param OrderBookResponse $response
     * @throws \Exception
     */
    public function testGetBids(OrderBookResponse $response): void
    {
        $this->assertEquals(self::TEST['bids'], $response->getBids());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\OrderBookResponse::getAsks
     *
     * @param OrderBookResponse $response
     * @throws \Exception
     */
    public function testGetAsks(OrderBookResponse $response): void
    {
        $this->assertEquals(self::TEST['asks'], $response->getAsks());
    }
}
