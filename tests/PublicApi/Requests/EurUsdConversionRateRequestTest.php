<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\PublicApi\Requests;

use PHPUnit\Framework\TestCase;
use Bitstamp\PublicApi\Requests\EurUsdConversionRateRequest;

class EurUsdConversionRateRequestTest extends TestCase
{
    /**
     * Check if request can be constructed
     *
     * @covers \Bitstamp\PublicApi\Requests\EurUsdConversionRateRequest::__construct
     * @throws \Exception
     * @return EurUsdConversionRateRequest
     */
    public function testCanBeConstructed(): EurUsdConversionRateRequest
    {
        $request = new EurUsdConversionRateRequest();
        $this->assertInstanceOf('Bitstamp\\PublicApi\\Requests\\EurUsdConversionRateRequest', $request);

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\PublicApi\Requests\EurUsdConversionRateRequest::withUri
     *
     * @param EurUsdConversionRateRequest $request
     * @return EurUsdConversionRateRequest
     * @throws \Exception
     */
    public function testWithUri(EurUsdConversionRateRequest $request): EurUsdConversionRateRequest
    {
        $this->assertEquals('eur_usd', $request->withUri());

        return $request;
    }
}
