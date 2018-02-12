<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\PublicApi\Requests;

use Bitstamp\Common\Request;

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
     */
    public function __construct(string $pair, string $time = 'hour')
    {
        $this->controller = 'transactions';
        $this->setTime($time);
        $this->currencyPair = $pair;
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
     */
    public function setCurrencyPair(string $pair): self
    {
        $this->currencyPair = $pair;
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
     */
    public function setTime(string $time): self
    {
        if (in_array($time, $this->allowedTimes)) {
            $this->time = $time;
        } else {
            $this->time = 'hour';
            trigger_error('Invalid $time value given for getTransactions', E_USER_WARNING);
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
        return sprintf('%s/%s?time=%s', $this->controller, $this->currencyPair, $this->time);
    }
}
