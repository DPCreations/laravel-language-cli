<?php

namespace DPCreations\LaravelLanguageCli;

use Illuminate\Support\ServiceProvider;
use DPCreations\LaravelLanguageCli\Console\Make;

class laravelLanguageCliServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/languagecli.php', 'languagecli');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-language-cli'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Registering package commands.
        $this->commands([
            Make::class
        ]);
    }
}
