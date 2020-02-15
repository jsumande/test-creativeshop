<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessUser extends Model
{
    //

    protected $table = 'business_user';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function businesses(){
         return $this->belongsTo(Businesses::class);
    }

    public function bookings(){
         return $this->hasMany(Booking::class, 'business_id');
    }
}
