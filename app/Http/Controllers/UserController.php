<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Parking;
use Illuminate\Support\Facades\Input;
use Mail;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name', 'asc')->paginate(config('app.pagination'));
        return view('users.index', compact('users'));
    }


    public function parking($slug)
    {
        $parking = Parking::whereSlug($slug)->firstorFail();
        $users = User::whereParking_id($parking->id)->orderBy('name', 'asc')->paginate(config('app.pagination'));;

        return view('users.index', compact('parking', 'users'));
    }


    public function load_users()
    {
        
        $id = Input::post("id");
        $users = User::all()->where('parking_id', $id);
        //return $product;
        return response()->json([
            $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $parkings = Parking::all ()->except(99)->pluck('name', 'id');

        return view('users.create',compact('parkings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    { 

        $request->merge(['password' => Hash::make($request->password)]);
        
        $user = User::create($request->all());
        $email = Mail::send('emails.user_create', ['user' => $user], function ($m) use ($user) {
            $m->from('contact@conciergerie-vt.com', 'SOLUTIS');

            $m->to($user->email, $user->firstname.' '.$user->name)->subject('Votre compte a été créé '.$user->firstname.' '.$user->name.' '.$user->password);
        });
        return redirect('/user');
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
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $users = User::paginate(config('app.pagination'));
        $parkings = Parking::all ()->except(99)->pluck('name', 'id');

        return view ('users.edit', compact('user','parkings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);
        $user->update([
            'email' => $request->email,
            'firstname' => $request->firstname,
            'name' => $request->name,
            'role' => $request->role,
            'parking_id' => $request->parking_id,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);
        return back()->with(['ok' => __('Le profil a bien été mis à jour')]);
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