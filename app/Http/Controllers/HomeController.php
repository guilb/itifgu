<?php

namespace App\Http\Controllers;
use ConsoleTVs\Invoices\Classes\Invoice;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return redirect()->action('OrderController@index');
	}
}


