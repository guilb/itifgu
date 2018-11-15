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
            $orders = Order::paginate(config('app.pagination'));;
        }
        else
        {
            $orders = Order::whereUser_id($user->id)->paginate(config('app.pagination'));;
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
        $parkings = Parking::all();
        $users = User::all();
        return view('orders.create', compact('parkings','users','this_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'parking_id' => 'required|exists:parkings,id',
            'quantity' => 'nullable|integer',
            'unit_price' => 'nullable|numeric',
            'float_price' => 'nullable|numeric',
            'customer_comment' => 'nullable|string|max:255',
            'delay' => 'nullable|string|max:255',
        ]);
        Order::create($request->all());

        return back()->with('ok', __("La commande a bien été enregistrée"));
    }



    public function parking($slug)
    {
        $parking = Parking::whereSlug($slug)->firstorFail();
        $orders = Order::whereParking_id($parking->id)->paginate(config('app.pagination'));;

        return view('orders.index', compact('parking', 'orders'));
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

        return view('orders.edit', compact('order'));
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
