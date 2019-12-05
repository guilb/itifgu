<?php

namespace App\Http\Controllers;
use Log;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      	return redirect()->action('ItineraryController@index');
	}
}


