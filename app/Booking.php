<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $dates = ['date_time'];

    public function BusinessUser(){
       return $this->belongsTo(BusinessUser::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function employee(){
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function items(){
        return $this->hasMany(BookingItem::class);
    }

    public function setDateTimeAttribute($value) {
        $this->attributes['date_time'] = Carbon::parse($value, CompanySetting::first()->timezone)->setTimezone('UTC');
    }

    public function getDateTimeAttribute($value) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->setTimezone(CompanySetting::first()->timezone);
    }

    public function getUtcDateTimeAttribute() {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['date_time']);
    }
}
