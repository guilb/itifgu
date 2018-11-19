<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\OrderSaving as EventOrderSaving;


class OrderSaving
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $event->model->product_name = $event->model->product->name;
        $event->model->category_name = $event->model->category->name;
        $event->model->parking_name = $event->model->parking->name;
        $event->model->user_name = $event->model->user->name;
        $event->model->user_address = $event->model->user->address;
        $event->model->user_zipcode = $event->model->user->zipcode;
        $event->model->user_city = $event->model->user->city;
        $event->model->user_country = $event->model->user->country;
    }
}
