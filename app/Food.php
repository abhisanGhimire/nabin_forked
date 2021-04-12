<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table='foods';
    protected $fillable =['title','details','price','photo','cat_id'];

    public function category()
    {
        return $this->belongsTo('App\Category','cat_id');
    }
    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Order')->withPivot('quantity');
    }
    
}
