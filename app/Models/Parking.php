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

	protected $dispatchesEvents = [
	    'saving' => ParkingSaving::class,
	];
}