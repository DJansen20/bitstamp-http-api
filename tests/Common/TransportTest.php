<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\Common;

use PHPUnit\Framework\TestCase;

use Bitstamp\Common\Transport;


class TransportTest extends TestCase
{
    /**
     * Test if the Transport object can be created
     *
     * @return Transport
     * @throws \Exception
     */
    public function testCanBeConstructed(): Transport
    {
        $transport = new Transport();
        $this->assertInstanceOf('Bitstamp\\Common\\Request', $transport);
        return $transport;
    }
}