<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\UserCreating as EventUserCreating;


use App\Models\User;
use Log;
class UserCreating
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
        $code_parking = $event->model->parking->code;
        $max = User::selectRaw('MAX(RIGHT(customer_number,4)) AS max_value')->whereParking_id($event->model->parking->id)->first();
        $new_number=$max->max_value+1;
        $new_number = sprintf("%05d", $new_number);
        $event->model->customer_number = "DLC".$code_parking.$new_number;

    }
}
