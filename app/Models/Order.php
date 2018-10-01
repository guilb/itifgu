<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelsOrder extends Model
{
	public function category()
	{
	    return $this->belongsTo(Category::class);
	}

	public function product()
	{
	    return $this->belongsTo(Product::class);
	}

	public function user()
	{
	    return $this->belongsTo(User::class);
	}

	public function parking()
	{
	    return $this->belongsTo(Parking::class);
	}
}
