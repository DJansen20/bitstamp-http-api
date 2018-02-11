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
     * @return PublicApi
     * @throws \Exception
     */
    public function testPublicApi(): PublicApi
    {
        $publicApi = BitstampHttpApi::PublicApi();
        $this->assertInstanceOf('Bitstamp\\PublicApi\\PublicApi', $publicApi);
        var_dump($publicApi);
        return $publicApi;
    }
}