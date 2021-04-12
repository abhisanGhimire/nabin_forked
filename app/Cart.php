<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function foods()
    {
        return $this->hasMany('App\Food');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    protected $hidden = ['quantity'];
}
