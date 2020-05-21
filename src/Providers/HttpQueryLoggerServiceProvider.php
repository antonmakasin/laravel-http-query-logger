<?php

namespace Oskingv\HttpQueryLogger\Providers;

use Oskingv\HttpQueryLogger\Console\Commands\ClearLogger;
use Oskingv\HttpQueryLogger\Http\Exceptions\InvalidLogDriverException;
use Oskingv\HttpQueryLogger\Http\Middleware\Logger;
use Oskingv\HttpQueryLogger\Contracts\LoggerInterface;
use Oskingv\HttpQueryLogger\DBLogger;
use Oskingv\HttpQueryLogger\FileLogger;
use Exception;
use Illuminate\Support\ServiceProvider;

class HttpQueryLoggerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     * @throws \Exception
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/http-query-logger.php', 'http-query-logger'
        );
        $this->bindServices();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadConfig();
        $this->loadRoutes();
        $this->loadViews();
        $this->loadCommand();
        $this->loadMigrations();
    }

    public function bindServices(){
        $driver = config('http-query-logger.driver', 'file');
        $instance = "";
        switch ($driver) {
            case 'file':
                $instance = FileLogger::class;
                break;
            case 'db':
                $instance = DBLogger::class;
                break;
            default:
                try {
                    $instance = $driver;
                    if(!(resolve($instance) instanceof LoggerInterface))
                    {
                        throw new InvalidLogDriverException();
                    }
                }
                catch(\ReflectionException $exception){
                    throw new InvalidLogDriverException();
                }
                break;
        }
        $this->app->singleton(LoggerInterface::class,$instance);

        $this->app->singleton('http.query.logger', function ($app) use ($instance){
            return new Logger($app->make($instance));
        });
    }

    public function loadConfig(){
        $this->publishes([
            __DIR__.'/../../config/http-query-logger.php' => config_path('http-query-logger.php')
        ], 'config');
    }

    public function loadRoutes(){
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    public function loadViews(){
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'http-query-logger');
    }

    public function loadCommand(){
        $this->commands([
            ClearLogger::class
        ]);
    }

    public function loadMigrations(){
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
