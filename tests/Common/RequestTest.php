<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\Common;

use Bitstamp\Common\Request;
use Bitstamp\Exception\BitstampEndpointException;
use Bitstamp\Models\Endpoint;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    /**
     * @covers \Bitstamp\Common\Request::__construct
     *
     * @return Request
     * @throws \Exception
     */
    public function testCanBeConstructed(): Request
    {
        $request = new class extends Request {
            /**
             * @throws BitstampEndpointException
             */
            public function __construct()
            {
                $this->controller = 'ticker';
                parent::__construct();
            }

            public function withUri(): string
            {
                return null;
            }
        };
        $this->assertInstanceOf('Bitstamp\\Common\\Request', $request);
        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\Common\Request::getController
     *
     * @param Request $request
     * @return Request
     * @throws \Exception
     */
    public function testGetController(Request $request): Request
    {
        $controller = $request->getController();
        $this->assertEquals('ticker', $controller);
        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\Common\Request::setController
     *
     * @param Request $request
     * @return Request
     * @throws \Exception
     */
    public function testSetController(Request $request): Request
    {
        $request->setController('ticker_hour');
        $this->assertEquals('ticker_hour', $request->getController());
        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\Common\Request::getEndpoint
     *
     * @param Request $request
     * @return Request
     * @throws \Exception
     */
    public function testGetEndpoint(Request $request): Request
    {
        $this->assertEquals(Endpoint::APIV2, $request->getEndpoint());
        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\Common\Request::setV1Endpoint
     *
     * @param Request $request
     * @return Request
     * @throws BitstampEndpointException
     * @throws \Exception
     */
    public function testSetV1Endpoint(Request $request): Request
    {
        $request->setV1Endpoint();
        $this->assertEquals(Endpoint::API, $request->getEndpoint());
        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Bitstamp\Common\Request::setV2Endpoint
     *
     * @param Request $request
     * @return Request
     * @throws BitstampEndpointException
     * @throws \Exception
     */
    public function testSetV2Endpoint(Request $request): Request
    {
        $request->setV2Endpoint();
        $this->assertEquals(Endpoint::APIV2, $request->getEndpoint());
        return $request;
    }
}
