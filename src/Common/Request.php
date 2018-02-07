<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Common;

use Bitstamp\Models\Endpoint;

abstract class Request
{
    /**
     * Endpoint we want to connect to
     *
     * @var string
     */
    protected $endpoint;


    /**
     * Set the default endpoint to the APIv2
     */
    public function __construct()
    {
        $this->endpoint = Endpoint::APIV2;
    }

    /**
     * Set the endpoint we want to connect to
     *
     * @param string $endpoint
     * @return Request
     */
    public function setEndpoint(string $endpoint): self
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * Every request must implement a withUri
     *
     * @return string
     */
    abstract public function withUri(): string;
}
