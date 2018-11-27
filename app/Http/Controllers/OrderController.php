<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\User;
use App\Models\Parking;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use Log;
class OrderController extends Controller
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
            $orders = Order::orderBy('id', 'desc')->paginate(config('app.pagination'));;
        }
        else
        {
            $orders = Order::orderBy('id', 'desc')->whereUser_id($user->id)->paginate(config('app.pagination'));;
        }
        return view('orders.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this_user = \Auth::user();
        $parkings = Parking::all ()->except(99);
        $users = User::all();
        return view('orders.create', compact('parkings','users','this_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {

        Log::warning($request);
        Order::create($request->all());
        Log::warning($request);
        return back()->with('ok', __("La commande a bien été enregistrée"));
    }



    public function parking($slug)
    {
        $parking = Parking::whereSlug($slug)->firstorFail();
        $orders = Order::whereParking_id($parking->id)->paginate(config('app.pagination'));;

        return view('orders.index', compact('parking', 'orders'));
    }


    public function user($id)
    {
        $orders = Order::whereUser_id($id)->paginate(config('app.pagination'));;

        return view('orders.index', compact ('orders'));
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
    public function edit(Order $order)
    {


        #$order = Order::find($order);


        $products = Product::whereCategory_id($order->category_id)->pluck('name', 'id','category_id');
        return view('orders.edit', compact('order','products'));
    }
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {   

        $order->update($request->all());
        return redirect()->route('order.index')->with('ok', __('La commande a bien été modifié'));
    }


    public function update_status($id,$status)
    {
        Order::where('id', $id)->update(array('status' => $status));
        return redirect()->route('order.index')->with('ok', __('La commande a bien été modifié'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
