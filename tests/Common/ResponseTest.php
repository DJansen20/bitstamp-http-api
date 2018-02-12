<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\Common;

use Bitstamp\Common\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    /**
     * @covers \Bitstamp\Common\Response
     *
     * @return Response
     * @throws \Exception
     */
    public function testCanBeConstructed()
    {
        $response = new class extends Response{};
        $this->assertInstanceOf('Bitstamp\\Common\\Response', $response);
        return $response;
    }
}