<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Events\InvoiceSaving;

class Invoice extends Model
{
    protected $fillable = [
        'user_id', 'parking_id','number', 'date'
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

	protected $dispatchesEvents = [
	    'saving' => InvoiceSaving::class,
	];
}

