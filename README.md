# Bitstamp HTTP API

This package is for communicating with the API of Bitstamp

For now the implementation only has the public methods exposed but will contain the private methods in the future

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://php.net/)

# Table of contents
* [Installation](#installation)
* [Usage](#usage)
    * [Request limit](#request-limit)
    * [Public methods](#public-methods)
        * [Daily ticker](#daily-ticker)
        * [Hourly ticker](#hourly-ticker)
        * [Orderbook](#orderbook)
        * [Transactions](#transactions)
        * [Get trading pairs](#get-trading-pairs)
        * [EUR / USD conversion rate](#eur-/-usd-conversion-rate)
    * [Private methods](#private-methods)
* [License](#license)

## Installation
To be added

## Usage
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
Returns ticker data of the past day. The entry has the following values.

|Property   | Description                   |
|----------:|:-----------------------------|
| Last      | Last BTC price                |
| High      | Last 24 hours price high      |
| Low       | Last 24 hours price low       |
| Vwap      | Last 24 hours volume [weighted average price](https://en.wikipedia.org/wiki/Volume-weighted_average_price) |
| Volume    | Last 24 hours volume          |
| Bid       | Highest buy order             |
| Ask       | Lowest sell order             |
| Timestamp | Unix timestamp date and time. |
| Open      | First price of the day.       |

```php
$api->getDailyTicker($pair);
```

#### Hourly ticker
Returns ticker data of the past hour

```php
$api->getHourlyTicker($pair);
```

#### Orderbook
Returns an object with "bids" and "asks". 
Each is a list of open orders and each order is represented as a list holding the price and the amount.
```php
$api->getOrderBook($pair);
```

#### Transactions
Returns an object with a descending list of transaction.
```php
$api->getTransactions($pair);
```

#### Get trading pairs
Returns an object with a list of trading pairs.

```php
$api->getTradingPairInfo();
```

#### EUR / USD conversion rate
Check the current EUR / USD conversion rate

```php
$api->getEurUsdConversionRate();
```

### Private methods
To be implemented

## License
See [License](LICENSE.md)