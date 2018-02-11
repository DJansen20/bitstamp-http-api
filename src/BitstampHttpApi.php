<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp;

use Bitstamp\PublicApi\PublicApi;

class BitstampHttpApi
{
    /**
     * Expose the public API methods
     *
     * @return PublicApi
     */
    public static function PublicApi(): PublicApi
    {
        return new PublicApi();
    }
}