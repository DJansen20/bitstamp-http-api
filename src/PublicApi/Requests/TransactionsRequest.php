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

class TransactionsRequest extends Request
{
    /**
     * @var string $currencyPair
     */
    protected $currencyPair;

    /**
     * @var string $time
     */
    protected $time;

    /**
     * @var array $allowedTimes
     */
    private $allowedTimes = [
        'minute',
        'hour',
        'day'
    ];

    /**
     * Run the parent constructor and set the uri
     *
     * @param string $pair
     * @param string $time
     * @throws \Bitstamp\Exception\BitstampEndpointException
     * @throws BitstampParameterException
     */
    public function __construct(string $pair, string $time = 'hour')
    {
        $this->controller = 'transactions';
        $this->setTime($time);
        $this->setCurrencyPair($pair);
        parent::__construct();
    }

    /**
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
     * @return TransactionsRequest
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
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     * @return TransactionsRequest
     * @throws BitstampParameterException
     */
    public function setTime(string $time): self
    {
        if (in_array($time, $this->allowedTimes)) {
            $this->time = $time;
        } else {
            throw new BitstampParameterException('Invalid time parameter given');
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
            return sprintf('%s/%s?time=%s', $this->controller, $this->currencyPair, $this->time);
        }
    }
}
