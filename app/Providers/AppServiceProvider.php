<?php

namespace App\Providers;

use App\View\Directives\BindDirective;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        Schema::defaultStringLength(191);

        BindDirective::register();
    }
}
