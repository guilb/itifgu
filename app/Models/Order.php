<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\OrderSaving;
use App\Events\OrderUpdating;

class Order extends Model
{
protected $fillable = [
        'category_id', 'product_id','parking_id', 'user_id','customer_comment','feedback','quantity','unit_price','total_price','vat','delay','status','user_name', 'user_address', 'user_city','user_zipcode', 'user_country'
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
	    'updating' => OrderUpdating::class,
	];

}
