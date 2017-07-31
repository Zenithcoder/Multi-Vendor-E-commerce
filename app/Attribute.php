<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    //
    protected $table  = 'attribute';
    protected $primarykey = 'id';
    protected $fillable = ['name','value'];

}
