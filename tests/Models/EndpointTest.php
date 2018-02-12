<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\Models;

use Bitstamp\Models\Endpoint;
use PHPUnit\Framework\TestCase;

class EndpointTest extends TestCase
{
    const API = 'https://www.bitstamp.net/api/';
    const APIV2 = 'https://www.bitstamp.net/api/v2/';

    /**
     * @covers \Bitstamp\Models\Endpoint
     * @throws \Exception
     */
    public function testExpectedConstants(): void
    {
        $this->assertEquals(self::API, Endpoint::API);
        $this->assertEquals(self::APIV2, Endpoint::APIV2);
    }
}
