<?php

namespace JansenFelipe\Laraeditable;

use Illuminate\Support\ServiceProvider;

class LaraeditableServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        include __DIR__ . '/Http/routes.php';

        $this->loadViewsFrom(__DIR__ . '/../../../public', 'jansenfelipe-laraeditable');

        $this->publishes([
            __DIR__ . '/../../../public' => base_path('public/vendor/jansenfelipe-laraeditable'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        
    }

}
