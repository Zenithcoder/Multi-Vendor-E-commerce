<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table  = 'category';
    protected $primarykey = 'id';
    protected $fillable = ['name'];

    public function products() {

        return $this->hasMany('App\Products');
    }
    public function brands() {

        return $this->hasMany('App\Brands','category_id');
    }
}
