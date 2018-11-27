<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Events\InvoiceSaving;
use App\Events\InvoiceCreating;

class Invoice extends Model
{
    protected $fillable = [
        'user_id', 'parking_id','number', 'date','user_firstname','user_name', 'user_address', 'user_city','user_zipcode', 'user_country'
    ];

	public function orders()
	{
	    return $this->hasMany (Order::class);
	}

	public function user()
	{
	    return $this->belongsTo(User::class);
	}



	public function parking()
	{
	    return $this->belongsTo(Parking::class);
	}

	public function total_ttc()
	{
		$total_ttc = 0;
        foreach($this->orders as $order){ 
             $total_ttc = $total_ttc + $order->total_price;
         }
	    return $total_ttc;
	}

	public function total_ht()
	{
		$total_ht = 0;
        foreach($this->orders as $order){ 
             $total_ht = $total_ht + $order->total_price/((100+$order->vat)/100);
         }
	    return $total_ht;
	}

	public function total_vat()
	{
		$total_vat = 0;
        foreach($this->orders as $order){ 
             $total_vat = $total_vat + $order->total_price-$order->total_price/((100+$order->vat)/100);;
         }
	    return $total_vat;
	}	


	protected $dispatchesEvents = [
	    'saving' => InvoiceSaving::class,
	    'creating' => InvoiceCreating::class,
	];
}

