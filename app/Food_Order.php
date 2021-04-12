<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food_Order extends Model
{
    protected $table ='food_order';
    protected $fillable =['order_id','food_id']; 
}
