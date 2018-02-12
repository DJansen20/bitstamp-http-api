<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\Exception;

use Bitstamp\Exception\BitstampEndpointException;
use PHPUnit\Framework\TestCase;

class BitstampEndpointExceptionTest extends TestCase
{
    const MESSAGE = 'Invalid endpoint';

    /**
     * @covers \Bitstamp\Exception\BitstampEndpointException::__construct
     *
     * @return BitstampEndpointException
     * @throws \Exception
     */
    public function testCanBeConstructed(): BitstampEndpointException
    {
        $bitstampEndpointException = new BitstampEndpointException(self::MESSAGE);
        $this->assertInstanceOf('Bitstamp\\Exception\\BitstampEndpointException', $bitstampEndpointException);
        return $bitstampEndpointException;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\Exception\BitstampEndpointException::getMessage
     *
     * @param BitstampEndpointException $bitstampEndpointException
     * @throws \Exception
     */
    public function testGetMessage(BitstampEndpointException $bitstampEndpointException): void
    {
        $this->assertSame(self::MESSAGE, $bitstampEndpointException->getMessage());
    }
}
