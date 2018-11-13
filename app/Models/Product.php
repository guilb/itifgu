<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Events\ProductSaving;


class Product extends Model
{

	protected $fillable = [
        'name', 'category_id','delay','price_display','price_value','description','vat'
    ];
	public function category()
	{
	    return $this->belongsTo(Category::class);
	}

	public function orders()
	{
	    return $this->hasMany (Order::class);
	}

	protected $dispatchesEvents = [
	    'saving' => ProductSaving::class,
	];

}
