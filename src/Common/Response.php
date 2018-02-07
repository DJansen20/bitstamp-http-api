<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Common;

abstract class Response
{
    public static function parse(string $json): ?Response
    {
        $response = null;

    }
}