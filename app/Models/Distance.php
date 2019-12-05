<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
	protected $fillable = [
        'place_1_id','place_2_id','distance','duration'
    ];

    public function place_1()
    {
        return $this->hasOne('App\Place', 'id', 'place_1_id');

    }
    public function place_2()
    {
        return $this->hasOne('App\Place', 'id', 'place_2_id');

    }
}
