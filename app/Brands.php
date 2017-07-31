<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    //
    protected $table  = 'brands';
    protected $primarykey = 'id';
    protected $fillable = ['name','category_id'];

    public function category() {

        return $this->belongsTo('App\Category');
    }}
