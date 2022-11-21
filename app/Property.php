<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $guarded= [];

    // protected $appends = [
    //     'formatted_created_at',
    // ];
    
    public function leases(){
        return $this->hasOne(Lease::class);
    }    

    // public function getFormattedCreatedAttribute(){
    //     return $this->created_at->format(config('app.date_format'));
    // }
}
