<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\PublicApi\Responses;

use Bitstamp\PublicApi\Responses\TransactionsResponse;
use PHPUnit\Framework\TestCase;

class TransactionsResponseTest extends TestCase
{
    /**
     * Test input
     */
    const TEST = [
        [
            'date' => 1518551660,
            'tid' => 54510338,
            'price' => 8614.99,
            'type' => 0,
            'amount' => 0.85067539
        ],
        [
            'date' => 1518551624,
            'tid' => 54510315,
            'price' => 8601.94,
            'type' => 1,
            'amount' => 0.00075000
        ],
        [
            'date' => 1518551632,
            'tid' => 54510318,
            'price' => 8610.33,
            'type' => 0,
            'amount' => 0.16187532
        ]
    ];

    /**
     * @covers \Bitstamp\PublicApi\Responses\TransactionsResponse::__construct
     * @covers \Bitstamp\PublicApi\Responses\TransactionsResponse::setTransactions
     * @return TransactionsResponse
     * @throws \Exception
     */
    public function testCanBeConstructed(): TransactionsResponse
    {
        $response = new TransactionsResponse(json_encode(self::TEST));
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Responses\\TransactionsResponse', $response);

        return $response;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\TransactionsResponse::getTransactions
     *
     * @param TransactionsResponse $response
     * @throws \Exception
     */
    public function testGetTransactions(TransactionsResponse $response)
    {
        $this->assertEquals(self::TEST, $response->getTransactions());
    }
}
