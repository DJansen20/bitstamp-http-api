<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\PublicApi\Responses;

use Bitstamp\PublicApi\Responses\EurUsdConversionRateResponse;
use PHPUnit\Framework\TestCase;

class EurUsdConversionRateResponseTest extends TestCase
{
    /**
     * Test input
     */
    const TEST = [
        'buy' => 1.2329,
        'sell' =>1.2230
    ];

    /**
     * @covers \Bitstamp\PublicApi\Responses\EurUsdConversionRateResponse::__construct
     * @covers \Bitstamp\PublicApi\Responses\EurUsdConversionRateResponse::setBuy
     * @covers \Bitstamp\PublicApi\Responses\EurUsdConversionRateResponse::setSell
     *
     * @return EurUsdConversionRateResponse
     * @throws \Exception
     */
    public function testCanBeConstructed(): EurUsdConversionRateResponse
    {
        $response = new EurUsdConversionRateResponse(json_encode(self::TEST));
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Responses\\EurUsdConversionRateResponse', $response);

        return $response;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\EurUsdConversionRateResponse::getBuy
     *
     * @param EurUsdConversionRateResponse $response
     * @throws \Exception
     */
    public function testGetBuy(EurUsdConversionRateResponse $response): void
    {
        $this->assertEquals(self::TEST['buy'], $response->getBuy());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Responses\EurUsdConversionRateResponse::getSell
     *
     * @param EurUsdConversionRateResponse $response
     * @throws \Exception
     */
    public function testGetSell(EurUsdConversionRateResponse $response): void
    {
        $this->assertEquals(self::TEST['sell'], $response->getSell());
    }
}
