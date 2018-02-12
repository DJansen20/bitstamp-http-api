<?php
/**
 * @package Bitstamp HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Bitstamp\Tests\Models;

use Bitstamp\Models\CurrencyPair;
use PHPUnit\Framework\TestCase;

class CurrencyPairTest extends TestCase
{
    const BTCUSD = 'btcusd';
    const BTCEUR = 'btceur';
    const EURUSD = 'eurusd';
    const XRPUSD = 'xrpusd';
    const XRPEUR = 'xrpeur';
    const XRPBTC = 'xrpbtc';
    const LTCUSD = 'ltcusd';
    const LTCEUR = 'ltceur';
    const LTCBTC = 'ltcbtc';
    const ETHUSD = 'ethusd';
    const ETHEUR = 'etheur';
    const ETHBTC = 'ethbtc';
    const BCHUSD = 'bchusd';
    const BCHEUR = 'bcheur';
    const BCHBTC = 'bchbtc';

    /**
     * @covers \Bitstamp\Models\CurrencyPair
     * @throws \Exception
     */
    public function testExpectedConstants(): void
    {
        $this->assertEquals(self::BTCUSD, CurrencyPair::BTCUSD);
        $this->assertEquals(self::BTCEUR, CurrencyPair::BTCEUR);
        $this->assertEquals(self::EURUSD, CurrencyPair::EURUSD);
        $this->assertEquals(self::XRPUSD, CurrencyPair::XRPUSD);
        $this->assertEquals(self::XRPEUR, CurrencyPair::XRPEUR);
        $this->assertEquals(self::XRPBTC, CurrencyPair::XRPBTC);
        $this->assertEquals(self::LTCUSD, CurrencyPair::LTCUSD);
        $this->assertEquals(self::LTCEUR, CurrencyPair::LTCEUR);
        $this->assertEquals(self::LTCBTC, CurrencyPair::LTCBTC);
        $this->assertEquals(self::ETHUSD, CurrencyPair::ETHUSD);
        $this->assertEquals(self::ETHEUR, CurrencyPair::ETHEUR);
        $this->assertEquals(self::ETHBTC, CurrencyPair::ETHBTC);
        $this->assertEquals(self::BCHUSD, CurrencyPair::BCHUSD);
        $this->assertEquals(self::BCHEUR, CurrencyPair::BCHEUR);
        $this->assertEquals(self::BCHBTC, CurrencyPair::BCHBTC);
    }
}
