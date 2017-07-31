<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $fillable = ['user_id','total','payment_id','delivered'];

    public function orderItems()
    {
        return $this->belongsToMany(Products::class,'order_product','product_id','order_id')->withPivot('qty','total');
    }
        public function user() {
            return $this->belongsTo('App\User');
        }


}
