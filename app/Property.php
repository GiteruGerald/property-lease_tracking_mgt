<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $guarded= [];

    public function leases(){
        return $this->hasOne(Lease::class);
    }
}
