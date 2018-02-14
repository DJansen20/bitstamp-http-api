<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\PublicApi\Requests;

use Bitstamp\Common\Request;
use Bitstamp\Exception\BitstampParameterException;
use Bitstamp\Models\CurrencyPair;
use Bitstamp\Models\Endpoint;

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
     * @throws BitstampParameterException
     */
    public function __construct(string $pair)
    {
        $this->controller = 'order_book';
        $this->setCurrencyPair($pair);
        parent::__construct();
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
     * @throws BitstampParameterException
     */
    public function setCurrencyPair(string $pair): self
    {
        if (in_array($pair, CurrencyPair::CURRENCYPAIR_MAPPER)
            && $pair === CurrencyPair::CURRENCYPAIR_MAPPER[$pair]) {
            $this->currencyPair = $pair;
        } else {
            throw new BitstampParameterException('Invalid currency pair given');
        }
        return $this;
    }

    /**
     * Uri must be of format {controller}/{currencyPair}
     *
     * @return string
     */
    public function withUri(): string
    {
        if ($this->getEndpoint() === Endpoint::API) {
            return sprintf('%s/', $this->controller);
        } else {
            return sprintf('%s/%s/', $this->controller, $this->currencyPair);
        }
    }
}
