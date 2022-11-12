<?php

namespace App;;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    //
    protected $guarded = [];

    public function property(){
        return $this->belongsTo(Property::class,'property_id');

    }
}
