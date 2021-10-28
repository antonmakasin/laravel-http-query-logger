# Laravel Http Query Logger

This is a small package that can helps in debugging logs. It can log 
request method, url, duration, request payload, which models are retrieved, controller and method. 

##  Installation

1. Install the package via composer

```bash
composer require antonmakasin/laravel-http-query-logger
```
## Usage

1.  Laravel 5.5 and higher uses Package Auto-Discovery, so doesn't require you to manually add
the ServiceProvider. If you use a lower version of Laravel you must register it in your 
_app.php_ file:

```bash
Oskingv\HttpQueryLogger\Providers\HttpQueryLoggerServiceProvider::class
```

2. Publish the config file with:

```bash
php artisan vendor:publish --tag=config --provider="Oskingv\HttpQueryLogger\Providers\HttpQueryLoggerServiceProvider"
```

The config file is called *http-query-logger.php*. Currently supported drivers are *db* and *file*

By default the logger will use *file* to log the data. But if you want to use Database for logging, migrate table by using

You can also configure which fields should not be logged like passwords, secrets, etc.

***You dont need to migrate if you are just using file driver***

```bash
php artisan migrate
```

3. Add middleware named ***http.query.logger*** to the route or controller you want to log data

```php
//in route.php or web.php
Route::middleware('http.query.logger')->post('/test',function(){
    return response()->json("test");
});
```

4. Dashboard can be accessible via ***yourdomain.com/http-query-logger***

## Clear the logs

You can permenently clear the logs by using the following command.
```bash
php artisan http_query_logger:clear
```

## Security

If you discover any security related issues, please email oskingvv95@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
