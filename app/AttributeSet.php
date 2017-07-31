<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeSet extends Model
{
    //
    protected $table  = 'attribute_set';
    protected $primarykey = 'id';
    protected $fillable = ['name','value'];
}
