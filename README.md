# Cielo 3.0 Sdk - Laravel

This package just get the credential keys from `config/cielo.php` file and create a new instance of `Cielo\API30\Ecommerce\CieloEcommerce;` from official Cielo Sdk 3.0 package when you use the facade `SMartins\Cielo\Facades\Cielo;`.

To see the methods available on package go to [Cielo Sdk Docs](https://github.com/DeveloperCielo/API-3.0-PHP).

## Install

To install via composer run:

```
composer require smartins/cielo-laravel
```

In Laravel 5.5 the service provider and facade will automatically get registered. In older versions of the framework just add the service provider and facade in config/app.php file:

```php
    'providers' => [
        SMartins\Cielo\CieloServiceProvider::class,
    ],

    'aliases' => [
        'Cielo' => SMartins\Cielo\Facades\Cielo::class,
    ],
```

Publish the `config/cielo.php` file:

```
php artisan vendor:publish --provider="SMartins\Cielo\CieloServiceProvider"
```

Set on your `.env` the cielo credentials:

```
CIELO_ID=981273423
CIELO_KEY=a9sj8fl4jnlsjfis90js0afja0sdJASDOF90ja
CIELO_ENV=sandbox
```

The values accepted on `CIELO_ENV` are `sandbox` and `production`
