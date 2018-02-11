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
    protected $currencyPair;

    /**
     * Run the parent constructor and set the uri
     *
     * @return EurUsdConversionRateRequest
     */
    public function __construct()
    {
        parent::__construct();
        $this->controller = 'eur_usd';

        return $this;
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