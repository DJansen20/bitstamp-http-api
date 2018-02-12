<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Common;

use Bitstamp\Exception\BitstampEndpointException;
use Bitstamp\Models\Endpoint;

abstract class Request
{
    /**
     * Endpoint we want to connect to
     *
     * @var string $endpoint
     */
    protected $endpoint;

    /**
     * Controller we want to use
     *
     * @var string $controller
     */
    protected $controller;

    /**
     * Controllers with a v1 endpoint
     *
     * @var array $v1Controllers[]
     */
    protected $v1Controllers = [
        'ticker',
        'ticker_hour',
        'order_book',
        'eur_usd'
    ];

    /**
     * Controllers with a v2 endpoint
     *
     * @var array $v2Controllers
     */
    protected $v2Controllers = [
        'ticker',
        'ticker_hour',
        'order_book',
        'trading_pairs_info',
        'transactions'
    ];

    /**
     * Set the default endpoint to the APIv2
     *
     * @throws BitstampEndpointException
     */
    public function __construct()
    {
        if ($this->endpoint !== Endpoint::API || $this->endpoint !== Endpoint::APIV2) {
            $this->setV2Endpoint();
        }
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * Set the endpoint we want to connect to
     *
     * @return Request
     * @throws BitstampEndpointException
     */
    public function setV1Endpoint(): self
    {
        if (in_array($this->controller, $this->v1Controllers)) {
            $this->endpoint = Endpoint::API;
        } else {
            throw new BitstampEndpointException(sprintf('Controller %s doesn\'t have a v1 endpoint', $this->controller));
        }
        return $this;
    }

    /**
     * Check if the controller has a v2 endpoint and if so change the endpoint property
     *
     * @return Request
     * @throws BitstampEndpointException
     */
    public function setV2Endpoint(): self
    {
        if (in_array($this->controller, $this->v2Controllers)) {
            $this->endpoint = Endpoint::APIV2;
        } else {
            throw new BitstampEndpointException(sprintf('Controller %s doesn\'t have a v2 endpoint', $this->controller));
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller): void
    {
        $this->controller = $controller;
    }

    /**
     * Every request must implement a withUri
     *
     * @return string
     */
    abstract public function withUri(): string;

}
