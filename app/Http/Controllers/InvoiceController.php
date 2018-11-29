<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Invoice;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;

use Log;
use PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = \Auth::user();
        if ( $user->role === 'admin') {
            $invoices = Invoice::orderBy('created_at', 'desc')->paginate(config('app.pagination'));
        }
        else
        {
            $invoices = Invoice::whereUser_id($user->id)->orderBy('created_at', 'desc')->paginate(config('app.pagination'));
        }
        return view('invoices.index', compact('invoices'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($user_id)
    {

        $user = User::find($user_id);

        #creation de l'INVOICE
        $invoice = Invoice::create(['number' => $user->id.'000000','user_id' => $user->id,'parking_id' => $user->parking->id,'date' => Carbon::now()]);
        #selection des lignes des commandes
        $orders = Order::all()->where('user_id', $user_id)->where('status', 'finished');
        #mise à jour du statut des commandes
        Order::where('user_id', $user->id)->where('status', 'finished')->update(array('status' => "billed",'invoice_id' => $invoice->id));


        $vats = Order::groupBy('vat')->where('invoice_id', $invoice->id)->selectRaw('sum(total_price-(total_price)/((100+vat)/100)) as vat, vat as percentage, sum(total_price)/((100+vat)/100) as ht')->get();

        $pdf = PDF::loadView('invoices.pdf',compact('invoice','vats'));
        return $pdf->download($invoice->number.'.pdf');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Responsemyinvoicename
     */
    public function show($invoice_id)
    {
        $invoice = Invoice::find($invoice_id);

        $vats = Order::groupBy('vat')->where('invoice_id', $invoice_id)->selectRaw('sum(total_price-(total_price)/((100+vat)/100)) as vat, vat as percentage, sum(total_price)/((100+vat)/100) as ht')->get();

        $pdf = PDF::loadView('invoices.pdf',compact('invoice','vats'));
        return $pdf->download($invoice->number.'.pdf');
    }


    public function user($id)
    {
        $invoices = Invoice::whereUser_id($id)->paginate(config('app.pagination'));;

        return view('invoices.index', compact ('invoices'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }





}
