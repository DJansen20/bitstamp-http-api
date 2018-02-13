<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\PublicApi\Responses;

use Bitstamp\PublicApi\Responses\TradingPairsInfoResponse;
use PHPUnit\Framework\TestCase;

class TradingPairsInfoResponseTest extends TestCase
{
    const TEST = [
        [
            'base_decimals' => 8,
            'minimum_order' => '5.0 USD',
            'name' => 'LTC/USD',
            'counter_decimals' => 2,
            'trading' => 'Enabled',
            'url_symbol' => 'ltcusd',
            'description' => 'Litecoin / U.S. dollar'
        ],
        [
            'base_decimals' => 8,
            'minimum_order' => '0.001 BTC',
            'name' => 'BCH/BTC',
            'counter_decimals' => 8,
            'trading' => 'Enabled',
            'url_symbol' => 'bchbtc',
            'description' => 'Bitcoin Cash / Bitcoin'
        ],
        [
            'base_decimals' => 8,
            'minimum_order' => '5.0 EUR',
            'name' => 'BTC/EUR',
            'counter_decimals' => 2,
            'trading' => 'Enabled',
            'url_symbol' => 'btceur',
            'description' => 'Bitcoin / Euro'
        ]
    ];

    /**
     * @covers \Bitstamp\PublicApi\Responses\TradingPairsInfoResponse::__construct
     * @covers \Bitstamp\PublicApi\Responses\TradingPairsInfoResponse::setTradingPairs
     *
     * @return TradingPairsInfoResponse
     * @throws \Exception
     */
    public function testCanBeConstructed(): TradingPairsInfoResponse
    {
        $response = new TradingPairsInfoResponse(json_encode(self::TEST));
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Responses\\TradingPairsInfoResponse', $response);

        return $response;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\TradingPairsInfoResponse::getTradingPairs
     *
     * @param TradingPairsInfoResponse $response
     * @throws \Exception
     */
    public function testGetTradingPairs(TradingPairsInfoResponse $response): void
    {
        $this->assertEquals(self::TEST, $response->getTradingPairs());
    }
}
