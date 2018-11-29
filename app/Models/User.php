<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Events\UserCreating;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','name', 'email', 'password','role','parking_id', 'address', 'zipcode', 'city','country','phone','status'
    ];



    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }

    public function orders()
    {
        return $this->hasMany (Order::class);
    }



    protected $dispatchesEvents = [
        'creating' => UserCreating::class,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
