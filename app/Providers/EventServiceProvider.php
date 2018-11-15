<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\CategorySaving' => [
            'App\Listeners\CategorySaving',
        ],
        'App\Events\ProductSaving' => [
            'App\Listeners\ProductSaving',
        ],
        'App\Events\ParkingSaving' => [
        'App\Listeners\ParkingSaving',
        ],
        'App\Events\OrderSaving' => [
        'App\Listeners\OrderSaving',
        ],
        'App\Events\OrderUpdating' => [
        'App\Listeners\OrderUpdating',
        ],
    ];




    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
