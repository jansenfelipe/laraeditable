<?php

namespace JansenFelipe\Laraeditable;

use Illuminate\Support\ServiceProvider;

class LaraeditableServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/Http/routes.php';

        $this->loadViewsFrom(__DIR__ . '/../public', 'jansenfelipe-laraeditable');

        $this->publishes([
            __DIR__ . '/../public' => base_path('public/vendor/jansenfelipe-laraeditable'),
        ]);
    }

}
