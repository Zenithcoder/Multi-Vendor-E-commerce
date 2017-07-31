<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table  = 'products';
    protected $primarykey = 'id';
    protected $fillable = ['name','price','qty','category_id','brand_id','image','user_id'];


    public function brand() {

        return $this->belongsTo('App\Brands');
    }
    public function category() {

        return $this->belongsTo('App\Category');
    }
    public function user() {

        return $this->belongsTo('App\User');
    }
//    public function priceToCents()
//    {
//        return $this->price * 100;
//    }

}
