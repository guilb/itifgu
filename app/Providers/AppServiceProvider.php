<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Parking;

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
            view ()->share ('products', Product::all ());
            view ()->share ('parkings', Parking::all ());
        }
        Blade::if('adminOrOwner', function ($id) {
            return auth()->check() && (auth()->id() === $id || auth()->user()->role === 'admin');
        });
    
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

