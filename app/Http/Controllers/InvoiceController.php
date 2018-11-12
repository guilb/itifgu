<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Invoice;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
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
        #$request->number = "88";
        #$request->user_id = "1";
        #$request->parking_id = "1";
        $user = User::find($user_id);

        Order::where('user_id', $user->id)->where('status', 'finished')->update(array('status' => "billed"));


        Invoice::create(['number' => '1','user_id' => $user->id,'parking_id' => $user->parking->id,'date' => Carbon::now()]);



        return back()->with('ok', __("La facture a bien été créée"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
