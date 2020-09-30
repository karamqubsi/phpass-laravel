<?php namespace Karamqubsi\Phpass;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class PhpassHashServiceProvider extends ServiceProvider implements DeferrableProvider
{
      /**
     * Register services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../../config/phpass.php' => config_path('phpass.php'),
        ]);
    }
    
     public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../../config/phpass.php', 'phpass'
        );

        $this->app->singleton('hash', function ($app) {
            return new HashManager($app);
        });

        $this->app->singleton('hash.driver', function ($app) {
            return $app['hash']->driver();
        });
    }
    
    public function provides()
    {
        return ['hash', 'hash.driver'];
    }
}

