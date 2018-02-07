<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Models;

class CurrencyPair
{
    /**
     * BTC trading pairs
     *
     * @const BTCUSD
     * @const BTCEUR
     */
    const BTCUSD = 'btcusd';
    const BTCEUR = 'btceur';

    /**
     * EUR trading pairs
     *
     * @const EURUSD
     */
    const EURUSD = 'eurusd';

    /**
     * XRP trading pairs
     *
     * @const XRPUSD
     * @const XRPEUR
     * @const XRPBTC
     */
    const XRPUSD = 'xrpusd';
    const XRPEUR = 'xrpeur';
    const XRPBTC = 'xrpbtc';

    /**
     * LTC trading pairs
     *
     * @const LTCUSD
     * @const LTCEUR
     * @const LTCBTC
     */
    const LTCUSD = 'ltcusd';
    const LTCEUR = 'ltceur';
    const LTCBTC = 'ltcbtc';

    /**
     * ETH trading pairs
     *
     * @const ETHUSD
     * @const ETHEUR
     * @const ETHBTC
     */
    const ETHUSD = 'ethusd';
    const ETHEUR = 'etheur';
    const ETHBTC = 'ethbtc';

    /**
     * BCH trading pairs
     *
     * @const BCHUSD
     * @const BCHEUR
     * @const BCHBTC
     */
    const BCHUSD = 'bchusd';
    const BCHEUR = 'bcheur';
    const BCHBTC = 'bchbtc';
}