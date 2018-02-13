<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\PublicApi\Requests;

use Bitstamp\Common\Request;

class OrderBookRequest extends Request
{
    /**
     * @var string $currencyPair
     */
    protected $currencyPair;

    /**
     * Run the parent constructor and set the uri
     *
     * @param string $pair
     * @throws \Bitstamp\Exception\BitstampEndpointException
     */
    public function __construct(string $pair)
    {
        $this->controller = 'order_book';
        $this->currencyPair = $pair;
        parent::__construct();

        return $this;
    }

    /**
     * Gets the currently set currency pair
     *
     * @return string
     */
    public function getCurrencyPair(): string
    {
        return $this->currencyPair;
    }

    /**
     * Set the currency pair we wish to see
     *
     * @param string $pair
     * @return OrderBookRequest
     */
    public function setCurrencyPair(string $pair): self
    {
        $this->currencyPair = $pair;
        return $this;
    }

    /**
     * Uri must be of format {controller}/{currencyPair}
     *
     * @return string
     */
    public function withUri(): string
    {
        return sprintf('%s/%s', $this->controller, $this->currencyPair);
    }
}
