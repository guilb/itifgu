<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\OrderSaving;

class Order extends Model
{
    protected $fillable = [
        'category_id', 'product_id','parking_id', 'user_id','customer_comment','feedback','quantity','unit_price','total_price','delay','status'
    ];

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

	public function invoice()
	{
	    return $this->belongsTo(Invoice::class);
	}

	public function parking()
	{
	    return $this->belongsTo(Parking::class);
	}

	protected $dispatchesEvents = [
	    'saving' => OrderSaving::class,
	];

}
