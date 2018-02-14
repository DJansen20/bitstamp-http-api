# Bitstamp HTTP API

This package is for communicating with the API of Bitstamp

For now the implementation only has the public methods exposed but will contain the private methods in the future

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://php.net/)

# Installation
This package can be installed using composer
```text
composer require djansen20/bitstamp-http-api dev-master
```

## Usage
In order to use this library include the following namespace into your project
```php
use Bitstamp\BitstampHttpApi;
```

###Request limit
Bitstamp has implemented a request limit to prevent one IP flooding their servers.
When using this package make sure you limit your calls to 600 requests per 10 minutes.
Or risk getting your IP banned.

If you wish to use this API for real time data please refer to Bitstamp's [websocket API](https://www.bitstamp.net/websocket/) instead.  

### Trading pair constants
Most API calls require you to provide a trading pair you wish to address.
You can make use of the CurrencyPair class constants to get the right strings you need to pass to a method. Example:
```php
use \Bitstamp\Models\CurrencyPair;
$pair = CurrencyPair::BTCUSD;
```

If you do not wish to use the CurrencyPair constants you need to provide a valid trading pair in the form of
a lowercase string.

### Public methods
This package allows you to use the public API without supplying account credentials. 
To retrieve an instance of the public API call the following method.
```php
$api = BitstampHttpApi::PublicApi();
```

Now you can start requesting data from the API.
#### Daily ticker
Returns ticker data of the past day. The returned object has the following properties

|Property   | Description                                   |
|:----------|:----------------------------------------------|
|Last       |Last BTC price                                 |                
|High       |Last 24 hours price high                       |   
|Low        |Last 24 hours price low                        |
|Vwap       |Last 24 hours volume weighted average price    |
|Volume     |Last 24 hours volume                           |
|Bid        |Highest buy order                              |
|Ask        |Lowest sell order                              |
|Timestamp  |Unix timestamp date and time                   |
|Open       |First price of the day                         |

Example request
```php
$api = BitstampHttpApi::PublicApi();
$api->getDailyTicker(CurrencyPair::BTCUSD);
```

Example response
```php
object(Bitstamp\PublicApi\Responses\TickerResponse)#68 (9) {
  ["high"]=>
  float(9380)
  ["last"]=>
  float(9260.99)
  ["timestamp"]=>
  int(1518634427)
  ["bid"]=>
  float(9254)
  ["vwap"]=>
  float(8986.35)
  ["volume"]=>
  float(16019.68608281)
  ["low"]=>
  float(8461.38)
  ["ask"]=>
  float(9260.93)
  ["open"]=>
  float(8504.57)
}
```

#### Hourly ticker
Returns ticker data of the past hour

|Property   | Description                                   |
|:----------|:----------------------------------------------|
|Last       |Last BTC price                                 |                
|High       |Last hour price high                           |   
|Low        |Last hour price low                            |
|Vwap       |Last hour volume weighted average price        |
|Volume     |Volume - Last hour volume                      |
|Bid        |Highest buy order                              |
|Ask        |Lowest sell order                              |
|Timestamp  |Unix timestamp date and time                   |
|Open       |First price of the day                         |

Example request
```php
$api = BitstampHttpApi::PublicApi();
$api->getHourlyTicker(CurrencyPair::BTCUSD);
```

Example response
```php
object(Bitstamp\PublicApi\Responses\HourlyTickerResponse)#31 (9) {
  ["high"]=>
  float(9380)
  ["last"]=>
  float(9312.73)
  ["timestamp"]=>
  int(1518634624)
  ["bid"]=>
  float(9300.38)
  ["vwap"]=>
  float(9307.18)
  ["volume"]=>
  float(875.26702747)
  ["low"]=>
  float(9230)
  ["ask"]=>
  float(9312.72)
  ["open"]=>
  float(9319.99)
}
```

#### Orderbook
Returns an object with "bids" and "asks". 
Each is a list of open orders and each order is represented as a list holding the price and the amount.

Example request
```php
$api = BitstampHttpApi::PublicApi();
$api->getOrderBook(CurrencyPair::BTCUSD);
```

Example response
```php
object(Bitstamp\PublicApi\Responses\OrderbookResponse)#48 (3) {
  ["high"]=>
  int(1518634712)
  ["bids"]=>
  array(...)
  ["asks"]=>
  array(...)
}
```
#### Transactions
Returns an object with a descending list of transaction. Every transaction array contains:

|Property   | Description                                   |
|:----------|:----------------------------------------------|
|Date       |Unix timestamp date and time                   |                
|Tid        |Transaction ID                                 |   
|Price      |BTC price                                      |
|Amount     |BTC amount                                     |
|Type       |0 (buy) or 1 (sell)                            |

Example request
```php
$api = BitstampHttpApi::PublicApi();
$api->getTransactions(CurrencyPair::BCHEUR, minute);
```

Example response
```php
object(Bitstamp\PublicApi\Responses\TransactionsResponse)#68 (1) {
  ["transactions"]=>
  array(2) {
    [0]=>
    array(5) {
      ["date"]=>
      string(10) "1518635036"
      ["tid"]=>
      string(8) "54709960"
      ["price"]=>
      string(7) "1080.00"
      ["type"]=>
      string(1) "0"
      ["amount"]=>
      string(10) "0.12830413"
    }
    [1]=>
    array(5) {
      ["date"]=>
      string(10) "1518635033"
      ["tid"]=>
      string(8) "54709957"
      ["price"]=>
      string(7) "1080.00"
      ["type"]=>
      string(1) "0"
      ["amount"]=>
      string(10) "0.01508434"
    }
  }
}
```

#### Get trading pairs
Returns an object with a list of trading pairs. Every trading pair array contains

|Property           | Description                                                   |
|:------------------|:--------------------------------------------------------------|
|url_symbol         |URL symbol of trading pair                                     |                
|base_decimals      |Decimal precision for base currency (BTC/USD - base: BTC)      |   
|counter_decimals   |Decimal precision for counter currency (BTC/USD - counter: USD)|
|minimum_order      |Minimum order size                                             |
|trading            |Trading engine status (Enabled/Disabled)                       |
|description        |Trading pair description                                       |

Example request
```php
$api = BitstampHttpApi::PublicApi();
$api->getTradingPairInfo();
```
Example response
```php
object(Bitstamp\PublicApi\Responses\TradingPairsInfoResponse)#31 (1) {
  ["tradingPairs"]=>
  array(15) {
    [0]=>
    array(7) {
      ["base_decimals"]=>
      int(8)
      ["minimum_order"]=>
      string(7) "5.0 USD"
      ["name"]=>
      string(7) "LTC/USD"
      ["counter_decimals"]=>
      int(2)
      ["trading"]=>
      string(7) "Enabled"
      ["url_symbol"]=>
      string(6) "ltcusd"
      ["description"]=>
      string(22) "Litecoin / U.S. dollar"
    }
    [1]=>
    array(7) {
      ["base_decimals"]=>
      int(8)
      ["minimum_order"]=>
      string(7) "5.0 USD"
      ["name"]=>
      string(7) "ETH/USD"
      ["counter_decimals"]=>
      int(2)
      ["trading"]=>
      string(7) "Enabled"
      ["url_symbol"]=>
      string(6) "ethusd"
      ["description"]=>
      string(19) "Ether / U.S. dollar"
    }
    ...
  }
}
```

#### EUR / USD conversion rate
Check the current EUR / USD conversion rate

Example request
```php
$api = BitstampHttpApi::PublicApi();
$api->getEurUsdConversionRate();
```

Example response
```php
object(Bitstamp\PublicApi\Responses\EurUsdConversionRateResponse)#63 (2) {
  ["buy"]=>
  float(1.2369)
  ["sell"]=>
  float(1.2267)
}
```

### Private methods
To be implemented

## License
This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details