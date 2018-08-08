<?php

namespace App\Providers;

use App\Models\Category;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role === 'admin';
        });

        if(request()->server("SCRIPT_NAME") !== 'artisan') {
            view ()->share ('categories', Category::all ());
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

