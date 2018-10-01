<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Events\ParkingSaving;

class Parking extends Model
{
    protected $fillable = [
        'name', 'slug', 'code',
    ];
    public function users()
	{
	    return $this->hasMany(User::class);
	}

	public function orders()
	{
	    return $this->hasMany (Order::class);
	}

	protected $dispatchesEvents = [
	    'saving' => ParkingSaving::class,
	];
}