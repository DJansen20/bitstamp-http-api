<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\PublicApi\Responses;

use Bitstamp\Common\Response;

class TransactionsResponse extends Response
{
    /**
     * @var $transactions[]
     */
    public $transactions;

    /**
     * TransactionsResponse constructor.
     * @param string $json
     */
    public function __construct(string $json)
    {
        $data = json_decode($json, true);
        $this
            ->setTransactions($data);
    }

    /**
     * @return mixed
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param mixed $transactions
     * @return TransactionsResponse
     */
    private function setTransactions($transactions): TransactionsResponse
    {
        $this->transactions = $transactions;
        return $this;
    }
}
