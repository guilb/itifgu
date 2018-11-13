<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Invoice;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
#use ConsoleTVs\Invoices\Classes\Invoice;

use Log;


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
            $invoices = Invoice::paginate(config('app.pagination'));
        }
        else
        {
            $invoices = Invoice::whereUser_id($user->id)->paginate(config('app.pagination'));
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


        Order::where('user_id', $user->id)->where('status', 'finished')->update(array('status' => "billed",'invoice_id' => $invoice->id));

        #creation du PDF
        $invoice_pdf = \ConsoleTVs\Invoices\Classes\Invoice::make()
                        ->number(4021)
                        ->tax(20)
                        ->notes('Affichage ici des conditions de paiement')
                        ->customer([
                            'name'      => $user->name,
                            'id'        => $user->id,
                            'phone'     => $user->phone,
                            'location'  => $user->address,
                            'zip'       => $user->zipcode,
                            'city'      => $user->city,
                            'country'   => $user->country,
                        ]);

        foreach($orders as $order){ 
             $invoice_pdf->addItem($order->product_name, $order->unit_price, $order->quantity, 1526);
         }

        $invoice_pdf->save('/public/facture_'.$invoice->number.'.pdf');

        return back()->with('ok', __("La facture a bien été créée"));

        #return back()->with('ok', __("La facture a bien été créée"));
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
        $orders = Order::all()->where('invoice_id', $invoice_id);

        #creation du PDF
        $invoice_pdf = \ConsoleTVs\Invoices\Classes\Invoice::make()
                        ->number($invoice->number)
                        ->tax(20)
                        ->notes('Affichage ici des conditions de paiement')
                        ->customer([
                            'name'      => $invoice->user->name,
                            'id'        => $invoice->user->id,
                            'phone'     => $invoice->user->phone,
                            'location'  => $invoice->user->address,
                            'zip'       => $invoice->user->zipcode,
                            'city'      => $invoice->user->city,
                            'country'   => $invoice->user->country,
                        ]);

        foreach($orders as $order){ 
             $invoice_pdf->addItem($order->product_name, $order->unit_price, $order->quantity, 1526);
         }

        $invoice_pdf->download('test.php');
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
