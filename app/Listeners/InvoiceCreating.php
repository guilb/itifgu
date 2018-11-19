<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\InvoiceCreating as EventInvoiceCreating;
use App\Models\Invoice;
use Log;

class InvoiceCreating
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
        $max = Invoice::selectRaw('MAX(RIGHT(number,4)) AS max_value')
        ->whereRaw('LEFT(number,5) = ?' ,'C'.date('y').date('m'))
        ->first();
        $new_number=$max->max_value+1;
        $new_number = sprintf("%04d", $new_number);
        $event->model->number = "C".date("y").date("m").$new_number;

    }
}
