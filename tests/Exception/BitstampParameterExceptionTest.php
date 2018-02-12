<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\Exception;

use Bitstamp\Exception\BitstampParameterException;
use PHPUnit\Framework\TestCase;

class BitstampParameterExceptionTest extends TestCase
{
    const MESSAGE = 'Invalid parameter';

    /**
     * @covers \Bitstamp\Exception\BitstampParameterException::__construct
     *
     * @return BitstampParameterException
     * @throws \Exception
     */
    public function testCanBeConstructed(): BitstampParameterException
    {
        $BitstampParameterException = new BitstampParameterException(self::MESSAGE);
        $this->assertInstanceOf('Bitstamp\\Exception\\BitstampParameterException', $BitstampParameterException);
        return $BitstampParameterException;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\Exception\BitstampParameterException::getMessage
     *
     * @param BitstampParameterException $BitstampParameterException
     * @throws \Exception
     */
    public function testGetMessage(BitstampParameterException $BitstampParameterException): void
    {
        $this->assertSame(self::MESSAGE, $BitstampParameterException->getMessage());
    }
}
