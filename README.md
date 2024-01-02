
# Laravel Stripe Demo

Integrate stripe subscription in laravel project


## Setup Project From Git Repository

Get clone of git repository

```bash
  git clone https://github.com/trushang-ts/laravel-stripe-demo.git
```

Modify .env file

```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=laravel-stripe-demo
  DB_PASSWORD=
  DB_USERNAME=root

  STRIPE_KEY=your publishable key here
  STRIPE_SECRET=your secret here
  CASHIER_CURRENCY=usd
```

Install or update composer

```bash
  composer install or
  composer update
```

Run migrartions

```bash
  php artisan migrate
```

Run seeders

```bash
  php artisan db:seed
```

Generate key

```bash
  php artisan key:generate
```

Run project

```bash
  php artisan serve
```


## Installation To Create Demo Without Git Repository

Install the cashier package

```bash
  composer require laravel/cashier
```

Run the migrations

```bash
  php artisan migrate
```

Install the stripe-php package

```bash
  composer require stripe/stripe-php
```

Install passport

```bash
  composer require laravel/passport OR 
  composer require laravel/passport  --with-all-dependencies
```

Run migrartions 

```bash
  php artisan migrate
```

Create Passport Token Keys For Security 

```bash
  php artisan passport:install
```
    
## Modify the User model

```php
<?php
namespace App;

...

use Laravel\Passport\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable {
  use HasApiTokens, Billable;
  ...
}
```

## Modify .env file

```
STRIPE_KEY=your publishable key here
STRIPE_SECRET=your secret here
CASHIER_CURRENCY=usd
```

## Modify config/sevices.php file

```
'stripe' => [
  'model' => App\User::class,
  'key' => env('STRIPE_KEY'),
  'secret' => env('STRIPE_SECRET'),
],

```

## Modify config/auth.php file

```php
<?php

return [
    .....
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'passport',
            'provider' => 'users',
        ],
    ],
    .....
]
```


## API Collection

 - [https://api.postman.com/collections/29803690-efe0ad47-24d0-40e0-afdc-ea601887f41c?access_key=PMAT-01HCHZ7M1H9XGMKXD8YAA4MBX4](https://api.postman.com/collections/29803690-efe0ad47-24d0-40e0-afdc-ea601887f41c?access_key=PMAT-01HCHZ7M1H9XGMKXD8YAA4MBX4)

## Reference

 - [https://medium.com/fabcoding/laravel-7-create-a-subscription-system-using-cashier-stripe-77cdf5c8ea5d](https://medium.com/fabcoding/laravel-7-create-a-subscription-system-using-cashier-stripe-77cdf5c8ea5d)
 
 - [https://stripe.com/docs/testing](https://stripe.com/docs/testing)
