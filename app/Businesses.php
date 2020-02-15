<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Businesses extends Model
{
    //
    protected $table = 'businesses';

    public function businessUsers(){
    	return $this->hasOne(BusinessUser::class, 'business_id');
    	// return $this->hasManyThrough('App\BusinessUser', 'App\Booking' , 'business_id' ,'business_id' , 'id');
    }
}
