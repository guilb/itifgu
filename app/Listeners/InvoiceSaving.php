<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\InvoiceSaving as EventInvoiceSaving;


class InvoiceSaving
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
        $event->model->user_firstname = $event->model->user->firstname;
        $event->model->user_name = $event->model->user->name;
        $event->model->user_address = $event->model->user->address;
        $event->model->user_zipcode = $event->model->user->zipcode;
        $event->model->user_city = $event->model->user->city;
        $event->model->user_country = $event->model->user->country;
        $event->model->user_customer_number = $event->model->user->customer_number;
    }
}
