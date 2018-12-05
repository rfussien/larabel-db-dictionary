<?php

namespace Rfussien\DbDictionary;

use Illuminate\Support\ServiceProvider;
use Rfussien\DbDictionary\Console\GenerateDictionary;

class CommandServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $viewPath = dirname(__DIR__) . '/resources/views';
        $this->loadViewsFrom($viewPath, 'dictionary');
        $this->publishes([$viewPath => resource_path('views/vendor/dictionary')]);

        if ($this->app->runningInConsole()) {
            $this->commands([GenerateDictionary::class]);
        }
    }
}
