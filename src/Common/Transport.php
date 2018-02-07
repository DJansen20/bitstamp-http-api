<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license icense  MIT
 */

namespace Bitstamp\Common;

use GuzzleHttp\Client;

class Transport
{
    public function __construct()
    {
    }

    public function send(Request $request): string
    {
        $client = new Client(['base_uri' => $request->getEndpoint()]);
        $response = $client->get($request->createUri());

        return $response;
    }
}