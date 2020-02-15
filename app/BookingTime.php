<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BookingTime extends Model
{
    protected $guarded = ['id'];

    public function getStartTimeAttribute($value)
    {
        return Carbon::createFromFormat('H:i:s', $value)->setTimezone(CompanySetting::first()->timezone)->format('h:i A');
    }

    public function getEndTimeAttribute($value)
    {
        return Carbon::createFromFormat('H:i:s', $value)->setTimezone(CompanySetting::first()->timezone)->format('h:i A');
    }

    public function getUtcStartTimeAttribute() {
        return Carbon::createFromFormat('H:i:s', $this->attributes['start_time'])->format('h:i A');
    }

    public function getUtcEndTimeAttribute() {
        return Carbon::createFromFormat('H:i:s', $this->attributes['end_time'])->format('h:i A');
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = Carbon::parse($value, CompanySetting::first()->timezone)->setTimezone('UTC')->format('H:i:s');
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = Carbon::parse($value, CompanySetting::first()->timezone)->setTimezone('UTC')->format('H:i:s');
    }
}
