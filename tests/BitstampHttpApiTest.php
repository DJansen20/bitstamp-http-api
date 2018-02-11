<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests;

use Bitstamp\BitstampHttpApi;
use Bitstamp\PublicApi\PublicApi;
use PHPUnit\Framework\TestCase;

class BitstampHttpApiTest extends TestCase
{
    /**
     * @covers \Bitstamp\BitstampHttpApi::__constuct
     * @return BitstampHttpApi
     * @throws \Exception
     */
    public function testCanBeConstructed(): BitstampHttpApi
    {
        $bitstampHttpApi = new BitstampHttpApi();
        $this->assertInstanceOf('Bitstamp\\BitstampHttpApi', $bitstampHttpApi);
        return $bitstampHttpApi;
    }

    /**
     * @covers \Bitstamp\BitstampHttpApi::PublicApi
     * @return PublicApi
     * @throws \Exception
     */
    public function testLoadPublicApi(): PublicApi
    {
        $publicApi = BitstampHttpApi::PublicApi();
        $this->assertInstanceOf('Bitstamp\\PublicApi\\PublicApi', $publicApi);
        return $publicApi;
    }
}