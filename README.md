# ESB Client

A PHP client library for interacting with an ESB (Enterprise Service Bus) API. This library provides a set of request classes and a configurable API client for seamless integration with various ESB endpoints.

## Features
- Simple API client for ESB integration
- Request classes for different ESB operations (orders, products, reports, etc.)
- Factory pattern for client instantiation
- Guzzle HTTP client support

## Requirements
- PHP 7.4 or higher
- Composer

## Installation

Install via Composer:

```bash
composer require your-vendor/esb-client
```

## Usage

### Basic Example

```php
use EsbClient\ApiClient;
use EsbClient\ApiConfig;
use EsbClient\Request\OrderRequest;

$config = new ApiConfig([
    'base_uri' => 'https://api.example.com',
    'api_key' => 'your-api-key',
]);

$client = new ApiClient($config);

$request = new OrderRequest(/* ...parameters... */);
$response = $client->send($request);

// Handle $response
```

### Using the Factory

```php
use EsbClient\Factory\EsbClientFactory;

$client = EsbClientFactory::create([
    'base_uri' => 'https://api.example.com',
    'api_key' => 'your-api-key',
]);
```

## Project Structure

- `src/ApiClient.php` - Main API client class
- `src/ApiConfig.php` - API configuration
- `src/Factory/` - Factories for client and HTTP client
- `src/Request/` - Request classes for various ESB operations

## Extending

You can add new request types by creating new classes in the `src/Request/` directory, following the existing request class structure.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License

[MIT](LICENSE)
