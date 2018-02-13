<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\PublicApi\Requests;

use Bitstamp\Common\Request;

class EurUsdConversionRateRequest extends Request
{
    /**
     * @var string $currencyPair
     */
    protected $currencyPair;

    /**
     * Run the parent constructor and set the uri
     *
     * @throws \Bitstamp\Exception\BitstampEndpointException
     */
    public function __construct()
    {
        $this->controller = 'eur_usd';
        $this->setV1Endpoint();
        parent::__construct();
    }

    /**
     * Uri must be of format {controller}/{currencyPair}
     *
     * @return string
     */
    public function withUri(): string
    {
        return sprintf('%s', $this->controller);
    }
}
