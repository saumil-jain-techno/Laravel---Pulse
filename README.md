# Laravel Pulse
Laravel Pulse is a free and open source package for the Laravel framework that helps developers monitor various aspects of their web applications in real-time.

Laravel Pulse is a debugging powerhouse, meticulously recording every facet of your Laravel application’s activity. From requests and queries to jobs, events, and queues, Pulse captures it all. This profound visibility proves invaluable in identifying bottlenecks, optimizing slow jobs and endpoints, and gaining insights into user engagement.

Laravel Pulse is crafted using Livewire, allowing users to customize the dashboard view fully. The Pulse dashboard boasts a responsive design, catering to users across various devices, including mobile. Users can toggle between dark and light modes, enhancing the user experience based on personal preferences.
One distinctive feature of Laravel Pulse is its self-hosted nature, granting users complete control over their data. This characteristic not only enhances security but also aligns with compliance requirements, making Pulse a versatile and secure solution.

## Requirements

The following tools are required to start the installation.

- PHP 8.2
- [Composer](https://getcomposer.org/download/)

## Installation

Since Pulse is currently in beta, you may need to adjust your application's composer.json file to allow beta package releases to be installed:

```bash
    "minimum-stability": "beta",
    "prefer-stable": true
```

Then, you may use the Composer package manager to install Pulse into your Laravel project:

```bash
composer require laravel/pulse
```

Next, you should publish the Pulse configuration and migration files using the vendor:publish Artisan command:

```bash
php artisan vendor:publish --provider="Laravel\Pulse\PulseServiceProvider"
```

Finally, you should run the migrate command to create the tables needed to store Pulse's data:

```bash
php artisan migrate
```
Once Pulse's database migrations have been run, you may access the Pulse dashboard via the /pulse route.

```bash
http://127.0.0.1:8000/pulse
```

## Reference

- (https://laravel.com/docs/10.x/pulse)[Laravel Pulse - Laravel 10.x - The PHP Framework For Web Artisans]
- (https://pulse.laravel.com/)[Laravel Pulse]
- (https://laravel-news.com/laravel-pulse)[Laravel Pulse is a health and performance monitoring tool for your Laravel applications - Laravel News]
- (https://benjamincrozat.com/laravel-pulse)[https://benjamincrozat.com/laravel-pulse]

